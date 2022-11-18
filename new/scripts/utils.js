class ResourceCalculator {
  constructor({ name, dict, isMain = false, altFirstLabel = false, formatAs } = {}) {
    this.name = name;
    this.dict = dict;
    this.isMain = isMain ?? false;
    this.altFirstLabel = altFirstLabel ?? false;
    this.formattingCallback = ResourceCalculator.formattingOptions[formatAs] ?? ((n) => n);
    this.constructHTML();
  }

  static formattingOptions = {
    number: (n) => Formatting.thousandSeparators(n),
    time: (n) => Formatting.secondsToDhms(n),
  };

  #rowTemplate = (val, label) => `
    <div class="input-group-three">
      <label for="${this.name}In">${label}</label>
      <div>
        <input class="${this.name}Input rssInput input" type="number" data-amt="${val}" />
      </div>
      <label id="${this.name}Total${val}">0</label>
    </div>
    `;

  constructHTML() {
    const n = this.name;

    this.header = `
      <li class="rssTab ${this.isMain ? "active" : ""}" data-target="${n}Tab">
        <img class="rssImg" src="images/${n}.png" alt="${n}" />
      </li>
      `;

    const rows = Object.keys(this.dict)
      .map((val) => {
        const label = this.altFirstLabel && val == 1 ? "Open" : this.formattingCallback(val);
        return this.#rowTemplate(val, label);
      })
      .join("");

    this.tabContent = `
      <div id="${n}Tab" class="rssTabContent ${this.isMain ? "active" : ""}">
        <div class="tab-title">
          <h4>${`${n[0].toUpperCase()}${n.substring(1)}`}</h4>
        </div>
        <div class="rssForm">
          ${rows}
          <div class="input-group-three total">
            <h4>Total:</h4>
            <p id="${n}Total">0</p>
            <div></div>
          </div>
        </div>
      </div>
      `;
  }

  addEvents() {
    const rssInputs = document.getElementsByClassName(`${this.name}Input`);
    for (let input of rssInputs) {
      input.addEventListener("keyup", () => {
        const key = parseInt(input.getAttribute("data-amt"));
        const val = parseInt(input.value);
        this.dict[key] = isNaN(val) ? 0 : val;
        this.updateTotals();
        this.saveTotals();
      });
    }
  }

  updateTotals() {
    const totalPrefix = `${this.name}Total`;
    let total = 0;
    for (let key in this.dict) {
      const val = key * this.dict[key];
      total += val;
      const el = document.getElementById(`${totalPrefix}${key}`);
      if (el) el.innerHTML = formatNumber(val);
    }
    total = formatNumber(total);
    document.getElementById(totalPrefix).innerHTML = total;
  }

  saveTotals() {
    const saveKey = `${this.name}Totals`;
    sessionStorage.setItem(saveKey, JSON.stringify(this.dict));
  }
}

class MultiResourceCalculator {
  constructor({ tabs, autoAddEvents = true, altFirstLabel = false, formatAs } = {}) {
    this.tabs = tabs;
    this.altFirstLabel = altFirstLabel;
    this.formatAs = formatAs;
    this.constructHTML();
    if (autoAddEvents) this.addEvents();
  }

  constructHTML() {
    const trackers = [],
      headers = [],
      mainContents = [];

    Object.keys(this.tabs).forEach((key) => {
      const tab = this.tabs[key];
      const tracker = new ResourceCalculator({
        name: key,
        dict: tab.totals,
        isMain: tab.isMain,
        altFirstLabel: this.altFirstLabel,
        formatAs: this.formatAs,
      });
      trackers.push(tracker);
      headers.push(tracker.header);
      mainContents.push(tracker.tabContent);
    });

    const headerContent = `
      <ul id="tabs">
      ${headers.join("")}
      </ul>
    `;

    const mainContent = `
      ${mainContents.join("")}
      <a id="nextLink" href="speedup-calculator.html">Next: Speedup Calculator</a>
    `;

    this.trackers = trackers;
    document.getElementById("content").innerHTML = mainContent;
    document.getElementById("header").innerHTML = headerContent;
  }

  addEvents() {
    this.trackers.forEach((tracker) => tracker.addEvents());
    const rssTabs = document.getElementsByClassName(`rssTab`);
    for (let tab of rssTabs) {
      tab.addEventListener("click", () => {
        const targetContent = document.getElementById(tab.getAttribute("data-target"));
        for (let t of rssTabs) {
          t.classList.remove("active");
          const content = document.getElementById(t.getAttribute("data-target"));
          content.classList.remove("active", "fade-in");
          content.classList.add("fade-out");
        }
        tab.classList.add("active");
        targetContent.classList.add("active", "fade-in");
        targetContent.classList.remove("fade-out");
      });
    }
  }
}

class Formatting {
  static thousandSeparators = (num) => num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

  static secondsToDhms = (seconds) => {
    seconds = parseInt(seconds);
    seconds = isNaN(seconds) ? 0 : seconds;
    const d = Math.floor(seconds / (3600 * 24)),
      h = Math.floor((seconds % (3600 * 24)) / 3600),
      m = Math.floor((seconds % 3600) / 60),
      s = Math.floor(seconds % 60);

    const days = d > 0 ? d + (d == 1 ? " D : " : " D : ") : "0 D : ",
      hours = h > 0 ? h + (h == 1 ? " H : " : " H : ") : "0 H : ",
      mins = m > 0 ? m + (m == 1 ? " M " : " M ") : "0 M",
      secs = s > 0 ? s + (s == 1 ? " : s" : " : s") : "";
    return `${days}${hours}${mins}${secs}`;
  };
}

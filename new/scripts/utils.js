class ResourceCalculator {
  constructor({
    name,
    dict,
    isMain = false,
    altFirstLabel = false,
    formatLabelAs,
    formatValueAs,
  } = {}) {
    this.name = name;
    this.storageKey = `${this.name}Totals`;
    this.dict = this.fetchExisting() ?? dict;
    this.isMain = isMain ?? false;
    this.altFirstLabel = altFirstLabel ?? false;
    this.labelFormatCb = ResourceCalculator.formattingOptions[formatLabelAs] ?? ((n) => n);
    this.valueFormatCb = ResourceCalculator.formattingOptions[formatValueAs] ?? ((n) => n);
    this.constructHTML();
  }

  static formattingOptions = {
    number: (n) => Formatting.thousandSeparators(n),
    time: (n) => Formatting.secondsToDhms(n),
    custom: (n) => n,
  };

  fetchExisting() {
    const saved = sessionStorage.getItem(this.storageKey);
    const parsed = saved ? JSON.parse(saved) : null;
    return parsed;
  }

  saveTotals() {
    sessionStorage.setItem(this.storageKey, JSON.stringify(this.dict));
  }

  #rowTemplate = (key, label, val) => `
    <div class="input-group-three">
      <label for="${this.name}In">${label}</label>
      <div>
        <input class="${this.name}Input rssInput input" type="number" data-amt="${key}" />
      </div>
      <label id="${this.name}Total${key}">${val ?? 0}</label>
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
      .map((key) => {
        const label = this.altFirstLabel && key == 1 ? "Open" : this.labelFormatCb(key);
        return this.#rowTemplate(key, label, this.dict[key]);
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
        console.log(`key: ${key}, value: ${val}`);
        this.dict[key] = isNaN(val) ? 0 : val;
        this.updateTotals();
        this.saveTotals();
      });
    }
  }

  updateTotals() {
    const labelPrefix = `${this.name}Total`;
    const inputPrefix = `${this.name}Input`;
    let total = 0;
    for (let key in this.dict) {
      const value = this.dict[key];
      const combinedValue = key * value;
      total += combinedValue;
      const input = document.querySelector(`.${inputPrefix}[data-amt='${key}']`);
      input.value = value ? value : "";
      const totalLabel = document.getElementById(`${labelPrefix}${key}`);
      totalLabel.innerHTML = this.labelFormatCb(combinedValue);
    }
    total = this.labelFormatCb(total);
    document.getElementById(labelPrefix).innerHTML = total;
  }
}

class MultiResourceCalculator {
  constructor({
    tabs,
    autoAddEvents = true,
    altFirstLabel = false,
    formatLabelAs,
    formatValueAs,
  } = {}) {
    this.tabs = tabs;
    this.altFirstLabel = altFirstLabel;
    this.formatLabelAs = formatLabelAs;
    this.formatValueAs = formatValueAs;
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
        formatLabelAs: this.formatLabelAs,
        formatValueAs: this.formatValueAs,
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
    this.trackers.forEach((tracker) => {
      tracker.addEvents();
      tracker.updateTotals();
    });
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

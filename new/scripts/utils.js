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
    <div class="group-three">
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

    this.mainContent = `
      <div id="${n}Tab" class="rssTabContent ${this.isMain ? "active" : ""}">
        <div class="tab-title">
          <h4>${`${Formatting.capitalise(n)}`}</h4>
        </div>
        <div class="rssForm">
          ${rows}
          <div class="group-three total">
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

class OfficerCalculator {
  constructor({ name, isMain }) {
    this.name = name;
    this.isMain = isMain;
    this.constructHTML();
  }

  #constructNumberInput = (id, val) =>
    `<input id="${id}" class="officerInput input" type="number" value="${val}" />`;

  #constructRadioButton = (id, checked) =>
    `<div>
      <input type="radio" class="officerRadio" id="${id}" ${
      checked ? "checked" : ""
    } /> ${Formatting.capitalise(id)}
    </div>
    `;

  constructHTML() {
    const n = this.name;

    this.header = `
      <li class="rssTab ${this.isMain ? "active" : ""}" data-target="${n}Tab">
        <img class="rssImg" src="images/${n}.png" alt="${n}" />
      </li>
      `;

    this.mainContent = `
      <div id="${n}Tab" class="rssTabContent ${this.isMain ? "active" : ""}">
        <div class="form-group row justify-content-center">
          <div class="card-title col"><h4>Level Officer</h4></div>
        </div>
        <div class="tweak tweak2">
          <p>Please enter the applicable officer levels:</p>
          <div class="form-group row">
            <label class="col-auto col-md-4 col-form-label" for="levelStart"
              >Current Level (1-59):</label
            >
            <div class="col-3 col-md-2">
              <input
                class="officerInput form-control aL"
                type="number"
                value="1"
                id="levelStart" />
            </div>
            <p class="col- col-md-auto col-form-label">and</p>
            <input
              class="col-4 col-md-3 officerInput form-control aL phew1"
              type="number"
              value="0"
              maxlength="7"
              id="currentProgress" />
            <p class="col-auto col-md-1 col-form-label phew2">XP</p>
          </div>
          <div class="form-group row">
            <label class="col-auto col-md-4 col-form-label" for="levelStop"
              >Desired Level (2-60):</label
            >
            <div class="col-3 col-md-2">
              <input
                class="officerInput form-control"
                type="number"
                value="60"
                id="levelStop" />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-auto col-md-5 col-form-label" for="officerIn3"
              >Officer Rarity:</label
            >
            <div class="col-7 col-lg-3 rarityOptions">
              <label class="radio-inline"
                ><input type="radio" id="blue" name="optradio" />Blue</label
              >
              <label class="radio-inline"
                ><input type="radio" id="purple" name="optradio" checked />Purple</label
              >
              <label class="radio-inline"
                ><input type="radio" id="gold" name="optradio" />Gold</label
              >
            </div>
          </div>
          <div class="form-group row totalDiv">
            <h6 class="col-5 col-form-label form-text">Your XP:</h6>
            <p class="col-7 total form-text" id="yourXP">0</p>
            <h6 class="col-5 col-form-label form-text">Total XP Req:</h6>
            <p class="col-7 total form-text officerTotal" id="reqXP">0</p>
            <h6 class="col-5 col-form-label form-text">XP needed:</h6>
            <p class="col-7 total form-text" id="resultXP">0</p>
          </div>
        </div>
      </div>
    `;

    this.mainContent = `
      <div id="${n}Tab" class="rssTabContent text-center ${this.isMain ? "active" : ""}">
        <div class="tab-title">
          <h4>Level Officer</h4>
        </div>
        <p>Please enter the applicable officer levels:</p>
        <div class="group-two">
          <div class="group-two">
            <label>Current (1-59):</label>
            ${this.#constructNumberInput("levelStart", 1)}
          </div>
          <div class="group-three">
            <label>and</label>
            ${this.#constructNumberInput("currentProgress", 0)}
            <label>XP</label>
          </div>
          <div class="group-two">
            <label for="levelStop">Desired (2-60):</label>
            ${this.#constructNumberInput("levelStop", 60)}
          </div>
          <div></div>
        </div>
        <div class="group-four">
         <label>Officer Rarity:</label>
         ${this.#constructRadioButton("blue", false)}
         ${this.#constructRadioButton("purple", true)}
         ${this.#constructRadioButton("gold", false)}
        </div>
        <div class="group-three">
          <div class="group-two">
            <p>Your XP:</p>
            <p id="yourXP">0</p>
          </div>
          <div class="group-two">
            <p>Total XP Req:</p>
            <p id="reqXP">0</p>
          </div>
          <div class="group-two">
            <p>XP needed:</p>
            <p id="resultXP">0</p>
          </div>
        </div>
      </div>
    `;
  }

  addEvents() {}

  updateTotals() {}
}

class MultiItemCalculator {
  constructor({
    tabs,
    autoAddEvents = true,
    altFirstLabel = false,
    formatLabelAs,
    formatValueAs,
    nextPageInfo,
  } = {}) {
    this.tabs = tabs;
    this.altFirstLabel = altFirstLabel;
    this.formatLabelAs = formatLabelAs;
    this.formatValueAs = formatValueAs;
    this.nextPageInfo = nextPageInfo;
    this.constructHTML();
    if (autoAddEvents) this.addEvents();
  }

  #getCalculator(key) {
    const tab = this.tabs[key];
    switch (tab.type) {
      case "officer":
        return new OfficerCalculator({ name: key, isMain: tab.isMain });
      default:
        return new ResourceCalculator({
          name: key,
          dict: tab.totals,
          isMain: tab.isMain,
          altFirstLabel: this.altFirstLabel,
          formatLabelAs: this.formatLabelAs,
          formatValueAs: this.formatValueAs,
        });
    }
  }

  constructHTML() {
    const calculators = [],
      headers = [],
      mainContents = [];

    Object.keys(this.tabs).forEach((key) => {
      const calc = this.#getCalculator(key);
      calculators.push(calc);
      headers.push(calc.header);
      mainContents.push(calc.mainContent);
    });

    const headerContent = `
      <ul id="tabs">
        ${headers.join("")}
      </ul>
    `;

    const mainContent = `
      ${mainContents.join("")}
      ${
        this.nextPageInfo
          ? `<a id="nextLink" href="${this.nextPageInfo.url}.html">Next: ${this.nextPageInfo.title}</a>`
          : ""
      }
    `;

    this.calculators = calculators;
    document.getElementById("header").innerHTML = headerContent;
    document.getElementById("content").innerHTML = mainContent;
  }

  addEvents() {
    this.calculators.forEach((calc) => {
      calc.addEvents();
      calc.updateTotals();
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

class SummaryTable {
  constructor({ title, rows, large } = {}) {
    this.title = title;
    this.rows = rows;
    this.large = large;
    this.constructHTML();
  }

  constructRow(name) {
    return `
      <tr class="summary-row ${this.large ? "sr-lg" : ""}">
        <td class="dark-cell" scope="row">${Formatting.capitalise(name)}</td>
        <td class="lite-cell"></td>
      </tr>
    `;
  }

  constructHTML() {
    this.table = `
      <div>
        ${this.title ? `<h2 class="text-center">${this.title}</h2>` : ""}
        <table class="summary-table">
            ${this.rows.map((v) => this.constructRow(v)).join("")}
        </table>
      </div>
    `;
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

    const format = (v, single, multi, empty) =>
      v > 0 ? `${v} ${v === 1 ? single : multi}` : empty;

    const days = format(d, "day", "days", ""),
      hours = format(h, "hour", "hours", ""),
      mins = format(m, "min", "mins", ""),
      secs = format(s, "sec", "secs", "");

    return `${days} ${hours} ${mins} ${secs}`;
  };

  static capitalise = (t) => (t ? `${t[0].toUpperCase()}${t.substring(1)}` : "");
}

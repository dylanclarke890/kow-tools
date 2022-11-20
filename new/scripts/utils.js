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
  constructor({ name, isMain, levels }) {
    this.name = name;
    this.isMain = isMain;
    this.levels = levels;
    this.selected = "purple";
    this.constructHTML();
  }

  #constructNumberInput = (id, val) =>
    `<input id="${id}" class="officerInput input" type="number" value="${val}" />`;

  #constructRadioButton = (id, checked) =>
    `<div>
      <input type="radio" class="rarityOptions" id="${id}" ${
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
         ${["blue", "purple", "gold"]
           .map((v) => this.#constructRadioButton(v, v === this.selected))
           .join("")}
        </div>
        <div class="group-two">
          <div class="group-two">
            <p>Total XP Req:</p>
            <p id="reqXP"></p>
          </div>
          <p id="result"></p>
        </div>
      </div>
    `;
  }

  addEvents() {
    const me = this;
    const radios = document.getElementsByClassName("rarityOptions");
    for (let radio of radios) {
      radio.addEventListener("change", () => {
        if (radio.checked) {
          me.selected = radio.id;
          for (let r of radios) {
            if (r !== radio) r.checked = false;
          }
        }
        me.updateTotals();
      });
    }

    for (let input of ["levelStart", "levelStop", "currentProgress"])
      document.getElementById(input).addEventListener("keyup", () => {
        me.updateTotals();
      });
  }

  updateTotals() {
    const startEl = document.getElementById("levelStart"),
      stopEl = document.getElementById("levelStop"),
      currentProgressEl = document.getElementById("currentProgress");

    let start = startEl.value,
      stop = stopEl.value,
      currentProgress = currentProgressEl.value;

    if (currentProgress >= 8220000) {
      currentProgress = 8219999;
      currentProgressEl.value = currentProgress;
    }

    if (start <= 0) {
      start = 0;
      startEl.value = start;
    } else if (start >= 60) {
      start = 59;
      startEl.value = start;
    }

    if (stop <= 1) {
      stop = 2;
      stopEl.value = stop;
    } else if (stop >= 61) {
      stop = 60;
      stopEl.value = 60;
    }

    if (stop <= start) {
      start = stop - 1;
      startEl.value = start;
    }

    const selectedRarity = this.levels[this.selected];
    let total = 0;
    for (let i = start; i < stop; i++) total += selectedRarity[i];
    document.getElementById("reqXP").innerHTML = Formatting.thousandSeparators(total);

    let result;
    if (currentProgress === total) result = "You have exactly enough XP for this";
    else if (currentProgress > total)
      result = `${Formatting.thousandSeparators(currentProgress - total)} XP leftover`;
    else result = `${Formatting.thousandSeparators(total - currentProgress)} XP still required`;
    document.getElementById("result").innerHTML = result;
  }
}

class TroopCalculator {
  constructor({ name, isMain, costs, minBatchSizes }) {
    this.name = name;
    this.isMain = isMain;
    this.costs = costs;
    this.minBatchSizes = minBatchSizes;
    this.timeDict = {
      1: 0,
      60: 0,
      3600: 0,
      86400: 0,
    };
    this.rssDict = {
      food: 0,
      steel: 0,
      oil: 0,
      energy: 0,
    };
    this.constructHTML();
  }

  static batchSizes = [
    20, 50, 100, 150, 200, 250, 300, 350, 400, 450, 500, 550, 600, 700, 800, 900, 1000, 1100, 1200,
    1300, 1400, 1500, 1600, 1700, 2000,
  ];

  #buildBatchOptions(selectedTroopLevel) {
    const batchSelect = document.getElementById(`${this.name}BatchSize`);
    const options = TroopCalculator.batchSizes
      .slice(TroopCalculator.batchSizes.lastIndexOf(this.minBatchSizes[selectedTroopLevel]))
      .map((v, i) => `<option value="${v}" ${i === 0 ? "selected" : ""}>${v}</option>`);
    batchSelect.innerHTML = options;
  }

  #updateTroopCosts(selectedTroopLevel) {
    const minSize = TroopCalculator.batchSizes.lastIndexOf(this.minBatchSizes[selectedTroopLevel]);
    const costs = this.costs[selectedTroopLevel];
    Object.keys(this.rssDict).forEach((key) => {
      this.rssDict[key] = costs[key] * TroopCalculator.batchSizes[minSize];
      document.querySelector(`.${this.name}RssCost[data-rss="${key}"]`).value = this.rssDict[key];
    });
  }

  #constructRssInput(key) {
    return `
      <label>${Formatting.capitalise(key)}:</label>
      <input class="input ${this.name}RssCost" type="number" data-rss="${key}" />
    `;
  }

  #constructTimeInput(label, val) {
    return `
      <label>${label}:</label>
      <input class="input ${this.name}TimeCost" type="number" data-secs="${val}" />
    `;
  }

  constructHTML() {
    const n = this.name;

    this.header = `
      <li class="rssTab ${this.isMain ? "active" : ""}" data-target="${n}Tab">
        <img class="rssImg" src="images/${n}.png" alt="${n}" />
      </li>
      `;

    this.mainContent = `
      <div id="${n}Tab" class="rssTabContent ${this.isMain ? "active" : ""}">
        <div class="tab-title">
          <h4>${`${Formatting.capitalise(n)}`}</h4>
        </div>
        <div class="rssForm">
          <div class="group-two">
            <div class="group-two">
              <label>Troop Level:</label>
              <select class="select" id="${n}TroopLevel">
                <option value="T1" selected>T1</option>
                <option value="T2">T2</option>
                <option value="T3">T3</option>
                <option value="T4">T4</option>
                <option value="T5">T5</option>
              </select>
            </div>
            <div class="group-two">
              <label>Batch Size:</label>
              <select class="select" id="${n}BatchSize"></select>
            </div>
          </div>
          <h3>Production Cost</h3>
          <div class="group-four">
            ${Object.keys(this.rssDict)
              .map((v) => this.#constructRssInput(v))
              .join("")}
          </div>
          <h3>Production Time</h3>
          <div class="group-four">
            ${[
              ["Days", 86400],
              ["Hours", 3600],
              ["Mins", 60],
              ["Secs", 1],
            ]
              .map((v) => this.#constructTimeInput(v[0], v[1]))
              .join("")}
          </div>
          <div class="group-four">
            <label>How many do you want?</label>
            <input class="input" id="${n}TroopsRequired" type="number" />
            <label>Already made (Optional): </label>
            <input class="input" id="${n}CurrentTroopCount" type="number" />
          </div>
          <div class="group-three">
            <div>
              <p>Total Cost: </p>
              <p id=${n}TotalCost>0</p>
            </div>
            <div>
              <p>Total Time: </p>
              <p id=${n}TotalTime>0</p>
            </div>
            <div>
              <p>No. of Batches: </p>
              <p id=${n}TotalBatches>0</p>
            </div>
          </div>
        </div>
      </div>
    `;
  }

  addEvents() {
    const me = this;
    const troopSelect = document.getElementById(`${this.name}TroopLevel`);
    const batchSelect = document.getElementById(`${this.name}BatchSize`);
    troopSelect.addEventListener("change", () => {
      const selectedTroopLevel = troopSelect.options[troopSelect.selectedIndex].value;
      me.#buildBatchOptions(selectedTroopLevel);
      me.#updateTroopCosts(selectedTroopLevel);
      me.updateTotals();
    });

    batchSelect.addEventListener("change", () => {
      const selectedTroopLevel = troopSelect.options[troopSelect.selectedIndex].value;
      me.#updateTroopCosts(selectedTroopLevel);
      me.updateTotals();
    });

    const timeCostInputs = document.getElementsByClassName(`${this.name}TimeCost`);
    for (let input of timeCostInputs) {
      input.addEventListener("keyup", () => {
        me.timeDict[parseInt(input.getAttribute("data-secs"))] = parseInt(input.value);
        me.updateTotals();
      });
    }

    const rssCostInputs = document.getElementsByClassName(`${this.name}RssCost`);
    for (let input of rssCostInputs) {
      input.addEventListener("keyup", () => {
        this.rssDict[input.getAttribute("data-rss")] = parseInt(input.value);
        me.updateTotals();
      });
    }

    const troopsRequired = document.getElementById(`${this.name}TroopsRequired`);
    const alreadyMade = document.getElementById(`${this.name}CurrentTroopCount`);
    troopsRequired.addEventListener("keyup", () => {
      me.updateTotals();
    });
    alreadyMade.addEventListener("keyup", () => {
      me.updateTotals();
    });

    const selected = troopSelect.options[troopSelect.selectedIndex].value;
    this.#buildBatchOptions(selected);
    this.#updateTroopCosts(selected);
  }

  updateTotals() {
    let totalTimeForBatch = 0;
    Object.keys(this.timeDict).forEach((key) => {
      totalTimeForBatch += this.timeDict[key] * key;
    });

    const troopsRequired = document.getElementById(`${this.name}TroopsRequired`);
    const alreadyMade = document.getElementById(`${this.name}CurrentTroopCount`);
    const batchSelect = document.getElementById(`${this.name}BatchSize`);

    let troopsRequiredVal = parseInt(troopsRequired.value);
    if (isNaN(troopsRequiredVal)) troopsRequiredVal = 0;
    let alreadyMadeVal = parseInt(alreadyMade.value);
    if (isNaN(alreadyMadeVal)) alreadyMadeVal = 0;
    let batchSize = parseInt(batchSelect.options[batchSelect.selectedIndex].value);
    if (isNaN(batchSize)) batchSize = 0;

    const totalTroopsReq = troopsRequiredVal - alreadyMadeVal;
    const batches = Math.ceil(totalTroopsReq / batchSize);

    const rssTotal = [];
    Object.keys(this.rssDict).forEach((key) => {
      const val = this.rssDict[key];
      if (!val) return;
      const totalCost = (val / batchSize) * totalTroopsReq;
      if (totalCost > 0)
        rssTotal.push(`${Formatting.capitalise(key)}: ${Formatting.thousandSeparators(totalCost)}`);
    });

    const totalTime = (totalTimeForBatch / batchSize) * totalTroopsReq;

    document.getElementById(`${this.name}TotalCost`).innerHTML = rssTotal.length
      ? rssTotal.join(", ")
      : 0;
    document.getElementById(`${this.name}TotalBatches`).innerHTML = batches
      ? Formatting.thousandSeparators(batches)
      : 0;
    document.getElementById(`${this.name}TotalTime`).innerHTML = totalTime
      ? Formatting.secondsToDhms(totalTime)
      : 0;
  }
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
        return new OfficerCalculator({ name: key, isMain: tab.isMain, levels: tab.levels });
      case "troop":
        return new TroopCalculator({
          name: key,
          isMain: tab.isMain,
          costs: tab.costs,
          minBatchSizes: tab.minBatchSizes,
        });
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

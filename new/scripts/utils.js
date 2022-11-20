class BaseCalculator {
  static storage = sessionStorage;

  static formattingOptions = {
    number: (n) => Formatting.thousandSeparators(n),
    time: (n) => Formatting.secondsToDhms(n),
    none: (n) => n,
  };

  constructor({ name, isMain }) {
    this.name = name;
    this.isMain = isMain;
    this.#buildHeader();
  }

  #buildHeader = () => {
    const n = this.name;
    this.header = `
      <li class="rssTab ${this.isMain ? "active" : ""}" data-target="${n}Tab">
        <img class="rssImg" src="images/${n}.png" alt="${n}" />
      </li>
      `;
  };

  buildNumberInput = (id, val, extraClasses, attributes = "") => {
    const classes = `${this.name}Input input ${extraClasses}`;
    return `<input id="${id}" class="${classes}" type="number" value="${val}" ${attributes} />`;
  };

  load = (storageKey) => {
    const saved = BaseCalculator.storage.getItem(storageKey);
    return saved ? JSON.parse(saved) : null;
  };

  save = (key, obj) => {
    BaseCalculator.storage.setItem(key, JSON.stringify(obj));
  };
}

class ResourceCalculator extends BaseCalculator {
  constructor({
    name,
    dict,
    isMain = false,
    altFirstLabel = false,
    formatLabelAs,
    formatValueAs,
  } = {}) {
    super({ name, isMain });
    this.storageKey = `${this.name}Totals`;
    this.dict = this.load(this.storageKey) ?? dict;
    this.altFirstLabel = altFirstLabel ?? false;
    const noOp = ResourceCalculator.formattingOptions.none;
    this.labelFormatCb = ResourceCalculator.formattingOptions[formatLabelAs] ?? noOp;
    this.valueFormatCb = ResourceCalculator.formattingOptions[formatValueAs] ?? noOp;
    this.#buildHTML();
  }

  #buildRow = (key, label, val) => `
    <div class="group-three">
      <label for="${this.name}In">${label}</label>
      <div>
        ${this.buildNumberInput("", "", "rssInput", `data-amt="${key}"`)}
      </div>
      <label id="${this.name}Total${key}">${val ?? 0}</label>
    </div>
    `;

  #buildHTML = () => {
    const n = this.name;
    const rows = Object.keys(this.dict)
      .map((key) => {
        const label = this.altFirstLabel && key == 1 ? "Open" : this.labelFormatCb(key);
        return this.#buildRow(key, label, this.dict[key]);
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
  };

  addEvents = () => {
    const rssInputs = document.getElementsByClassName(`${this.name}Input`);
    for (let input of rssInputs) {
      input.addEventListener("keyup", () => {
        const key = parseInt(input.getAttribute("data-amt"));
        const val = parseInt(input.value);
        this.dict[key] = isNaN(val) ? 0 : val;
        this.updateTotals();
        this.save(this.storageKey, this.dict);
      });
    }
  };

  updateTotals = () => {
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
  };
}

class OfficerCalculator extends BaseCalculator {
  constructor({ name, isMain, levels }) {
    super({ name, isMain });
    this.levels = levels;
    this.storageKey = "officerState";
    this.loaded = this.load(this.storageKey);
    this.selected = (this.loaded && this.loaded.selected) ?? "purple";
    this.#buildHTML();
  }

  #buildRadioButton = (id, checked) =>
    `<div>
      <input type="radio" class="rarityOptions" id="${id}" ${
      checked ? "checked" : ""
    } /> ${Formatting.capitalise(id)}
    </div>
    `;

  #buildHTML = () => {
    const n = this.name;
    const s = this.loaded;
    this.mainContent = `
      <div id="${n}Tab" class="rssTabContent text-center ${this.isMain ? "active" : ""}">
        <div class="tab-title">
          <h4>Level Officer</h4>
        </div>
        <p>Please enter the applicable officer levels:</p>
        <div class="group-two">
          <div class="group-two">
            <label>Current (1-59):</label>
            ${this.buildNumberInput("levelStart", (s && s.start) ?? 1)}
          </div>
          <div class="group-three">
            <label>and</label>
            ${this.buildNumberInput("currentProgress", (s && s.currentProgress) ?? 0)}
            <label>XP</label>
          </div>
          <div class="group-two">
            <label for="levelStop">Desired (2-60):</label>
            ${this.buildNumberInput("levelStop", (s && s.stop) ?? 60)}
          </div>
          <div></div>
        </div>
        <div class="group-four">
         <label>Officer Rarity:</label>
         ${["blue", "purple", "gold"]
           .map((v) => this.#buildRadioButton(v, v === this.selected))
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
  };

  addEvents = () => {
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
  };

  updateTotals = () => {
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

    if (start <= 0) start = 0;
    else if (start >= 60) start = 59;

    if (stop <= 1) stop = 2;
    else if (stop >= 61) stop = 60;

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

    this.save("officerState", { selected: this.selected, start, stop, currentProgress });
  };
}

class TroopCalculator extends BaseCalculator {
  static batchSizes = [
    20, 50, 100, 150, 200, 250, 300, 350, 400, 450, 500, 550, 600, 700, 800, 900, 1000, 1100, 1200,
    1300, 1400, 1500, 1600, 1700, 2000,
  ];

  constructor({ name, isMain, costs, minBatchSizes }) {
    super({ name, isMain });
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
    this.storageKey = `${this.name}TroopState`;
    this.loaded = this.load(this.storageKey);
    if (this.loaded) {
      const { time, rss, batchSize } = this.loaded;
      this.timeDict = time;
      this.rssDict = rss;
      this.initialBatchSize = batchSize;
    }
    this.#buildHTML();
  }

  #buildBatchOptions = (selectedTroopLevel) => {
    const batchSelect = document.getElementById(`${this.name}BatchSize`);
    const options = TroopCalculator.batchSizes
      .slice(TroopCalculator.batchSizes.lastIndexOf(this.minBatchSizes[selectedTroopLevel]))
      .map(
        (v, i) =>
          `<option value="${v}" ${
            this.initialBatchSize === v ?? i === 0 ? "selected" : ""
          }>${v}</option>`
      );
    this.initialBatchSize = null;

    batchSelect.innerHTML = options;
  };

  #constructRssInput = (key, value) => {
    console.log(key, value);
    return `
      <label>${Formatting.capitalise(key)}:</label>
      <input class="input ${this.name}RssCost" type="number" data-rss="${key}" value="${value}" />
    `;
  };

  #constructTimeInput = (label, secs, val) => {
    return `
      <label>${label}:</label>
      <input class="input ${this.name}TimeCost" type="number" value=${val} data-secs="${secs}" />
    `;
  };

  #updateTroopCosts = (selectedTroopLevel) => {
    if (this.loaded && this.loaded.rss) {
      this.rssDict = this.loaded.rss;
      this.loaded.rss = null;
      return;
    }
    const minSize = TroopCalculator.batchSizes.lastIndexOf(this.minBatchSizes[selectedTroopLevel]);
    const costs = this.costs[selectedTroopLevel];
    Object.keys(this.rssDict).forEach((key) => {
      this.rssDict[key] = costs[key] * TroopCalculator.batchSizes[minSize];
      document.querySelector(`.${this.name}RssCost[data-rss="${key}"]`).value = this.rssDict[key];
    });
  };

  #buildHTML = () => {
    const n = this.name;
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
              ${["T1", "T2", "T3", "T4", "T5"].map(
                (v) => `
                <option value=${v} ${v === this.initialSelected ? "selected" : ""}>
                  ${v}
                </option>`
              )}
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
              .map((v) => this.#constructRssInput(v, this.rssDict[v]))
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
              .map((v) => this.#constructTimeInput(v[0], v[1], this.timeDict[v[1]]))
              .join("")}
          </div>
          <div class="group-four">
            <label>How many do you want?</label>
            <input class="input" id="${n}TroopsRequired" type="number" value=${
      this.loaded && this.loaded.troopsRequired
    } />
            <label>Already made (Optional): </label>
            <input class="input" id="${n}CurrentTroopCount" type="number"  value=${
      this.loaded && this.loaded.alreadyMade
    } />
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
  };

  addEvents = () => {
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
  };

  updateTotals = () => {
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
      const totalCost = Math.floor((val / batchSize) * totalTroopsReq);
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

    const troopSelect = document.getElementById(`${this.name}TroopLevel`);
    const selectedTroopLevel = troopSelect.options[troopSelect.selectedIndex].value;
    const saveItem = {
      troopLevel: selectedTroopLevel,
      troopsRequired: troopsRequiredVal,
      alreadyMade: alreadyMadeVal,
      batchSize,
      rss: this.rssDict,
      time: this.timeDict,
    };
    this.save(this.storageKey, saveItem);
  };
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

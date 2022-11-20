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
  constructor({ name, isMain, costs, batchSizes }) {
    this.name = name;
    this.isMain = isMain;
    this.costs = costs;
    this.batchSizes = batchSizes;
    this.constructHTML();
  }

  constructHTML() {
    const n = this.name;

    this.header = `
      <li class="rssTab ${this.isMain ? "active" : ""}" data-target="${n}Tab">
        <img class="rssImg" src="images/${n}.png" alt="${n}" />
      </li>
      `;

    this.mainContent = `
      <div id="tankTab" class="tab-pane fade in active show">
        <div id="tankForm" class="container-fluid">
          <div class="form-group row justify-content-center">
            <div class="card-title col"><h4>Tanks</h4></div>
          </div>
          <div class="tweak">
            <div class="form-group row">
              <label class="col-auto col-md-2 col-form-label up2 aL" for="tankTroopLevel"
                >Troop Level:
              </label>
              <select class="col-auto col-md-1 rounded" id="tankTroopLevel">
                <option value="T1">T1</option>
                <option value="T2">T2</option>
                <option value="T3">T3</option>
                <option value="T4" selected>T4</option>
                <option value="T5">T5</option>
              </select>

              <label class="col-auto col-md-2 col-form-label up2" for="tankProdCap"
                >Production Capacity:
              </label>
              <select class="col-auto col-md-1 rounded" id="tankProdCap">
                <option value="800" selected>800</option>
                <option value="900">900</option>
                <option value="1000">1000</option>
                <option value="1100">1100</option>
                <option value="1200">1200</option>
                <option value="1300">1300</option>
                <option value="1400">1400</option>
                <option value="1500">1500</option>
                <option value="1600">1600</option>
                <option value="1700">1700</option>
                <option value="2000">2000</option>
              </select>
            </div>

            <div class="form-group row move">
              <label class="col- col-md-2 col-form-label alignLeft aL" for="tankProdTimeDays"
                >Production Time:
              </label>

              <input
                class="tankProdTime col-2 col-md-1 rounded"
                id="tankProdTimeDays"
                type="number"
                value="0"
                data-secs="86400"
                onclick="if(this.value==0){this.value='';}"
                onfocusout="if(this.value==''){this.value=0;}" />
              <label class="col-4 col-md-1 col-form-label prodShift">Days</label>
              <input
                class="tankProdTime col-2 col-md-1 rounded"
                id="tankProdTimeHours"
                type="number"
                value="0"
                data-secs="3600"
                onclick="if(this.value==0){this.value='';}"
                onfocusout="if(this.value==''){this.value=0;}" />
              <label class="col-4 col-md-1 col-form-label prodShift">Hours</label>
              <input
                class="tankProdTime col-2 col-md-1 rounded"
                id="tankProdTimeMins"
                type="number"
                value="0"
                data-secs="60"
                onclick="if(this.value==0){this.value='';}"
                onfocusout="if(this.value==''){this.value=0;}" />
              <label class="col-4 col-md-1 col-form-label prodShift2">Minutes</label>
              <input
                class="tankProdTime col-2 col-md-1 rounded"
                id="tankProdTimeSecs"
                type="number"
                value="0"
                data-secs="1"
                onclick="if(this.value==0){this.value='';}"
                onfocusout="if(this.value==''){this.value=0;}" />
              <label class="col-4 col-md-1 col-form-label prodShift2">Seconds</label>
            </div>

            <div class="form-group row reAl">
              <label class="col-8 col-md-2 col-form-label left aL" for="tankTroopsRequired"
                >How many do you want?</label
              >
              <input
                class="col-4 col-md-1 rounded move2"
                id="tankTroopsRequired"
                type="number"
                value="0"
                onclick="if(this.value==0){this.value='';}"
                onfocusout="if(this.value==''){this.value=0;}" />
              <label class="col-8 col-md-2 col-form-label left" for="tankCurrentTroopCount"
                >Already made (Optional)</label
              >
              <input
                class="col-4 col-md-1 rounded move2"
                id="tankCurrentTroopCount"
                type="number"
                value="0"
                onclick="if(this.value==0){this.value='';}"
                onfocusout="if(this.value==''){this.value=0;}" />
            </div>

            <div class="form-group row totalDiv rssShift">
              <p class="col-auto col-md-2 form-text aL">Total Cost:</p>
              <p class="col-auto form-text rssTotals" id="tankTotalRssCost">
                Food: 0 Steel: 0 Oil: 0 Energy: 0
              </p>
            </div>
            <div class="form-group row totalDiv timeShift">
              <p class="form-text col-auto">Total Time:</p>
              <p class="form-text" id="tankTotalTimeCost">0 D : 0 H : 0 M : 0 s</p>
              <p class="form-text col-auto oneMore">No. of Batches:</p>
              <p class="form-text tankTotal oneMore" id="tankTotalBatches">0</p>
            </div>

            <div class="form-group row test">
              <p class="col-auto col-md-1 col-form-label" id="tankRssCostFood">240000</p>
              <p class="col-auto col-md-1 col-form-label" id="tankRssCostSteel">240000</p>
              <p class="col-1 col-md-1 col-form-label" id="tankRssCostOil">0</p>
              <p class="col-auto col-md-1 col-form-label up" id="tankRssCostEnergy">16000</p>
            </div>
          </div>
        </div>
      </div>
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
                <option value="T1">T1</option>
                <option value="T2">T2</option>
                <option value="T3">T3</option>
                <option value="T4">T4</option>
                <option value="T5">T5</option>
              </select>
            </div>
            <div class="group-two">
              <label>Batch Size:</label>
              <select class="select" id="${n}BatchSize">
                <option value="800" selected>800</option>
                <option value="900">900</option>
                <option value="1000">1000</option>
                <option value="1100">1100</option>
                <option value="1200">1200</option>
                <option value="1300">1300</option>
                <option value="1400">1400</option>
                <option value="1500">1500</option>
                <option value="1600">1600</option>
                <option value="1700">1700</option>
                <option value="2000">2000</option>
              </select>
            </div>
          </div>
          <div class="group-four">
            <label>Troop Level:</label>
            <select class="select" id="${n}TroopLevel">
              <option value="T1">T1</option>
              <option value="T2">T2</option>
              <option value="T3">T3</option>
              <option value="T4">T4</option>
              <option value="T5">T5</option>
            </select>
            <label>Batch Size:</label>
            <select class="select" id="${n}BatchSize">
              <option value="800" selected>800</option>
              <option value="900">900</option>
              <option value="1000">1000</option>
              <option value="1100">1100</option>
              <option value="1200">1200</option>
              <option value="1300">1300</option>
              <option value="1400">1400</option>
              <option value="1500">1500</option>
              <option value="1600">1600</option>
              <option value="1700">1700</option>
              <option value="2000">2000</option>
            </select>
          </div>
          <h3>Production Time</h3>
          <div class="group-four">
            <label>Days:</label>
            <input class="input" id="${n}ProdTimeDays" type="number" data-secs="86400" />
            <label>Hours:</label>
            <input class="input" id="${n}ProdTimeHours" type="number" data-secs="3600" />
            <label>Mins:</label>
            <input class="input" id="${n}ProdTimeMins" type="number" data-secs="60" />
            <label>Secs:</label>
            <input class="input" id="${n}ProdTimeSecs" type="number" data-secs="1" />
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
        return new OfficerCalculator({ name: key, isMain: tab.isMain, levels: tab.levels });
      case "troop":
        return new TroopCalculator({
          name: key,
          isMain: tab.isMain,
          costs: tab.costs,
          batchSizes: tab.batchSizes,
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

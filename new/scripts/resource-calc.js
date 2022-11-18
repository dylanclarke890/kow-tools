class ResourceTracker {
  constructor(name, dict, isMain) {
    this.name = name;
    this.dict = dict;
    this.isMain = isMain ?? false;
    this.constructHTML();
  }

  #oldrowTemplate = (val, label) => `
      <div class="form-group row">
        <label class="col-4 col-form-label" for="${this.name}In">${label}</label>
        <div class="col-4 col-lg-3">
          <input class="${this.name}Input form-control" type="number"
            data-amt="${val}" id="${this.name}In" />
        </div>
        <label id="${this.name}Total${val}" class="col-4 col-lg-5 col-form-label">0</label>
      </div>
      `;

  #rowTemplate = (val, label) => `
    <div class="input-group-three">
      <label for="${this.name}In">${label}</label>
      <div>
        <input class="rssInput input" type="number" data-amt="${val}" />
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

    this.tabContent = `
      <div id="${n}Tab" class="rssTabContent ${this.isMain ? "active" : ""}">
        <div class="tab-title">
          <h4>${`${n[0].toUpperCase()}${n.substring(1)}`}</h4>
        </div>
        <div class="rssForm">
          ${Object.keys(this.dict)
            .map((val) => this.#rowTemplate(val, val == 1 ? "Open" : formatNumber(val)))
            .join("")}
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
    const elements = document.getElementsByClassName(`${this.name}Input`);
    for (let el of elements) {
      el.addEventListener("keyup", () => {
        const key = parseInt(el.getAttribute("data-amt"));
        const val = parseInt(el.value);
        this.dict[key] = val;
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

const tabs = {
  food: {
    totals: {
      1: 0,
      1000: 0,
      10000: 0,
      50000: 0,
      150000: 0,
      500000: 0,
      1500000: 0,
      50000000: 0,
    },
    isMain: true,
  },
  steel: {
    totals: {
      1: 0,
      1000: 0,
      10000: 0,
      50000: 0,
      150000: 0,
      500000: 0,
      1500000: 0,
      50000000: 0,
    },
    isMain: false,
  },
  oil: {
    totals: {
      1: 0,
      750: 0,
      7500: 0,
      37500: 0,
      112500: 0,
      375000: 0,
      1125000: 0,
      37500000: 0,
    },
    isMain: false,
  },
  energy: {
    totals: {
      1: 0,
      500: 0,
      3000: 0,
      15000: 0,
      50000: 0,
      200000: 0,
      600000: 0,
      20000000: 0,
    },
    isMain: false,
  },
};

const trackers = [];
const headers = [];
const mainContents = [];

Object.keys(tabs).forEach((key) => {
  const tab = tabs[key];
  const tracker = new ResourceTracker(key, tab.totals, tab.isMain);
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
  <button type="submit" class="signpost" id="nextLink">
    <span class="carousel-control-next-icon"></span>Save and continue: Speedup
    Calculator<span class="carousel-control-next-icon"></span>
  </button>
  `;

document.getElementById("content").innerHTML = mainContent;
document.getElementById("header").innerHTML = headerContent;
trackers.forEach((tracker) => tracker.addEvents());

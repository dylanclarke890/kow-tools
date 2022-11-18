class ResourceTracker {
  constructor(name, dict, isMain, altFirstLabel) {
    this.name = name;
    this.dict = dict;
    this.isMain = isMain ?? false;
    this.altFirstLabel = altFirstLabel ?? false;
    this.constructHTML();
  }

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

    this.tabContent = `
      <div id="${n}Tab" class="rssTabContent ${this.isMain ? "active" : ""}">
        <div class="tab-title">
          <h4>${`${n[0].toUpperCase()}${n.substring(1)}`}</h4>
        </div>
        <div class="rssForm">
          ${Object.keys(this.dict)
            .map((val) =>
              this.#rowTemplate(val, this.altFirstLabel && val == 1 ? "Open" : formatNumber(val))
            )
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

const pages = [
  { title: "Resource Calculator", url: "resource-calculator" },
  { title: "Speedup Calculator", url: "speedup-calculator" },
  { title: "Troop Calculator", url: "troop-calculator" },
  { title: "Summary", url: "summary" },
  { title: "AP/XP/Officer Calculator", url: "officer-calculator" },
];

const navTab = (pageInfo, active) => `
  <div>
    <a ${active ? "class='active' href='#'" : `href="${pageInfo.url}.html"`}">${pageInfo.title}</a>
  </div>
  `;

const url = window.location.href;
const currentLocation = url.substring(url.lastIndexOf("/") + 1, url.lastIndexOf("."));

const navbar = `
<nav id="navbar">
  <a href="index.html">
    <img id="logo" src="images/logo1_50perc.png" alt="logo" />
  </a>
  ${pages.map((p) => navTab(p, p.url === currentLocation)).join("")}
</nav>
`;

const oldNavbar = `
  <nav id="banner" class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid" id="menu">
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" id="logo-container" href="index.html">
        <img id="logo" src="images/logo1_50perc.png" alt="logo" />
      </a>
      <div class="collapse navbar-collapse justify-content-center">
        <ul id="menuList" class="nav navbar-nav justify-content-center">
        ${pages.map((p) => navTab(p, p.url === currentLocation)).join("")}
        </ul>
      </div>
    </div>
  </nav>
  `;

document.getElementById("navbarTarget").innerHTML = navbar;

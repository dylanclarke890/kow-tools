function formatNumber(num) {
  return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

class ResourceTracker {
  constructor(name, dict) {
    this.name = name;
    this.dict = dict;
    this.buildTab();
    const elements = document.getElementsByClassName(`${name}Input`);
    for (let el of elements) {
      el.addEventListener("keyup", () => {
        const key = parseInt(el.getAttribute("data-amt"));
        const val = parseInt(el.value);
        dict[key] = val;
        this.updateTotals();
      });
    }
  }

  buildTab() {
    const n = this.name;
    const rowTemplate = (val, label) => `
      <div class="form-group row">
        <label class="col-4 col-form-label" for="${n}In">${label ?? formatNumber(val)}</label>
        <div class="col-4 col-lg-3">
          <input class="${n}Input form-control" type="number"
            data-amt="${val}" id="${n}In" />
        </div>
        <label id="${n}Total${val}" class="col-4 col-lg-5 col-form-label">0</label>
      </div>
    `;
    const rowsHtml = Object.keys(this.dict).map(val => rowTemplate(val, val == 1 ? "Open" : null)).join("");
    const template = `
      <div id="${n}Form" class="container-fluid">
        <div class="form-group row justify-content-center">
          <div class="card-title col">
            <h4>${`${n[0].toUpperCase()}${n.substring(1)}`}</h4>
          </div>
        </div>
        <div class="tweak">
          ${rowsHtml}
          <div class="totalDiv form-group row">
            <h4 class="col-4 form-text">Total:</h4>
            <p class="col-6 total form-text ${n}Total" id="${n}Total">0</p>
          </div>
        </div>
      </div>
  `;
    document.getElementById(`${n}Tab`).innerHTML = template;
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
}

const foodTracker = new ResourceTracker("food", {
  1: 0,
  1000: 0,
  10000: 0,
  50000: 0,
  150000: 0,
  500000: 0,
  1500000: 0,
  50000000: 0,
});
const steelTracker = new ResourceTracker("steel", {
  1: 0,
  1000: 0,
  10000: 0,
  50000: 0,
  150000: 0,
  500000: 0,
  1500000: 0,
  50000000: 0,
});
const oilTracker = new ResourceTracker("oil", {
  1: 0,
  750: 0,
  7500: 0,
  37500: 0,
  112500: 0,
  375000: 0,
  1125000: 0,
  37500000: 0,
});
const energyTracker = new ResourceTracker("energy", {
  1: 0,
  500: 0,
  3000: 0,
  15000: 0,
  50000: 0,
  200000: 0,
  600000: 0,
  20000000: 0,
});

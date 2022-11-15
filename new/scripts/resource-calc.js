function formatNumber(num) {
  return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

class ResourceTracker {
  constructor(name, dict) {
    this.name = name;
    this.dict = dict;
    const me = this;
    $(`.${name}Input`).keyup(function () {
      dict[$(this).attr("data-amt")] = $(this).val();
      me.updateTotals();
    });
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

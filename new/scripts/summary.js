class SummaryTable {
  constructor({ title, rows } = {}) {
    this.title = title;
    this.rows = rows;
    this.constructHTML();
  }

  constructRow(name) {
    return `
      <tr class="summary-row">
        <td class="med" scope="row">${Formatting.capitalise(name)}</td>
        <td class="lite"></td>
      </tr>
    `;
  }

  constructHTML() {
    this.table = `
      <h2 class="text-center">${this.title}</h2>
      <table class="summary-table">
          ${this.rows.map((v) => this.constructRow(v)).join("")}
      </table>
    `;
  }
}

const resourceTable = new SummaryTable({
  title: "RESOURCES",
  rows: ["food", "steel", "oil", "energy"],
});

const speedupsTable = new SummaryTable({
  title: "SPEEDUPS",
  rows: ["repair", "research", "training", "building", "general"],
});

document.getElementById("test1").innerHTML = resourceTable.table;
document.getElementById("test2").innerHTML = speedupsTable.table;

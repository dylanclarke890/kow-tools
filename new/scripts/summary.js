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
        <td class="med" scope="row">${Formatting.capitalise(name)}</td>
        <td class="lite"></td>
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

const resourceTable = new SummaryTable({
  title: "RESOURCES",
  rows: ["food", "steel", "oil", "energy"],
});

const speedupsTable = new SummaryTable({
  title: "SPEEDUPS",
  rows: ["repair", "research", "training", "building", "general"],
});

const troopTables = ["TANK", "ANTI TANK", "INFANTRY", "ARTILLERY"].map(
  (v) =>
    new SummaryTable({
      title: v,
      rows: ["Total Rss Cost", "Total Time", "Total Batches"],
      large: true,
    })
);

const pageContent = `
  <h1 class="text-center">Summary</h1>
  <div class="group-two">
    ${resourceTable.table}
    ${speedupsTable.table}
  </div>
  <h2 class="text-center">Troops</h2>
  <div class="group-four">
    ${troopTables.map((t) => t.table).join("")}
  </div>
`;

document.getElementById("pageContent").innerHTML = pageContent;

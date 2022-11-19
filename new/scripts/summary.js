class SummaryTable {
  constructor({ head, rows } = {}) {
    this.head = head;
    this.rows = rows;
    this.constructHTML();
  }

  constructHeadRow(val) {
    return `
    <tr class="row">
     <th class="col-12 dark" scope="col">${val}</th>
    </tr>`;
  }

  constructRow(name) {
    return `
      <tr class="row">
        <th class="col-3 col-md-2 med" scope="row">${Formatting.capitalise(name)}</th>
        <td class="col lite"></td>
      </tr>
    `;
  }

  constructHTML() {
    this.table = `
      <div class="container-fluid table-responsive half float">
        <table class="table text-center">
          <thead>
            ${this.head.map((v) => this.constructHeadRow(v)).join("")}
          </thead>
          <tbody>
            ${this.rows.map((v) => this.constructRow(v)).join("")}
          </tbody>
        </table>
      </div>
    `;
  }
}

const resourceTable = new SummaryTable({
  head: ["RESOURCES"],
  rows: ["food", "steel", "oil", "energy"],
});

const speedupsTable = new SummaryTable({
  head: ["SPEEDUPS"],
  rows: ["repair", "research", "training", "building", "general"],
});

document.getElementById("test1").innerHTML = resourceTable.table;
document.getElementById("test2").innerHTML = speedupsTable.table;

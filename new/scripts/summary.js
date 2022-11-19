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

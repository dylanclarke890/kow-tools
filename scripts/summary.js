const resourceRows = ["food", "steel", "oil", "energy"];
const resourceValues = resourceRows.map((v) => {
  const loaded = sessionStorage.getItem(`${v}Totals`);
  if (loaded) {
    const parsed = JSON.parse(loaded);
    let total = 0;
    Object.keys(parsed).forEach((v) => (total += parseInt(v) * parseInt(parsed[v])));
    return total;
  }
});

const resourceTable = new SummaryTable({
  title: "RESOURCES",
  rows: resourceRows,
  values: resourceValues,
  formatValAs: "number",
});

const speedupRows = ["repair", "research", "training", "building", "general"];
const speedupValues = speedupRows.map((v) => {
  sessionStorage.getItem(`${v}Totals`);
  const loaded = sessionStorage.getItem(`${v}Totals`);
  if (loaded) {
    const parsed = JSON.parse(loaded);
    let total = 0;
    Object.keys(parsed).forEach((v) => (total += parseInt(parsed[v])));
    return total;
  }
});

const speedupsTable = new SummaryTable({
  title: "SPEEDUPS",
  rows: speedupRows,
  values: speedupValues,
  formatValAs: "time",
});

const troopTables = [
  { title: "TANK", storageKey: "tank" },
  { title: "ANTI TANK", storageKey: "anti" },
  { title: "INFANTRY", storageKey: "inf" },
  { title: "ARTILLERY", storageKey: "art" },
].map((v) => {
  let values;
  const loaded = sessionStorage.getItem(`${v.storageKey}TroopTotals`);
  if (loaded) {
    const parsed = JSON.parse(loaded);
    const { totalRssCost, totalTimeCost, totalBatchesNeeded } = parsed;
    values = [totalRssCost, totalTimeCost, totalBatchesNeeded];
  }
  return new SummaryTable({
    title: v.title,
    rows: ["Total Rss Cost", "Total Time", "Total Batches"],
    values,
    large: true,
  });
});

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

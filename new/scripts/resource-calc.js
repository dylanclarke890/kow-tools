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

const trackers = [],
  headers = [],
  mainContents = [];

Object.keys(tabs).forEach((key) => {
  const tab = tabs[key];
  const tracker = new ResourceTracker(key, tab.totals, tab.isMain, true);
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
  <a id="nextLink" href="speedup-calculator.html">Next: Speedup Calculator</a>
  `;

document.getElementById("content").innerHTML = mainContent;
document.getElementById("header").innerHTML = headerContent;
trackers.forEach((tracker) => tracker.addEvents());
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

const tabs = {
  training: {
    totals: {
      60: 0,
      300: 0,
      600: 0,
      1800: 0,
      3600: 0,
      10800: 0,
      28800: 0,
      54000: 0,
      86400: 0,
    },
    isMain: true,
  },
  repair: {
    totals: {
      60: 0,
      300: 0,
      600: 0,
      1800: 0,
      3600: 0,
      10800: 0,
      28800: 0,
      54000: 0,
      86400: 0,
    },
    isMain: false,
  },
  research: {
    totals: {
      60: 0,
      300: 0,
      600: 0,
      1800: 0,
      3600: 0,
      10800: 0,
      28800: 0,
      54000: 0,
      86400: 0,
    },
    isMain: false,
  },
  building: {
    totals: {
      60: 0,
      300: 0,
      600: 0,
      1800: 0,
      3600: 0,
      10800: 0,
      28800: 0,
      54000: 0,
      86400: 0,
    },
    isMain: false,
  },
  general: {
    totals: {
      60: 0,
      300: 0,
      600: 0,
      1800: 0,
      3600: 0,
      10800: 0,
      28800: 0,
      54000: 0,
      86400: 0,
    },
    isMain: false,
  },
};

const rssCalcTracker = new MultiResourceCalculator({
  tabs,
  altFirstLabel: false,
  formatLabelAs: "time",
  formatValueAs: "time",
  nextPageInfo: pages[2],
});
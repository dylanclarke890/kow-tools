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

const rssCalcTracker = new MultiResourceCalculator({
  tabs,
  altFirstLabel: true,
  formatLabelAs: "number",
  formatValueAs: "number",
});
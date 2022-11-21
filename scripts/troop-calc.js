const minBatchSizes = {
  T1: TroopCalculator.batchSizes[0],
  T2: TroopCalculator.batchSizes[5],
  T3: TroopCalculator.batchSizes[10],
  T4: TroopCalculator.batchSizes[14],
  T5: TroopCalculator.batchSizes[22],
};

const tabs = {
  tank: {
    costs: {
      T1: { food: 50, steel: 50, oil: 0, energy: 0 },
      T2: { food: 100, steel: 100, oil: 0, energy: 0 },
      T3: { food: 150, steel: 150, oil: 0, energy: 10 },
      T4: { food: 300, steel: 300, oil: 0, energy: 20 },
      T5: { food: 600, steel: 600, oil: 0, energy: 40 },
    },
    minBatchSizes,
    isMain: true,
    type: "troop",
  },
  anti: {
    costs: {
      T1: { food: 60, steel: 40, oil: 0, energy: 0 },
      T2: { food: 100, steel: 0, oil: 75, energy: 0 },
      T3: { food: 150, steel: 0, oil: 112, energy: 10 },
      T4: { food: 300, steel: 0, oil: 225, energy: 20 },
      T5: { food: 600, steel: 0, oil: 450, energy: 40 },
    },
    minBatchSizes,
    isMain: false,
    type: "troop",
  },
  inf: {
    costs: {
      T1: { food: 40, steel: 60, oil: 0, energy: 0 },
      T2: { food: 0, steel: 100, oil: 75, energy: 0 },
      T3: { food: 0, steel: 150, oil: 112, energy: 10 },
      T4: { food: 0, steel: 300, oil: 225, energy: 20 },
      T5: { food: 0, steel: 400, oil: 450, energy: 40 },
    },
    minBatchSizes,
    isMain: false,
    type: "troop",
  },
  art: {
    costs: {
      T1: { food: 60, steel: 60, oil: 0, energy: 0 },
      T2: { food: 65, steel: 65, oil: 50, energy: 0 },
      T3: { food: 100, steel: 100, oil: 75, energy: 10 },
      T4: { food: 200, steel: 200, oil: 150, energy: 20 },
      T5: { food: 400, steel: 400, oil: 300, energy: 40 },
    },
    minBatchSizes,
    isMain: false,
    type: "troop",
  },
};

const multiItemCalc = new MultiItemCalculator({
  tabs,
  formatLabelAs: "number",
  formatValueAs: "number",
  nextPageInfo: pages[3],
});

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
      T1: { Food: 50, Steel: 50, Oil: 0, Energy: 0 },
      T2: { Food: 100, Steel: 100, Oil: 0, Energy: 0 },
      T3: { Food: 150, Steel: 150, Oil: 0, Energy: 10 },
      T4: { Food: 300, Steel: 300, Oil: 0, Energy: 20 },
      T5: { Food: 600, Steel: 600, Oil: 0, Energy: 40 },
    },
    minBatchSizes,
    isMain: true,
    type: "troop",
  },
  anti: {
    costs: {
      T1: { Food: 60, Steel: 40, Oil: 0, Energy: 0 },
      T2: { Food: 100, Steel: 0, Oil: 75, Energy: 0 },
      T3: { Food: 150, Steel: 0, Oil: 112, Energy: 10 },
      T4: { Food: 300, Steel: 0, Oil: 225, Energy: 20 },
      T5: { Food: 600, Steel: 0, Oil: 450, Energy: 40 },
    },
    minBatchSizes,
    isMain: false,
    type: "troop",
  },
  inf: {
    costs: {
      T1: { Food: 40, Steel: 60, Oil: 0, Energy: 0 },
      T2: { Food: 0, Steel: 100, Oil: 75, Energy: 0 },
      T3: { Food: 0, Steel: 150, Oil: 112, Energy: 10 },
      T4: { Food: 0, Steel: 300, Oil: 225, Energy: 20 },
      T5: { Food: 0, Steel: 400, Oil: 450, Energy: 40 },
    },
    minBatchSizes,
    isMain: false,
    type: "troop",
  },
  art: {
    costs: {
      T1: { Food: 60, Steel: 60, Oil: 0, Energy: 0 },
      T2: { Food: 65, Steel: 65, Oil: 50, Energy: 0 },
      T3: { Food: 100, Steel: 100, Oil: 75, Energy: 10 },
      T4: { Food: 200, Steel: 200, Oil: 150, Energy: 20 },
      T5: { Food: 400, Steel: 400, Oil: 300, Energy: 40 },
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

// Set base values for resource cost based on Troop Level and Production Value.
$("#tankProdCap").change(function () {
  $("#tankProdCapVal").val($("#tankProdCap").val());
  $.each(tanksResourceCosts[$("#tankTroopLevel").val()], function (key, value) {
    $("#tankRssCost" + key).text(value * $("#tankProdCap").val());
  });
  return tankUpdateBatchesTotal(), tankUpdateTimeTotal(), tankUpdateCostTotal();
});
$("#antiProdCap").change(function () {
  $("#antiProdCapVal").val($("#antiProdCap").val());
  $.each(antiResourceCosts[$("#antiTroopLevel").val()], function (key, value) {
    $("#antiRssCost" + key).text(value * $("#antiProdCap").val());
  });
  return antiUpdateBatchesTotal(), antiUpdateTimeTotal(), antiUpdateCostTotal();
});
$("#infProdCap").change(function () {
  $("#infProdCapVal").val($("#infProdCap").val());
  $.each(infResourceCosts[$("#infTroopLevel").val()], function (key, value) {
    $("#infRssCost" + key).text(value * $("#infProdCap").val());
  });
  return infUpdateBatchesTotal(), infUpdateTimeTotal(), infUpdateCostTotal();
});
$("#artProdCap").change(function () {
  $("#artProdCapVal").val($("#artProdCap").val());
  $.each(artResourceCosts[$("#artTroopLevel").val()], function (key, value) {
    $("#artRssCost" + key).text(value * $("#artProdCap").val());
  });
  return artUpdateBatchesTotal(), artUpdateTimeTotal(), artUpdateCostTotal();
});
// Converts seconds to Days, Mins, Hours, Secs.
function formatNumber(num) {
  return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
function secondsToDhms(seconds) {
  seconds = Number(seconds);
  var d = Math.floor(seconds / (3600 * 24));
  var h = Math.floor((seconds % (3600 * 24)) / 3600);
  var m = Math.floor((seconds % 3600) / 60);
  var s = Math.floor(seconds % 60);
  var dDisplay = d > 0 ? d + (d == 1 ? " D : " : " D : ") : " 0 D : ";
  var hDisplay = h > 0 ? h + (h == 1 ? " H : " : " H : ") : " 0 H : ";
  var mDisplay = m > 0 ? m + (m == 1 ? " M : " : " M : ") : " 0 M : ";
  var sDisplay = s > 0 ? s + (s == 1 ? " s" : " s") : " 0 s";
  return (
    formatNumber(dDisplay) +
    formatNumber(hDisplay) +
    formatNumber(mDisplay) +
    formatNumber(sDisplay)
  );
}
// Convert inputs to seconds
var tankTroopsRequired = 0;
var tankDict = {
  86400: 0,
  3600: 0,
  60: 0,
  1: 0,
};
var antiTroopsRequired = 0;
var antiDict = {
  86400: 0,
  3600: 0,
  60: 0,
  1: 0,
};
var infTroopsRequired = 0;
var infDict = {
  86400: 0,
  3600: 0,
  60: 0,
  1: 0,
};
var artTroopsRequired = 0;
var artDict = {
  86400: 0,
  3600: 0,
  60: 0,
  1: 0,
};

function tankUpdateTimeTotal() {
  total = 0;
  for (var key in tankDict) {
    var inputValue = tankDict[key];
    var timeValue = parseInt(key);
    var totalValue = inputValue * timeValue;
    total += totalValue;
  }
  $("#tankTotalTimeCost").text(
    secondsToDhms(total * (tankTroopsRequired / $("#tankProdCap").val()))
  );
  $("#tankTotalTimeTakenVal").val(
    secondsToDhms(total * (tankTroopsRequired / $("#tankProdCap").val()))
  );
}

$(".tankProdTime").on("keyup change", function () {
  var inputValue = $(this).val();
  var labelValue = $(this).attr("data-secs");
  tankDict[labelValue] = inputValue;
  return tankUpdateTimeTotal();
});

function tankUpdateCostTotal() {
  total = 0;
  total =
    "Food: " +
    formatNumber(($("#tankRssCostFood").text() / $("#tankProdCap").val()) * tankTroopsRequired);
  total +=
    " Steel: " +
    formatNumber(($("#tankRssCostSteel").text() / $("#tankProdCap").val()) * tankTroopsRequired);
  total +=
    " Oil: " +
    formatNumber(($("#tankRssCostOil").text() / $("#tankProdCap").val()) * tankTroopsRequired);
  total +=
    " Energy: " +
    formatNumber(($("#tankRssCostEnergy").text() / $("#tankProdCap").val()) * tankTroopsRequired);
  $("#tankTotalRssCost").text(total);
  $("#tankTotalRssCostVal").val(total);
}

function tankUpdateBatchesTotal() {
  total = "";
  total += Math.floor(tankTroopsRequired / $("#tankProdCap").val());
  if (total < tankTroopsRequired / $("#tankProdCap").val()) {
    total += " (+" + (tankTroopsRequired % $("#tankProdCap").val()) + ")";
  }
  $("#tankTotalBatches").text(formatNumber(total));
  $("#tankTotalBatchesVal").val(total);
}

$("#tankTroopsRequired, #tankCurrentTroopCount").on("keyup change", function () {
  tankTroopsRequired = $("#tankTroopsRequired").val() - $("#tankCurrentTroopCount").val();
  $("#tankTotalTroopsRequired").val(tankTroopsRequired);
  return tankUpdateTimeTotal(), tankUpdateCostTotal(), tankUpdateBatchesTotal();
});

function antiUpdateTimeTotal() {
  total = 0;
  for (var key in antiDict) {
    var inputValue = antiDict[key];
    var timeValue = parseInt(key);
    var totalValue = inputValue * timeValue;
    total += totalValue;
  }
  $("#antiTotalTimeCost").text(
    secondsToDhms(total * (antiTroopsRequired / $("#antiProdCap").val()))
  );
  $("#antiTotalTimeTakenVal").val(
    secondsToDhms(total * (antiTroopsRequired / $("#antiProdCap").val()))
  );
}

$(".antiProdTime").on("keyup change", function () {
  var inputValue = $(this).val();
  var labelValue = $(this).attr("data-secs");
  antiDict[labelValue] = inputValue;
  return antiUpdateTimeTotal();
});

function antiUpdateCostTotal() {
  total = 0;
  total =
    "Food: " +
    formatNumber(($("#antiRssCostFood").text() / $("#antiProdCap").val()) * antiTroopsRequired);
  total +=
    " Steel: " +
    formatNumber(($("#antiRssCostSteel").text() / $("#antiProdCap").val()) * antiTroopsRequired);
  total +=
    " Oil: " +
    formatNumber(($("#antiRssCostOil").text() / $("#antiProdCap").val()) * antiTroopsRequired);
  total +=
    " Energy: " +
    formatNumber(($("#antiRssCostEnergy").text() / $("#antiProdCap").val()) * antiTroopsRequired);
  $("#antiTotalRssCost").text(total);
  $("#antiTotalRssCostVal").val(total);
}

function antiUpdateBatchesTotal() {
  total = "";
  total += Math.floor(antiTroopsRequired / $("#antiProdCap").val());
  if (total < antiTroopsRequired / $("#antiProdCap").val()) {
    total += " (+" + (antiTroopsRequired % $("#antiProdCap").val()) + ")";
  }
  $("#antiTotalBatches").text(formatNumber(total));
  $("#antiTotalBatchesVal").val(total);
}

$("#antiTroopsRequired, #antiCurrentTroopCount").on("keyup change", function () {
  antiTroopsRequired = $("#antiTroopsRequired").val() - $("#antiCurrentTroopCount").val();
  $("#antiTotalTroopsRequired").val(antiTroopsRequired);
  return antiUpdateTimeTotal(), antiUpdateCostTotal(), antiUpdateBatchesTotal();
});

function artUpdateTimeTotal() {
  total = 0;
  for (var key in artDict) {
    var inputValue = artDict[key];
    var timeValue = parseInt(key);
    var totalValue = inputValue * timeValue;
    total += totalValue;
  }
  $("#artTotalTimeCost").text(secondsToDhms(total * (artTroopsRequired / $("#artProdCap").val())));
  $("#artTotalTimeTakenVal").val(
    secondsToDhms(total * (artTroopsRequired / $("#artProdCap").val()))
  );
}

$(".artProdTime").on("keyup change", function () {
  var inputValue = $(this).val();
  var labelValue = $(this).attr("data-secs");
  artDict[labelValue] = inputValue;
  return artUpdateTimeTotal();
});

function artUpdateCostTotal() {
  total = 0;
  total =
    "Food: " +
    formatNumber(($("#artRssCostFood").text() / $("#artProdCap").val()) * artTroopsRequired);
  total +=
    " Steel: " +
    formatNumber(($("#artRssCostSteel").text() / $("#artProdCap").val()) * artTroopsRequired);
  total +=
    " Oil: " +
    formatNumber(($("#artRssCostOil").text() / $("#artProdCap").val()) * artTroopsRequired);
  total +=
    " Energy: " +
    formatNumber(($("#artRssCostEnergy").text() / $("#artProdCap").val()) * artTroopsRequired);
  $("#artTotalRssCost").text(total);
  $("#artTotalRssCostVal").val(total);
}

function artUpdateBatchesTotal() {
  total = "";
  total += Math.floor(artTroopsRequired / $("#artProdCap").val());
  if (total < artTroopsRequired / $("#artProdCap").val()) {
    total += " (+" + (artTroopsRequired % $("#artProdCap").val()) + ")";
  }
  $("#artTotalBatches").text(formatNumber(total));
  $("#artTotalBatchesVal").val(total);
}

$("#artTroopsRequired, #artCurrentTroopCount").on("keyup change", function () {
  artTroopsRequired = $("#artTroopsRequired").val() - $("#artCurrentTroopCount").val();
  $("#artTotalTroopsRequired").val(artTroopsRequired);
  return artUpdateTimeTotal(), artUpdateCostTotal(), artUpdateBatchesTotal();
});

function infUpdateTimeTotal() {
  total = 0;
  for (var key in infDict) {
    var inputValue = infDict[key];
    var timeValue = parseInt(key);
    var totalValue = inputValue * timeValue;
    total += totalValue;
  }
  $("#infTotalTimeCost").text(secondsToDhms(total * (infTroopsRequired / $("#infProdCap").val())));
  $("#infTotalTimeTakenVal").val(
    secondsToDhms(total * (infTroopsRequired / $("#infProdCap").val()))
  );
}

$(".infProdTime").on("keyup change", function () {
  var inputValue = $(this).val();
  var labelValue = $(this).attr("data-secs");
  infDict[labelValue] = inputValue;
  return infUpdateTimeTotal();
});

function infUpdateCostTotal() {
  total = 0;
  total =
    "Food: " +
    formatNumber(($("#infRssCostFood").text() / $("#infProdCap").val()) * infTroopsRequired);
  total +=
    " Steel: " +
    formatNumber(($("#infRssCostSteel").text() / $("#infProdCap").val()) * infTroopsRequired);
  total +=
    " Oil: " +
    formatNumber(($("#infRssCostOil").text() / $("#infProdCap").val()) * infTroopsRequired);
  total +=
    " Energy: " +
    formatNumber(($("#infRssCostEnergy").text() / $("#infProdCap").val()) * infTroopsRequired);
  $("#infTotalRssCost").text(total);
  $("#infTotalRssCostVal").val(total);
}

function infUpdateBatchesTotal() {
  total = "";
  total += Math.floor(infTroopsRequired / $("#infProdCap").val());
  if (total < infTroopsRequired / $("#infProdCap").val()) {
    total += " (+" + (infTroopsRequired % $("#infProdCap").val()) + ")";
  }
  $("#infTotalBatches").text(formatNumber(total));
  $("#infTotalBatchesVal").val(total);
}

$("#infTroopsRequired, #infCurrentTroopCount").on("keyup change", function () {
  infTroopsRequired = $("#infTroopsRequired").val() - $("#infCurrentTroopCount").val();
  $("#infTotalTroopsRequired").val(infTroopsRequired);
  return infUpdateTimeTotal(), infUpdateCostTotal(), infUpdateBatchesTotal();
});

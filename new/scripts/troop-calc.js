const batchSizes = [
  20, 50, 100, 150, 200, 250, 300, 350, 400, 450, 500, 550, 600, 700, 800, 900, 1000, 1100, 1200,
  1300, 1400, 1500, 1600, 1700, 2000,
];
const minBatchSizes = {
  T1: batchSizes[0],
  T2: batchSizes[5],
  T3: batchSizes[10],
  T4: batchSizes[14],
  T5: batchSizes[22],
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
    batchSizes: minBatchSizes,
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
    batchSizes: minBatchSizes,
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
    batchSizes: minBatchSizes,
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
    batchSizes: minBatchSizes,
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

// Limit the options for production capacity based on Troop Level.
// Tank
$("#tankTroopLevel").change(function () {
  if ($("#tankTroopLevel").val() == "T1") {
    $("#tankProdCap").find("option").remove().end();
    $.each(tankLevelOneProdVals, function (key, value) {
      $("#tankProdCap").append($("<option></option>").attr("value", key).text(value));
    });
    $("#tankTroopLevelVal").val("T1");
  } else if ($("#tankTroopLevel").val() == "T2") {
    $("#tankProdCap").find("option").remove().end();
    $.each(tankLevelTwoProdVals, function (key, value) {
      $("#tankProdCap").append($("<option></option>").attr("value", key).text(value));
    });
    $("#tankTroopLevelVal").val("T2");
  } else if ($("#tankTroopLevel").val() == "T3") {
    $("#tankProdCap").find("option").remove().end();
    $.each(tankLevelThreeProdVals, function (key, value) {
      $("#tankProdCap").append($("<option></option>").attr("value", key).text(value));
    });
    $("#tankTroopLevelVal").val("T3");
  } else if ($("#tankTroopLevel").val() == "T4") {
    $("#tankProdCap").find("option").remove().end();
    $.each(tankLevelFourProdVals, function (key, value) {
      $("#tankProdCap").append($("<option></option>").attr("value", key).text(value));
    });
    $("#tankTroopLevelVal").val("T4");
  } else if ($("#tankTroopLevel").val() == "T5") {
    $("#tankProdCap").find("option").remove().end();
    $.each(tankLevelFiveProdVals, function (key, value) {
      $("#tankProdCap").append($("<option></option>").attr("value", key).text(value));
    });
    $("#tankTroopLevelVal").val("T5");
  }
  $.each(tanksResourceCosts[$("#tankTroopLevel").val()], function (key, value) {
    $("#tankRssCost" + key).text(value * $("#tankProdCap").val());
  });
  return tankUpdateBatchesTotal(), tankUpdateTimeTotal(), tankUpdateCostTotal();
});
// Anti-tank
$("#antiTroopLevel").change(function () {
  if ($("#antiTroopLevel").val() == "T1") {
    $("#antiProdCap").find("option").remove().end();
    $.each(antiLevelOneProdVals, function (key, value) {
      $("#antiProdCap").append($("<option></option>").attr("value", key).text(value));
    });
    $("#antiTroopLevelVal").val("T1");
  } else if ($("#antiTroopLevel").val() == "T2") {
    $("#antiProdCap").find("option").remove().end();
    $.each(antiLevelTwoProdVals, function (key, value) {
      $("#antiProdCap").append($("<option></option>").attr("value", key).text(value));
    });
    $("#antiTroopLevelVal").val("T2");
  } else if ($("#antiTroopLevel").val() == "T3") {
    $("#antiProdCap").find("option").remove().end();
    $.each(antiLevelThreeProdVals, function (key, value) {
      $("#antiProdCap").append($("<option></option>").attr("value", key).text(value));
    });
    $("#antiTroopLevelVal").val("T3");
  } else if ($("#antiTroopLevel").val() == "T4") {
    $("#antiProdCap").find("option").remove().end();
    $.each(antiLevelFourProdVals, function (key, value) {
      $("#antiProdCap").append($("<option></option>").attr("value", key).text(value));
    });
    $("#antiTroopLevelVal").val("T4");
  } else if ($("#antiTroopLevel").val() == "T5") {
    $("#antiProdCap").find("option").remove().end();
    $.each(antiLevelFiveProdVals, function (key, value) {
      $("#antiProdCap").append($("<option></option>").attr("value", key).text(value));
    });
    $("#antiTroopLevelVal").val("T5");
  }
  $.each(antiResourceCosts[$("#antiTroopLevel").val()], function (key, value) {
    $("#antiRssCost" + key).attr("value", value * $("#antiProdCap").val());
  });
  return antiUpdateBatchesTotal(), antiUpdateTimeTotal(), antiUpdateCostTotal();
});
// Infantry
$("#infTroopLevel").change(function () {
  if ($("#infTroopLevel").val() == "T1") {
    $("#infProdCap").find("option").remove().end();
    $.each(infLevelOneProdVals, function (key, value) {
      $("#infProdCap").append($("<option></option>").attr("value", key).text(value));
    });
    $("#infTroopLevelVal").val("T1");
  } else if ($("#infTroopLevel").val() == "T2") {
    $("#infProdCap").find("option").remove().end();
    $.each(infLevelTwoProdVals, function (key, value) {
      $("#infProdCap").append($("<option></option>").attr("value", key).text(value));
    });
    $("#infTroopLevelVal").val("T2");
  } else if ($("#infTroopLevel").val() == "T3") {
    $("#infProdCap").find("option").remove().end();
    $.each(infLevelThreeProdVals, function (key, value) {
      $("#infProdCap").append($("<option></option>").attr("value", key).text(value));
    });
    $("#infTroopLevelVal").val("T3");
  } else if ($("#infTroopLevel").val() == "T4") {
    $("#infProdCap").find("option").remove().end();
    $.each(infLevelFourProdVals, function (key, value) {
      $("#infProdCap").append($("<option></option>").attr("value", key).text(value));
    });
    $("#infTroopLevelVal").val("T4");
  } else if ($("#infTroopLevel").val() == "T5") {
    $("#infProdCap").find("option").remove().end();
    $.each(infLevelFiveProdVals, function (key, value) {
      $("#infProdCap").append($("<option></option>").attr("value", key).text(value));
    });
    $("#infTroopLevelVal").val("T5");
  }
  $.each(infResourceCosts[$("#infTroopLevel").val()], function (key, value) {
    $("#infRssCost" + key).attr("value", value * $("#infProdCap").val());
  });
  return infUpdateBatchesTotal(), infUpdateTimeTotal(), infUpdateCostTotal();
});
// Artillery
$("#artTroopLevel").change(function () {
  if ($("#artTroopLevel").val() == "T1") {
    $("#artProdCap").find("option").remove().end();
    $.each(artLevelOneProdVals, function (key, value) {
      $("#artProdCap").append($("<option></option>").attr("value", key).text(value));
    });
    $("#artTroopLevelVal").val("T1");
  } else if ($("#artTroopLevel").val() == "T2") {
    $("#artProdCap").find("option").remove().end();
    $.each(artLevelTwoProdVals, function (key, value) {
      $("#artProdCap").append($("<option></option>").attr("value", key).text(value));
    });
    $("#artTroopLevelVal").val("T2");
  } else if ($("#artTroopLevel").val() == "T3") {
    $("#artProdCap").find("option").remove().end();
    $.each(artLevelThreeProdVals, function (key, value) {
      $("#artProdCap").append($("<option></option>").attr("value", key).text(value));
    });
    $("#artTroopLevelVal").val("T3");
  } else if ($("#artTroopLevel").val() == "T4") {
    $("#artProdCap").find("option").remove().end();
    $.each(artLevelFourProdVals, function (key, value) {
      $("#artProdCap").append($("<option></option>").attr("value", key).text(value));
    });
    $("#artTroopLevelVal").val("T4");
  } else if ($("#artTroopLevel").val() == "T5") {
    $("#artProdCap").find("option").remove().end();
    $.each(artLevelFiveProdVals, function (key, value) {
      $("#artProdCap").append($("<option></option>").attr("value", key).text(value));
    });
    $("#artTroopLevelVal").val("T5");
  }
  $.each(artResourceCosts[$("#artTroopLevel").val()], function (key, value) {
    $("#artRssCost" + key).attr("value", value * $("#artProdCap").val());
  });
  return artUpdateBatchesTotal(), artUpdateTimeTotal(), artUpdateCostTotal();
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

function formatNumber(num) {
  return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
var foodDict = {
  F1: 0,
  F1000: 0,
  F10000: 0,
  F50000: 0,
  F150000: 0,
  F500000: 0,
  F1500000: 0,
  F50000000: 0,
};

function updateFoodTotal() {
  total = 0;
  for (var key in foodDict) {
    var inputValue = foodDict[key];
    var labelValue = key.slice(1);
    var totalValue = inputValue * labelValue;
    $("#foodTotal" + labelValue).text(formatNumber(totalValue));
    total += totalValue;
    foodTotal = total;
  }
  total = formatNumber(total);
  $("#foodTotal").text(total);
  $(".foodTotal").val(total);
}

$(".foodInput").keyup(function () {
  var inputValue = $(this).val();
  var labelValue = $(this).attr("data-amt");
  foodDict["F" + labelValue] = inputValue;
  return updateFoodTotal();
});

var steelDict = {
  S1000: 0,
  S10000: 0,
  S50000: 0,
  S150000: 0,
  S500000: 0,
  S1500000: 0,
  S50000000: 0,
};

function updateSteelTotal() {
  total = 0;
  for (var key in steelDict) {
    var inputValue = steelDict[key];
    var labelValue = key.slice(1);
    var totalValue = inputValue * labelValue;
    $("#steelTotal" + labelValue).text(formatNumber(totalValue));
    total += totalValue;
    steelTotal = total;
  }
  total = formatNumber(total);
  $("#steelTotal").text(total);
  $(".steelTotal").val(total);
}

$(".steelInput").keyup(function () {
  var inputValue = $(this).val();
  var labelValue = $(this).attr("data-amt");
  steelDict["S" + labelValue] = inputValue;
  return updateSteelTotal();
});

var oilDict = {
  FU750: 0,
  FU7500: 0,
  FU37500: 0,
  FU112500: 0,
  FU375000: 0,
  FU1125000: 0,
  FU37500000: 0,
};

function updateOilTotal() {
  total = 0;
  for (var key in oilDict) {
    var inputValue = oilDict[key];
    var labelValue = key.slice(2);
    var totalValue = inputValue * labelValue;
    $("#oilTotal" + labelValue).text(formatNumber(totalValue));
    total += totalValue;
    oilTotal = total;
  }
  total = formatNumber(total);
  $("#oilTotal").text(total);
  $(".oilTotal").val(total);
}

$(".oilInput").keyup(function () {
  var inputValue = $(this).val();
  var labelValue = $(this).attr("data-amt");
  oilDict["FU" + labelValue] = inputValue;
  return updateOilTotal();
});

var energyDict = {
  E500: 0,
  E3000: 0,
  E15000: 0,
  E50000: 0,
  E200000: 0,
  E600000: 0,
  E20000000: 0,
};

function updateEnergyTotal() {
  total = 0;
  for (var key in energyDict) {
    var inputValue = energyDict[key];
    var labelValue = key.slice(1);
    var totalValue = inputValue * labelValue;
    $("#energyTotal" + labelValue).text(formatNumber(totalValue));
    total += totalValue;
    energyTotal = total;
  }
  total = formatNumber(total);
  $("#energyTotal").text(total);
  $(".energyTotal").val(total);
}

$(".energyInput").keyup(function () {
  var inputValue = $(this).val();
  var labelValue = $(this).attr("data-amt");
  energyDict["E" + labelValue] = inputValue;
  return updateEnergyTotal();
});

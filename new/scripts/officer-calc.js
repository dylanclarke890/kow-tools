$(document).ready(function () {
  return totalxpReq(), calculateXP();
});

function formatNumber(num) {
  return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

var xpDict = {
  XP100: 0,
  XP500: 0,
  XP1000: 0,
  XP5000: 0,
  XP10000: 0,
  XP20000: 0,
  XP50000: 0,
};

function updatexpTotal() {
  total = 0;
  for (var key in xpDict) {
    var inputValue = xpDict[key];
    var labelValue = key.slice(2);
    var totalValue = inputValue * labelValue;
    $("#xpTotal" + labelValue).text(formatNumber(totalValue));
    total += totalValue;
    xpTotal = total;
  }
  total = total;
  $("#yourXP").text(formatNumber(total));
  $("#xpTotal").text(formatNumber(total));
  $(".xpTotal").val(total);
  return totalxpReq(), calculateXP();
}

$(".xpInput").keyup(function () {
  var inputValue = $(this).val();
  var labelValue = $(this).attr("data-amt");
  xpDict["XP" + labelValue] = inputValue;
  return updatexpTotal();
});

var apDict = {
  AP20: 0,
  AP50: 0,
  AP100: 0,
  AP500: 0,
};

function updateapTotal() {
  total = 0;
  for (var key in apDict) {
    var inputValue = apDict[key];
    var labelValue = key.slice(2);
    var totalValue = inputValue * labelValue;
    $("#apTotal" + labelValue).text(formatNumber(totalValue));
    total += totalValue;
    apTotal = total;
  }
  total = formatNumber(total);
  $("#apTotal").text(total);
  $(".apTotal").val(total);
}

$(".apInput").keyup(function () {
  var inputValue = $(this).val();
  var labelValue = $(this).attr("data-amt");
  apDict["AP" + labelValue] = inputValue;
  return updateapTotal();
});

var blueLevels = [
  0, 80, 240, 480, 800, 2400, 4800, 7200, 9600, 12000, 14800, 18000, 21600, 25600, 30000, 34800,
  40000, 45200, 50400, 56000, 60000, 64000, 68800, 73600, 78400, 84000, 89600, 95200, 100800,
  108000, 120000, 136000, 156000, 180000, 208000, 240000, 276000, 316000, 360000, 440000, 540000,
  640000, 760000, 880000, 1020000, 1160000, 1320000, 1480000, 1680000, 1880000, 2120000, 2360000,
  2650000, 2940000, 3290000, 3640000, 4060000, 4480000, 4980000, 5480000,
];
var purpleLevels = [
  0, 100, 300, 600, 1000, 3000, 6000, 9000, 12000, 15000, 18500, 22500, 27000, 32000, 37500, 43500,
  50000, 56500, 63000, 70000, 75000, 80000, 86000, 92000, 98000, 105000, 112000, 119000, 126000,
  135000, 150000, 170000, 195000, 225000, 260000, 300000, 345000, 395000, 450000, 550000, 675000,
  800000, 950000, 1100000, 1275000, 1450000, 1650000, 1850000, 2100000, 2350000, 2650000, 2950000,
  3312000, 3675000, 4112000, 4550000, 5075000, 5600000, 6250000, 6850000,
];
var goldLevels = [
  0, 120, 360, 720, 1200, 3600, 7200, 10800, 14700, 18000, 22200, 27000, 32400, 38400, 45000, 52200,
  60000, 67800, 75600, 84000, 90000, 96000, 103200, 110400, 117600, 126000, 134400, 142800, 151200,
  162000, 180000, 204000, 234000, 270000, 312000, 360000, 414000, 474000, 540000, 660000, 810000,
  960000, 1140000, 1320000, 1530000, 1740000, 1980000, 2220000, 2520000, 2820000, 3180000, 3540000,
  3975000, 4140000, 4935000, 5460000, 6090000, 6720000, 7470000, 8220000,
];

var selectedRarity = purpleLevels;

$(".rarityOptions").change(function () {
  if ($("#blue").is(":checked")) {
    selectedRarity = blueLevels;
  } else if ($("#purple").is(":checked")) {
    selectedRarity = purpleLevels;
  } else if ($("#gold").is(":checked")) {
    selectedRarity = goldLevels;
  }
  return totalxpReq();
});

function totalxpReq() {
  total = 0;
  start = $("#levelStart").val();
  stop = $("#levelStop").val() - 1;
  selectedRarity.forEach(function (n, i) {
    if (start <= i && i <= stop) {
      total += n;
    }
  });
  total -= $("#currentProgress").val();
  $("#reqXP").text(formatNumber(total));
  $(".reqTotal").val(total);
  return calculateXP();
}

function calculateXP() {
  current = $(".xpTotal").val();
  required = $(".reqTotal").val();
  result = "";
  if (current == required) {
    result = "You have exactly enough XP for this";
  } else if (current > required) {
    result = formatNumber(current - required) + "XP leftover";
  } else if (current < required) {
    result = formatNumber(required - current) + " XP still required";
  }
  $("#resultXP").text(result);
}

$("#currentProgress").on("keyup", function () {
  if ($("#currentProgress").val() >= 8220000) {
    $("#currentProgress").val(8219999);
  }
  return totalxpReq(), calculateXP();
});

$("#levelStart").on("focusout change", function () {
  if ($("#levelStart").val() <= 0) {
    $("#levelStart").val(1);
  }
  if ($("#levelStart").val() >= 60) {
    $("#levelStart").val(59);
  }
  return totalxpReq(), calculateXP();
});
$("#levelStop").on("focusout change", function () {
  if ($("#levelStop").val() <= 1) {
    $("#levelStop").val(2);
  }
  if ($("#levelStop").val() >= 61) {
    $("#levelStop").val(60);
  }
  if ($("#levelStop").val() <= $("#levelStart").val()) {
    $("#levelStart").val($("#levelStop").val() - 1);
  }
  return totalxpReq(), calculateXP();
});
$("#levelStart").keyup(function () {
  return totalxpReq(), calculateXP();
});
$("#levelStop").keyup(function () {
  return totalxpReq(), calculateXP();
});

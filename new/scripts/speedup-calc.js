function secondsToDhms(seconds) {
  seconds = parseInt(seconds);
  seconds = isNaN(seconds) ? 0 : seconds;
  const d = Math.floor(seconds / (3600 * 24)),
    h = Math.floor((seconds % (3600 * 24)) / 3600),
    m = Math.floor((seconds % 3600) / 60),
    s = Math.floor(seconds % 60);

  const days = d > 0 ? d + (d == 1 ? " D : " : " D : ") : "0 D : ",
    hours = h > 0 ? h + (h == 1 ? " H : " : " H : ") : "0 H : ",
    mins = m > 0 ? m + (m == 1 ? " M " : " M ") : "0 M",
    secs = s > 0 ? s + (s == 1 ? " : s" : " : s") : "";
  return `${days}${hours}${mins}${secs}`;
}

var trainingDict = {
  TNG60: 0,
  TNG300: 0,
  TNG600: 0,
  TNG1800: 0,
  TNG3600: 0,
  TNG10800: 0,
  TNG28800: 0,
  TNG54000: 0,
  TNG86400: 0,
};

function updateTrainingTotal() {
  total = 0;
  for (var key in trainingDict) {
    var inputValue = trainingDict[key];
    var labelValue = key.slice(3);
    var totalValue = inputValue * labelValue;
    total += totalValue;
  }
  $("#trainingTotal").text(secondsToDhms(total));
  $(".trainingTotal").val(secondsToDhms(total));
}

$(".trainingInput").on("keyup change", function () {
  var inputValue = $(this).val();
  var labelValue = $(this).attr("data-amt");
  trainingDict["TNG" + labelValue] = inputValue;
  $("#TNG" + labelValue).text(secondsToDhms(inputValue * labelValue));
  return updateTrainingTotal();
});

var repairDict = {
  RPR60: 0,
  RPR300: 0,
  RPR600: 0,
  RPR1800: 0,
  RPR3600: 0,
  RPR10800: 0,
  RPR28800: 0,
  RPR54000: 0,
  RPR86400: 0,
};
var repairTotalSeconds = 0;

function updateRepairTotal() {
  total = 0;
  for (var key in repairDict) {
    var inputValue = repairDict[key];
    var labelValue = key.slice(3);
    var totalValue = inputValue * labelValue;
    total += totalValue;
  }
  $("#repairTotal").text(secondsToDhms(total));
  $(".repairTotal").val(secondsToDhms(total));
}

$(".repairInput").on("keyup change", function () {
  var inputValue = $(this).val();
  var labelValue = $(this).attr("data-amt");
  repairDict["RPR" + labelValue] = inputValue;
  $("#RPR" + labelValue).text(secondsToDhms(inputValue * labelValue));
  return updateRepairTotal();
});
$(".foodInput").keyup(function () {
  var inputValue = $(this).val();
  var labelValue = $(this).attr("data-amt");
  foodDict["F" + labelValue] = inputValue;
  return updateFoodTotal();
});

var researchDict = {
  RSH60: 0,
  RSH300: 0,
  RSH600: 0,
  RSH1800: 0,
  RSH3600: 0,
  RSH10800: 0,
  RSH28800: 0,
  RSH54000: 0,
  RSH86400: 0,
};
var researchTotalSeconds = 0;

function updateResearchTotal() {
  total = 0;
  for (var key in researchDict) {
    var inputValue = researchDict[key];
    var labelValue = key.slice(3);
    var totalValue = inputValue * labelValue;
    total += totalValue;
  }
  $("#researchTotal").text(secondsToDhms(total));
  $(".researchTotal").val(secondsToDhms(total));
}

$(".researchInput").on("keyup change", function () {
  var inputValue = $(this).val();
  var labelValue = $(this).attr("data-amt");
  researchDict["RSH" + labelValue] = inputValue;
  $("#RSH" + labelValue).text(secondsToDhms(inputValue * labelValue));
  return updateResearchTotal();
});

var buildingDict = {
  BLD60: 0,
  BLD300: 0,
  BLD600: 0,
  BLD1800: 0,
  BLD3600: 0,
  BLD10800: 0,
  BLD28800: 0,
  BLD54000: 0,
  BLD86400: 0,
};
var buildingTotalSeconds = 0;

function updateBuildingTotal() {
  total = 0;
  for (var key in buildingDict) {
    var inputValue = buildingDict[key];
    var labelValue = key.slice(3);
    var totalValue = inputValue * labelValue;
    total += totalValue;
  }
  $("#buildingTotal").text(secondsToDhms(total));
  $(".buildingTotal").val(secondsToDhms(total));
}

$(".buildingInput").on("keyup change", function () {
  var inputValue = $(this).val();
  var labelValue = $(this).attr("data-amt");
  buildingDict["BLD" + labelValue] = inputValue;
  $("#BLD" + labelValue).text(secondsToDhms(inputValue * labelValue));
  return updateBuildingTotal();
});

var generalDict = {
  GNR60: 0,
  GNR300: 0,
  GNR600: 0,
  GNR1800: 0,
  GNR3600: 0,
  GNR10800: 0,
  GNR28800: 0,
  GNR54000: 0,
  GNR86400: 0,
};
var generalTotalSeconds = 0;

function updateGeneralTotal() {
  total = 0;
  for (var key in generalDict) {
    var inputValue = generalDict[key];
    var labelValue = key.slice(3);
    var totalValue = inputValue * labelValue;
    total += totalValue;
  }
  $("#generalTotal").text(secondsToDhms(total));
  $(".generalTotal").val(secondsToDhms(total));
}

$(".generalInput").on("keyup change", function () {
  var inputValue = $(this).val();
  var labelValue = $(this).attr("data-amt");
  generalDict["GNR" + labelValue] = inputValue;
  $("#GNR" + labelValue).text(secondsToDhms(inputValue * labelValue));
  return updateGeneralTotal();
});

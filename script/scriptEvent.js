/*FUNCTION OF A TIMER TO ANNOUNCE AN EVENT */
var siteOpeningDate = new Date(2023, 7, 20, 0, 0, 0); 
function updateCountdown() {
  var currentDate = new Date();
  var timeDifference = siteOpeningDate - currentDate;

  if (timeDifference > 0) {
    var days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
    var hours = Math.floor(
      (timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
    );
    var minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

    var countdownElement = document.getElementById("countdown");
    countdownElement.innerHTML =
      days +
      "j" +
      "." +
      hours +
      "h " +
      "." +
      minutes +
      "m " +
      "." +
      seconds +
      "s";

    setTimeout(updateCountdown, 1000); 
  } else {
    var countdownElement = document.getElementById("countdown");
    countdownElement.innerHTML = "Le site est ouvert !"; 
  }
}
updateCountdown();

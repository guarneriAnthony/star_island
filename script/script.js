let screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

/*FUNCTION TO DISLAY THE NAVBAR WHAEN THE MOUSE ENTERS OR LEAVES*/ 
if (screenWidth > 846) {
  document.addEventListener("DOMContentLoaded", function () {
    let discordElements = document.getElementsByClassName("class_discorde");
    let reseauxElements = document.getElementsByClassName("reseaux");
    let sideBar = document.getElementById("sideBare");

    for (let i = 0; i < discordElements.length; i++) {
      discordElements[i].addEventListener("mouseover", function () {
        for (let j = 0; j < reseauxElements.length; j++) {
          reseauxElements[j].style.opacity = "1";
          reseauxElements[j].style.transition = "1s";
          sideBar.style.backgroundColor = "rgba(255, 255, 255, 0.5)";
          sideBar.style.transition = "1s";
          console.log(sideBar.style);
        }
      });

      discordElements[i].addEventListener("mouseout", function () {
        for (let j = 0; j < reseauxElements.length; j++) {
          reseauxElements[j].style.opacity = "0";
          reseauxElements[j].style.transition = "5s";
          sideBar.style.backgroundColor = "rgba(255, 255, 255, 0)";
          sideBar.style.transition = "5s";
        }
      });
    }
  });
}

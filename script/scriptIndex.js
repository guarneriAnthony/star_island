const gallery = document.getElementById("slider");
const left = document.getElementsByClassName("left")[0];
left.classList.add("disabled");
const right = document.getElementsByClassName("right")[0];
const images = 10;
const imagesUrl = "https://picsum.photos/seed/{seed}/500/350";
var selected = 0;
setInterval(() => {
  nextImg();
}, 2500);

function init() {
  for (var i = 0; i < images; i++) {
    var imageWrapper = document.createElement("div");
    imageWrapper.id = `image_${i}`;
    imageWrapper.classList.add("wrapper");
    if (i === selected) {
      imageWrapper.classList.add("selected");
    }
    var image = document.createElement("img");
    image.src = imagesUrl.replace(
      "{seed}",
      i + 1 + Math.floor(Math.random() * 100)
    );
    imageWrapper.appendChild(image);
    gallery.appendChild(imageWrapper);
    let touchstartX = 0;
    let touchendX = 0;
  }
}

init();

right.onclick = nextImg;
function nextImg() {
  if (selected === images - 1) {
    selected = 0;
  } else {
    selected++;
  }
  if (selected > images - 1) {
    selected = images - 1;
  }
  handleSelection();
}

left.onclick = prevImg;
function prevImg() {
  selected--;
  if (selected < 0) {
    selected = 0;
  }
  handleSelection();
}

function handleSelection() {
  var images = document.getElementsByClassName("wrapper");
  if (selected === images.length - 1) {
    right.classList.add("disabled");
  } else {
    right.classList.remove("disabled");
  }
  if (selected === 0) {
    left.classList.add("disabled");
  } else {
    left.classList.remove("disabled");
  }
  for (var i = 0; i < images.length; i++) {
    var img = images[i];
    if (img.id === `image_${selected}`) {
      img.classList.add("selected");
    } else {
      img.classList.remove("selected");
    }
  }
}

let changeStars = document.querySelectorAll(".changeStar");
let star0 = document.querySelector(".star0");
let star1 = document.querySelector(".star1");
let star2 = document.querySelector(".star2");
let star3 = document.querySelector(".star3");
let star4 = document.querySelector(".star4");

changeStars.forEach((changeStar) => {
  changeStar.addEventListener("click", () => {
    if (
      changeStar.classList.contains("star0") &&
      changeStar.src.endsWith("starBlack.png")
    ) {
      star0.src = "./assets/star.png";
    } else if (
      changeStar.classList.contains("star1") &&
      changeStar.src.endsWith("starBlack.png")
    ) {
      star0.src = "./assets/star.png";
      star1.src = "./assets/star.png";
    } else if (
      changeStar.classList.contains("star2") &&
      changeStar.src.endsWith("starBlack.png")
    ) {
      star0.src = "./assets/star.png";
      star1.src = "./assets/star.png";
      star2.src = "./assets/star.png";
    } else if (
      changeStar.classList.contains("star3") &&
      changeStar.src.endsWith("starBlack.png")
    ) {
      star0.src = "./assets/star.png";
      star1.src = "./assets/star.png";
      star2.src = "./assets/star.png";
      star3.src = "./assets/star.png";
    } else if (
      changeStar.classList.contains("star4") &&
      changeStar.src.endsWith("starBlack.png")
    ) {
      star0.src = "./assets/star.png";
      star1.src = "./assets/star.png";
      star2.src = "./assets/star.png";
      star3.src = "./assets/star.png";
      star4.src = "./assets/star.png";
    } else {
      if (
        changeStar.classList.contains("star0") &&
        changeStar.src.endsWith("star.png")
      ) {
        star1.src = "./assets/starBlack.png";
        star2.src = "./assets/starBlack.png";
        star3.src = "./assets/starBlack.png";
        star4.src = "./assets/starBlack.png";
      } else if (
        changeStar.classList.contains("star1") &&
        changeStar.src.endsWith("star.png")
      ) {
        star2.src = "./assets/starBlack.png";
        star3.src = "./assets/starBlack.png";
        star4.src = "./assets/starBlack.png";
      } else if (
        changeStar.classList.contains("star2") &&
        changeStar.src.endsWith("star.png")
      ) {
        star3.src = "./assets/starBlack.png";
        star4.src = "./assets/starBlack.png";
      } else if (
        changeStar.classList.contains("star3") &&
        changeStar.src.endsWith("star.png")
      ) {
        star4.src = "./assets/starBlack.png";
      }
    }
  });
});

/* Optimisation du code mais ne marche que pour afficher les etoiles en validé et non plas pour les supprimer correctement */
/*let changeStars = document.querySelectorAll(".changeStar");
let stars = document.querySelectorAll(".star");

changeStars.forEach(changeStar => {
  changeStar.addEventListener("click", () => {
    let clickedIndex = Array.from(changeStars).indexOf(changeStar);


    let changeStars0 = document.querySelectorAll(".changeStar");
let star0 = document.querySelector(".star0");
let star1 = document.querySelector(".star1");
let star2 = document.querySelector(".star2");
let star3 = document.querySelector(".star3");
let star4 = document.querySelector(".star4");


    stars.forEach((star, index) => {
      if (index <= clickedIndex) {
        if (changeStar.src.endsWith("starBlack.png")) {
          star.src = "./assets/star.png";
        } else 
        {
          changeStars0.forEach(changeStar => {
            console.log("changé");
            if (changeStar.classList.contains("star0") && changeStar.src.endsWith("star.png")) {
              star1.src = "./assets/starBlack.png";
              star2.src = "./assets/starBlack.png";
              star3.src = "./assets/starBlack.png";
              star4.src = "./assets/starBlack.png";
            } 
            else if (changeStar.classList.contains("star1") && changeStar.src.endsWith("star.png")) {
              star2.src = "./assets/starBlack.png";
              star3.src = "./assets/starBlack.png";
              star4.src = "./assets/starBlack.png";
            } 
            else if (changeStar.classList.contains("star2") && changeStar.src.endsWith("star.png")) {
              star3.src = "./assets/starBlack.png";
              star4.src = "./assets/starBlack.png";
            }
            else if (changeStar.classList.contains("star3") && changeStar.src.endsWith("star.png")) {
              star4.src = "./assets/starBlack.png";
            }
          });
          
    
        }
      }
    });
  });
});
*/

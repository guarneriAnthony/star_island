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

/*INIT OF WRAPPER AND IMG IN HTML*/
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

/*CLICK TO CHANGE SELECTED IMG (RIGHT)*/
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

/*CLICK TO CHANGE SELECTED IMG (LEFT)*/
left.onclick = prevImg;
function prevImg() {
  selected--;
  if (selected < 0) {
    selected = 0;
  }
  handleSelection();
}

/*TO HANDLE THE SELECTION OF IMG*/
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

/*FUNCTION TO VALIDATE A STAR*/
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

/*$('.containerStars img').on('click', function() {
  let onStar = parseInt($(this).attr('data_value'), 10); 
  $('#iNote').val(onStar);
});
*/

const nbrStars = document.getElementById('nbrStar');
const stars = document.querySelectorAll('.changeStar');
stars.forEach((star) => {
  star.addEventListener('click', () => {
    nbrStars.value = star.getAttribute('data_position');
    console.log(star.getAttribute('data_position'));
  })
})
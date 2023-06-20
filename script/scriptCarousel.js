
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
    let touchstartX = 0
    let touchendX = 0
}
prevAct();
}

init();

right.onclick = nextImg;
function nextImg () {
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
function prevImg () {
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
prevAct();
}

function prevAct() {
  var selectedImage = document.getElementById(`image_${selected}`);
  var imageUrl = selectedImage.querySelector("img").src;
  var selectedImageDiv = document.getElementById("selectedImage");
  selectedImageDiv.innerHTML = `<img src="${imageUrl}" alt="Selected Image">`;
}

/* animation burger pour changer la couleur (ne marche pas)*
let navbarNav = document.getElementById("button");
let burger = document.getElementById('container-fluid');
if (navbarNav.classList.contains("collapsed")) {
  burger.style.backgroundColor = 'transparent';
}
  burger.style.backgroundColor = 'black';
  navbarNav.classList.contains("collapsed");
  if (aria_expanded === "false") {
    burger.style.backgroundColor = 'black';
  }
  if (aria_expanded === "true") {
    burger.style.backgroundColor = 'black'; 
  }   
  */


  

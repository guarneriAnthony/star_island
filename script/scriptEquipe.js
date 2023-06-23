/*function de tri des avatars en comparant la liste et le contente de chanque 2eme enfant des dropdown*/ 
/*document.addEventListener("DOMContentLoaded", function () {
  let filterItems = document.querySelectorAll(".roles li");
  let columns = document.querySelectorAll(".dropdown");
  console.log(columns);

  filterItems.forEach(function (item) {
    item.addEventListener("click", function () {
      let selectedValue = this.id;

      columns.forEach(function (column) {
        let role = column.children[2].textContent;
        console.log(column.children[2].textContent);

        if (selectedValue === "all" || role.toLowerCase() === selectedValue) {
          column.style.display = "block";
        } else {
          column.style.display = "none";
        }
      });
    });
  });
});
*/

/*change img and probaly lets include one url*/
let images = document.querySelectorAll(".myImage");

images.forEach(function (image) {
  image.addEventListener("click", function () {
    if (
      this.src.includes("hans4.png") ||
      this.src.includes("Souen4.png") ||
      this.src.includes("charmilia4.png")
    ) {
      this.src = "./assets/discorde.png";
    } else {
      let randomImage = getRandomImage();
      this.src = randomImage;
    }
  });
});

/*randomisation dimages*/
function getRandomImage() {
  let imageList = [
    "./assets/hans4.png",
    "./assets/Souen4.png",
    "./assets/charmilia4.png",
  ];
  let randmIndex = Math.floor(Math.random() * imageList.length);
  return imageList[randmIndex];
}

/*function de dropdown des avatars*/
function toggleDropdown(button) {
  let dropdownMenu = button.nextElementSibling;
  if (dropdownMenu.style.display === "none") {
    dropdownMenu.style.display = "block";
  } else {
    dropdownMenu.style.display = "none";
  }
}

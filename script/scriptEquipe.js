document.addEventListener('DOMContentLoaded', function() {
  let filterItems = document.querySelectorAll('.roles li');
  let columns = document.querySelectorAll('.col-2');

  filterItems.forEach(function(item) {
    item.addEventListener('click', function() {
      let selectedValue = this.id;

      columns.forEach(function(column) {
        let role = column.children[1].textContent;

        if (selectedValue === 'all' || role.toLowerCase() === selectedValue) {
          column.style.display = 'block'; 
        } else {
          column.style.display = 'none'; 
        }
      });
    });
  });
});


/*change img and probaly lets include one url*/ 
let images = document.querySelectorAll(".myImage");
images.forEach(function(image) {
    image.addEventListener("click", function() {
        if (this.src.includes("hans4.png")) {
            this.src = "./assets/discorde.png";
        } else {
            this.src = "./assets/hans4.png";
        }  
    });
});





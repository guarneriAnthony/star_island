let checkboxs = document.querySelectorAll(".form-check-input");

checkboxs.forEach((checkbox) => {
  checkbox.addEventListener("change", function () {
console.log(this.value);
    let petit = checkbox.parentNode.nextElementSibling
    
    if (checkbox.checked == true) {
        petit.classList.remove('d-none');  
    } else {
        petit.classList.add('d-none'); 
}  
  });
});

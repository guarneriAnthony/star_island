document.addEventListener('DOMContentLoaded', function() {
  var filterItems = document.querySelectorAll('.roles li');
  var columns = document.querySelectorAll('.col-2');

  filterItems.forEach(function(item) {
    item.addEventListener('click', function() {
      var selectedValue = this.id;

      columns.forEach(function(column) {
        var role = column.children[1].textContent;
        
        if (selectedValue === 'all' || role.toLowerCase() === selectedValue) {
          column.style.display = 'block'; // Affiche la colonne
        } else {
          column.style.display = 'none'; // Masque la colonne
        }
      });
    });
  });
});

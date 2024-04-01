const searchBar = document.getElementById('search_banks');
const table = document.getElementById('banklist');

searchBar.addEventListener('keyup', function(event) {
  const searchText = event.target.value.toLowerCase();
  const rows = table.getElementsByTagName('tr');
  
  Array.from(rows).forEach(function(row) {
    const cells = row.getElementsByTagName('td');
    let found = false;
    Array.from(cells).forEach(function(cell) {
      const cellText = cell.textContent.toLowerCase();
      if (cellText.indexOf(searchText) > -1) {
        found = true;
      }
    });
    if (found) {
      row.style.display = '';
    } else {
      row.style.display = 'none';
    }
  });
});

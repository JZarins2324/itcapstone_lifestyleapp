select = document.querySelector('select');

// Change Name of Input Fields
select.addEventListener('change', function () {
  if (select.options[select.selectedIndex].value === "task") {
    document.querySelector('#date').style.display = "block";
    document.querySelector('#date').required = true;
    document.querySelector('#dateLabel').style.display = "block";
  } else {
    document.querySelector('#date').style.display = "none";
    document.querySelector('#date').required = false;
    document.querySelector('#dateLabel').style.display = "none";
  }

  if (select.options[select.selectedIndex].value === "password") {
    document.querySelector('#lblName').innerHTML = "Password";
    document.querySelector('#lblDesc').innerHTML = "Account Info";
    document.querySelector('#name').placeholder = "Password";
    document.querySelector('#desc').placeholder = "Account Info...";
  } else {
    document.querySelector('#lblName').innerHTML = "Name";
    document.querySelector('#lblDesc').innerHTML = "Description";
    document.querySelector('#name').placeholder = "Name";
    document.querySelector('#desc').placeholder = "Description...";
  }
});
select = document.querySelector('select');

select.addEventListener('change', function () {
  if (select.options[select.selectedIndex].value === "task") {
    document.querySelector('#date').style.display = "block";
    document.querySelector('#dateLabel').style.display = "block";
  } else {
    document.querySelector('#date').style.display = "none";
    document.querySelector('#dateLabel').style.display = "none";
    // document.querySelector('#date').style.display = "none";
    // document.querySelector('#dateLabel').style.display = "none";
  }
});
$(function () {
  $('.dropdown-trigger').on('click', function () {
    // I know it looks weird but...
    // this.nextSibling returns #text not the <div> that needs to be toggled.
    // this.nextSibling.nextSibling returns the <div> that needs to be toggled.
    $(this.nextSibling.nextSibling).slideToggle();
  });

  // Start with dropdowns closed
  $('.dropdown').css('display', 'none');
});
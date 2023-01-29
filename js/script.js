$("a.delete-article").on('click', function(e) {
  e.preventDefault();

  if (confirm("Are you sure?")) {

    //? Create a form dynamically using jquery to pass post information to server delete-article directory
    var form = $('<form>');
    form.attr('method', 'post');
    //? get href attribute from button that was clicked
    form.attr('action', $(this).attr('href'));
    //? add form to HTML
    form.appendTo("body");
    form.submit();
  }
});
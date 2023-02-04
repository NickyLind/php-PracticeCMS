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
//? Custom validation method for checking if the published_at field is blank or a DateTime
$.validator.addMethod("dateTime", function(value, element) {
  return (value =="" || !isNaN(Date.parse(value)));
}, "Must be a valid date and time");

$("#formArticle").validate({
  rules: {
    title: {
      required: true,
    },
    content: {
      required: true,
    },
    published_at: {
      dateTime: true,
    }
  }
});

$('button.publish').each(function(e) {
  $(this).on('click', function(e) {
    var id = $(this).data("id");
    var button = $(this);

    $.ajax({
      url: '/admin/publish-article.php',
      type: 'POST',
      data: {
        id: id,
      }
    }).done(function(data) {
      button.parent().html(data);
    });
  });
});
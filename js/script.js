/**
 * Handle confirmation for deleting an article
 */
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

/**
 * Handle Validation of articles (new and editing)
 */
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

/**
 * handle ajax call for publishing an article using the current time, if the article has not been published
 */
$('button.publish').each(function(e) {
  $(this).on('click', function(e) {
    var id = $(this).data("id");
    var button = $(this);

    $.ajax({
      url: '/CMS/admin/publish-article.php',
      type: 'POST',
      data: {
        id: id,
      }
    }).done(function(data) {
      button.parent().html(data);
    }).fail(function(data) {
      alert('An Error occurred');
    });
  });
});

/**
 * Adds datetime picker to article published_at field
 */
$('#published_at').datetimepicker({
  format: 'Y-m-d H:i:s'
});

/**
 * Handle contact form validation
 */
$("#formContact").validate({
  rules: {
    email : {
      required: true,
      email: true
    },
    subject: {
      required: true,
    },
    message: {
      required: true,
    }
  }
});
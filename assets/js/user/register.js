document.title = 'Register - Teach Me';
$('[href="login.php"]').addClass('active');

function register(e) {
  e.preventDefault();

  const registerBtn = $(e.target).find('.register-btn');
  const resMsgContainer = $(e.target).find('.res-msg-container');

  $.ajax({
    url: $(e.target).attr('action'),
    type: $(e.target).attr('method'),
    data: $(e.target).serialize(),
    beforeSend: function() {
      registerBtn.attr('disabled', 'disabled');
      $(e.target).find('.alert').remove(); 
    },
    success: function(res) {
      console.log(res);
      location.href = res.redirectUrl;
    },
    error: function(err) {
      console.log(err);
      resMsgContainer.html(`<div class="alert alert-danger text-center" role="alert">${err.responseJSON.message}</div>`); 
    },
    complete: function() {
      registerBtn.removeAttr('disabled');
    }
  });
}
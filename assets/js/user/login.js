document.title = 'Login - Teach Me';
$('[href="login.php"]').addClass('active');

function login(e) {
  e.preventDefault();

  const loginBtn = $(e.target).find('.login-btn');
  const resMsgContainer = $(e.target).find('.res-msg-container');

  $.ajax({
    url: $(e.target).attr('action'),
    type: $(e.target).attr('method'),
    data: $(e.target).serialize(),
    beforeSend: function() {
      loginBtn.attr('disabled', 'disabled');
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
      loginBtn.removeAttr('disabled');
    }
  });
}
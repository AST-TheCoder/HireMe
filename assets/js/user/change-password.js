document.title = 'Change Password - Teach Me';
$('.navbar [href="edit-personal-info.php"]').addClass('active');
$('.profile-sidebar-col [href="change-password.php"]').addClass('text-primary border-3 border-start border-primary');

function changePassword(e) {
  e.preventDefault();

  const changePasswordBtn = $(e.target).find('.change-password-btn');
  const resMsgContainer = $(e.target).find('.res-msg-container');

  $.ajax({
    url: $(e.target).attr('action'),
    type: $(e.target).attr('method'),
    data: $(e.target).serialize(),
    beforeSend: function() {
      changePasswordBtn.attr('disabled', 'disabled');
      $(e.target).find('.alert').remove(); 
    },
    success: function(res) {
      console.log(res);
      resMsgContainer.html(`<div class="alert alert-success text-center" role="alert">${res.message}</div>`); 
    },
    error: function(err) {
      console.log(err);
      resMsgContainer.html(`<div class="alert alert-danger text-center" role="alert">${err.responseJSON.message}</div>`); 
    },
    complete: function() {
      changePasswordBtn.removeAttr('disabled');
    }
  });
}

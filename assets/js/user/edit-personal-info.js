document.title = 'Edit Personal Info - Teach Me';
$('.navbar [href="edit-personal-info.php"]').addClass('active');
$('.profile-sidebar-col [href="edit-personal-info.php"]').addClass('text-primary border-3 border-start border-primary');

function renderPersonalInfo(user) {
  $('.personal-info-col .user-fullname').text(`${user.firstName} ${user.lastName}`);
  $('.personal-info-col .user-username').text(`@${user.username}`);
  $('#first-name-inp').val(user.firstName);
  $('#last-name-inp').val(user.lastName);
  $('#username-inp').val(user.username);
  $('#email-inp').val(user.email);
  $('#phone-inp').val(user.phone);
  $('#description-inp').val(user.description);
}

function getPersonalInfo() {
  $.ajax({
    url: 'api/user/get-personal-info.php',
    type: 'GET',
    success: function(res) {
      console.log(res);
      renderPersonalInfo(res.user);
    },
    error: function(err) {
      console.log(err);
    }
  });
}

function editPersonalInfo(e) {
  e.preventDefault();

  const editPersonalInfoBtn = $(e.target).find('.edit-personal-info-btn');
  const resMsgContainer = $(e.target).find('.res-msg-container');

  $.ajax({
    url: $(e.target).attr('action'),
    type: $(e.target).attr('method'),
    data: $(e.target).serialize(),
    beforeSend: function() {
      editPersonalInfoBtn.attr('disabled', 'disabled');
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
      editPersonalInfoBtn.removeAttr('disabled');
    }
  });
}

getPersonalInfo();
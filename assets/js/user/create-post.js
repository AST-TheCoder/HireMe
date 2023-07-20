document.title = 'Post your problem - Teach Me';
$('[href*="posts.php"]').addClass('active');

function createPost(e) {
  e.preventDefault();

  const createPostBtn = $(e.target).find('.create-post-btn');
  const resMsgContainer = $(e.target).find('.res-msg-container');

  $.ajax({
    url: $(e.target).attr('action'),
    type: $(e.target).attr('method'),
    data: $(e.target).serialize(),
    beforeSend: function() {
      createPostBtn.attr('disabled', 'disabled');
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
      createPostBtn.removeAttr('disabled');
    }
  });
}

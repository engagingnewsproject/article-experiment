$(document).ready(function() {

    // track all link clicks
    $(document).on('click', 'a', function(e) {
         e.preventDefault();
         url = $(this).attr('href');
         linkText = $.trim($(this).text());
         linkText = linkText.replace(/\r?\n|\r/g, " ");
         // if there's multiple spaces, condense them
         linkText = linkText.replace(/\s\s\s/g, "");
         logClick('Link: '+ linkText, url);
         window.location.href = url;
    });

    function log(action, label, comment) {
        var xhr = new XMLHttpRequest();

        xhr.open('POST', '../../inc/class.log.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                // alert('Something went wrong.  Name is now ' + xhr.responseText);
                // xhr.send(encodeURI('log=' +logContent ));
            }
            else if (xhr.status !== 200) {
                alert('Request failed.  Returned status of ' + xhr.status);
            }
        };

        xhr.send(encodeURI('log=true&identifier='+studyType+'&user_id='+userID+'&action='+action+'&comment='+comment+'&label='+label+'&url='+encodeURIComponent(window.location.href)));
    }


    
    // label == what it is
    function logClick(label, comment) {
        var action = 'click';
        log(action, label, comment);
    }

    // capture page load
    log('Page View', pageTitle, 'Loaded');


    /////////////////
    /// Comments ///
    ////////////////

    $("#submit-comment").click(function(event) {
      var commenter_name = $("#commenter-name").val();
      var new_comment = $("#commenter-comment").val();
      var url = pageTitle;
      var label = userID;

      if (commenter_name.length > 0 && new_comment.length > 0 ) {
        submitComment(commenter_name, new_comment, label);
        // send to google
        ga('send', 'event','Comments', 'Add Comment', label);


      } else {
        submitCommentError();
        // var commenter_position = ".support";
        // send to google
        ga('send','event','Comments', 'Add Comment Error', label);

      }

      // var commenter_position = ".support";
      event.preventDefault();
    });


    function submitComment(name, comment, identifier, url) {
      $(".new-comment").replaceWith('<div class="alert alert-success">Thanks for your comment!</div>');

      log('Comment', 'Add Comment', name+ ': '+comment);
    }

    function submitCommentError() {
      $('.alert-error').remove();
      $(".new-comment").append("<div class='alert alert-error'>* Please enter your name and a comment.</div>");
      log('Comment', 'Add Comment', 'Add Comment Error');
    }
});

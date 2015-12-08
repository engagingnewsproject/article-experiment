$(document).ready(function() {

    // hide comments on page load
    if($('.comments-section').length) {
        $('.comments-section').hide();
    }

    $('.show-comments').click(function(e){
        e.preventDefault();
        $('.show-comments-wrap').remove();
        $('.comments-section').fadeIn();
        var label = $('#user-ip').attr('data-ip');
        // send to google
        ga('send','event','Comments', 'Show Comments', label);
    });

    $('.social-share__link--twitter').click(function(e){
        var action = $(this).attr('data-action');
        var label = $(this).attr('data-label');
        ga('send','event', 'Social', action, label);
    });

    $('.social-share__link--facebook').click(function(e){
        e.preventDefault();

        var label = $('#user-ip').attr('data-ip');
        var position = $(this).attr('data-position');
        var url = $(this).attr('data-url');

        // send the click event
        ga('send','event', 'Social', 'Facebook Share - '+position+' - Clicked', label);
        // open the dialog hopefully...
        FB.ui({
          method: 'share',
          href: url,
        }, function(response){
            if(response === undefined) {
                ga('send','event','Social', 'Facebook Share - '+position+' - Closed', label);
            } else {
                // success?
                ga('send','event','Social', 'Facebook Share - '+position+' - Shared', label);
                ga('send', 'social', 'Facebook', 'Share', url);

            }
        });
    });



});

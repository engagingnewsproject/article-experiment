<script>
    // try to get userID from localStorage
    var userID = localStorage.getItem('userID');
    // if not found, generate and store it
    if(userID === null) {
        userID = '<?php echo uniqid('trust_');?>';
        localStorage.setItem('userID', userID);
    }
    var pageTitle = '<?php 
    // In case the title has an apostrophe
    $title = str_replace("'", '', $article['title']);
    // Replace any spaces
    $title = str_replace(' ', '-', $title);
    echo $title;
    ?>';
</script>

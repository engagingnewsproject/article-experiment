<?php

// Everything ends up in one $article array to make it easier to dump everything and see what we're working with. Makes it easier to transition
// to a class or database in the future as well since things are more organized.
$article = array(
    'author' => getAuthor(),        // Defined at `inc/functions.php`
    'pubdate' => PUBDATE,           // Defined at `config.php`, set at `config.json`, rendered at `articles/includes/main.php`
    'title' => "Title",             // Rendered on `/articles/includes/generate-userID.php`, `/articles/includes/head.php` & `/articles/includes/main.php`
    'featuredImage' => '',          // TODO 
    'comments_display' => false,    // Rendered on `articles/includes/main.php`
    'anonymous' => false,           // Rendered on `articles/includes/main.php`
    'who_spoke_to' => false,        // Value must be an array. Rendered on `articles/includes/behind-the-story.php`
    'where_written' => false,       // Rendered on `articles/includes/behind-the-story.php`
    'editor' => false,              // Rendered on `articles/includes/behind-the-story.php`
    'corrections' => false,         // Rendered on `articles/includes/behind-the-story.php`
    'version_history' => false,     // Rendered on `articles/includes/behind-the-story.php`
    'content' => '<p>Samantha Ripple</p>',
    'comments' => array(            // `comments_display` must be set to `true`
        array(
            "user_id", 
            "comment_content"),
    )
);
?>

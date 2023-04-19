<?php

// Everything ends up in one $article array to make it easier to dump everything and see what we're working with. Makes it easier to transition
// to a class or database in the future as well since things are more organized.

$featuredImage = array(
    'caption' => 'New article caption',
    'src' => getDistURL().'/img/people-in-voting-booth.jpg',
);

$article = array(
    'author' => getAuthor(),
    'pubdate' => PUBDATE,
    'title' => 'New article title',
    'featuredImage' => $featuredImage,
    'content' => '<p>Sample content.</p>',
    'comments' => array(),
);
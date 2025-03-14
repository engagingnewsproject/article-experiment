<?php

// Everything ends up in one $article array to make it easier to dump everything and see what we're working with. Makes it easier to transition
// to a class or database in the future as well since things are more organized.
$article = array(
    'author' => getAuthor(),        // Defined at `inc/functions.php`
    'pubdate' => PUBDATE,           // Defined at `config.php`, set at `config.json`, rendered at `articles/includes/main.php`
    'title' => "US Products That Could Get More Expensive After Trump's Tariffs",             // Rendered on `/articles/includes/generate-userID.php`, `/articles/includes/head.php` & `/articles/includes/main.php`
    'featuredImage' => '',          // TODO 
    'comments_display' => false,    // Rendered on `articles/includes/main.php`
    'anonymous' => false,           // Rendered on `articles/includes/main.php`
    'who_spoke_to' => false,        // Value must be an array. Rendered on `articles/includes/behind-the-story.php`
    'where_written' => false,       // Rendered on `articles/includes/behind-the-story.php`
    'editor' => false,              // Rendered on `articles/includes/behind-the-story.php`
    'corrections' => false,         // Rendered on `articles/includes/behind-the-story.php`
    'version_history' => false,     // Rendered on `articles/includes/behind-the-story.php`
    'content' => "
		<p class='author__job' style='margin-bottom: 1rem;'>Published Mar 04, 2025 at 5:23 AM EST | Updated Mar 04, 2025 at 12:06 PM EST</p>
		<img src='../../assets/img/Products-That-Could-Get-More-Expensive.png' alt='US Products That Could Get More Expensive After Trump\'s Tariffs' style='width: 100%; height: auto; margin-bottom: 1rem;border-radius: 0.5rem;'>
		<p>President <a href='https://www.newsweek.com/topic/donald-trump'>Donald Trump</a> <a href='https://www.newsweek.com/trump-announces-new-tariffs-before-congress-address-2038938'>is set to impose sweeping tariffs</a> on goods imported from Canada, Mexico and China on Tuesday, in a move that experts warned could end up <a href='https://www.newsweek.com/high-prices-troubling-donald-trump-stephen-moore-2038820'>driving up the cost of everyday goods in the U.S.</a> and weighing on American consumers.</p>
		<p>On Monday, Trump said there was \"no room left\" for a deal that would avoid or postpone the tariffs on Canada and Mexico. The president framed the tariffs as a response to the two countries allowing fentanyl to flow through their borders into the U.S. \"at very high and unacceptable levels,\" though he admitted that \"a large percentage\" of the drugs were made in China.</p>
		<h4 style='margin-bottom: 1rem;'>Tariffs Explained</h4>
		<p>The tariffs expected to come into effect on Tuesday will add a 25 percent fee on all products coming from Canada and Mexico, and an additional 10 percent on goods coming from China.</p>
		<p>China was already hit by a 10 percent tariff on February 4, to which the country retaliated by imposing its own tariffs on some U.S. products, including a 15 percent border tax on coal and liquefied natural gas products and 10 percent tariffs on crude oil, agricultural machinery and large-engine cars.</p>
		<p>Both Canada and China have promised to retaliate against the Trump administration's new tariffs, while Mexico expressed hope until Monday that a deal could be reached to avert the new fees. The tariffs are <a href='https://www.newsweek.com/warren-buffett-donald-trump-tariffs-2038741'>widely expected to start tit-for-tat trade wars with some of the U.S.’ biggest trade partners</a>, with American consumers being caught in the crosshairs.</p>
		",
    'comments' => array(            // `comments_display` must be set to `true`
        array(
            "user_id", 
            "comment_content"),
    )
);
?>

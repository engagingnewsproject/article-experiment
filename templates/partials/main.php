<?php
    $author = $article['author'];
    $comments = $article['comments'];
?>
<main id="content" class="container" role="main">
    <article class="article">
        <header class="article__header">
            <h2 class="article__title"><?php echo $article['title'];?></h2>
            <p class="byline">Posted on <time pubdate="pubdate"><?php echo $article['pubdate'];?></time></p>
            <div class="article__extra-header-info">
                <div class="author">
                    <?php if(!empty($author['image']['src'])) { ?>
                    <img class="author__image" src="<?php echo $author['image']['src'];?>" alt="<?php echo $author['image']['alt'];?>" />
                    <?php } ?>
                    <p class="author__name">By <?php echo $author['name'];?></p>
                    <p class="author__job"><?php echo SITE_NAME;?> Staff Reporter</p>
                    <?php if(!empty($author['bio'])) {include('author-bio.php');}?>
                </div>

            </div>
        </header>

        <?php 
        
        echo $article['content'];


        if(defined('EXPLAIN_BOX')): ?>
          <section class="behind-the-story well">
          <h2 class="behind-the-story__title">Behind the Story</h2>

          <h3>Why we wrote it</h3>
          <?php echo EXPLAIN_BOX;?>

          <p>This story was researched, written, and published in accordance with The Gazette Star’s best practices.</p>

        </section>
        <?php endif;?>

        <?php

        include('comments.php');

        ?>

    </article>
</main>

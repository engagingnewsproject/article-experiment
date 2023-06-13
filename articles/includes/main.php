<?php
    $author = $article['author'];
    $comments = $article['comments'];
    $anonymous = $article['anonymous'];
?>
<main id="content" class="container" role="main">
    
    <article class="article">
        <header class="article__header">
            <h2 class="article__title"><?php echo $article['title'];?></h2>
            <div class="article__extra-header-info">
                <div class="author">
                    <p class="author__name">Staff Reports</p>
                    <p class="author__job">The Gazette-Star</p>
                </div>

            </div>
        </header>

    
    <?php if (EXPLAIN_BOX): ?>
      <div class="article-wrapped">

        <div class="article-text">
            <?php echo $article['content']; ?>
        </div>
        
        <div class="article-explanation"> 
          <?php 
            // EXPLAIN_BOX constant is a variation set in `config.json`
            include('behind-the-story.php');
          ?>
        </div>
      </div>

    <?php else: ?>

      <?php echo $article['content']; ?>

    <?php endif; ?>

        

    </article>

</main>
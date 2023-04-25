<main id="content" class="container" role="main">
    <article class="article">
        <header class="article__header">

            <h2 class="article__title"><?php echo $title;?></h2>
            <p class="byline">Posted on <time pubdate="pubdate"><?php echo $pubdate;?></time></p>
            <div class="article__extra-header-info">
                <div class="author">
                    <p class="author__name">By <?php echo $author;?></p>
                    <p class="author__job">The News Beat Staff Reporter</p>
                </div>

            </div>
        </header>
        <?php if (strlen($featured_img) > 1) { ?>
        <h6 style="font-size: .6em; text-align: right"><u><small><strong>Advertiser Content</strong></small></u></h6>
            <a href = "#"><img src="<?php echo $featured_img;?>" alt="Sponsered advertisement"></a>
        <?php } ?>
        <hr />

        <?php echo $article;

        if ($article_stance = 'explanation') {

          include('behind-the-story.php');
        }?>

      

      <!-- Commenting out Levi's beautiful buttons for now
        <a href="javascript:void(0);">
            <button class="like-button custom-button">
                <i class="fas fa-thumbs-up"></i>

                Like
            </button>
        </a>

        <a href="javascript:void(0);">
            <button class="share-button custom-button">
                <i class="fas fa-share"></i>

                Share
            </button>
        </a

      -->

    </article>


</main>

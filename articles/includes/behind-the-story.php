<section class="behind-the-story well">
    <h2 class="behind-the-story__title">Behind the Story</h2>
    
    <?php if( EXPLAIN_BOX ) : // EXPLAIN_BOX constant is a variation set in `config.json`, included in `articles/includes/main.php` ?>
        <h3>Why we wrote it</h3>
        <?php echo EXPLAIN_BOX;?>
    <?php endif; ?>
    
    <?php if(!empty($article['who_spoke_to'])) : ?>
        <h3>Who we spoke to</h3>
        <ul>
            <?php foreach($article['who_spoke_to'] as $who) {
                echo "<li>$who</li>";
            }?>
        </ul>
    <?php endif; ?>
    
    <?php if(!empty($article['where_written'])) : ?>
        <h3>Where this story was written</h3>
        <p><?php echo $article['where_written'];?></p>
    <?php endif; ?>
    
    <?php if(!empty($article['editor'])) : ?>
        <h3>Who edited this story</h3>
        <p><?php echo $article['editor'];?></p>
    <?php endif; ?>
    
    <?php if(!empty($article['corrections'])) : ?>
        <h3>Corrections</h3>
        <p><?php echo $article['corrections'];?></p>
    <?php endif; ?>
    
    <?php if(!empty($article['version_history'])) : ?>
        <h3>Version History</h3>
        <p><?php echo $article['version_history'];?></p>
    <?php endif; ?>
    
    <p>This story was researched, written, and published in accordance with The Gazette Star'sbest practices.</p>

</section>

<section class="comments-section">
    <div class="new-comment">
      <h3 class="add-comment-title">Comments</h3>
      <?php for ($i = 0; $i < count($comments); $i++) { ?>
          <div class="comment">
            <p class="comment-name"><?php echo "{$comments[$i][0]}" ?></p>
            <p class="comment-info"><?php echo "{$comments[$i][1]}" ?></p>
            <div class="comment-footer">
              <?php echo "$thumbs_up" ?>
              <?php echo "$thumbs_down" ?>
              <p class="toggle">Reply</p>
            </div>
            <?php if($anonymous): ?>
                <?php echo '<div id="' , $i , '" class="comment-reply hidden anonymous">' ?>
            <?php else: ?>
                <?php echo '<div id="' , $i , '" class="comment-reply hidden">' ?>
            <?php endif; ?>
              <form class="add-comment-response">
                <?php if($anonymous): ?>
                  <h6 class="small-comment-text">This is an anonymous website. A user ID for your comment will be randomly generated.</h6>
                <?php else: ?>
                  <label for="commenter-name">Name</label>
                  <input type="text" class="form-control" name="commenter-name" id="commenter-name" placeholder="Enter Full Name" value="" >
                  <label for="commenter-name">Email</label>
                  <input type="text" class="form-control" name="commenter-email" id="commenter-email" placeholder="Enter Email" value="" >
                <?php endif; ?>
                  <label for="commenter-comment">Comment</label>

                  <textarea class="form-control" rows="3" name="commenter-comment" id="commenter-comment" placeholder="Enter Comment"></textarea>

                  <input type="hidden" id="comment-identifier" name="comment-identifier" value="<?php echo $identifier;?>" />
                  <input id="submit-comment" type="button" class="btn btn-submit" value="Submit">
              </form>
            </div>
          </div>
      <?php } ?>
        <h3 class="add-comment-title">Leave a Comment</h3>

        <div id="#comment-form" class="add-comment">
          <?php if($anonymous): ?>
            <h6 class="small-comment-text">This is an anonymous website. A user ID for your comment will be randomly generated.</h6>
          <?php else: ?>
            <label for="commenter-name">Name</label>
            <input type="text" class="form-control" name="commenter-name" id="commenter-name" placeholder="Enter Full Name" >
            <label for="commenter-name">Email</label>
            <input type="text" class="form-control" name="commenter-email" id="commenter-email" placeholder="Enter Email">
          <?php endif; ?>
            <label for="commenter-comment">Comment</label>

            <textarea class="form-control" rows="3" name="commenter-comment" id="commenter-comment" placeholder="Enter Comment"></textarea>

            <input type="hidden" id="comment-identifier" name="comment-identifier" value="<?php echo $identifier;?>" />
            <button id="submit-comment" class="btn btn-submit">Submit</button>
        </div>
    </div>
</section>

<?php
  // Here, we include the popup script if the current page matches a certain condition.
  include('popup.php');
?>

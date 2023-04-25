<?php if(!$anonymous): ?>
  <div class="popup popup--dim"></div>
  <div class="popup popup--wrapper">
    <div class="popup--content">
        <p>Please include your email address and full name.</p>
        <p>Commenting with a name is required, and your name will be visible to others when you comment.</p>
        <h6>If you are having issues submitting your comment, please make sure that you are entering a valid email address and your FULL name.</h6>
        <button class="btn btn-submit submit" onclick="togglePopup()">Accept</button>
      <script>

        // checks to make sure the user has input a valid email format
        function validEmail(email){
          var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          return re.test(email);
        }

        // Checks to make sure the user has input a name consisting of more than one word
        function validName(name){
          return name.split(' ').length > 1;
        }

        // Hides/shows popup based on its current state
        function togglePopup(){
          elems = document.querySelectorAll(".popup");
          for(let i = 0; i < elems.length; i++)
            elems[i].style.display = elems[i].style.display === "none" ? "block" : "none";
        }

        // We hide the popup on the inital load
        (function(){
          elems = document.querySelectorAll(".popup");
          for(let i = 0; i < elems.length; i++)
            elems[i].style.display = "none";
        })() // This is an immediately invoking expression, which should be safe because this script loads after the DOM
      </script>
    </div>
  </div>
<?php endif; ?>

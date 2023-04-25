<!DOCTYPE html>
<html>
<head>
    <?php
        $user_ip = getIPAddress();
        $current_url = getCurrentUrl();
    ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $article['title'];?> | <?php echo SITE_NAME;?></title>

    <?php $current_url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>
    <meta property="og:site_name" content="<?php echo SITE_NAME;?>"/>
    <meta property="og:title" content="<?php echo $article['title'];?>"/>
    <meta property="og:image" content="<?php echo $article['featuredImage']['src'];?>"/>
    <meta property="og:url" content="<?php echo $current_url;?>"/>
    <meta property="og:description" content="<?php echo strip_tags(substr($article['content'],0,240))?>&hellip;" />

    <link rel="stylesheet" href="<?php echo getDistURL();?>/css/styles.min.css" />
    <!-- Typekit Fonts -->
    <script src="https://use.typekit.net/rca2zto.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>

    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
    <![endif]-->

    <script>
        var studyType = '<?php echo IDENTIFIER;?>';
    </script>

</head>

<body>

  <div id="user-ip" class="hidden" data-ip="<?php echo $user_ip;?>"></div>
  <div class="screen-reader-text" style="position: absolute; width: 0; height: 0;">
      <?php include('../../dist/svg/svg.svg');?>
  </div>

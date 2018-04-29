<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
  if (isset($this->nofollow)) {?>
    <meta name="robots" content="noindex, nofollow">
  <?php }?>
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title><?php echo $this->pagetitle; ?></title>
  <link rel="shortcut icon" href="<?php echo URL . URL_IMAGE; ?>favicons.png" type="image/x-icon">
  <!-- Bootstrap -->
  <link href="<?php echo URL . URL_CSS; ?>bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo URL . URL_CSS; ?>bootstrap-rtl.min.css" rel="stylesheet">
  <link href="<?php echo URL . URL_CSS; ?>style.css" rel="stylesheet">
  <?php
  if (isset($this->css)) {
    foreach ($this->css as $css) {
      echo "<link href='<?php echo URL . URL_CSS;$css ?>' rel='stylesheet'>";
    }
  }
  ?>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
  <h1><?php echo SITE_NAME; ?></h1>
  <br/>
  <ul>
    <li><a href="<?php echo URL ?>"><?php echo First_Page; ?></a></li>
    <li><a href="<?php echo URL ?>products"><?php echo Products; ?></a></li>
    <li><a href="<?php echo URL ?>cart"><?php echo Cart; ?></a></li>
    <?php
    $isLogin = Session::get('loggedIn');
    if($isLogin){
      ?>
      <li><a href="<?php echo URL ?>login/end"><?php echo Logout; ?></a></li>
      <?php
    }else {
      ?>
      <li><a href="<?php echo URL ?>login"><?php echo Login; ?></a></li>
      <?php
    }
    ?>
  </ul>
  <div class="container">

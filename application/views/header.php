<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cbm cost management</title>
    <link href="<?php echo $base; ?>/themes/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base; ?>/themes/css/style.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="<?php echo $base; ?>/themes/js/html5shiv.min.js"></script>
      <script src="<?php echo $base; ?>/themes/js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="<?php echo $base; ?>/themes/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="<?php echo $base; ?>/themes/js/handlebars-1.0.rc.1.js"></script>
    <script type="text/javascript" src="<?php echo $base; ?>/themes/js/simplePagingGrid-0.6.0.0.js"></script>
    <script type="text/javascript" src="<?php echo "$base/themes/js/"?>jquery.fancybox.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo "$base/themes/css/"?>jquery.fancybox.css?v=2.1.5" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo "$base/themes/css/"?>bootstrap-datetimepicker.css" media="screen" />
    <link rel="stylesheet" href="<?php echo "$base/themes/css/"?>jquery-ui.css">
    <script src="<?php echo "$base/themes/js/"?>jquery-ui.js"></script>
    <script src="<?php echo "$base/themes/js/"?>excelexport.js"></script>
  </head>
  
<body>
    <?php if(isset($login_userid)) : ?>
    <div id="wrapper">
        <header>
            <div class="navbar navbar-fixed-top">
              <div class="navbar-inner">
                <div class="container-fluid">
                  <a class="brand" href="<?php echo $base; ?>">cbm cost management</a>
                  <a class="brand" style="float:right;" href="<?php echo $base; ?>/login/logout">Logout</a>
                </div>
              </div>
            </div>
        </header>
  <div class="row-fluid">
    <div class="span2">
        <ul class="nav nav-pills nav-stacked">
            <li <?php if($current_menu == 'refcreation') : ?> class="active" <?php endif; ?>><a href="<?php echo $base; ?>/refcreation">Ref Creation</a></li>
            <li <?php if($current_menu == 'modelcreation') : ?> class="active" <?php endif; ?>><a href="<?php echo $base; ?>/modelcreation">Model Creation</a></li>
            <li <?php if($current_menu == 'cbm') : ?> class="active" <?php endif; ?>><a href="<?php echo $base; ?>/cbm">CBM</a></li>
            <li <?php if($current_menu == 'cost') : ?> class="active" <?php endif; ?>><a href="<?php echo $base; ?>/cost">Cost</a></li>
            <li <?php if($current_menu == 'reports') : ?> class="active" <?php endif; ?>><a href="<?php echo $base; ?>/reports">Reports</a></li>
        </ul>
    </div>
    <div class="span10">
<?php endif; ?>
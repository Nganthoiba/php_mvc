<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title><?=Config::get('site_name')?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <!--<link rel="shortcut icon" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/favicon.ico" />-->
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
        <link href="<?=Config::get('host')?>/root/MDB/css/font_awesome_4.7.0/css/font-awesome.css" 
              rel="stylesheet" type="text/css"/>
        <!-- Bootstrap core CSS -->
        <link href="<?=Config::get('host')?>/root/MDB/css/bootstrap.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="<?=Config::get('host')?>/root/MDB/css/mdb.css" rel="stylesheet">
        <link href="<?=Config::get('host')?>/root/MDB/css/style.css" rel="stylesheet">
        <!-- JQuery -->
        <script type="text/javascript" src="<?=Config::get('host')?>/root/MDB/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="<?=Config::get('host')?>/root/MDB/js/custom.js"></script>
    </head>
    <body>
        <?php include_once('navigation_bar.view.php'); ?>
        
        <div class="container-fluid" style="margin-top: 70px"><?= $data['content'] ?></div>
        
        <?php //include_once('footer.view.php'); ?>
        <!-- SCRIPTS -->
        
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="<?=Config::get('host')?>/root/MDB/js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="<?=Config::get('host')?>/root/MDB/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="<?=Config::get('host')?>/root/MDB/js/mdb.js"></script>
    </body>
</html>

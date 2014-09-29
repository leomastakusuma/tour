<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of view
 *
 * @author leomasta
 */
function views($title,$body,$foter){
    ?>
<html>
    <head>
        <title><?php echo $title ?></title>
        <link href="<?php echo URL; ?>public/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.min.css"> -->
		<script type="text/javascript" src="<?php echo URL;?>public/bower_components/jquery/dist/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo URL;?>public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	
    </head>
    <body>
        <?php echo $body?>
        <form class="form-inline" role="form">
  <div class="form-group has-success has-feedback">
    <label class="control-label" for="inputSuccess4">Input with success</label>
    <input type="text" class="form-control" id="inputSuccess4">
    <span class="glyphicon glyphicon-ok form-control-feedback"></span>
  </div>
</form>
        
        <?php echo $foter?>
    </body>
        
</html>
    <?php
    
}
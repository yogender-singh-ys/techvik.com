<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		
		<?php echo $this->Html->css('material.indigo-deep_purple.min'); ?>
		<?php echo $this->Html->script('material.min'); ?>
		<?php echo $this->Html->script('jquery'); ?>
        
        <?php echo $this->Html->css('home'); ?>
        <style>
		.previous_btn_disable{
			color: #ccc !important;
			cursor: text;
		}
		</style>
		<script>
			$( document ).ready(function() {
			  
			   if($('main').height() < $(window).height() ){
			   	 $('.page-content').css({'min-height': ($(window).height()-$('footer').height())+'px'});
			   }
			});
		</script>
    </head>

    <body>
      
      <!-- Always shows a header, even in smaller screens. -->
		<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
		  
		  <?= $this->element('header') ?>
		  
		  <main class="mdl-layout__content">
		    
		  <?= $this->fetch('content'); ?>
		  <?= $this->element('footer') ?>
		   
		  </main>
		  
		</div>
		


  
      
    
      
    </body>
  </html>

<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		
		<?php echo $this->Html->css('material.indigo-deep_purple.min'); ?>
		<?php echo $this->Html->script('material.min'); ?>
        
        <?php echo $this->Html->css('home'); ?>
    </head>

    <body>
      
      <!-- Always shows a header, even in smaller screens. -->
		<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
		  
		  <?= $this->element('header') ?>
		  
		  <?php 
		     $images = array("1"=>'article__4c4631afb.jpg',"2"=>'article__4c6f65aff.jpg',"3"=>'article__7c3ad30d7.jpg',
		                     "4"=>'article__067b96033.jpg',"5"=>'article__348a25bc5.jpg',"6"=>'article__bba31ce6c.jpg',
		                     "7"=>'article__4c4631afb.jpg',"8"=>'article__4c6f65aff.jpg',"9"=>'article__7c3ad30d7.jpg',
		                     "10"=>'article__067b96033.jpg',"11"=>'article__348a25bc5.jpg',"12"=>'article__bba31ce6c.jpg');
		  
		  ?>
		  
		  <main class="mdl-layout__content">
		    <div class="page-content">
		    	<div class="mdl-grid portfolio-max-width">
		    	
				  <?php for ($i = 1; $i <= 12; $i++){ ?>
				   <div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
                    <div class="mdl-card__media">
                        <?php echo $this->Html->image('articles/'.$images[$i],array("class"=>"article-image","border"=>"0","alt"=>"")); ?>
                    </div>
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Blog template</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        Enim labore aliqua consequat ut quis ad occaecat aliquip incididunt. Sunt nulla eu enim irure enim nostrud aliqua consectetur ad consectetur sunt ullamco officia. Ex officia laborum et consequat duis.
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="portfolio-example01.html">Read more</a>
                    </div>
                   </div>
				  <?php } ?>
				  
				  
				</div>
		    </div>
		    
		  <?= $this->element('footer') ?>
		   
		  </main>
		  
		</div>
		


  
      
    <?php //echo $this->fetch('content'); ?>
      
    </body>
  </html>

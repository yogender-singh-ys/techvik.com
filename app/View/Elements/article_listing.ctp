
<div class="page-content">
        <div class="mdl-grid portfolio-max-width" style="text-align: center" >
	        <?php if(!empty($categoryData)){ ?>
	        <h3><?php echo $categoryData['Category']['name']; ?></h3>
	        <?php } ?>
        </div>
       
    	<div class="mdl-grid portfolio-max-width">
    	 <?php if(count($articles)>0){ ?>
			  <?php foreach($articles as $article){ ?>
			   <div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
	            <div class="mdl-card__media">
	                <?php if(empty($article["Images"][0]["path"])){ ?>
	                  <?= $this->Html->image('articles/no_available_image.gif',array("class"=>"article-image","border"=>"0","alt"=>"")); ?>
	                <?php }else{ ?>
	                  <?= $this->Html->image('articles/'.$article["Images"][0]["path"],array("class"=>"article-image","border"=>"0","alt"=>"")); ?>
	                <?php } ?>  
	            </div>
	            <div class="mdl-card__title">
	                <h2 class="mdl-card__title-text"><?=$article["Article"]["headline"]?></h2>
	            </div>
	            <div class="mdl-card__supporting-text">
	                <?=$article["Article"]["subheadline"]?>
	            </div>
	            <div class="mdl-card__actions mdl-card--border">
	                <?php echo $this->Html->link("Read more...",array('controller' => 'articles','action' => 'index',$article['Article']['alias'],'admin' => false,'ext' => 'html'),array('class'=>'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent')); ?>
	            </div>
	           </div>
			  <?php } ?>
		 <?php }else{ ?>
		    <div style="min-height: 600px;">
		    <h4>No Articles.</h4>
		    </div>
		 <?php } ?>
		</div>
		
		<div class="mdl-grid portfolio-max-width" style="text-align: center" >
			
			<div style="margin: 0 auto;">
			    <?php 
			        echo $this->Paginator->prev(' Previous ',
											  array('tag' => false,'class'=>'mdl-button mdl-js-button mdl-button--raised  mdl-button--colored'),
											  null,
											  array('class' => 'mdl-button mdl-js-button mdl-button--raised previous_btn_disable')
											);
			
			     ?>
			
			  &nbsp;
			  <?php 
			        echo $this->Paginator->next(' Next ',
											  array('tag' => false,'class'=>'mdl-button mdl-js-button mdl-button--raised  mdl-button--colored'),
											  null,
											  array('class' => 'mdl-button mdl-js-button mdl-button--raised previous_btn_disable')
											);
			
			   ?>
		 </div>  
			
       </div> 
		
		
		
</div>
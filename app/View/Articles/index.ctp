<style>
.mdl-layout__content{
   background-color: #f1f1f1;
}
</style>
<div class="page-content">

        <div class="mdl-grid portfolio-max-width" style="padding-top: 50px"  >
        
            
			   <div class="mdl-shadow--2dp article_container">
				    <div class="typo-styles__demo mdl-typography--display-2 title title"><?=$articleData['Article']['headline']?></div>
				    <div class="subheadline"><?=$articleData['Article']['subheadline']?></div>
				</div>
				
				<div class="mdl-grid">
				 <?php foreach($articleData['Images'] as $images){ ?>
				   <div class="demo-card-wide mdl-card mdl-shadow--2dp">
					  <div class="mdl-card__media">
					    <?= $this->Html->image('articles/'.$images['path']); ?>
					  </div>
					</div>
			     <?php } ?>		
				</div>
				
				<div class="mdl-shadow--2dp article_container">
				   <div class="content"><?=$articleData['Article']['content']?></div>
				</div>
			
        </div>
        
        <?php  echo '<pre>'; print_r($articleData); echo '</pre>'; ?>
      
</div>

<header class="mdl-layout__header">
<div class="mdl-layout__header-row">
  <!-- Title -->
  <span class="mdl-layout-title">
  <?php echo $this->Html->link('TechVik',array('controller' => 'pages','action' => 'index','admin' => false),array('escape' => false,'style'=>'text-decoration:none;  color: #fff')); ?>
  </span>
  <!-- Add spacer, to align navigation to the right -->
  <div class="mdl-layout-spacer"></div>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
      mdl-textfield--floating-label mdl-textfield--align-right">
    <label class="mdl-button mdl-js-button mdl-button--icon"
           for="fixed-header-drawer-exp">
      <i class="material-icons">search</i>
    </label>
    <div class="mdl-textfield__expandable-holder">
      <input class="mdl-textfield__input" type="text" name="sample"
             id="fixed-header-drawer-exp">
    </div>
  </div>
</div>
</header>
<div class="mdl-layout__drawer">
<span class="mdl-layout-title">TechVik</span>
<nav class="mdl-navigation" style="border-top: 1px solid #ccc" >

  <?php foreach($categories as $category){ ?>
   <div style="border-bottom: 1px solid #ccc">
     <?php echo $this->Html->link($category['Category']['name'],array('controller' => 'articles','action' => 'delete/'.$article['Article']['id'],'admin' => true),array('class'=>'mdl-navigation__link')); ?>
	 <?php foreach($category['Categories'] as $c ){ ?>
	    <?php echo $this->Html->link('→ '.$c['name'],array('controller' => 'articles','action' => 'delete/'.$article['Article']['id'],'admin' => true),array('class'=>'mdl-navigation__link','style'=>'font-size: 12px;')); ?>
	 <?php } ?>	
   </div>	 							
  <?php } ?>
  
</nav>
</div>
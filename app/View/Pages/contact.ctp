



<div class="page-content">

        <section class="contact_bg">
        	<div class="mdl-grid portfolio-max-width border-colored" style="text-align: left" >
			     <h2 class=" contact_title">We'd love to hear from you.</h2>
			     <p class="contact_subtitle">Have a question, an idea, or an example ?<br> Let us know. The TeckVik team wants to hear it.</p>
		   </div>
        </section>
		
        <div class="mdl-grid portfolio-max-width" style="padding-top: 50px"  >
        
            
			  <div class="mdl-cell mdl-cell--6-col">
			  
			    <?php echo $this->Flash->render() ?>
			     
			    <?php echo $this->Form->create('Query', array('url' => array('controller' => 'pages', 'action' => 'contact','admin'=>false))); ?>
			     
			  	  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				    <?php echo $this->Form->input('name', array('type' => 'text',"label"=>false,"div"=>false,"class"=>"mdl-textfield__input"));  ?>
				    <label class="mdl-textfield__label" for="sample3">Enter your Name</label>
				  </div>
				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				    <?php echo $this->Form->input('email', array('type' => 'text',"label"=>false,"div"=>false,"class"=>"mdl-textfield__input"));  ?>
				    <label class="mdl-textfield__label" for="sample3">Email Id</label>
				  </div>
				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				    <?php echo $this->Form->input('query', array('type' => 'textarea',"label"=>false,"div"=>false,"class"=>"mdl-textfield__input"));  ?>
                    <label class="mdl-textfield__label" for="sample5">Text lines...</label>
				  </div>
				  <div class="" style="padding-top:30px;">
				    <?php echo $this->Form->input('SEND', array('type' => 'submit',"label"=>false,"div"=>false,"class"=>"mdl-button mdl-js-button mdl-button--raised mdl-button--colored"));  ?>
				  </div>
				 
				 <?php echo $this->Form->end(); ?>  
             </div>
             
             <div class="mdl-cell mdl-cell--4-col">
			   <?php echo $this->Html->image('plane.png',array("style"=>'width: 100%'));?>
			 </div>
			
        </div>
      
</div>
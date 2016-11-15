<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<?php echo $this->Html->script('ckeditor/ckeditor'); ?>
<script>
	$( document ).ready(function() {
       CKEDITOR.replace( 'CKeditor' );
    });
</script>
<div class="content-box-large" style="margin: 0px;" >
	
	<p style="padding-bottom:  10px;" ><?php echo $this->Html->link('Back',array('controller' => 'pages','action' => 'list','admin' => true),array('class'=>'btn btn-info')); ?></p>

	<div class="row">
	   <div class="col-md-12">
	  	   <!-- Information Section starts-->
	  	    <div class="content-box-large">
			  	<div class="panel-body">
			  	
			  	        <div class="form-group">
						    <label  class="col-sm-12 control-label"><h4>Edit Page : <?= $this->request->data['Page']['name']?> </h4></label>
					    </div>
			  	       
			  	        <div class="form-group">
						    <label  class="col-sm-12 control-label"><?php echo $this->Flash->render() ?></label>
					    </div>
			  				
			  		   <?php echo $this->Form->create('Page', array('url' => array('action' => 'pages', 'action' => 'editpage','admin'=>true),"class"=>"'form-horizontal","role"=>"form")); ?>
			  		      
			  		      <?php echo $this->Form->hidden('id') ?>
			  		      
			  		    
						  &nbsp;
						  <div class="form-group">
						    <label  class="col-sm-3 control-label">content<span style="color:red">*</span></label>
						    <div class="col-sm-9">
						      <?php echo $this->Form->input('content', array('type' => 'textarea',"label"=>false,"div"=>false,'id'=>'CKeditor',"class"=>"form-control"));  ?>
						    </div>
						  </div>
						
						  
						  &nbsp;
						  <div class="form-group">
						    <label  class="col-sm-3 control-label"></label>
						    <div class="col-sm-9">
						      <?php echo $this->Form->submit('Add', array("label"=>false,"div"=>false,"class"=>"btn btn-info"));  ?>
						    </div>
						  </div>	
						  
						  
						  				 
								  
						<?php echo $this->Form->end(); ?>  
								
								
			  	</div>
			</div>
           <!-- Information Section ends-->
            
        

		   
		  
		   
		   
	  	</div>			
	</div>
  			
</div>


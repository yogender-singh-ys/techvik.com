<div class="content-box-large" style="margin: 0px;" >
	<h3 style="padding-bottom:  10px;">Manage Pages</h3>
	<p style="padding-bottom:  10px;" ></p>
	
	

	<div class="content-box-large" style="margin-bottom: 0px;" >
	            <label  class="col-sm-12 control-label"><?php echo $this->Flash->render() ?></label>
  				<div class="panel-body">
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr>
								
								<th>Name</th>
								<th>Content</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
						  <?php if(count($pages)>0){?>
						    <?php foreach($pages as $page ){ ?>
							   <tr class="odd gradeX">
								<td><h5><?php echo $page['Page']['name'] ?></td>
								<td><?php echo $page['Page']['content'] ?></td>
								<td>
									<?php echo $this->Html->link('Edit',array('controller' => 'pages','action' => 'editpage/'.$page['Page']['id'],'admin' => true),array('class'=>'btn btn-warning')); ?>
									
								</td> 
							   </tr>
							<?php } ?>
						  <?php }else{ ?>
						        <tr >
								  <td colspan="5">No pages:-)</td>
								</tr>
						  <?php } ?>
						</tbody>
					</table>
  				</div>
  			</div>
  			
</div>
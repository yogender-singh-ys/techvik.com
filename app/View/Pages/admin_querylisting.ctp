<div class="content-box-large" style="margin: 0px;" >
	<h3 style="padding-bottom:  10px;">Manage Queries</h3>
	<p style="padding-bottom:  10px;" ></p>
	
	

	<div class="content-box-large" style="margin-bottom: 0px;" >
	            <label  class="col-sm-12 control-label"><?php echo $this->Flash->render() ?></label>
  				<div class="panel-body">
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr>
								
								<th>Name</th>
								<th>Email Id</th>
								<th>Content</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
						  <?php if(count($queries)>0){?>
						    <?php foreach($queries as $query ){ ?>
							   <tr class="odd gradeX">
								<td><h5><?php echo $query['Query']['name'] ?></td>
								<td><?php echo $query['Query']['email'] ?></td>
								<td><?php echo $query['Query']['query'] ?></td>
								<td>
									<?php echo $this->Html->link('Delete',array('controller' => 'pages','action' => 'deletequery/'.$query['Query']['id'],'admin' => true),array('class'=>'btn btn-danger')); ?>
									
								</td> 
							   </tr>
							<?php } ?>
						  <?php }else{ ?>
						        <tr >
								  <td colspan="5">No queries:-)</td>
								</tr>
						  <?php } ?>
						</tbody>
					</table>
  				</div>
  			</div>
  			
</div>
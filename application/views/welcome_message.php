<?php include_once('header.php'); ?>	

		<div class="container">
			<h3>All User</h3>
			

		<div class="alert alert-dismissible alert-success">
  		<button type="button" class="close" data-dismiss="alert">&times;</button>
  		<strong>
  				<?php if($msg = $this->session->flashdata('msg')): ?>
				<?php echo $msg ;?>
				<?php endif; ?>
  		</strong>  <a href="#" class="alert-link"></a>.
		</div>

			<?php echo anchor('Welcome/create', 'Add Post',['class'=>'btn btn-primary']); ?>
			<table class="table table-striped table-hover ">
			  <thead>
			    <tr>
			      <th>Login</th>
			      <th>password</th>
			      <th>Type user</th>
			      <th>access</th>
			       <th>Action</th>
			    </tr>
			  </thead> 
			  <tbody>
			  <?php if (count($posts)):?>
			  	<?php foreach($posts as $post):?>	
				    <tr>
				      <td><?php echo $post->login; ?></td>
				      <td><?php echo $post->password; ?></td>
				      <td><?php echo $post->type_user; ?></td>
				      <td><?php echo $post->access; ?></td>
				      	<td>
				      		<?php echo anchor('Welcome/view', 'view',['class'=>'btn btn-primary']); ?>
				      		<?php echo anchor('Welcome/update', 'update',['class'=>'btn btn-success']); ?>
				      		<?php echo anchor('Welcome/delete', 'delete',['class'=>'btn btn-danger ']); ?>
				      	</td>
				    </tr>
			    <?php endforeach;?>
			    <?php else: ?>
			    	<tr>
			    		<td>Aucune donnees enregistrees</td>
			    	</tr>
			<?php endif; ?>
			</tbody>
			</table> 
		</div>

<?php include_once('footer.php'); ?>		
	 
	
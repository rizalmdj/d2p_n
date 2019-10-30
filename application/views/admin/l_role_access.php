<div class="clearfix">
<div class="row">
  <div class="col-lg-12">
  	<div class="row">
	<a href="<?php echo base_URL(); ?>index.php/m_role_access/add_role_access" class="btn btn-warning "><i class="icon-plus icon-white"> </i> Add New Role Access</a>
	<dir></dir>
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">ROLE ACCESS</a>
			</div>
		<div class="navbar-collapse collapse navbar-inverse-collapse" style="margin-right: -20px">
			<ul class="nav navbar-nav navbar-right">
				<form class="navbar-form navbar-left" method="post">
					<input type="text" class="form-control" name="q" style="width: 200px" placeholder=" Keyword . . . .">
					<button type="submit" class="btn btn-success"><i class="icon-search icon-white"> </i> Search</button>
				</form>
			</ul>
		</div><!-- /.nav-collapse -->
		</div><!-- /.container -->
	</div><!-- /.navbar -->

  </div>
</div>

<?php echo $this->session->flashdata("k");?>
	
<!--	
<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <strong>Well done!</strong> You successfully read <a href="http://bootswatch.com/amelia/#" class="alert-link">this important alert message</a>.
</div>
	
<div class="alert alert-dismissable alert-danger">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <strong>Oh snap!</strong> <a href="http://bootswatch.com/amelia/#" class="alert-link">Change a few things up</a> and try submitting again.
</div>	
-->

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width="3%">NO</th>
			<th width="20%">ROLE ACCESS</th>
		    <th width="15%">OPTION</th>
		</tr>
	</thead>
	
	<tbody>
		<?php 
		if (empty($role_access)) {
			echo "<tr><td colspan='4'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
			$no 	= ($this->uri->segment(4) + 1);
			$i = 1;
			foreach ($role_access as $b) {
		?>
		<tr>

			<td><center><?php echo $i++; ?></center></td>
			<td><?php echo $b->role_access; ?></td>
						
			<?php 
			if ($this->session->userdata('admin_level') == "Super Admin") {
			?>
			<td class="ctr">
				<div class="btn-group">
					<a href="<?php echo base_URL(); ?>index.php/m_role_access/edit_role_access/<?php echo $b->id_role_access; ?>" 
					class="btn btn-info btn-sm"><i class="icon-edit icon-white"> </i> Edit</a>
				</div>					

				<div class="btn-group">
					<a href="<?php echo base_URL(); ?>index.php/m_role_access/delete_role_access/<?php echo $b->id_role_access; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete?')"><i class="icon-trash icon-white"></i> Delete</a> 
				</div>
			</td>
			<?php 

			} else {
				echo "<td class='ctr'> -- </td>";
			}
			?>
		</tr>
		<?php 
			$no++;
			}
		}
		?>
	</tbody>
</table>
<!-- <center><ul class="pagination"><?php echo $pagi; ?></ul></center> -->
</div>

<div class="clearfix">
<div class="row">
  <div class="col-lg-12">
  	<div class="row">
	<a href="<?php echo base_URL(); ?>index.php/m_data_user/add_master_user" class="btn btn-warning "><i class="icon-plus icon-white"> </i> Add New Master User</a>
	<dir></dir>
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">MASTER USER</a>
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
		<tr align="center">

			<th width="1%">NO</th>
			<th width="3%">USERNAME</th>
			<th width="3%">NAMA</th>
			<th width="5%">ID KARYAWAN</th>
			<th width="5%">EMAIL</th>
			<th width="8%">ROLE ACCESS</th>
			<th width="10%">DIVISI</th>
			<th width="10%">DEPARTMENT</th>
			<th width="3%">STATUS</th>
			<th width="10%">OPTION</th>
		</tr>
	</thead>
	
	<tbody>
		<?php 
		if (empty($datauser)) {
			echo "<tr><td colspan='4'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
			$no 	= ($this->uri->segment(3) + 1);
			$i = 1;
			foreach ($datauser as $b) {
		?>
		<tr align="center">

			<td><?php echo $i++; ?></td>
			<td><?php echo $b->username; ?></td>
			<td><?php echo $b->nama; ?></td>
			<td><?php echo $b->id_karyawan; ?></td>
			<td><?php echo $b->email; ?></td>			
			<td><?php echo $b->role_access; ?></td>
			<td><?php echo $b->nama_divisi; ?></td>
			<td><?php echo $b->nama_departemen; ?></td>
			<td><?php echo $b->status; ?></td>
			
			
			<td class="ctr">
				<div class="btn-group">
					<a href="<?php echo base_URL(); ?>index.php/m_data_user/edit_master_user/<?php echo $b->id; ?>" class="btn btn-info btn-sm"><i 
					class="icon-edit icon-white"> </i> Edit</a>
				</div>					

				<div class="btn-group">
					<a href="<?php echo base_URL(); ?>index.php/m_data_user/delete_master_user/<?php echo $b->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete user?')"><i
					class="icon-trash icon-white"></i> Delete</a> 
				</div>

				<div class="btn-group">
					<a href="<?php echo base_URL(); ?>index.php/m_data_user/reset_pass/<?php echo $b->id; ?>" class="btn btn-warning btn-sm" onclick="return confirm('New Pass = rajinbekerja')"><i
					class="icon-refresh icon-white"></i> Reset Password</a> 
				</div>
			</td>
			
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

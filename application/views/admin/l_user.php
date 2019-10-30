<div class="clearfix">
<div class="row">
  <div class="col-lg-12">
  	<div class="row">
	<a href="<?php echo base_URL(); ?>index.php/master_data/add_user" class="btn btn-warning"><i class="icon-plus icon-white"> </i> Add</a>
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">MASTER USER</a>
			</div>
		<div class="navbar-collapse collapse navbar-inverse-collapse" style="margin-right: -20px">
			<ul class="nav navbar-nav navbar-right">
				<form class="navbar-form navbar-left" method="post" action="<?php echo base_URL(); ?>index.php/admin/master_data_user/Search">
					<input type="text" class="form-control" name="q" style="width: 200px" placeholder=" keyword . . . . " required>
					<button type="submit" class="btn btn-danger"><i class="icon-search icon-white"> </i> Search</button>
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
			<th width="5%">NO</th>
			<th width="20%">USER</th>
			<th width="50%">NAMA</th>
			<th width="30%">OPTION</th>
		</tr>
	</thead>
	
	<tbody>
		<?php 
		if (empty($departemen)) {
			echo "<tr><td colspan='4'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
			$no 	= ($this->uri->segment(4) + 1);
			$i = 1;
			foreach ($departemen as $b) {
		?>
		<tr>

			<td><center> <?php echo $i++; ?></center></td>
			<td><?php echo $b->nama_user; ?></td>
			<td><?php echo $b->nama_divisi; ?></td>
			
			<?php 
			if ($this->session->userdata('admin_level') == "Super Admin") {
			?>
			<td class="ctr">
				<div class="btn-group">
					<!-- <a href="<?php echo base_URL(); ?>index.php/admin/klas_surat/edt/<?php echo $b->id; ?>" class="btn btn-success btn-sm"><i class="icon-edit icon-white"> </i> Edit</a> -->
					<a href="<?php echo base_URL(); ?>index.php/master_data/edit_user/<?php echo $b->id_dep; ?>" 
					class="btn btn-success btn-sm">
					<i class="icon-edit icon-white"></i> Edit</a>
				</div>						
				<div class="btn-group">
					<a href="<?php echo base_URL(); ?>index.php/master_data/hapus_user/<?php echo $b->id_dep; ?>" 
					class="btn btn-danger btn-sm" onclick="return confirm('yakin mau hapus ntar nyesal lo')"><i 
					class="icon icon-ok icon-white"></i> Hapus</a>
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

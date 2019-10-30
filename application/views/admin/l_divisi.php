<div class="clearfix">
<div class="row">
  <div class="col-lg-12"> 
  	<div class="row">
	<a href="<?php echo base_URL(); ?>index.php/master_divisi/add_master_divisi" class="btn btn-warning"><i class="icon-plus icon-white"> </i> Add New Master Divisi</a>

	<dir></dir>

	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">MASTER DIVISI</a>
			</div>
		<div class="navbar-collapse collapse navbar-inverse-collapse" style="margin-right: -20px">
			<ul class="nav navbar-nav navbar-right">
				<form class="navbar-form navbar-left" method="post">
					<input type="text" class="form-control" name="q" style="width: 200px" placeholder="Keyword . . . .">
					<button type="submit" class="btn btn-success"><i class="icon-search icon-white"> </i> Search</button>
				</form>
			</ul>
		</div>
		</div>
	</div>

  </div>
</div>

<?php echo $this->session->flashdata("k");?>
	

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width="5%">NO</th>
			<th width="50%">DIVISI</th>
			<th width="20%">OPSI</th>
		</tr>
	</thead>
	
	<tbody>
		<?php 
		if (empty($divisi)) {
			echo "<tr><td colspan='4'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
			$no 	= ($this->uri->segment(4) + 1);
			$i = 1;
			foreach ($divisi as $b) {
		?>
		<tr>

			<td><center><?php echo $i++; ?></center></td>
			<td><?php echo $b->nama_divisi; ?></td>
			
			<?php 
			if ($this->session->userdata('admin_level') == "Super Admin") {
			?>

			<td class="ctr">
				<div class="btn-group">
					<a href="<?php echo base_URL(); ?>index.php/master_divisi/edit_divisi/<?php echo $b->id_divisi; ?>" class="btn btn-success btn-sm"><i class="icon-edit icon-white"> </i> Edit</a>
				</div>
				<div class="btn-group">
					<a href="<?php echo base_URL(); ?>index.php/master_divisi/hapus_divisi/<?php echo $b->id_divisi; ?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin mau hapus ntar nyesal lo')"><i class="icon icon-ok icon-white"></i> Hapus</a>

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
</div>

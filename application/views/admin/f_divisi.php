<div class="navbar navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<span class="navbar-brand" href="#">Add Master Divisi</span>
		</div>
	</div><!-- /.container -->
</div><!-- /.navbar -->
	<?php echo $this->session->flashdata("k");?>
	<form action="<?php echo base_URL(); ?>index.php/master_divisi/do_add_master_divisi" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		
	<div class="row-fluid well" style="overflow: hidden">
	
	<div class="col-lg-6">
		<table width="200%" class="table-form">
			<tr><td width="20%">Nama Divisi</td><td><b><input type="text" name="nama_divisi" required style="width: 400px" class="form-control"></b></td></tr>
		</table>

		<br><button type="submit" class="btn btn-primary"><i class="icon icon-ok icon-white"></i> Simpan</button>
		<a href="<?php echo base_URL(); ?>index.php/master_divisi/master_data_divisi" class="btn btn-success"><i class="icon icon-arrow-left icon-white"></i> Kembali</a>

	</div>
	
	
	
	</div>
	
	</form>

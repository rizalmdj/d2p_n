<div class="navbar navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<span class="navbar-brand" href="#">Edit Master Departement</span>
		</div>
	</div><!-- /.container -->
</div><!-- /.navbar -->
	
	<form action="<?php echo base_URL(); ?>index.php/master_data/do_update_departemen" method="post" accept-charset="utf-8" enctype="multipart/form-data">

	<div class="row-fluid well" style="overflow: hidden">
	
	<div class="col-lg-6">
		<table width="200%" class="table-form">
			
			<input type="hidden" name ="id_dep" 

				value="<?php echo $departemen['id_dep'] ?>">
			
			<tr><td width="20%">Nama Departemen</td><td><b><input type="text" name="nama_departemen" 
			
				value="<?php echo $departemen['nama_departemen']; ?>" 
			
				style="width: 400px" class="form-control" required></b></td></tr>

			<tr><td width="20%">Nama Divisi</td><td><b><input type="text" name="nama_divisi" 
				
				value="<?php echo $departemen['nama_divisi']; ?>" 

				style="width: 400px" class="form-control" readonly></b></td></tr>
		</table>

		<br><button type="submit" class="btn btn-success"><i class="icon-ok icon-white"></i> Save</button>
		<a href="<?php echo base_URL(); ?>index.php/master_data/master_data_departemen" class="btn btn-danger"><i class="icon icon-arrow-left icon-white"></i> Back</a>

	</div>
	
	
	
	</div>
	
	</form>

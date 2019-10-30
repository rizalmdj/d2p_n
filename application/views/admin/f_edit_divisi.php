<div class="navbar navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<span class="navbar-brand" href="#">Edit Master Divisi</span>
		</div>
	</div><!-- /.container -->
</div><!-- /.navbar -->
	
	<form action="<?php echo base_URL(); ?>index.php/master_divisi/do_edit_divisi" method="post" accept-charset="utf-8" enctype="multipart/form-data">

	<div class="row-fluid well" style="overflow: hidden">
	
	<div class="col-lg-8">
		
		<table width="200%" class="table-form">
			<input type="hidden" name ="id_divisi" 

				value="<?php echo $divisi['id_divisi'] ?>">

					<tr><td width="20%">Nama Divisi</td><td><b><input type="text" name="nama_divisi" 
						value="<?php echo $divisi['nama_divisi']; ?>" 
			
				style="width: 400px" class="form-control" required></b></td></tr>
						
				

			</td></tr>
		</table>
		<br><button type="submit" class="btn btn-primary"><i class="icon icon-ok icon-white"></i> Edit</button>
		<a href="<?php echo base_URL(); ?>index.php/master_divisi/master_data_divisi" class="btn btn-success"><i class="icon icon-arrow-left icon-white"></i> Kembali</a>

	</div>
	
	
	
	</div>
	
	</form>

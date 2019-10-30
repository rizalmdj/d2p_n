<div class="navbar navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<span class="navbar-brand" href="#">ADD Master User</span>
		</div>
	</div><!-- /.container -->
</div><!-- /.navbar -->
	
	<form action="<?php echo base_URL(); ?>index.php/master_data/do_add_user" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		
	<div class="row-fluid well" style="overflow: hidden">
	
	<div class="col-lg-6">
		<table width="200%" class="table-form">
			<tr><td width="20%">Nama User</td><td><b><input type="text" name="nama_user" required style="width: 400px" class="form-control"></b></td></tr>

			<tr>
				<td width="20%">Nama divisi</td>
				<td><b><select class="form-control" name="nama_divisi" required style="width: 400px">
					<?php

					foreach($divisi  as $row)
					{
						echo '<option value="'.$row->nama_divisi.'">'.$row->nama_divisi.' </option>';
					}
					?>
					</select></b>
				</td>
			</tr>	
		</table>

		<br><button type="submit" class="btn btn-primary"><i class="icon icon-ok icon-white"></i> Simpan</button>
		<a href="<?php echo base_URL(); ?>index.php/master_data/master_data_user" class="btn btn-success"><i class="icon icon-arrow-left icon-white"></i> Kembali</a>

	</div>
	
	
	
	</div>
	
	</form>

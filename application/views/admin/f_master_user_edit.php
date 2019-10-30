<div class="navbar navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<span class="navbar-brand" href="#">Edit Master User</span>
		</div>
	</div><!-- /.container -->
</div><!-- /.navbar -->
	<?php 
	echo $this->session->flashdata("k");
	$var = $this->session->userdata;
	?>
	<form action="<?php echo base_URL(); ?>index.php/m_data_user/do_add_master_user" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		
	<div class="row-fluid well" style="overflow: hidden">
	
	<div class="col-lg-6">
		<table width="400%" class="table-form">

			<tr><td width="35%">Username</td><td><b><input type="text" name="username" style="width: 400px" class="form-control"></b></td></tr>

			<tr><td width="35%">Password</td><td><b><input type="password" name="password" required style="width: 400px" class="form-control"></b></td></tr>

			<tr><td width="35%">Name</td><td><b><input type="text" name="nama" required style="width: 400px" class="form-control"></b></td></tr>

			<tr><td width="35%">ID Karyawan</td><td><b><input type="text" name="id_karyawan" required style="width: 400px" class="form-control"></b></td></tr>

			<tr><td width="20%">E-mail</td><td><b><input type="text" name="email" required  style="width: 400px" class="form-control"></b></td></tr></tr>			
			

		</table>

	</div>
	
	<div class="col-lg-6">	


		<table width="200%" class="table-form">		

			<tr>
				<td width="20%">Role Access</td>
				<td><b><select class="form-control" name="role_access" required style="width: 400px">
					<option   value="">Pilihan</option>
					<?php

					foreach($role_access  as $row)
					{
						echo '<option value="'.$row->role_access.'">'.$row->role_access.' </option>';
					}
					?>
					</select></b>
				</td>
			</tr>	

			<tr>
				<td width="20%">Division</td>
				<td><b><select id="division" class="form-control" name="nama_divisi" required style="width: 400px">
					<option value="">Pilihan</option>
					<?php

					foreach($divisi  as $row)
					{
						echo '<option value="'.$row->nama_divisi.'">'.$row->nama_divisi.' </option>';
					}
					?>
					</select></b>
				</td>
			</tr>	

			<tr>
				<td width="20%">Departement</td>
				<td><b>
					<select  class="form-control"id="dept" name="nama_departemen" required style="width:400px"><option value="">Pilihan</option>
					</select></b>

				</td>
			</tr>

			<tr><td width="20%">Status</td><td><b>
				<select class="form-control" name="status" required style="width: 400px">	
					<option value="">Pilihan</option>
					<option value="active">Active</option>
					<option value="deactive">Deactive</option>
				</select>
			</b></td></tr>

			<tr><td colspan="2">
			
			<br><button type="submit" class="btn btn-success"><i class="icon icon-ok icon-white"></i> Save</button>
			<a href="<?php echo base_URL(); ?>index.php/m_data_user/master_user" class="btn btn-danger"><i class="icon icon-arrow-left icon-white"></i> Back</a></td>

		</table>

	</div>	
	</div>

	</form>

		<script type="text/javascript">
			$(document).ready(function(){
				
				$('#division').change(function(){
					$('#dept').empty();
					let data = $(this).val();
					$.ajax({
						url: <?php echo '"'.base_url()."index.php/m_data_user/get_dept".'"'; ?>,
						data:{div: data},
						dataType:'json',
						type:'post',
						success:function(response){
							console.log(response.data);
							$.each(response.data,function(key,value){
									$('#dept')
							         .append($("<option></option>")
							         .attr("value",value.nama_departemen)
							         .text(value.nama_departemen)); 						
							});
							
						},
						failed:function(){
							alert('failed');
						}

					});

				});
			});
		</script>


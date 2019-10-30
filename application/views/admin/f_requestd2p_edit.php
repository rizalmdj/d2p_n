<div class="navbar navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<span class="navbar-brand" href="#">Edit Request D2P</span>
		</div>
	</div><!-- /.container -->
</div><!-- /.navbar -->
	<?php 
	echo $this->session->flashdata("k");
	$var = $this->session->userdata;
	?>
	<form action="<?php echo base_URL(); ?>index.php/request_d2p/do_edit_requestd2p" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		
	<div class="row-fluid well" style="overflow: hidden">
	<?php $id_d2p					= $this->uri->segment(3);?>
	<div class="col-lg-6">		
		<table width="200%" class="table-form">

			<input type="hidden" name ="id" 

				value="<?php echo $data[0]->id ?>">

					<tr><td width="35%">Name <span style="color:red;">*</span></td><td><b><input type="text" name="name" value="<?php 
					echo $data[0]->name ?>" required disabled style="width: 400px" class="form-control"></b>
					</td></tr>

					<tr><td width="35%">Project Name <span style="color:red;">*</span></td><td><b><textarea name="project_name" required style="width: 400px; height: 85px" class="form-control"><?php echo $data[0]->project_name?></textarea></b></td></tr>			

					<tr><td width="35%">Project ID <span style="color:red;">*</span></td><td><b><input type="text" name="project_id" value="<?php echo $data[0]->project_id ?>" required style="width: 400px" class="form-control"></b></td></tr>
					
					<tr><td width="35%">Project Manager <span style="color:red;">*</span></td><td><b><input type="text" name="project_manager" value="<?php echo $data[0]->project_manager ?>" required  style="width: 400px" class="form-control"></b></td></tr></tr>			

					<tr><td width="35%">Notes </td><td><b><textarea name="keterangan" required style="width: 400px; height: 85px" class="form-control"><?php echo $data[0]->keterangan?></textarea></b></td></tr>			

					<tr><td width="35%">Date  <span style="color:red;"></span></td><td><b><input type="date" name="req_date" value="<?php 
					echo $data[0]->req_date ?>" placeholder="DD-MM-YYYY" required style="width: 400px" class="form-control"></b></td></tr>

					<tr><td width="35%"><span style="color:red;"></span></td><td><b><input  type="hidden" name="id_d2p" value="<?php echo $id_d2p ?>" required  style="width: 400px" class="form-control"></b></td></tr></tr>	

					
			</td></tr>
		</table>

	</div>
	
	<div class="col-lg-6">	

		<table width="200%" class="table-form">

			<input type="hidden" name ="id" 

				value="<?php echo $data[0]->id ?>">

					<tr><td width="35%">Edit Data? <span style="color:red;"></span></td><td><b><input type='checkbox' name="edit_data" style="width: 40px" class="form-control"></b>
					</td></tr>

					<tr><td width="35%">Dokumen SIT <span style="color:red;">*</span></td><td><b><input type="file" name="upload_file1"   
					value="<?php echo $data[0]->upload_file1 ?>" style="width: 400px" class="form-control"></b>
					<b><?php if($data[0]->upload_file1 != ""){echo "<a target='_blank' href='".base_url()."upload/".$data[0]->upload_file1."'>".$data[0]->upload_file1."</a>";} else {echo "Data Tidak ada.";}?></b>
					</td></tr>

					<tr><td width="35%">Dokumen UAT <span style="color:red;">*</span></td><td><b><input type="file"  value="<?php echo $data[0]->upload_file2 ?>" name="upload_file2"  style="width: 400px" class="form-control">
					</b>
					<b><?php if($data[0]->upload_file2 != ""){echo "<a target='_blank' href='".base_url()."upload/".$data[0]->upload_file2."'>".$data[0]->upload_file2."</a>";} else {echo "Data Tidak ada.";}?></b>
					</td></tr>

					<tr><td width="35%">List Object <span style="color:red;">*</span></td><td><b><input type="file"  value="<?php echo $data[0]->upload_file3 ?>" name="upload_file3"  style="width: 400px" class="form-control">
					</b>
					<b><?php if($data[0]->upload_file3 != ""){echo "<a target='_blank' href='".base_url()."upload/".$data[0]->upload_file3."'>".$data[0]->upload_file3."</a>";} else {echo "Data Tidak ada.";}?></b>
					</td></tr>

					<tr><td width="35%">Deployment Guide <span style="color:red;">*</span></td><td><b><input type="file"  value="<?php echo $data[0]->upload_file4 ?>" name="upload_file4"  style="width: 400px" class="form-control">
					</b>
					<b><?php if($data[0]->upload_file4 != ""){echo "<a target='_blank' href='".base_url()."upload/".$data[0]->upload_file4."'>".$data[0]->upload_file4."</a>";} else {echo "Data Tidak ada.";}?></b>
					</td></tr>

					<tr><td width="35%">Rollback Plan <span style="color:red;">*</span></td><td><b><input type="file"   value="<?php echo $data[0]->upload_file5 ?>" name="upload_file5"  style="width: 400px" class="form-control">
					</b>
					<b><?php if($data[0]->upload_file5 != ""){echo "<a target='_blank' href='".base_url()."upload/".$data[0]->upload_file5."'>".$data[0]->upload_file5."</a>";} else {echo "Data Tidak ada.";}?></b>
					</td></tr>

					<tr><td width="35%">Release Notes<span style="color:red;">*</span></td><td><b><input type="file"  value="<?php echo $data[0]->upload_file6 ?>" name="upload_file6"  style="width: 400px" class="form-control">
					</b>
					<b><?php if($data[0]->upload_file6 != ""){echo "<a href='".base_url()."upload/".$data[0]->upload_file6."' target='_blank' >".$data[0]->upload_file6." </a>";} else {echo "Data Tidak ada.";}?></b>
					</td></tr>

		</table>

		<table>

			<tr><td width="200%"><b><i><text style="color: red;" > File upload only docx, xlsx, jpg, jpeg, png, pdf</i></b></td></tr>
			<tr><td width="200%"><b><i><text style="color: red;" >* required</i></b></td></tr>

			<tr><td colspan="2">
			
			<br><button type="submit" class="btn btn-success"><i class="icon icon-ok icon-white"></i> Save</button>
			<a href="<?php echo base_URL(); ?>index.php/request_d2p/request_d2p_user_list" class="btn btn-danger"><i class="icon icon-arrow-left icon-white"></i> Back</a></td>
		</table>

	</div>	
	</div>



	</form>

<script>

  alert("Please be informed if you tick the check box should you provide all datas as requested :)");

</script>

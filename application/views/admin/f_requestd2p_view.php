<div class="navbar navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<span class="navbar-brand" href="#">View Request D2P</span>
		</div>
	</div><!-- /.container -->
</div><!-- /.navbar -->
	<?php 
	echo $this->session->flashdata("k");
	$var = $this->session->userdata; //
	?>
	<form action="<?php echo base_URL(); ?>index.php/request_d2p/do_edit_requestd2p" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		
	<div class="row-fluid well" style="overflow: hidden">
	
	<div class="col-lg-6">		
		<table width="200%" class="table-form">

			<input type="hidden" name ="id" 

				value="<?php echo $data[0]->id ?>">

					<tr><td width="35%">Name <span style="color:red;"></span></td><td><b><?php echo $data[0]->name ?></b></td></tr>

					<tr><td width="35%">Project Name <span style="color:red;"></span></td><td><b><?php echo $data[0]->project_name?></b></td></tr>			

					<tr><td width="35%">Project ID <span style="color:red;"></span></td><td><b><?php echo $data[0]->project_id ?></b></td></tr>
					
					<tr><td width="35%">Project Manager <span style="color:red;"></span></td><td><b><?php echo $data[0]->project_manager ?></b></td></tr></tr>			

					<tr><td width="35%">Notes </td><td><b><?php echo $data[0]->keterangan?></b></td></tr>			

					<tr><td width="35%">Date  <span style="color:red;">*</span></td><td><b><?php echo $data[0]->req_date ?></b></td></tr>
		
			</td></tr>
		</table>

	</div>

	<div class="col-lg-6">	

		<table width="200%" class="table-form">

			<input type="hidden" name ="id" 

				value="<?php echo $data[0]->id ?>">				
					<tr><td width="35%">Dokumen SIT  <span style="color:red;"></span></td><td><b><?php if($data[0]->upload_file1 != ""){echo "<a target='_blank' href='".base_url()."upload/".$data[0]->upload_file1."'>Download</a>";} else {echo "Data Tidak ada.";}?></b></td></tr></tr>			
					<tr><td width="35%">Dokumen UAT  <span style="color:red;"></span></td><td><b><?php if($data[0]->upload_file2 != ""){echo "<a target='_blank' href='".base_url()."upload/".$data[0]->upload_file2."'>Download</a>";} else {echo "Data Tidak ada.";}?></b></td></tr></tr>	
					<tr><td width="35%">List Object  <span style="color:red;"></span></td><td><b><?php if($data[0]->upload_file3 != ""){echo "<a target='_blank' href='".base_url()."upload/".$data[0]->upload_file3."'>Download</a>";} else {echo "Data Tidak ada.";}?></b></td></tr></tr>	
					<tr><td width="35%">Deployment Guide  <span style="color:red;"></span></td><td><b><?php if($data[0]->upload_file4 != ""){echo "<a target='_blank' href='".base_url()."upload/".$data[0]->upload_file4."'>Download</a>";} else {echo "Data Tidak ada.";}?></b></td></tr></tr>	
					<tr><td width="35%">Rollback Plan  <span style="color:red;"></span></td><td><b><?php if($data[0]->upload_file5 != ""){echo "<a target='_blank' href='".base_url()."upload/".$data[0]->upload_file5."'>Download</a>";} else {echo "Data Tidak ada.";}?></b></td></tr></tr>	
					<tr><td width="35%">Release Notes  <span style="color:red;"></span></td><td><b><?php if($data[0]->upload_file6 != ""){echo "<a target='_blank' href='".base_url()."upload/".$data[0]->upload_file6."'>Download</a>";} else {echo "Data Tidak ada.";}?></b></td></tr></tr>	

		</table>		

	</div>	
	</div>
	</form>

						
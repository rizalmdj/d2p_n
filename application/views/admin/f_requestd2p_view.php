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
	
		
		<div class="row-fluid well" style="overflow: hidden">

			<div class="col-lg-6">		
				<table width="200%" class="table-form">



					<tr><td width="35%">Name <span style="color:red;"></span></td><td><b><?php echo $data[0]->name ?></b></td></tr>

					<tr><td width="35%">Project Name <span style="color:red;"></span></td><td><b><?php echo $data[0]->project_name?></b></td></tr>			

					<tr><td width="35%">Project ID <span style="color:red;"></span></td><td><b><?php echo $data[0]->project_id ?></b></td></tr>
					
					<tr><td width="35%">Project Manager <span style="color:red;"></span></td><td><b><?php echo $data[0]->project_manager ?></b></td></tr></tr>			

					<tr><td width="35%">Notes </td><td><b><?php echo $data[0]->keterangan?></b></td></tr>			

					<tr><td width="35%">Date  <span style="color:red;">*</span></td><td><b><?php echo $data[0]->req_date ?></b></td></tr>

					<tr><td width="35%">Link Git  <span style="color:red;">*</span></td><td><button class="btn btn-success" onclick=" window.open('<?php echo $data[0]->git ?>','_blank')"> GIT</button></b></td></tr>

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

		
			<?php $bgcolor ="";
				if ($data[0]->id_status == 8){
					$bgColor = '"alert alert-danger"';
					//echo $bgColor;
				}else if($data[0]->id_status == 1){
					$bgColor = '"alert alert-info"';
					//echo $bgColor;
				}else if($data[0]->id_status == 2){
					$bgColor = '"alert alert-warning"';
					//echo $bgColor;
				}else if($data[0]->id_status == 3){
					$bgColor = '"alert alert-warning"';
					//echo $bgColor;
				}else if($data[0]->id_status == 4){
					$bgColor = '"alert alert-warning"';
					//echo $bgColor;
				}else if($data[0]->id_status == 5){
					$bgColor = '"alert alert-success"';
					//echo $bgColor;
				}else if($data[0]->id_status == 6){
					$bgColor = '"alert alert-danger"';
					//echo $bgColor;
				}else if($data[0]->id_status == 7){
					$bgColor = '"alert alert-danger"';
					//echo $bgColor;
				}?>
			<table>
				<tr style = "background-color:<?php echo $bgColor ?>;"><td><b><?php echo $data[0]->status_name?></b></td></tr>	
			</table>
			<div class=<?php echo $bgColor?>>
			  <strong><?php echo $data[0]->status_name?></strong>
			</div>
						
		

	</div>
	<div class="row-fluid well" style="overflow: hidden">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h3>Coment</h3>
				</div><!-- /col-sm-12 -->
			</div><!-- /row -->
			<div class="row">
				<?php 
		if (empty($coment)) {
			echo "<tr><td colspan='4'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
			foreach ($coment as $c) {
		?>
				<div class="col-sm-1">
					<div class="thumbnail">
						<img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
					</div><!-- /thumbnail -->
				</div><!-- /col-sm-1 -->

				<div class="col-sm-11">
					<div class="panel panel-default">
						<div class="panel-heading">
							<strong><?php echo $c->nama ?></strong> <span class="text-muted">commented <?php echo $c->date?></span>
						</div>
						<div class="panel-body">
							<?php echo $c->conten?>
						</div><!-- /panel-body -->
					</div><!-- /panel panel-default -->
				</div><!-- /col-sm-5 -->
				<?php 
			
			}
		}
		?>
			
				<form action="<?php echo base_URL()?>index.php/request_d2p/send_coment/<?php echo $data[0]->id ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				<div class="form-group">
					<label for="comment">Comment:</label>
					<input required type="hidden" name="id" value="<?php echo $this->uri->segment(3); ?>"></input>
					<textarea required name="Coment" class="form-control" rows="5" id="comment"></textarea>
					<br>
					
					<?php if(  $this->session->userdata('admin_level') == 3 and $data[0]->id_status == 2){ ?>
						<div class="btn-group" style="float: right important!">
						<button  type="submit" name="approv" class="btn btn-success green"><i class="icon-ok icon-white"></i> Approval</button>
					</div>	
					<div class="btn-group" style="float: right  important!">
						<button  type="submit" name="reject" class="btn btn-danger green"><i class="icon-remove-circle icon-white"></i> Reject</button>
					</div>
					<?php } elseif($this->session->userdata('admin_level') == 4 and $data[0]->id_status == 4){?>
							<div class="btn-group" style="float: right important!">
						<button  type="submit" name="approv" class="btn btn-success green"><i class="icon-ok icon-white"></i> Approval</button>
					</div>	
					<div class="btn-group" style="float: right  important!">
						<button  type="submit" name="reject" class="btn btn-danger green"><i class="icon-remove-circle icon-white"></i> Reject</button>
					</div>
					<?php }else {?>
						<div class="btn-group" style="float: right  important!">
						<button  type="submit" name="coment" class="btn btn-success green"><i class="icon-comment-alt icon-white"></i> Coment</button>
					</div>
					<?php }?>
					
				</div>
			</form>
			</div><!-- /row -->

		</div>
	</div>



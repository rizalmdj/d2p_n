	<div class="clearfix">
<div class="row">
  <div class="col-lg-12">
  	<div class="row">
	<a href="<?php echo base_URL(); ?>index.php/request_d2p/add_request_d2p" class="btn btn-warning "><i class="icon-plus icon-white"> </i> Add New Request</a>	
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">List Request</a>
			</div>
		<div class="navbar-collapse collapse navbar-inverse-collapse" style="margin-right: -20px">
			<ul class="nav navbar-nav navbar-right">
				<form class="navbar-form navbar-left" method="post">
					<input type="text" class="form-control" name="a" style="width: 200px" placeholder=" Keyword . . . ." >
					<button type="submit" class="btn btn-success"><i class="icon-search icon-white"> </i> Search</button>
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
			<th width="3%">NO</th>
			<th width="10%">NAME</th>
			<th width="18%">PROJECT NAME</th>
			<th width="10%">PROJECT ID</th>
			<th width="10%">DATE</th>
			<th width="8%">STATUS</th>
			<th width="13%">OPTION</th>
		</tr>
	</thead>
	
	<tbody>
		<?php
		if (empty($request)) {
			echo "<tr><td colspan='4'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
			$no 	= ($this->uri->segment(4) + 1);
			$i = 1;
			foreach ($request as $b) {
				$bgcolor ="";
				if ($b->id_status == 8){
					$bgColor = '#e74c3c';
					//echo $bgColor;
				}else if($b->id_status == 1){
					$bgColor = '#F5F5F5';
					//echo $bgColor;
				}else if($b->id_status == 2){
					$bgColor = '#efb73e';
					//echo $bgColor;
				}else if($b->id_status == 3){
					$bgColor = '#efb73e';
					//echo $bgColor;
				}else if($b->id_status == 4){
					$bgColor = '#efb73e';
					//echo $bgColor;
				}else if($b->id_status == 5){
					$bgColor = '#38b44a';
					//echo $bgColor;
				}else if($b->id_status == 6){
					$bgColor = '#e74c3c';
					//echo $bgColor;
				}else if($b->id_status == 7){
					$bgColor = '#e74c3c';
					//echo $bgColor;
				}
		?>
		<tr style="text_align:center;">

			<td><?php echo $i++; ?></td>
			<td><?php echo $b->name; ?></td>
			<td><a href="<?php echo base_URL(); ?>index.php/request_d2p/detail_request_d2p/<?php echo $b->id; ?>"><?php echo $b->project_name; ?></a></td>
			<td><?php echo $b->project_id; ?></td>
			<td><?php echo $b->req_date; ?></td>	
			<td style = "background-color:<?php echo $bgColor ?>;" > <?php echo $b->status_name?> </td>
			<?php 
			if ($this->session->userdata('admin_level')) {
			?>

			<td class="ctr">
			<?php
					if ($this->session->userdata('admin_level') == 2){ 
						if($b->status_req == 1){
						?>																													
					<div class="btn-group">
						<a href="<?php echo base_URL(); ?>index.php/request_d2p/delete_request_d2p/<?php echo $b->id; ?>" 
							class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete?')"><i
						class="icon-trash icon-white"></i> Delete</a>	 
					</div>	
					<div class="btn-group">
						<a href="<?php echo base_URL(); ?>index.php/request_d2p/submit_request_d2p/<?php echo $b->id; ?>" 
							class="btn btn-success btn-sm" onclick="return confirm('Are you sure want to submit?')"><i
						class="icon-ok icon-white"></i> Submit</a>	 
					</div><br>
					<div class="btn-group">
						<a href="<?php echo base_URL(); ?>index.php/request_d2p/edit_request_d2p/<?php echo $b->id; ?>" 
							class="btn btn-warning btn-sm"><i
						class="icon-edit icon-white"></i> Edit</a>	 
					</div>

					<?php } else{ ?>
						<div class="btn-group">
						<a href="#"  class="btn btn-success  btn-sm">Submitted</a>
					</div>
					<?php } ?>
					
					<?php	}
				} ?>											
					<?php
					if ($this->session->userdata('admin_level') == 3 or $this->session->userdata('admin_level') == 4 or $this->session->userdata('admin_level') == 1){ 
						?>
					<div class="btn-group">
						<a href="<?php echo base_URL(); ?>index.php/request_d2p/view_request_d2p_user/<?php echo $b->id; ?>" 
							class="btn btn-warning btn-sm"><i
						class="icon-eye-open icon-white"></i> View</a>	 
					</div>
					<div class="btn-group">
						<a href="<?php echo base_URL(); ?>index.php/request_d2p/approve_request_d2p/<?php echo $b->id; ?>" 
							class="btn btn-success btn-sm" onclick="return confirm('Are you sure want to approve?')"><i
						class="icon-ok icon-white"></i> Approve</a>	 
					</div>
					<div class="btn-group">
						<a href="<?php echo base_URL(); ?>index.php/request_d2p/reject_request_d2p/<?php echo $b->id; ?>" 
							class="btn btn-success btn-sm" onclick="return confirm('Are you sure want to reject?')"><i
						class="icon-ok icon-white"></i> Reject</a>	 
					</div>

					<?php } ?>

				</div>					


			</td>
		
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

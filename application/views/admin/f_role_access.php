<div class="navbar navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<span class="navbar-brand" href="#">Add New Role Access</span>
		</div>
	</div><!-- /.container -->
</div><!-- /.navbar -->
	<?php echo $this->session->flashdata("k");?>
	<form action="<?php echo base_URL(); ?>index.php/m_role_access/do_add_role_access" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		
	<div class="row-fluid well" style="overflow: hidden">
	
	<div class="col-lg-8">

		<table width="200%" class="table-form">
			<tr><td width="20%">Role Access Name</td><td><b><input type="text" name="role_access" required style="width: 400px" class="form-control"></b></td></tr>
		</table>

		<br><button type="submit" class="btn btn-success"><i class="icon icon-ok icon-white"></i> Save</button>
		<a href="<?php echo base_URL(); ?>index.php/m_role_access/master_role_access" class="btn btn-danger"><i class="icon icon-arrow-left icon-white"></i> Back</a>

	</div>
	
	
	
	</div>
	
	</form>

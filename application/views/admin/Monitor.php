<link rel="stylesheet" href="<?php echo base_url(); ?>aset/monit/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>aset/monit/Ionicons/css/ionicons.min.css">

<div class="clearfix">
<div class="row">
  <div class="col-lg-12">
  	<div class="row">
		<dir></dir>
		<div class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">MONITOR D2P</a>
				</div>
			</div><!-- /.container -->
		</div><!-- /.navbar -->
    </div>
</div>

<?php echo $this->session->flashdata("k");?>
	
<div class="row">
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion-android-folder-open"></i></span>
            
            <div class="info-box-content">
              <span class="info-box-text">Total Draf</span>
              <a class="info-box-number" href="<?php echo base_URL();?>index.php/monitor/view_request_status/1/1" style="display: block"> 
               <?php echo $data2[0]->Draf?> </a>
            </div>
            <!-- /.info-box-content -->
          </div>
	</div>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion-android-folder-open"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Proses</span>
              <a class="info-box-number" href="<?php echo base_URL();?>index.php/monitor/view_request_status/2/4" style="display: block"> 
               <?php echo $data2[0]->Waiting?> </a>
            </div>
            <!-- /.info-box-content -->
          </div>
	</div>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion-android-folder-open"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Approve</span>
                <a class="info-box-number" href="<?php echo base_URL();?>index.php/monitor/view_request_status/5/5" style="display: block"> 
               <?php echo $data2[0]->Approval?> </a>
            </div>
            <!-- /.info-box-content -->
          </div>
	</div>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion-android-folder-open" href="#"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Reject</span>
               <a class="info-box-number" href="<?php echo base_URL();?>index.php/monitor/view_request_status/6/8" style="display: block"> 
               <?php echo $data2[0]->Reject?> </a>
            </div>
            <!-- /.info-box-content -->
          </div>
	</div>
</div>
			<?php
			    $f = 'E:/Pack';
			    $obj = new COM ( 'scripting.filesystemobject' );
			    if ( is_object ( $obj ) )
			    {
			        $ref = $obj->getfolder ( $f );
			        $size = $ref->size;
			        $obj = null;
			    }
			    else
			    {
			        echo 'can not create object';
			    }
			?>
<div class="row">
	<div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Size Of Folder Upload</span>
              <span class="info-box-number">12Mb</span>

              <div class="progress">
                <div class="progress-bar" style="width: 13%"></div>
              </div>
                  <span class="progress-description">
                    dari 5000 Mb
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
</div>

<?php
        foreach($data as $data){
            $tanggal[] = $data->tanggal;
            $jumlah_req[] = $data->jumlah_req;
        }
    ?>

<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Grafik Request D2P</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                   <canvas id="canvas"  width="450" height="150"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>

</div>




<script type="text/javascript" src="<?php echo base_url().'aset/chartjs/chart.min.js'?>"></script>
<script>
 
            var lineChartData = {
                labels : <?php echo json_encode($tanggal);?>,
                datasets : [
                     
                    {
                        fillColor: "rgba(60,141,188,0.9)",
                        strokeColor: "rgba(60,141,188,0.8)",
                        pointColor: "#3b8bba",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(152,235,239,1)",
                        data : <?php echo json_encode($jumlah_req);?>
                    }
 
                ]
                 
            }
 
        var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(lineChartData);
         
    </script>
      <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count text-center">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 text-center">
              <img src="<?=base_url()?>assets/images/Jumeirah-Software.png" class="img-responsive img-logo" />
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a href="<?=base_url('') ?>ecowash">
              <button type="button" onClick="#" class="btn btn-success pda-button"><i class="fa fa-tint" style="font-size:21px;"></i><br>Eco Wash</button> </a>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a href="<?=base_url('') ?>ecowash/lists">
              <button type="button" onClick="#" class="btn btn-success pda-button"><i class="fa fa-tint" style="font-size:21px;"></i><br>Wash List</button> </a>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a href="<?=base_url('') ?>jobcard/add_jobcard">
              <button type="button" onClick="#" class="btn btn-success pda-button"><i class="fa fa-tint" style="font-size:21px;"></i><br>Job Card</button> </a>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a href="<?=base_url('') ?>jobcard/lists">
              <button type="button" onClick="#" class="btn btn-success pda-button"><i class="fa fa-tint" style="font-size:21px;"></i><br>Job List</button> </a>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a href="<?=base_url('') ?>customer/add_customer">
              <button type="button" onClick="#" class="btn btn-info pda-button"><i class="fa fa-users" style="font-size:21px;"></i><br> Customer</button> </a>
            </div>
            <!-- <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a href="<?=base_url('') ?>vehicle/add_vehicle">
              <button type="button" onClick="#" style="height:100px; width:100px; margin:10px 0 15px 0; left:20px; position:relative;" class="btn btn-primary"><i class="fa fa-car" style="font-size:21px;"></i><br> Vehicle</button> </a>
            </div> -->
            <div class="col-md-2 col-sm-4 col-xs-6">&nbsp;</div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a href="<?=base_url('') ?>">
              <button type="button" onClick="#" class="btn btn-danger pda-button"><i class="fa fa-sign-out" style="font-size:21px;"></i><br> Logout</button> </a>
            </div>
            <!--div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <button type="button" onClick="#" style="height:100px; width:100px; margin:10px 0 15px 0; left:20px; position:relative;" class="btn btn-danger"><i class="fa fa-truck"></i><br> Job Card</button>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <button type="button" onClick="#" style="height:100px; width:100px; margin:10px 0 15px 0; left:20px; position:relative;" class="btn btn-danger"><i class="fa fa-truck"></i><br> Job Card</button>
            </div-->
          </div>
          <!-- /top tiles -->


          
        </div>
        <!-- /page content -->

       <?php include("layout/footer.php");  ?>
    <!-- Custom Theme Scripts -->
    <script src="<?=base_url() ?>assets/build/js/custom.min.js"></script>
  </body>
</html>

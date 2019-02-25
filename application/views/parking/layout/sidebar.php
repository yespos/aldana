  <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <ul class="nav side-menu">
      <li><a href="<?=base_url('') ?>"> <i class="fa fa-home"></i> Home <!--span class="fa fa-chevron-down"> </span--> </a>
        <!--ul class="nav child_menu">
          <li><a>Dashboard</a></li>
        </ul-->
      </li>
      <li> <a href="javascript:void(0);"><i class="fa fa-sign-in"></i>Eco Wash <span class="fa fa-chevron-down"></span>
      </a>
        <ul class="nav child_menu">
          <li><a href="<?=base_url('') ?>ecowash"><i class="fa fa-tasks"></i>New Ecowash </a></li>
      <li><a href="<?=base_url('') ?>ecowash/lists"><i class="fa fa-tasks"></i>Ecowash List </a></li>
        </ul>
      </li>

      <li><a href="javascript:void(0);"><i class="fa fa-sign-in"></i>Jobcard <span class="fa fa-chevron-down"></span>
      </a>
        <ul class="nav child_menu">
          <li><a href="<?=base_url('') ?>jobcard/add_jobcard"><i class="fa fa-tasks"></i>New jobcard </a></li>
      <li><a href="<?=base_url('') ?>jobcard/lists"><i class="fa fa-tasks"></i>Jobcard List </a></li>
        </ul>
      </li>

       <li><a href="javascript:void(0);"><i class="fa fa-square text-maroon"></i> Purchase <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="javascript:void(0);"><i class="fa fa-bullseye text-blue"></i>Purchase<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="<?=base_url('') ?>purchase"><i class="fa fa-circle-o text-green"></i>Manage</a></li>
          <li><a href="<?=base_url('') ?>purchase/add"><i class="fa fa-circle-o text-yellow"></i>Add</a></li>
        </ul>
        </li>
        <li><a href="javascript:void(0);"><i class="fa fa-soccer-ball-o text-red"></i>Purchase Return<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?=base_url('') ?>purchase_return"><i class="fa fa-circle-o text-green"></i>Manage</a></li>
              <li><a href="<?=base_url('') ?>purchase_return/add"><i class="fa fa-circle-o text-green"></i>Add</a></li>
            </ul>
        </li>
        <li><a href="javascript:void(0);"><i class="fa fa-soccer-ball-o text-red"></i>Product<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?=base_url('') ?>setup/filterservice"><i class="fa fa-circle-o text-green"></i>Manage</a></li>
              <li><a href="<?=base_url('') ?>setup/add_filterService"><i class="fa fa-circle-o text-green"></i>Add</a></li>
            </ul>
        </li>
        </ul>
    </li> 

      <li><a href="javascript:void(0);"><i class="fa fa-sign-in"></i>Report <span class="fa fa-chevron-down"></span>
      </a>
        <ul class="nav child_menu">
        <li><a href="<?=base_url('') ?>ecowash/report"><i class="fa fa-tasks"></i>Ecowash Report</a></li>
       <li><a href="<?=base_url('') ?>jobcard/report"><i class="fa fa-tasks"></i>Jobcard Report </a></li>
        <li><a href="<?=base_url('') ?>jobcard/daily_report"><i class="fa fa-tasks"></i>All Report </a></li>
        <li><a href="<?=base_url('') ?>jobcard/tax_report"><i class="fa fa-tasks"></i>Tax Report </a></li>
        </ul>
      </li>

      <li><a href="javascript:void(0);"><i class="fa fa-sign-in"></i>Services <span class="fa fa-chevron-down"></span>
      </a>
        <ul class="nav child_menu">
        <li><a href="<?=base_url('') ?>vehicle/vehicleType"><i class="fa fa-truck"></i> Sales Category </a> </li>
        <!--<li><a href="<?=base_url('') ?>setup/filterservice"><i class="fa fa-tasks"></i>Filter Service </a></li>-->
        <li><a href="<?=base_url('') ?>setup/serviceJob"><i class="fa fa-tasks"></i>Jobcard Service </a></li>
        <li><a href="<?=base_url('') ?>setup/servicetype"><i class="fa fa-truck"></i> Service Type </a></li>
        <li><a href="<?=base_url('') ?>setup/flushing"><i class="fa fa-truck"></i>Flushing Oil </a></li>
        <li><a href="<?=base_url('') ?>setup/washing"><i class="fa fa-truck"></i> Washing Type </a></li>
        <li><a href="<?=base_url('') ?>vehicle"><i class="fa fa-truck"></i>Vehicle </a></li>
        <li><a href="<?=base_url('') ?>setup/vehicletype"><i class="fa fa-truck"></i>Vehicle Type </a></li>
        <li><a href="<?=base_url('') ?>setup/company"><i class="fa fa-truck"></i>Company </a></li>
        </ul>
      </li>
     
     <li><a href="<?=base_url('') ?>customer"><i class="fa fa-user"></i>Manage Customers </a></li>
     
     </li>
    <li><a href="<?=base_url('') ?>supplier"><i class="fa fa-user"></i> Manage Supplier</a></li>
		<li><a href="<?=base_url('') ?>setup/shift"><i class="fa fa-user"></i> Manage Shift </a></li>
         
     <!-- <li><a href="<?=base_url('') ?>service"><i class="fa fa-wrench"></i> Service Management </a> </li> -->


     <!--  <li><a href="javascript:void(0);"><i class="fa fa-sign-in"></i> Hourly <span class="fa fa-chevron-down"></span>
      </a>
        <ul class="nav child_menu">
          <li><a href="<?=base_url('') ?>vehicle/vehicleIn"><i class="fa fa-sign-in"></i> Vehicle In </a></li>
          <li><a href="<?=base_url('') ?>vehicle/vehicleOut"><i class="fa fa-sign-out"></i> Vehicle Out </a></li>
        </ul>
      </li> -->
    <!--   <li><a href="<?=base_url('') ?>vehicle/daily"><i class="fa fa-refresh"></i> Daily </a></li>
      <li><a href="<?=base_url('') ?>vehicle/monthly"><i class="fa fa-calendar"></i> Monthly </a></li>
      <li><a href="<?=base_url('') ?>vehicle/invoices"><i class="fa fa-file-o"></i> Invoices </a></li> -->

   <!--  <li><a href="javascript:void(0);"><i class="fa fa-briefcase"></i> Reports <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="javascript:void(0);"><i class="fa fa-briefcase"></i> Reports <span class="fa fa-chevron-down"></span></a>
           <ul class="nav child_menu">
          <li><a href="<?=base_url('') ?>vehicle/rptdate">Date Wise</a></li>
          <li><a href="<?=base_url('') ?>vehicle/rptCustomer">Customer Wise</a></li>
          <li><a href="<?=base_url('') ?>vehicle/rptLocation">Location Wise</a></li>
         </ul>
        </li>
      
          <li><a href="javascript:void(0);"><i class="fa fa-briefcase"></i> Reports <span class="fa fa-chevron-down"></span></a>
           <ul class="nav child_menu">
          <li><a href="<?=base_url('') ?>vehicle/rptdate">Date Wise</a></li>
          <li><a href="<?=base_url('') ?>vehicle/rptCustomer">Customer Wise</a></li>
          <li><a href="<?=base_url('') ?>vehicle/rptLocation">Location Wise</a></li>
         </ul>
        </li>
      </ul>
    </li> -->
     
     <!-- <li><a href="<?=base_url('') ?>jobcard"><i class="fa fa-tasks"></i> Job Card </a></li>
     <li><a href="<?=base_url('') ?>setup/location"><i class="fa fa-location-arrow"></i> Location Management </a></li> -->
     <li><a href="<?=base_url('') ?>user"><i class="fa fa-user"></i> User Management </a></li>
    <!--  <li><a href="javascript:void(0);"><i class="fa fa-cog"></i> Setup <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="<?=base_url('') ?>customer"><i class="fa fa-user"></i> Customers </a></li>
          <li><a href="<?=base_url('') ?>vehicle"><i class="fa fa-truck"></i> Vehicle </a></li>
          <li><a href="<?=base_url('') ?>vehicle/vehicleType"><i class="fa fa-truck"></i> Vehicle Type </a>
          </li>
         

        </ul>
     </li> -->
   <li><a href="<?=base_url() ?>/logout"><i class="fa fa-sign-out"></i> Logout</a></li>
    </ul>
  </div>

</div>

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
  <a data-toggle="tooltip" data-placement="top" title="Settings">
    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="FullScreen">
    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="Lock">
    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="Logout">
    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
  </a>
</div>
<!-- /menu footer buttons -->
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle nav_side">
                <a id="menu_toggle" class="nav_side"><i class="fa fa-bars nav_side"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt=""><?=ucfirst($_SESSION['name']); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?=base_url() ?>/logout"><i class="fa fa-sign-out pull-right"></i>Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

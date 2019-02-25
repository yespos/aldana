<style>
/* The container */
.containers {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
   /* font-size: 22px;*/
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.containers input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmarks {
    position: absolute;
    top: 0;
    left: 0;
    height: 23px;
    width: 23px;
    background-color: #9E9E9E;
    border-radius: 50%
}

/* On mouse-over, add a grey background color */
.containers:hover input ~ .checkmarks {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.containers input:checked ~ .checkmarks {
    background-color: #1abb9c;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmarks:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.containers input:checked ~ .checkmarks:after {
    display: block;
}

/* Style the checkmark/indicator */
.containers .checkmarks:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
.progress-bar {
  background-color: #1cb99b;
  }

  @media screen and (max-width: 600px) {
    .team {
            margin-top:20px;
          }
  }

  /*  file Upload */
  .file-upload {
  background-color: #ffffff;
  width: 600px;
  margin: 0 auto;
  padding: 20px;
}

.file-upload-btn {
  width: 100%;
  margin: 0;
  color: #fff;
  background: #1FB264;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #15824B;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.file-upload-btn:hover {
  background: #1AA059;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.file-upload-btn:active {
  border: 0;
  transition: all .2s ease;
}

.file-upload-content {
  display: none;
  text-align: center;
}

.file-upload-input {
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  outline: none;
  opacity: 0;
  cursor: pointer;
}

.image-upload-wrap {
  margin-top: 20px;
  border: 4px dashed #1FB264;
  position: relative;
}

.image-dropping,
.image-upload-wrap:hover {
  background-color: #1FB264;
  border: 4px dashed #ffffff;
}

.image-title-wrap {
  padding: 0 15px 15px 15px;
  color: #222;
}

.drag-text {
  text-align: center;
}

.drag-text h3 {
  font-weight: 100;
  text-transform: uppercase;
  color: #15824B;
  padding: 60px 0;
}

.file-upload-image {
  max-height: 200px;
  max-width: 200px;
  margin: auto;
  padding: 20px;
}

.remove-image {
  width: 200px;
  margin: 0;
  color: #fff;
  background: #cd4535;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #b02818;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.remove-image:hover {
  background: #c13b2a;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.remove-image:active {
  border: 0;
  transition: all .2s ease;
} 
</style>  
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" id="PagePosition">
                  <div class="x_title">
                    <h2>Edit <small>User Information</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><button type="button" class="btn btn-danger" onclick="javascript:window.location.href='<?=base_url() ?>user'">&laquo; Back</button></li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <?php if($this->session->flashdata('message')) {  ?>
                            <div class="alert alert-dismissible alert-danger">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong><?=$this->session->flashdata('message')  ?></strong> 
                            </div>
                        <?php } ?>
                    <br />
                    
                    <form id="form2" data-parsley-validate class="form-horizontal form-label-left input_mask" enctype="multipart/form-data" method="post" action="<?=base_url() ?>user/edit_user_act">
                    <input type="hidden" id="id" required name="id" class="form-control col-md-7 col-xs-12" value="<?=$list->id ?>">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Full Name <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required name="str_name" class="form-control col-md-7 col-xs-12" value="<?=$list->name ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required name="str_Admin_ID" class="form-control col-md-7 col-xs-12" value="<?=$list->admin_id ?>">
                        </div>
                      </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Gender<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <select required id="gender"  name="gender" class="form-control col-md-7 col-xs-12 select2_group" onchange="$(this).change_userType()" >
                              <option> Select </option>
                              <option value="Male" <?=$list->gender=="Male"?"Selected":"" ?> >Male </option>
                              <option value="Female" <?=$list->gender=="Female"?"Selected":"" ?>>Female </option>
                              <option value="Other" <?=$list->gender=="Other"?"Selected":"" ?>>Others</option>
                            </select> 
                        </div>
                      </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date Of Birth<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="dob" placeholder="Date Of Birth" name="dob" aria-describedby="inputSuccess2Status4" value="<?=$list->dob ?>" readonly>
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"> </span>
                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="first-name" name="str_Password" class="form-control col-md-7 col-xs-12" value="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Country<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select class="form-control select2_group select2" id="country" name="country" style="width: 100%;">
                        <option value="">
                          <?php echo $this->lang->line('add_biller_select'); ?>    
                        </option>
                        <?php
                          foreach ($country as  $key) {
                        ?>
							<option value='<?php echo $key->id ?>,<?php echo $key->name; ?>' <?=($key->id==$list->country)?"Selected":""?> ><?php echo $key->name; ?> </option>
                        <?php
                          }
                        ?>
                      </select>
                        </div>
                      </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date Of Joinig<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left datepicker" id="joining" placeholder="Joinin Date" name="joining"  value="<?=$list->joining ?>" readonly>
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                        </div>
                      </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Designation<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select required id="usertype" name="usertype" class="form-control col-md-7 col-xs-12 select2_group"  >  // onchange="$(this).change_userType()"
                              <option> Select </option>
                              <?php  foreach ($designation as $de) { ?>
                              <option value="<?=$de->design_id ?>,<?=$de->design_name ?>" <?=($de->design_id==$list->design_id)?"Selected":""?> > <?=$de->design_name ?> </option>
                             <?php   } ?>
                           </select> 
                         </div>
                       </div>
                    
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="location">Location <span class="required">*</span></label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <select required id="location" name="location" class="form-control col-md-7 col-xs-12 select2_group"  > // onchange="$(this).change_userType()"
                              <option value=""> Select </option>
                              <?php foreach ($location as $loc) { ?>
                                <option value="<?=$loc->id ?>" <?=$list->location == $loc->id?"selected":" "  ?>> <?=$loc->name ?> </option>
                              <?php  } ?>
                            </select> 
                          </div>
                       </div>

											<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Shifts<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select required id="shift_id" name="shift_id" class="form-control col-md-7 col-xs-12 select2" > // onchange="$(this).change_userType()"
                              <option value="">Select</option>
                              <?php foreach ($shift as $sh) { ?>
                              <option value="<?=$sh->id ?>" <?=$list->shift_id == $sh->id?"selected":" "  ?> > <?=$sh->name ?> </option>
                              <?php  } ?>
                          </select> 
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tax Invoice Description<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="tx_desc" required name="tx_desc" class="form-control col-md-7 col-xs-12" value="<?=$list->tx_desc ?>">
                        </div>
                      </div>
                    
                    
                    <div class="form-group">
                        <div class="file-upload">
                        <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>
                    <?php $wrap = !empty($list->image)?"display:none":"";  
                          $content = !empty($list->image)?"display:block":"";
                     ?>
                    <input type ="hidden" name="old_image" value="<?=$list->image ?>">
                    <div class="image-upload-wrap" style="<?=$wrap ?>">
                        <input class="file-upload-input" type='file' name="image" onchange="readURL(this);" accept="image/*" />
                       <div class="drag-text">
                           <h3>Drag and drop a file or select add Image</h3>
                      </div>
                    </div>
                    <div class="file-upload-content" style="<?=$content ?>">
                        <img class="file-upload-image" src="<?=base_url("assets/images/employee/$list->image")?>" alt="your image" />
                    <div class="image-title-wrap">
                         <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                    </div>
                        </div>
                     </div>
                      </div>
                      
                     <!--  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Prefix <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required name="prefix" class="form-control col-md-7 col-xs-12" value="<?=$list->prefix ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Hourly Rate <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="first-name" required name="invAmount" class="form-control col-md-7 col-xs-12" value="<?=$list->invAmount ?>">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Daily Rate <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="first-name" required name="dailyAmount" class="form-control col-md-7 col-xs-12" value="<?=$list->dailyAmount ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Monthly Rate <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="first-name" required name="monthlyAmount" class="form-control col-md-7 col-xs-12" value="<?=$list->monthlyAmount ?>">
                        </div>
                      </div> -->
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="button" class="btn btn-primary" onclick="javascript:window.location.href='<?=base_url() ?>user'">Cancel</button>
                          <button type="submit" class="btn btn-success">Save</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

       
  <?php $this->load->view('parking/layout/footer'); ?>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?=base_url() ?>assets/build/js/custom.js"></script>
<script src="<?=base_url() ?>assets/vendors/select2/dist/js/select2.full.min.js"></script>
<!-- Datatables -->
    <script>
      $(document).ready(function() {
        $('#datatable-responsive').DataTable();
      });
    </script>
    <!-- /Datatables -->
    <!-- /Datatables -->
    <script type="text/javascript">
      $(document).ready(function(){
       
       $(".select2_group").select2({});
    });
    </script>

      <script type="text/javascript">
    
  $(document).ready(function(){

   $.fn.change_userType = function()
   {
  var usertype = $('#usertype').val();
  var location = $('#location').val();
  
          $.post( 
                 "<?php echo base_url(); ?>user/change_userType",
                  {location:location,usertype:usertype},
                  function(data) {
                   // alert(data);
                      $('#reg').html(data);
                   }
                );
    }; 
   
   $.fn.checkEmail = function()
    {
      var email = $('#email').val();          
          $.post( 
                 "<?php echo base_url(); ?>user/checkEmail",
                  {email:email},
                  function(data) {
                     if(data =='TRUE')
                     {
                      $("#err_email").text("Already Email Exits.");
                      return false;
                     }
                     else
                     {
                      $("#err_email").text("");
                     }
                   }
                 );
    };

    }); 
</script>

 <script type="text/javascript">
$(document).ready(function() {
  $('.datepicker').datepicker({
      autoclose: true,
      dateFormat: "dd/mm/yy",
      todayHighlight: true,
      orientation: "auto",
      todayBtn: true,
      todayHighlight: true,  
  });
});
</script>
<script type="text/javascript">
  $(function() {
  $("#dob").datepicker(
    {
      minDate: new Date(1900,1-1,1), maxDate: '-18Y',
      dateFormat: "dd/mm/yy",
     // defaultDate: new Date(1970,1-1,1),
      changeMonth: true,
      changeYear: true,
      yearRange: '-110:-18'
    }
  );          
});
</script>

<!--  file Upload Imgae -->
<script type="text/javascript">
  function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
    $('.image-upload-wrap').addClass('image-dropping');
  });
  $('.image-upload-wrap').bind('dragleave', function () {
    $('.image-upload-wrap').removeClass('image-dropping');
});
</script>
  </body>
</html>

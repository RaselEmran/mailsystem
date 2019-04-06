<?php 
include_once 'class/User.php';
include_once 'lib/database.php';
$db = new database();

$info = new User();

if (isset($_POST['submit'])) {
    
    $nationality = $_POST['nationality'];
    $nationality = mysqli_real_escape_string($db->link,$nationality);

    $type = $_POST['type'];
    $type = mysqli_real_escape_string($db->link,$type);

    $first = $_POST['first'];
    $first = mysqli_real_escape_string($db->link,$first);

    $surname = $_POST['surname'];
    $surname = mysqli_real_escape_string($db->link,$surname);

    $birth = $_POST['birth'];
    $birth = mysqli_real_escape_string($db->link,$birth);

    $passport = $_POST['passport'];
    $passport = mysqli_real_escape_string($db->link,$passport);

    $phone = $_POST['phone'];
    $phone = mysqli_real_escape_string($db->link,$phone);

    $email = $_POST['email'];
    $email = mysqli_real_escape_string($db->link,$email);

    $pass_file = $_FILES['pass_file'];
    $adi_file = $_FILES['adi_file'];



   $front_value = $info->front_value($nationality,$type,$first,$surname,$birth,$passport,$phone,$email,$pass_file,$adi_file);

}

 ?>








<!DOCTYPE html>
<html lang="en">
<head>
 
  <meta charset="UTF-8">
    <title>Satt Visa Apply App</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Mail">
    <meta name="author" content="sattit.com">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
    
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
    <link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="assets/vendor/morris/morris.css" />

    <link rel="stylesheet" href="assets/vendor/select2/select2.css" />
    <link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

    

    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/stylesheets/theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

    <!-- Head Libs -->
    <script src="assets/vendor/modernizr/modernizr.js"></script>


    <link rel="stylesheet" href="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />
    <script src="ajax.js"></script>
    <script src="assets/vendor/jquery/jquery.js"></script>

    <link rel="stylesheet" href="assets/vendor/select2/select2.css" />
    <link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
    
</head>
<body>
    

    <div class="container" >
      <div style="padding: 50px; text-align: center; background: gray" >

        <h2 style="color: #fff" >Apply For Visa</h2>
        
      </div>
    <div class="bor" style="border: 1px solid ; box-shadow: 3px 3px 4px 2px #555" >
    <div class="container-fluid" style="padding-top: 5rem">
    <div class="row-fluid">
           <p>
          <?php 
          if (isset($front_value)) {
           ?>
  <div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Messege!</strong> <?php echo $front_value ?>
  </div>
           <?php
          }

           ?>
        </p>
        <div class="widget-content nopadding">
          <form method="post" class="form-horizontal" enctype="multipart/form-data" >
            <div class="form-group">
              <label class="col-sm-3 control-label">Select Nationality</label>
              <div class="col-sm-9">
                <select name="nationality" required class="form-control" id="nationality">
                  <option>Select Nationality</option>
                  <option value="INDIA">INDIA</option>
                  <option value="BANGLADESH">BANGLADESH</option>
                  <option value="NEPAL">NEPAL</option>
                  <option value="BHUTAN">BHUTAN</option>
                  <option value="MALDIVES">MALDIVES</option>
                  <option value="SRI LANKA">SRI LANKA</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Purpose of Travel</label>
              <div class="col-sm-9">
                <select name="type" required class="form-control" id="type">
                  <option>Select Purpose</option>
                  <option value="EMPLOYEE CARD">EMPLOYEE CARD</option>
                  <option value="SEASONAL WORK">SEASONAL WORK</option>
                  <option value="STUDIES">STUDIES</option>
                  <option value="FAMILY REUNIFICATION">FAMILY REUNIFICATION</option>
                  <option value="BUSINESS">BUSINESS</option>
                  <option value="INVITATION">INVITATION</option>
                  <option value="CULTURE">CULTURE</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">First Name</label>
              <div class="col-sm-9">
                <input type="text" required name="first" class="form-control" placeholder="First Name"  />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Surname : <br>
                <p class="btn" id="noCheck" >Hide Or Show</p>
              </label>
              <div class="col-sm-9">
                <input type="text"  name="surname" id="surname" class="form-control" placeholder="Surname" />
                
              </div>
            </div>

            <div class="form-group pb-1">
        <label class="col-md-3 control-label">Default Datepicker</label>
        <div class="col-md-9">
          <div class="input-group">
            <span class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </span>
            <input name="birth" required type="text" data-plugin-datepicker class="form-control">
          </div>
        </div>
      </div>
            

            <div class="form-group">
              <label class="col-sm-3 control-label">Passport Number:</label>
              <div class="col-sm-9">
                <input type="text" required name="passport" id="passport" class="form-control" placeholder="Passport Number" />    
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-3 control-label">Phone Number :</label>
              <div class="col-sm-9">
                <input type="text" required name="phone" id="phone" class="form-control" placeholder="Phone Number" />
        
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Email :</label>
              <div class="col-sm-9">
                <input type="text" required name="email" id="phone" class="form-control" placeholder="Phone Number" />
        
              </div>
            </div>
            

      <div class="form-group">
                        <label class="col-md-3 control-label">Passport Attached</label>
                        <div class="col-md-6">
                          <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="input-append">
                              <div class="uneditable-input">
                                <i class="fa fa-file fileupload-exists"></i>
                                <span class="fileupload-preview"></span>
                              </div>
                              <span class="btn btn-default btn-file">
                                <span class="fileupload-exists">Change</span>
                                <span class="fileupload-new">Select file</span>
                                <input  required name="pass_file" type="file" />
                              </span>
                              <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Adetional Attached</label>
                        <div class="col-md-6">
                          <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="input-append">
                              <div class="uneditable-input">
                                <i class="fa fa-file fileupload-exists"></i>
                                <span class="fileupload-preview"></span>
                              </div>
                              <span class="btn btn-default btn-file">
                                <span class="fileupload-exists">Change</span>
                                <span class="fileupload-new">Select file</span>
                                <input  required name="adi_file" type="file" />
                              </span>
                              <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                            </div>
                          </div>
                        </div>
                      </div>

         
             <center style='padding: 50px' > <button type="submit" name="submit" class="btn btn-block btn-success pt-5">Save</button></center>
           
          </form>
        </div>
    </div>
    </div>
     </div>
  </div>
  <footer style="padding: 20px" >
    <p style="font-size: 20px; text-align: center;" ><a href="http://www.sattit.com">Satt</a></p>
  </footer>
<script>
    
    


</script>

      <!-- Vendor -->
    <script src="assets/vendor/jquery/jquery.js"></script>
    <script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
    <script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
    <script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
    
    <!-- Specific Page Vendor -->
    <script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
    <script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
    <script src="assets/vendor/jquery-appear/jquery.appear.js"></script>
    <script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
    <script src="assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
    <script src="assets/vendor/flot/jquery.flot.js"></script>
    <script src="assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
    <script src="assets/vendor/flot/jquery.flot.pie.js"></script>
    <script src="assets/vendor/flot/jquery.flot.categories.js"></script>
    <script src="assets/vendor/flot/jquery.flot.resize.js"></script>
    <script src="assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
    <script src="assets/vendor/raphael/raphael.js"></script>
    <script src="assets/vendor/morris/morris.js"></script>
    <script src="assets/vendor/gauge/gauge.js"></script>
    <script src="assets/vendor/snap-svg/snap.svg.js"></script>
    <script src="assets/vendor/liquid-meter/liquid.meter.js"></script>
    <script src="assets/vendor/jqvmap/jquery.vmap.js"></script>
    <script src="assets/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
    <script src="assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
    <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
    <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
    <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
    <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
    <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
    <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>
    
    <!-- Theme Base, Components and Settings -->
    <script src="assets/javascripts/theme.js"></script>
    
    <!-- Theme Custom -->
    <script src="assets/javascripts/theme.custom.js"></script>
    
    <!-- Theme Initialization Files -->
    <script src="assets/javascripts/theme.init.js"></script>

    <!-- Examples -->
    <script src="assets/javascripts/dashboard/examples.dashboard.js"></script>

    
    <script src="assets/vendor/select2/select2.js"></script>
    <script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
    <script src="assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
    
    

    <script src="assets/javascripts/forms/examples.validation.js"></script>
    <script src="assets/vendor/jquery-autosize/jquery.autosize.js"></script>
    <script src="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
    <script src="assets/javascripts/theme.init.js"></script>
      
    <script src="assets/vendor/select2/select2.js"></script>
    <script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
    <script src="assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
    <script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>

    <script src="assets/javascripts/tables/examples.datatables.default.js"></script>
    <script src="assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
    <script src="assets/javascripts/tables/examples.datatables.tabletools.js"></script>

    
  </body>
</html>
</body>
</html>




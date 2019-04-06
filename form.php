<?php 
include_once 'lib/database.php';
include_once('inc/header.php');
include_once 'class/Info.php';
$db    = new Database();
$info = new Info();

if (isset($_POST['submit'])) {
    
    $nationality = $_POST['nationality'];
    $type = $_POST['type'];
    $first = $_POST['first'];
    $surname = $_POST['surname'];
    $birth = $_POST['birth'];
    $passport = $_POST['passport'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $email1 = $_POST['email1'];
    $email2 = $_POST['email2'];
    $email3 = $_POST['email3'];
    $email4 = $_POST['email4'];
    $email5 = $_POST['email5'];
    $email6 = $_POST['email6'];
    $email7 = $_POST['email7'];
    $email8 = $_POST['email8'];

    $pass_file = $_FILES['pass_file'];
    $adi_file = $_FILES['adi_file'];

   $insert = $info->insert($nationality,$type,$first,$surname,$birth,$passport,$phone,$email,
             $email1,$email2,$email3,$email4,$email5,$email6,$email7,$email8,$pass_file,$adi_file);
}

 ?>
 
    

         <div class='ss'  style='padding: 20px;text-align: center;' >
          <p style="font-size: 50px" >Add Information</p>
           <?php 
        if (isset($insert)) {
          echo $insert;
        }

         ?>
           
         </div>
         
<div class="container-fluid">
<div class="row-fluid">
       
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
              <label class="col-sm-3 control-label">Email 1</label>
              <div class="col-sm-9">
                <input type="text"  required  name="email1" class="form-control" placeholder="Email 1" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Email 2</label>
              <div class="col-sm-9">
                <input type="text"  required name="email2" class="form-control" placeholder="Email 2" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Email 3</label>
              <div class="col-sm-9">
                <input type="text"  required name="email3" class="form-control" placeholder="Email 3" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Email 4</label>
              <div class="col-sm-9">
                <input type="text"  required name="email4" class="form-control" placeholder="Email 4" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Email 5</label>
              <div class="col-sm-9">
                <input type="text"  required name="email5" class="form-control" placeholder="Email 5" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Email 6</label>
              <div class="col-sm-9">
                <input type="text"  required name="email6" class="form-control" placeholder="Email 6" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Email 7</label>
              <div class="col-sm-9">
                <input type="text"  required name="email7" class="form-control" placeholder="Email 7" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Email 8</label>
              <div class="col-sm-9">
                <input type="text"  required name="email8" class="form-control" placeholder="Email 8" />
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
            <div class="form-actions">
              <button type="submit" name="submit" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
    </div>

  </div>




<script>
 $(document).ready(function(){

  $("#noCheck").click(function(){
    $("#surname").toggle();
  });

});
</script>
<?php include_once('inc/footer.php') ?>


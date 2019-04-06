<?php include_once 'inc/header.php'; 

if (!isset($_GET['edit']) || $_GET['edit'] == NULL)  {
    echo "<script>window.location = 'all-leaber.php'; </script>";
	}else{
	    $id = preg_replace("/[^-a-zA-Z0-9_]/", '', $_GET['edit']);
	}

$person = $info->person($id);

if (isset($_POST['submit'])) {
    
    $nationality = $_POST['nationality'];
    $type = $_POST['type'];
    $first = $_POST['first'];
    $surname = $_POST['surname'];
    $birth = $_POST['birth'];
    $passport = $_POST['passport'];
    $phone = $_POST['phone'];

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

   if ($pass_file['size'] == 0) {
   		$pa_file = '';
   }else{
   	$pa_file = $pass_file;
   };

   if ($adi_file['size'] == 0) {
   		$ad_file = '';
   }else{
   	$ad_file = $adi_file;
   }

    

   $edit = $info->edit($id,$nationality,$type,$first,$surname,$birth,$passport,$phone,
             $email1,$email2,$email3,$email4,$email5,$email6,$email7,$email8,$pa_file,$ad_file);

  
}


?>

<div class="container-fluid">
<div class="row-fluid">
       <?php 
       	if (isset($edit)) {
       		echo $edit;
       	}
            		

            	 ?>
 
        <div class="widget-content nopadding">
          <form method="post" class="form-horizontal" enctype="multipart/form-data" >
            	

            <div class="form-group">
              <label class="col-sm-3 control-label">Select Nationality</label>
              <div class="col-sm-9">
                <select name="nationality" required class="form-control" id="nationality">
                  <option>Select Nationality</option>
                  <option <?php echo ($person['nationality'] == 'INDIA') ? 'selected':'' ?> value="INDIA">INDIA</option>
                  <option  <?php echo  ($person['nationality'] == 'BANGLADESH') ? 'selected':'' ?> value="BANGLADESH">BANGLADESH</option>
                  <option  <?php  echo ($person['nationality'] == 'NEPAL') ? 'selected':'' ?> value="NEPAL">NEPAL</option>
                  <option  <?php  echo ($person['nationality'] == 'BHUTAN') ? 'selected':'' ?> value="BHUTAN">BHUTAN</option>
                  <option  <?php  echo ($person['nationality'] == 'MALDIVES') ? 'selected':'' ?> value="MALDIVES">MALDIVES</option>
                  <option  <?php echo  ($person['nationality'] == 'SRI LANKA') ? 'selected':'' ?> value="SRI LANKA">SRI LANKA</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Purpose of Travel</label>
              <div class="col-sm-9">
                <select name="type" required class="form-control" id="type">
                  <option>Select Purpose</option>
                  <option <?php echo ($person['type'] == 'EMPLOYEE CARD') ? 'selected':'' ?>  value="EMPLOYEE CARD">EMPLOYEE CARD</option>

                  <option  <?php echo ($person['type'] == 'SEASONAL WORK') ? 'selected':'' ?>   value="SEASONAL WORK">SEASONAL WORK</option>
                  <option <?php echo ($person['type'] == 'STUDIES') ? 'selected':'' ?>   value="STUDIES">STUDIES</option>
                  <option <?php echo ($person['type'] == 'FAMILY REUNIFICATION') ? 'selected':'' ?>   value="FAMILY REUNIFICATION">FAMILY REUNIFICATION</option>
                  <option <?php echo ($person['type'] == 'BUSINESS') ? 'selected':'' ?>   value="BUSINESS">BUSINESS</option>
                  <option <?php echo ($person['type'] == 'INVITATION') ? 'selected':'' ?>   value="INVITATION">INVITATION</option>
                  <option <?php echo ($person['type'] == 'CULTURE') ? 'selected':'' ?>   value="CULTURE">CULTURE</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">First Name</label>
              <div class="col-sm-9">
                <input type="text" required  name="first" class="form-control" placeholder="First Name" value="<?php echo $person['first'] ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Surname : <br>
                
              </label>
              <div class="col-sm-9">
                <input type="text"  value="<?php echo $person['surname'] ?>"   name="surname" id="surname" class="form-control" placeholder="Surname" />
                
              </div>
            </div>

            <div class="form-group pb-1">
				<label class="col-md-3 control-label">Default Datepicker</label>
				<div class="col-md-9">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</span>
						<input name="birth"  value="<?php echo $person['birth'] ?>"  required type="text" data-plugin-datepicker class="form-control">
					</div>
				</div>
			</div>
            

            <div class="form-group">
              <label class="col-sm-3 control-label">Passport Number:</label>
              <div class="col-sm-9">
                <input type="text" value="<?php echo $person['passport'] ?>"  required name="passport" id="passport" class="form-control" placeholder="Passport Number" />    
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-3 control-label">Phone Number :</label>
              <div class="col-sm-9">
                <input type="text" required value="<?php echo $person['phone'] ?>"  name="phone" id="phone" class="form-control" placeholder="Phone Number" />
        
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Email 1</label>
              <div class="col-sm-9">
                <input type="text"  required  value="<?php echo $person['email1'] ?>"  name="email1" class="form-control" placeholder="Email 1" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Email 2</label>
              <div class="col-sm-9">
                <input type="text"  required value="<?php echo $person['email2'] ?>"  name="email2" class="form-control" placeholder="Email 2" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Email 3</label>
              <div class="col-sm-9">
                <input type="text" required="" value="<?php echo $person['email3'] ?>"   name="email3" class="form-control" placeholder="Email 3" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Email 4</label>
              <div class="col-sm-9">
                <input type="text"  value="<?php echo $person['email4'] ?>"  required name="email4" class="form-control" placeholder="Email 4" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Email 5</label>
              <div class="col-sm-9">
                <input type="text"  value="<?php echo $person['email5'] ?>"  required name="email5" class="form-control" placeholder="Email 5" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Email 6</label>
              <div class="col-sm-9">
                <input type="text"  value="<?php echo $person['email6'] ?>"  required name="email6" class="form-control" placeholder="Email 6" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Email 7</label>
              <div class="col-sm-9">
                <input type="text" value="<?php echo $person['email7'] ?>"   required name="email7" class="form-control" placeholder="Email 7" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Email 8</label>
              <div class="col-sm-9">
                <input type="text"  value="<?php echo $person['email8'] ?>"  required name="email8" class="form-control" placeholder="Email 8" />
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
																<input  name="pass_file" type="file" />
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
																<input   name="adi_file" type="file" />
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








<?php include_once 'inc/footer.php'; ?>
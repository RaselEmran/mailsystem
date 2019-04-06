<?php 
include_once 'lib/database.php';
include_once('inc/header.php');
include_once 'class/Info.php';
$db    = new Database();
$info = new Info();
  
if (!isset($_GET['mail']) || $_GET['mail'] == NULL)  {
    echo "<script>window.location = 'all-leaber.php'; </script>";
  }else{
      $id = preg_replace("/[^-a-zA-Z0-9_]/", '', $_GET['mail']);
  }

// if (!isset($_GET['id'])) {
//   echo "<meta http-equiv='refresh' content='0;URL=?id=live'/>";
// }

$mail = $info->person($id);

if (isset($_POST['submit'])) {

    $to = $_POST['to'];
    $name = $_POST['name'];

    $subject = $_POST['subject'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $id;
   

   $mail_sent = $info->mail_sent($to,$name,$subject,$date,$time,$id);
}

 ?>
 

         <div class='ss'  style='padding: 20px;text-align: center;' >
          <p style="font-size: 50px" >Add Information</p>
           <?php 
        if (isset($mail_sent)) {
          echo $mail_sent;
        }

         ?>
           
         </div>
         
<div class="container-fluid">
<div class="row-fluid">
       
        <div class="widget-content nopadding">
          <form method="post" class="form-horizontal" enctype="multipart/form-data" >
              
 
         <!--    <div class="form-group">
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
            </div>-->
            
            <div class="form-group">
              <label class="col-sm-3 control-label">To</label>
              <div class="col-sm-9">
                <input type="text"  required name="to" class="form-control" placeholder="To" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Name</label>
              <div class="col-sm-9">
                <input type="text"  required name="name" class="form-control" placeholder="Email 5" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Subject</label>
              <div class="col-sm-9">
                <input type="text"  required name="subject" class="form-control" placeholder="Subject" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Date</label>
              <div class="col-sm-9">
                <input type="date"  required name="date" class="form-control" placeholder="Date" />
              </div>
            </div> 
            <div class="form-group">
              <label class="col-sm-3 control-label">Time</label>
              <div class="col-sm-9">
                <input type="time"  required name="time" class="form-control" />
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


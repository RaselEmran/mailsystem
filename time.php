<?php include_once 'inc/header.php'; ?>

<script>
 

$(document).ready(function(){

// updating the view with notifications using ajax

function load_unseen_notification()

{

   $.ajax({

    url:"process.php",
    method:"POST",
    data:{view:1},
    dataType:"json",
    success:function(data)
    {
      console.log(data);      
    }

   });

}


setInterval(function(){

  load_unseen_notification();

}, 30000);



});

</script>



<?php include_once 'inc/footer.php'; ?>
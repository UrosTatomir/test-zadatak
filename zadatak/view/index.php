<!DOCTYPE html html_entity_decode>
<html lang="sr-RS">
<?php

$user=isset($_SESSION['student'])?$_SESSION['student']:array();
$CMS_json=isset($CMS_json)?$CMS_json:"";
$CMSB_json=isset($CMB_json)?$CMSB_json:"";
$CMS=json_decode($CMS_json,true);
$CMSB=json_decode($CMSB_json,true);
// var_dump($CMS);die();
include '../includes/head.php';

?>
<body>
<?php include '../includes/nav.php';  ?>

<div class="container-fluid bg-light pt-5">
  <div class="container">
    <div class="row">
        <div class="card col-md-4">
        <div class="card-header">
            <h1 class="text-info text-center">CMS</h1>
        </div>
        <ul class="list-group list-group-flush">
         <?php if(empty($user)){ ?>
            <li class="list-group-item text-success">Niste ulogovani ulogujte se name = student1,(2,..), password= 1234</li>
        
         <?php }elseif($CMS >= 7){ ?>
            <li class="list-group-item text-success">PASS</li>
        <?php }else{ ?>
            <li class="list-group-item text-danger">DON'T PASS</li>
        <?php } ?>
            
        </ul>
        </div>
        <div class="card col-md-4 offset-md-3">
        <div class="card-header">
        <h1 class="text-success text-center">CMSB</h1>
        </div>
        <ul class="list-group list-group-flush">
        <?php if(empty($user)){ ?>
            <li class="list-group-item text-success">Niste ulogovani ulogujte se name = student1,(2,..), password= 1234</li>
         <?php }elseif($CMSB > 8){ ?>
            <li class="list-group-item text-success">PASS</li>
        <?php }else{ ?>
            <li class="list-group-item text-danger">DON'T PASS</li>
        <?php } ?>
            
        </ul>
        </div>
    </div>
  </div>

</div>


</body>
</html> 
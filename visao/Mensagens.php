<?php
    $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
   

    if(isset($_GET["type"]) && isset($_GET["message"])):?>
     <?php $styleType = $_GET['type']  == 'success' ? 'alert-success' : 'alert-danger';  ?>
        <div >
            <div class="alert <?=$styleType?> text-center message" role="alert">
                <?= $_GET['message'] ?>
            </div>
            
        </div>
    <?php endif;?>
  


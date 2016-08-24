<?php
     $change = $_POST['location'];
     $strcut = explode(",",$change);
    //var_dump($_POST['map']);
     echo json_encode($change);

?>

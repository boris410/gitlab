<!--參加頁面-->
<div class="col-sm-12"  style="border:3px gray solid; margin:3px;padding:3px;" >
        <form action="" method="post">
        <h3>活動名稱: <?php print_r($data[0][action_name]) ?> </h3>
        <h3>參加人數: <?php print_r($data[0][action_people]) ?> </h3>
        <h3>目前人數: <?php print_r($data[0][action_nowpeoples]) ?> </h3>
        <h3>員工編號: <input type="text" name="employ"></h3>
        是否攜伴: 
        <?php if($data[0][action_partner]==1){?>
        <input type="radio" name="takepeople" value="Apple" required="required"> 否
        <input type="radio" name="takepeople" value="5" required="required"> 是
        <?php }else{ ?>
          不可攜伴 
        <?php } ?>
        <br>
        <input type="hidden" name="action_id" value="<?php echo $data[0][action_id]; ?>"> 
        <input type="submit" name="submit"> 
        </form>
</div>
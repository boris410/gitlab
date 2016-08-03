
<div class="col-sm-12"  style="border:3px gray solid; margin:3px;padding:3px;" >
        <form>
        <h3>活動名稱: <?php print_r($data[0][action_name]) ?> </h3>
        <h3>員工編號: <input type="text" name="employee"></h3>
        是否攜伴: 
        <?php if($data[0][action_partner]==1){?>
        <input type="radio" name="Fruit" value="Apple"required="required"> 否
        <input type="radio" name="Fruit" value="Bananas"required="required"> 是
        <?php }else{ ?>
          不可攜伴
        <?php } ?>
        </form>
</div>
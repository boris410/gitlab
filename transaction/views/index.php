<?php for($i=0;$i<=count($data)-1;$i++){?>
    <div class="col-sm-9"  style="border:3px gray solid; margin:3px;padding:3px;" >
        <a href="accending?ac=<?php print_r($data[$i][action_id]) ?>"><?php print_r($data[$i][action_name]) ?></a>
    </div>
<?php }?>
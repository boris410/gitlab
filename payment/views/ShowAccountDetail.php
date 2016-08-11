<form action="" method="POST" class="output">
    <?php foreach($data as $key => $value){ ?>
    <h3>操作單號 : <?php echo $data[$key]['record_id']?></h3>
    <h3>操作 : <?php echo $data[$key]['account_operation']?></h3>
    <h3>操作金額 : <?php echo $data[$key]['account_opertaion_money']?></h3>
    <h3>剩餘金額 : <?php echo $data[$key]['account_last_money']?></h3>
    <h3>操作時間 : <?php echo $data[$key]['account_operation_time']?></h3>
    <br>
    <?php }?>
    <a href="showAccount">首頁</a>
</form>


<form action="" method="POST" class="output">
    <?php foreach($data as $key => $value){ ?>
    <h3><tr>
        <td>操作單號 : <?php echo $data[$key]['record_id']?></td>
        <td>操作 : <?php echo $data[$key]['account_operation']?></td>
        <td>操作金額 : <?php echo $data[$key]['account_opertaion_money']?></td>
        <td>剩餘金額 : <?php echo $data[$key]['account_last_money']?></td>
        <td>操作時間 : <?php echo $data[$key]['account_operation_time']?></td>
    </tr>
    </h3>
    <br>
    <?php }?>
    <a href="showAccount">首頁</a>
</form>


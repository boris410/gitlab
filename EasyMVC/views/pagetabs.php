
<!--顯示分頁-->
<div align="center"class="col-md-12">
<?php
//輸出資料內容

    $id=$row['id'];
    $name=$row['name'];
    ?>

    <tr>
        <td style="text-align: center;"><?php echo $id; ?></td>
        <td style="text-align: center;"><?php echo $name; ?></td>
    </tr>

<?php

     //分頁頁碼
    // echo '共 '.$data['data_nums'].' 筆-在 '.$data['page'].' 頁-共 '.$data['pages'].' 頁';
    echo '在第 '.$data['page'].' 頁';
    echo "<br /><a href=?page=1>首頁</a> ";
    echo "第 ";
    for( $i=1 ; $i<=$data['pages'] ; $i++ ) {
        if ( $data['page']-3 < $i && $i < $data['page']+3 ) {
            echo "<a href=?clickpage=".$i.">".$i."</a> ";
        }
    }
    echo " 頁 <a href=?page=".$data['pages'].">末頁</a><br /><br />";

   if (($data['page']-1)<=0 ) {//顯示上下頁如果分頁-1會小於0就指向本頁&能下一頁
       echo " <a href=index?clickpage=".($data['page']).">上一頁</a>";
       echo " <a href=index?clickpage=".($data['page']+1).">下一頁</a><br /><br />";
    }

    if (($data['page']+1) > $data['pages']) {
        echo "  <a href=?clickpage=".($data['page']-1).">上一頁</a>";
        echo " <a href=?clickpage=".($data['page']).">下一頁</a><br /><br />";
    }
?>
</div>
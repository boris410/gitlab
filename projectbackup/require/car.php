<?php 
            if(isset($_GET['gId'])){
                $commandm = "select mId from member where mEmail='$_COOKIE[userName]'";
                $meresult = mysql_query($commandm,$link);
                $row2=mysql_fetch_assoc($meresult);
                $commandi = "insert into bill(bgoodsid,gmemberid,bgoodsprice,bgoodsname,bbuydate) values('$row[gId]','$row2[mId]','$row[gPrice]','$row[gname]',current_timestamp())";
                 mysql_query($commandi,$link);
                     //將選擇的商品儲存到bill表單 儲存 物品號 會員號 物品價格 及購買時間
                 }
?>
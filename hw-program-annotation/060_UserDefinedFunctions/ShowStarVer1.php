
<?php  
 header("Content-Type:text/html; charset=utf-8");

//函示呼叫 函式比變數還要先執行如果在同一行

$a= 3;
function callfunc($num)
{
    for($num;$num>=1;$num--)
    {
        echo "ok";
    }
}
echo $a.callfunc(2);


?>
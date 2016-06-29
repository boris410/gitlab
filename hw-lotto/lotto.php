
<?php
  $randnum="";
   for($i=1;$i<50;$i++)
       $lottoarray[$i-1] = "$i"."\n";//產生1~49字串
    
       
 if(isset($_POST['drop'])){//按下按鈕後執行吐球
        echo "<div id=div2 class=div3>";
    if(isset($_POST['number'])){
            if($_POST['number']>6){
                echo "<div>請輸入6(包含)以下的數字</div>";
            }
            elseif($_POST['number']<1){
                echo "請輸入1(包含)以上的數字 or 請勿輸入英/國 字";
            }
           
            else{
                for($i=1;$i<=$_POST['number'];$i++){//將input欄內的數字轉成陣列長度當作要吐球的次數
                $ball=array_rand($lottoarray,1)."\n";//取亂數陣列key
                /
                echo  "<input type=text  name=number value= $ball  size=2px/>";//將數字放到input欄內
                 unset($lottoarray[(int)$ball]);//並從陣列中刪除吐到的key
                 }
            }
        } 
       
        else{
            echo "請輸入數字";
        }
        echo "</div>";
}
  
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <style type="text/css">
        div {
            margin: 0 auto;
            height:5em;
            width:11em;
            text-align:center;
           
            
            
        }
         #div2 {
            margin: 0 auto;
            height:5em;
            width:20em;
            text-align:center;
           
            
            
        }
        
       
        </style>
        <div>
        <form method="post" action="">
            
         
           請輸入要得到幾顆球:<input type="text"  name="number" value=""/>
           
             
            <input type="submit" name="drop" value="吐球"/>
        </div>
    </body>
</html>

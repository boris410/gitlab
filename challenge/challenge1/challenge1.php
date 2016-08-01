
<?php

 $origin = array(
        array(1, 1, 0, 0, 0, 1, 1, 1, 1, 1),
        array(1, 1, 0, 1, 1, 0, 0, 0, 0, 0),
        array(0, 0, 0, 1, 1, 0, 0, 0, 0, 0),
        array(0, 0, 0, 0, 0, 1, 1, 1, 0, 0),
        array(1, 1, 1, 1, 1, 0, 0, 0, 0, 0),
        array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
        array(1, 1, 1, 0, 1, 1, 0, 1, 1, 1),
        array(1, 1, 0, 0, 1, 0, 0, 1, 1, 1),
        array(1, 0, 0, 0, 1, 0, 0, 1, 1, 1),
        array(1, 1, 1, 1, 1, 0, 0, 0, 0, 1)
    );
    

 
 /*-------------------------------------------------------*/
 
 
  $num=0;
   while($num<count($origin)){
    $num2=0;
         while(isset($origin[$num][$num2])){
          
         echo $origin[$num][$num2]." ";
        
          $num2+=1;
          
         }
      echo "<br>";
    $num+=1;
   }

//   /*-------------------------------------------------------*/  
//   /*1.找到四周的點後往下延伸while 並設為null*/
//   /*先設定未被設定的check*/
  
      echo "<br>";

  
 
echo "//找出上下左右相鄰的陣列並計算區塊<br>";
for($i=0;$i<=count($origin);$i++){
 $num2=0;
    while(isset($origin[$i][$num2])){//找出二維陣列
          if($origin[$i][$num2]==1 && $check[$i][$num2]==null ){//如果陣列是1且在check陣列裡記錄不還沒有紀錄為一個區塊 
              if($check[$i-1][$num2]==null && $check[$i+1][$num2]==null && $check[$i][$num2-1]==null && $check[$i][$num2+1]==null){
               //如果四個方向都沒有設置check
                  $block+=1;//新的區塊
                  $check[$i][$num2]=$block;
                 

              }elseif($check[$i-1][$num2]!=null){//上方
                if($check[$i][$num2-1]<$check[$i-1][$num2]){
                   $check[$i][$num2]=$check[$i-1][$num2];
                
                }else{
                 $check[$i][$num2]=$check[$i-1][$num2];
                }
              
                   
              }elseif($check[$i][$num2-1]!=null){//左方
               $check[$i][$num2]=$check[$i][$num2-1];
               
              }elseif($check[$i][$num2+1]!=null){//右方
               $check[$i][$num2]=$check[$i][$num2+1];
               
              }elseif($check[$i+1][$num2]!=null){//下方
               $check[$i][$num2]=$check[$i+1][$num2];
               
              }else{
               $check[$i][$num2] = $block;
               
              }
           echo $check[$i][$num2]." ";
          }else{
           echo "0 ";
          }
      $num2+=1;
     
     }
    echo "<br>";
    
}






// //var_dump($loadblock);


// echo "//從最後面找回去 如果相鄰數字比自己小 代表自己屬於其他更早的區塊<br>"; 
//      $a=$b=count($origin)-1;  
//    while($a>=0){//從最後面找回去 如果相鄰數字比自己小 代表自己屬於其他更早的區塊
//          while($b>=0){
//           if($check[$a][$b]==null)
//            echo"0 ";
//            else{
//               if($check[$a-1][$b]!=null && $check[$a][$b]!=$check[$a-1][$b] && $check[$a][$b]>$check[$a-1][$b]){//上方
//                    $check[$a][$b]=$check[$a-1][$b];
//               }elseif($check[$a][$b-1]!=null && $check[$a][$b]!=$check[$a][$b-1] && $check[$a][$b]>$check[$a][$b-1]){//左方
//                    $check[$a][$b]=$check[$a][$b-1];
//               }elseif($check[$a][$b+1]!=null && $check[$a][$b]!=$check[$a][$b+1] && $check[$a][$b]>$check[$a][$b+1]){//右方
//                    $check[$a][$b]=$check[$a][$b+1];
//               }elseif($check[$a+1][$b]!=null && $check[$a][$b]!=$check[$a+1][$b] && $check[$a][$b]>$check[$a+1][$b]){//下方
//                    $check[$a][$b]=$check[$a+1][$b];
//              // $loadblock[$check[$a+1][$b]][]=array($a,$b);
              
               
//               }
//             echo $check[$a][$b]." ";
            
            
//            }
//           $b-=1;
//          }
//          $b=9;
//       echo "<br>";
//     $a-=1;
//    }
   
   
//    echo "<br>";

//     echo "//將最大區塊的座標寫入到recoed裡面<br>";
//     $num=0;
//     $compare=0;
//    while($num<count($origin)){//將最大區塊的座標寫入到recoed裡面
//     $num2=0;
//          while($num2<count($origin[$num])){
//           if($check[$num][$num2]==null){
           
//           }
//            else{
//                 $loadblock[$check[$num][$num2]][]="$num $num2";
                
//                 $load = count($loadblock[$check[$num][$num2]]);
//                 if($compare<$load){
//                  $compare=$load;
//                  $recoed=$loadblock[$check[$num][$num2]];
//                 }
//            }
//           $num2+=1;
          
//          }
//     $num+=1;
//    }

// for($i=0;$i<count($recoed);$i++){//將座標字串取出
//  $str=$recoed[$i];
//  $str2 = explode(" ",$recoed[$i]);
//  $recoed2[$str2[0]][$str2[1]]=1;
// }

//     echo "//計算如果check陣列 以及 座標陣列and到的就顯示出來<br>";
// $num=0;
//  while($num<=count($check)){//計算如果check陣列 以及 座標陣列and到的就顯示出來
//     $num2=0;
//          while($num2<=count($check)){
//           if(isset($check[$num][$num2]) && isset($recoed2[$num][$num2])){
//               echo $check[$num][$num2]." ";
//            }
//          else
//          echo "0 ";
         
//          $num2+=1;
//          }
//       echo "<br>";
//     $num+=1;
//    }
   
//   /*-------------------------------------------------------*/  
//   echo "<br>";
  

?>
<?php
function testfunction($count){
   
   if($count >0){
       
    while($count>0){
        echo "*";
        
        $count=$count-1;
    }
   }
   else{
       echo "your input is less than 0";
   }
   
    
}
testfunction(0);

?>
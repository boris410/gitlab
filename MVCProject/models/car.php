<?php 
class car extends Controller{
       function showbill(){
          $this->model("logphp");
          $logphp = new logphp();
          $status = $logphp->checkstatus();
           if($status!=""){
                $dblink = $logphp->dbconnect();
                $command = "select member.mId,bill.* from member join bill on  member.mEmail ='$_SESSION[userName]' and member.mId = bill.gmemberid";
                $billresult = mysql_query($command,$dblink);
                
                    while($billdata = mysql_fetch_assoc($billresult)){
                             $billarray[]=array(
                                         'mId' => $billdata['mId'],
                                         'billid' => $billdata['billid'],
                                         'bgoodsid' => $billdata['bgoodsid'],
                                         'bbuydate' => $billdata['bbuydate'],
                                         'gmemberid' => $billdata['gmemberid'],
                                         'bgoodsprice' => $billdata['bgoodsprice'],
                                         'bgoodsname' => $billdata['bgoodsname']
                                           );
                    }
                
                return $billarray;
            
           }else
           {
            echo "no";
           }
          // $status = $logphp->checkstatus();
           //echo $status;
      
       
      }
      function addgoods($data){
       
       $this->model("logphp");
       $logphp = new logphp();
       $dblink = $logphp->dbconnect();
       $checkresult = $logphp->checkstatus();
      
     
      
             if( $checkresult!=""){
              $commandm = "select mId from member where mEmail='$_SESSION[userName]'";
              $meresult = mysql_query($commandm,$dblink);
              $row2=mysql_fetch_assoc($meresult);
               
               if(isset($_SESSION['buytime'])){//設定購買變數為購買項目的根據 目的:刪除項目時用
                            $_SESSION['buytime'] +=1;//查看購買次數 如果不是就設置初始直0 
                        }else{
                             $_SESSION['buytime'] =1;
                        }
                $car = array(
                                     
                                     $row2['mId'],
                                     $data['gId'],  //將商品資訊丟到陣列裡面
                                     $data['gPrice'],
                                     $data['gname'],
                                     date("Y:m:d h:i:s"));    
                         $num="mID"."$_SESSION[buytime]";
                         $_SESSION[car][$num]=$car;//將商品陣列丟到seesion的[car][購買次數]
                         header("location: index");
                        
             }else{
              header("location:login");
             }
                 
       
      }
      function delegoods(){
       
      }
      function deal(){
       
      }

}




        // if(isset($_GET['deal']))
        // {
        
        //   echo "yes";
         
        //         foreach($_SESSION[car] as $key =>$value ){
        //         $d0=$_SESSION[car][$key][0];
        //         $d1=$_SESSION[car][$key][1];
        //         $d2=$_SESSION[car][$key][2];
        //         $d3=$_SESSION[car][$key][3];
        //         $commandi = "insert into bill(gmemberid,bgoodsid,bgoodsprice,bgoodsname,bbuydate) values($d0,$d1,$d2,'$d3',current_timestamp())";
        //         mysql_query($commandi,$link);
        //        }
         
        //    unset($_SESSION[car]);
        //  header("location: cart.php");
       
        // }
        // elseif(isset($_GET['delete'])){
	       //    $del="$_GET[delete]";//依照丟過來的mid購買編號將此次的購物車內容單項刪除
	       //   unset($_SESSION[car][$del]);
            
        // }
        //  elseif(isset($_GET['addc'])){//如果得到按鈕addc=1  按下加入購物車後
         
        //         $commandm = "select mId from member where mEmail='$_SESSION[userName]'";
        //         $meresult = mysql_query($commandm,$link);
        //         $row2=mysql_fetch_assoc($meresult);
               
        //         if($_SESSION['cartime']==""){
        //          $time=date("Y:m:d h:i:s");
        //          $time=str_replace(":","",$time);
        //          $time=str_replace(" ","",$time);
        //          $_SESSION['cartime']=$time;//將日期時間變成編號
        //         }
                
        //          if(isset($_SESSION['buytime'])){//設定購買變數為購買項目的根據 目的:刪除項目時用
        //              $_SESSION['buytime'] +=1;//查看購買次數 如果不是就設置初始直0 
        //          }else{
        //               $_SESSION['buytime'] =1;
        //          }
        //           $car = array(
                              
        //                       $row2['mId'],
        //                       $row['gId'],  //將商品資訊丟到陣列裡面
        //                       $row['gPrice'],
        //                       $row['gname'],
        //                       date("Y:m:d h:i:s"));    
        //           $num="mID"."$_SESSION[buytime]";
                 
        //           $_SESSION[car][$num]=$car;//將商品陣列丟到seesion的[car][購買次數]
                 
               
        //           header("location: index.php");
            
        // }


          
?>
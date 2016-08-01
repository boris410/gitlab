<?php 
class car extends Controller{
       
       function showbill(){//購物車內 個人帳號的所有歷史帳單
          $this->model("logphp");
          $logphp = new logphp();
          if($logphp->checkstatus()){
                $link = $this->getConnect();
                $select = $link->prepare("SELECT member.mId,bill.* 
                                          FROM member 
                                          JOIN bill 
                                          ON  member.mEmail =? AND member.mId = bill.gmemberid");
                $select->bindParam(1,$_SESSION['userEmail']);
                $select->execute();
                $billarray = $select->fetchAll();
                $link = null;
                return $billarray;
           }else
           {
           $link = null;
           return false;
           }
      }
      
        function addgoods($data){//增加商品到購物車
            $this->model("logphp");
            $logphp = new logphp();
            //檢查是否有登入 傳回查詢帳號的結果 沒有結果導向到登入
            if($logphp->checkstatus()){
            $link = $this->getConnect();
            $select = $link->prepare("SELECT mId 
                                      FROM member 
                                      WHERE mEmail= ? ");
            $select->bindParam(1,$_SESSION['userEmail']);
            $select->execute();
            $row2=$select->fetch();
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
                                date("Y:m:d h:i:s")
                            );  
                         $num="mID"."$_SESSION[buytime]";
                         $_SESSION[car][$num]=$car;//將商品陣列丟到seesion的[car][購買次數]
                         $link = null;
                         unset($_GET['addc']);
                         return true;
             }else{
              $link = null;
              return false;
             }
      }
      
        function delegoods(){//刪除購物車內商品
            unset($_SESSION[car][$_GET['delete']]);
            if(!isset($_SESSION[car][$del])){
                if($_SESSION[car]==null){//如果最後都沒有項目了就把session中car的陣列刪除views就會顯示前往index的連結
                    unset($_SESSION[car]);
                    return true;
             	}
            }else{
                return false;
            }
      }
      
        function deal(){//交易單筆商品
                    if(isset($_SESSION[car][$_POST['deal']])){//加強判斷如果session裡有這一筆資料
                             foreach($_SESSION[car][$_POST['deal']] as $value  ){//將商品分割成一為陣列中的四筆資料
                             $d0=$_SESSION[car][$_POST['deal']][0];
                             $d1=$_SESSION[car][$_POST['deal']][1];
                             $d2=$_SESSION[car][$_POST['deal']][2];
                             $d3=$_SESSION[car][$_POST['deal']][3];
                             
                             }
                             $link = $this->getConnect();
                             $insert = $link->prepare("INSERT INTO bill(gmemberid,bgoodsid,bgoodsprice,bgoodsname,address,paytype,addressee,bbuydate) 
                                                                   VALUE(?,?,?,?,?,?,?,current_timestamp())");
                             $insert->bindParam(1,$d0);
                             $insert->bindParam(2,$d1);
                             $insert->bindParam(3,$d2);
                             $insert->bindParam(4,$d3);
                             $insert->bindParam(5,$_POST['address']);
                             $insert->bindParam(6,$_POST['paytype']);
                             $insert->bindParam(7,$_POST['addressee']);
                             $insert->execute();


                             unset($_SESSION[car][$_POST['deal']]);//寫入mysql後刪除點擊的那一單項
                             if(!isset($_SESSION[car][$_POST['deal']])){//判斷是否有這一項商品 沒有就是刪除成功
                                if($_SESSION[car]==null){//如果最後都沒有項目了就把session中car的陣列刪除views就會顯示前往index的連結
                                    unset($_SESSION[car]);
                                  }
                                  $link = null;
                                return true;
                              }else{
                                  $link = null;
                               return false;//代表這項商品沒有刪除掉
                              }
                     }
                     else{
                         $link = null;
                        return false;//代表沒有這項商品 使用者直接打入url跳過操作
                     }
      }
     

}

?>
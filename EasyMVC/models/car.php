<?php 
  
    class car extends load{
        private $db;
        function __construct(){
             $this->db = $this->model("database");
        }
       
       function showbill($userEmail){//購物車內 個人帳號的所有歷史帳單
            //$db = $this->model("database");
            $result = $this->db->select(" SELECT member.mId,bill.* 
                                          FROM member 
                                          JOIN bill 
                                          ON  member.mEmail ='$userEmail' AND member.mId = bill.gmemberid");
            
            return $result;
      }
      
        function addgoods($data,$userEmail,$buytime){//增加商品到購物車
            //$db = $this->model("database");
            $result = $this->db->select("SELECT mId 
                                   FROM member 
                                   WHERE mEmail= '$userEmail' ");
            if(isset($buytime)){//設定購買變數為購買項目的根據 目的:刪除項目時用
                $buytime +=1;//查看購買次數 如果不是就設置初始直0 
            }else{
                $buytime =1;
            }
            var_dump($buytime);
            $car = array(
                            $result[0]['mId'],
                            $data[0]['gId'],  //將商品資訊丟到陣列裡面
                            $data[0]['gPrice'],
                            $data[0]['gname'],
                            date("Y:m:d h:i:s")
                        );  
            $num="mID".$buytime;
            return array('buytime'=>$buytime,'addid'=>$num,'car'=>$car);
            return true;
      }
      
        function delegoods(){//刪除購物車內商品
            unset($_SESSION[car][$_GET['delete']]);
      }
      
        function deal($SESSIONarray,$address,$paytype,$addressee){//交易單筆商品
           // $db=$this->model("database");
            $this->db->insert("INSERT INTO bill(gmemberid,bgoodsid,bgoodsprice,bgoodsname,address,paytype,addressee,bbuydate) 
                         VALUE('$SESSIONarray[gmemberid]',
                         '$SESSIONarray[bgoodsid]',
                         '$SESSIONarray[bgoodsprice]',
                         '$SESSIONarray[bgoodsname]',
                         '$address',
                         '$paytype',
                         '$addressee',
                         current_timestamp())");
            return true;
      }
    }

?>
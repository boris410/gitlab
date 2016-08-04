 <?php

    class blogphp extends load{
        function checkstatus(){//後台檢查登入狀況
            if(isset($_SESSION['userName'])){
                $db = $this->model("database");
                $resutle = $db->select("SELECT mguser,mgpass FROM management WHERE mguser= '$_SESSION[userName]' AND mgpass= '$_SESSION[userpass]' ");
                if($resutle){
                    return true;
                }
            }
        }
        
        function personnalshow($user){//抓出個人資料的內容
            $db = $this->model("database");
            $resutle = $db->select("SELECT member.*,account.aPassword,bill.*
                                    FROM member
                                    JOIN account 
                                    ON mEmail= '$user' AND account.aEmail=member.mEmail
                                    LEFT JOIN bill
                                    ON member.mId = bill.gmemberid");
            $db=null;
            return  $resutle;
            }
    }
?>

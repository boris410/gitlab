<?PHP 
    class SESSION{
        function set_user_SESSION($txtUserEmail,$txtPassword){//登入確定後設定SESSION
            $_SESSION['username'] = $txtUserEmail;
            $_SESSION['userpass'] = $txtPassword;
        }
        
        function clear_all_user_SESSION(){//清除session
            session_unset();
        }
        
        function get_SESSION($session_key1){//取得session陣列內 key為$session_key變數的session值/*****/可精簡
            $result = $_SESSION[$session_key];
            return $result;
        }
        
        function get_user_SESSION_all_array(){//取得session的內的使用者帳號密碼 用來查詢個人的資料用
            $username = $_SESSION['username'];
            $userpass  = $_SESSION['userpass'];
            return array('username' => $username,'userpass' => $userpass);
        }
        
        function clear_car_SESSION($SESSION){//清除購物車的特定項session值
             unset($_SESSION[car][$SESSION]);
            if(!isset($_SESSION[car][$del])){
                if($_SESSION[car]==null){//如果最後都沒有項目了就把session中car的陣列刪除views就會顯示前往index的連結
                    unset($_SESSION[car]);
             	}
             	return true;
            }
        }
        
        function get_car_SESSION($SESSION){//取德購物車中 特定的 session值
            if(isset($_SESSION[car][$_POST['deal']])){
                foreach($_SESSION[car][$SESSION] as $value){//將商品分割成一為陣列中的四筆資料
                    $d0=$_SESSION[car][$SESSION][0];
                    $d1=$_SESSION[car][$SESSION][1];
                    $d2=$_SESSION[car][$SESSION][2];
                    $d3=$_SESSION[car][$SESSION][3];
                }
            return array('gmemberid'=>$d0,'bgoodsid'=>$d1,'bgoodsprice'=>$d2,'bgoodsname'=>$d3);
            }
        }
        
        function set_car_SESSION($resultarray){//設置購物車中特定的session值
            $_SESSION[car][$resultarray['addid']]=$resultarray['car'];
            $_SESSION['buytime']=$resultarray['buytime'];
        }
    
    }
    

?>
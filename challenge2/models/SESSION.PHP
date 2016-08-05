<?PHP 
    class SESSION{
        function set_user_SESSION($txtUserEmail,$txtPassword){//登入確定後設定SESSION
            $_SESSION['username'] = $txtUserEmail;
            $_SESSION['userpass']  = $txtPassword;
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
        
    }
    

?>
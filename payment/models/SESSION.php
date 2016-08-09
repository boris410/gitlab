<?PHP 
    class SESSION{
        function set_user_SESSION($account)//登入確定後設定SESSION
        {
            $_SESSION['account'] = $account;
            $_SESSION['account_GID'] = getmypid();
        }
        
        function get_user_SESSION()//登入確定後設定SESSION
        {
           $result = $_SESSION['account'];
           return $result;
        }
        
        function clear_SESSION()//登入確定後設定SESSION
        {
            session_unset();
        }
        
        

    }
    

?>
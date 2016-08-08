<?PHP 
    class SESSION{
        function set_user_SESSION($account)//登入確定後設定SESSION
        {
           $_SESSION['account'] = $account;
        }
    }
    

?>
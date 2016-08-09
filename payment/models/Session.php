<?PHP

class Session{
    function setUserSession($account)//登入確定後設定SESSION
    {
        $_SESSION['account'] = $account;
    }

    function clearSession()//登入確定後設定SESSION
    {
        session_unset();
    }
}

<?PHP

class Session
{
    //登入確定後設定SESSION
    function setUserSession($account)
    {
        $_SESSION['session_Account'] = $account;
    }

    function clearSession()
    {
        session_unset();
    }
}

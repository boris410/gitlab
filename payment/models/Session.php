<?PHP

class Session
{
    //登入確定後設定SESSION
    function setUserSession($account)
    {
        $_SESSION['account'] = $account;
    }

    function getUserSession()
    {
        return $_SESSION['account'];
    }

    function clearSession()
    {
        session_unset();
    }
}

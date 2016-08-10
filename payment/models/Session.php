<?PHP

class Session
{
    //登入確定後設定SESSION
    function setUserSession($account)
    {
        $_SESSION['session_Account'] = $account;
    }

    function getUserSession()
    {
        return $_SESSION['session_Account'];
    }

    function clearSession()
    {
        session_unset();
    }
}

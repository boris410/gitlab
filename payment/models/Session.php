<?PHP

class Session
{
    //登入確定後設定SESSION
    function setUserSession($account,$accountId)
    {
        $_SESSION['session_account'] = $account;
        $_SESSION['session_accountid'] = $accountId;
    }

    function getUserSession()
    {
        return array('account_account'=>$_SESSION['session_account'],'account_id'=>$_SESSION['session_accountid']);
    }

    function clearSession()
    {
        session_unset();
    }
}

 <?php
    class logphp extends Controller{
           
        function logout(){
            session_unset();//刪除session
            if(count($_SESSION)==0){
                return true;
            }else{
                echo false;;
                }
            }
            
        function checkaccount(){//登入時檢查是否有input 裡面的帳號密碼//$link輸入參數為db的連線結果
            $SESSION = $this->model("SESSION");
            if($SESSION->check_user_SESSION()){
                return true;
            }else{
                return false;
            }
        }

        function register($first,$last,$userEmail,$userpass,$phone){
            $db = $this->model("database");
            $db->insert("INSERT INTO member (mFirstname,mLastname,mEmail,mPhone) 
                         VALUES ('$first','$last','$userEmail','$phone')");
                                         
            $db->insert("INSERT INTO account (aPassword,aEmail) 
                         VALUES ('$userpass','$userEmail')");
            $result = $db->select("SELECT member.*,account.* 
                                   FROM member 
                                   JOIN account 
                                   ON member.mEmail='$userEmail' AND account.aEmail='$userEmail' ");
            if($result){
                $db=null;
                return true;
            }else{
                $db=null;
                return false;
            }
        }
}
?>

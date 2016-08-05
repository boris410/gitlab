 <?php
    class register extends load{
        private $db;
        function __construct(){
            $this->db = $this->model("database");
        }
        function creataccount($first,$last,$userEmail,$userpass,$phone){//註冊新帳號
        
            $this->db->insert("INSERT INTO member (mFirstname,mLastname,mEmail,mPhone) 
                         VALUES ('$first','$last','$userEmail','$phone')");/*新增新帳號member 會員資料欄位*/
                                         
            $this->db->insert("INSERT INTO account (aPassword,aEmail) 
                         VALUES ('$userpass','$userEmail')");/*新增新帳號account 帳號密碼欄位資料*/
                         
            $result =$this->db->select("SELECT member.*,account.* 
                                   FROM member 
                                   JOIN account 
                                   ON member.mEmail='$userEmail' AND account.aEmail='$userEmail' ");//檢查是否有新增成功
            if($result){
                $db=null;
                return true;
            }
        }
}
?>

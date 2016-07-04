<?php require_once("require/head.php")?>
<?php 
if(isset($_POST['apply'])){
    $link=mysql_connect("localhost","root","");
    mysql_select_db("shopping",$link);
    $command = "INSERT INTO member (mFirstname,mLastname,mSex,mBirth,mEmail,mPhone) VALUES ('$_POST[firstname]', '$_POST[lastname]', '$_POST[sex]', '$_POST[birthdate]',  '$_POST[emailaddress]','$_POST[phonenumber]')";     
    mysql_query($command,$link);
    header("location: index.php");
    //創辦帳號並對資料庫新增欄位並導向到index.php
}


?>

<div class="col-md-12">
    <div class="col-md-3 " ></div>
    
    
        <div class="col-md-6 div-color">
        <form method="post" action="" >
            <div class="col-md-9">
            <h3>Firstname</h2><input  type="text" name="firstname"/>
            <h3>Lastname</h2><input type="text" name="lastname"/>
            <h3>Sex</h2><input type="text" name="sex"/>
            <h3>Birthdate</h2><input type="text" name="birthdate"/>
            <h3>Email address</h2><input  type="text" name="emailaddress"/>
            <h3>Phone Number</h2><input type="text" name="phonenumber"/>
            </div>
            
            <div align="center"class="col-md-12"><input type="submit" name="apply"></div>
        </form>
        </div>
        
        
    <div class="col-md-3 " > </div>
</div>

    

    <?php require_once("require/footer.php")?>
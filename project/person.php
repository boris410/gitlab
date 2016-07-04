<?php 
require_once("require/check.php");
require_once("require/head.php");
require_once("require/dbconnect.php");
   $dbname="shopping";
    mysql_select_db($dbname, $link);
    $command = "select * from member where $_COOKIE['userName'] = $row['mFirstname']";
    $result = mysql_query($command,$link);
    $row = mysql_fetch_assoc($result);
    //到此頁面載入個人資料
?>

<div class="col-md-12">
    <div class="col-md-3 " ></div>
    
    
        <div class="col-md-6 div-color">
        <form method="post" action"" color="">
          
            
            <h3>Firstname</h3><input type="text" name="firstname" value="<?php echo $row['mFirstname']; ?>" />
            <h3>Lastname</h3><input type="text" name="lastname" value="<?php echo $row['mLastname']; ?>"/>
            <h3>Sex</h3><input type="text" name="sex" value="<?php echo $row['mSex']; ?>"/>
            <h3>Birthdate</h3><input type="text" name="birthdate" value="<?php echo $row['mBirth']; ?>"/>
             <h3>Email address</h3><input type="text" name="emailaddress" value="<?php echo $row['mEmail']; ?>"/>
            <h3>Phone Number</h3><input type="text" name="phonenumber" value="<?php echo $row['mPhone']; ?>"/>
        </div>
    <div class="col-md-3 " ></div>
    
</div>



           <div >
              <h2>Your goods</h2>
              <table class="table table-border">
                  <tr>
                      <td> <img src="pic/manpic.jpg"></td> 
                      <td>  <img src="pic/manpic.jpg"></td> 
                      <td> <img src="pic/manpic.jpg"></td>
                  </tr>
              </table>
                </div>
              
              
              
   
        </form>
        </div>



    

    <?php require_once("require/footer.php")?>
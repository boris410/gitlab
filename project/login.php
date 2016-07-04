<?php 
require_once("require/logphp.php");
require_once("require/head.php");

?>


    <!-- login button-->
    <div class="col-md-12 text-center">

        <form id="form1" name="form1" method="post" action="login.php">
            <table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
                <tr>
                    <td colspan="2" align="center" bgcolor="#CCCCCC">
                        <font color="#FFFFFF">會員系統 - 登入</font>
                    </td>
                </tr>
                <tr>
                    <td width="80" align="center" valign="baseline">Account</td>
                    <td valign="baseline"><input type="text" name="txtUserName" id="txtUserName" /></td>
                </tr>
                <tr>
                    <td width="80" align="center" valign="baseline">Password</td>
                    <td valign="baseline"><input type="password" name="txtPassword" id="txtPassword" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center" bgcolor="#CCCCCC">
                        <input class="" type="submit" name="btnOK" id="btnOK" value="登入" />
                        <input type="reset" name="btnReset" id="btnReset" value="取消" />
                        <input type="submit" name="btnHome" id="btnHome" value="回首頁" />
                        <input type="submit" name="btnapply" id="btnapply" value="申請帳號" />
                    </td>
                </tr>
            </table>
        </form>
    </div>


<?php require_once("require/footer.php") ?>
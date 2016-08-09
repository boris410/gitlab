<H3>帳號 : <?php print_r($data[0]['account_account'])?><H3>
<form action="" method="POST" class="formoption">
    <button type="submit" value="1" name="option" id="option">查詢</button>
    <button type="submit" value="2" name="option" id="option">存款</button>
    <button type="submit" value="3" name="option" id="option">提款</button>
</form>

<form class="inquire" >
    <h3>操作 : </h3>
    <h3>操作金額 :</h3>
    <h3>剩餘金額 :</h3>
    <h3>操作時間 :</h3>
</form>

<form action="" method="POST" class="input">
    <h3>操作 : 存款</h3>
    <h3>操作金額 :</h3>
    <input type="text" name="inputmoney">
    <button type="submit" name="submitmoney">存入</button>
</form>

<form action="" method="POST" class="output">
    <h3>操作 : 提領</h3>
    <h3>操作金額 :</h3>
    <input type="text" name="outputmoney">
    <button type="submit" name="submitmoney">取領</button>
</form>

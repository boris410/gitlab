<form action="" method="POST" class="input">
    <h3>操作 : 存款</h3>
    <h3>操作金額 :</h3>
    <input type="text" name="saveMoney" pattern="^[0-9]*$" required >
    <button type="submit" name="save">存入</button>
    <br>
    <?php echo "$data<br>";?>
    <a href="showAccount">首頁</a>
</form>


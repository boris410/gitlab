<form action="" method="POST" class="output">
    <h3>操作 : 提領</h3>
    <h3>操作金額 :</h3>
    <input type="text" name="takeMoney"  pattern="^[0-9]*$" required >
    <button type="submit" name="take">取領</button>
    <br>
    <?php echo "$data<br>";?>
    <a href="showAccount">首頁</a>
</form>

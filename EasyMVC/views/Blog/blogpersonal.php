<?php var_dump($data);?>

</div>

<div class="container">
<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>User:<?php print_r($data[0]['mFirstname']);echo $data[0]['mLastname']; ?> </legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">FirstName</label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="<?php echo $data[0]['mFirstname'] ?>" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Last Name </label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="<?php echo $data[0]['mLastname']; ?>" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Email</label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="<?php echo $data[0]['mEmail'] ?>" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Password</label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="<?php echo $data[0]['aPassword'] ?>" class="form-control input-md">
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Phone</label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="<?php echo $data[0]['mPhone'] ?>" class="form-control input-md">
    
  </div>
</div>






</fieldset>
</form>


</div>
<table border="1" align="center">
			<tr>
		   <th>下單日期</th> <th>商品名稱</th>	<th>價格</th> <th>地址</th> <th>收件人</th> <th>付費方式</th> <th>處理情況</th>
		</tr>
			<?php for($i=0;$i<=count($data)-1;$i++){ ?>
			
			  
		<tr>
	 <a href=""> <td align="center"><a href="?bill="<?php print_r($data[$i]['billid']); ?>""><?php  echo $data[$i]['bbuydate']; ?></a></td> 
	 <td align="center"><?php echo $data[$i]['bgoodsname']; ?></td>
	 <td align="center"><?php echo $data[$i]['bgoodsprice'];  ?></td>
	 <td align="center"><?php echo $data[$i]['address'];  ?></td>
	 <td align="center"><?php echo $data[$i]['addressee'];  ?></td>
	 <td align="center"><?php echo $data[$i]['paytype'];  ?></td>
	 <?php if($data[$i]['deal']==null){?>
	 <td align="center"><?php echo "準備中";  ?></td>
	 <?php }else { ?>
	 <td align="center"><?php echo "已出貨";  ?></td>
	 <?php } ?>
		</tr>
		
	<?php } ?>
		</table>
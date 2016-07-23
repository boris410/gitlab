</div>

<div class="container">
<form  class="form-horizontal">
<fieldset>


    <li style="list-style-type:none;"><a href="">User:<?php print_r($data[0]['mFirstname']);echo $data[0]['mLastname']; ?></a> </li>



<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">FirstName</label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="<?php echo $data[0]['mFirstname'] ?>" class="form-control input-md">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Last Name </label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="<?php echo $data[0]['mLastname']; ?>" class="form-control input-md">
    
  </div>
</div>

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



<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Phone</label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="<?php echo $data[0]['mPhone'] ?>" class="form-control input-md">
    
  </div>
</div>


</fieldset>
</form>



</div>

    

<table  border="1" align="center">
			<tr>
		   <th>下單日期</th> <th>商品名稱</th>	<th>價格</th> <th>地址</th> <th>收件人</th> <th>付費方式</th> 
		</tr>
			<?php for($i=0;$i<=count($data)-1;$i++){ ?>
		<tr>
	 <td align="center"><a href="singledeal?bill="<?php echo $data[$i]['billid']; ?>""><?php  echo $data[$i]['bbuydate']; ?></a></td> 
	 <td align="center"><?php echo $data[$i]['bgoodsname']; ?></td>
	 <td align="center"><?php echo $data[$i]['bgoodsprice'];  ?></td>
	 <td align="center"><?php echo $data[$i]['address'];  ?></td>
	 <td align="center"><?php echo $data[$i]['addressee'];  ?></td>
	 <td align="center"><?php echo $data[$i]['paytype'];  ?></td>
	
		</tr>
		
	<?php } ?>
		</table>
		</form>

<!-- <ul class="tabs" id="tabs01">-->
<!--      <li><a href="javascript:void(0)" class="current">tab切换一</a></li>-->
<!--      <li><a href="javascript:void(0)" >tab切换二</a></li>-->
<!--      <li><a href="javascript:void(0)">tab切换三</a></li>-->
<!-- </ul>-->

<!--<div class="container" id="container01">-->

<!--      <div class="con">-->
<!--        <div class="container">-->
<!--                    <form  class="form-horizontal">-->
<!--                    <fieldset>-->
                    
                    
<!--                    <legend>User:<?php print_r($data[0]['mFirstname']);echo $data[0]['mLastname']; ?> </legend>-->
                    
                    
<!--                    <div class="form-group">-->
<!--                      <label class="col-md-4 control-label" for="textinput">FirstName</label>  -->
<!--                      <div class="col-md-4">-->
<!--                      <input id="textinput" name="textinput" type="text" placeholder="<?php echo $data[0]['mFirstname'] ?>" class="form-control input-md">-->
                        
<!--                      </div>-->
<!--                    </div>-->
                    
                    
<!--                    <div class="form-group">-->
<!--                      <label class="col-md-4 control-label" for="textinput">Last Name </label>  -->
<!--                      <div class="col-md-4">-->
<!--                      <input id="textinput" name="textinput" type="text" placeholder="<?php echo $data[0]['mLastname']; ?>" class="form-control input-md">-->
                        
<!--                      </div>-->
<!--                    </div>-->
                    
                    
<!--                    <div class="form-group">-->
<!--                      <label class="col-md-4 control-label" for="textinput">Email</label>  -->
<!--                      <div class="col-md-4">-->
<!--                      <input id="textinput" name="textinput" type="text" placeholder="<?php echo $data[0]['mEmail'] ?>" class="form-control input-md">-->
                        
<!--                      </div>-->
<!--                    </div>-->
                    
<!--                    <div class="form-group">-->
<!--                      <label class="col-md-4 control-label" for="textinput">Password</label>  -->
<!--                      <div class="col-md-4">-->
<!--                      <input id="textinput" name="textinput" type="text" placeholder="<?php echo $data[0]['aPassword'] ?>" class="form-control input-md">-->
                        
<!--                      </div>-->
<!--                    </div>-->
                    
                    
                    
<!--                    <div class="form-group">-->
<!--                      <label class="col-md-4 control-label" for="textinput">Phone</label>  -->
<!--                      <div class="col-md-4">-->
<!--                      <input id="textinput" name="textinput" type="text" placeholder="<?php echo $data[0]['mPhone'] ?>" class="form-control input-md">-->
                        
<!--                      </div>-->
<!--                    </div>-->
                    
                    
<!--                    </fieldset>-->
<!--                    </form>-->



<!--</div>-->
<!--</div>-->

<!--      <div class="con"><table  border="1" align="center">-->
<!--			<tr>-->
<!--		   <th>下單日期</th> <th>商品名稱</th>	<th>價格</th> <th>地址</th> <th>收件人</th> <th>付費方式</th> -->
<!--		</tr>-->
<!--			<?php for($i=0;$i<=count($data)-1;$i++){ ?>-->
<!--		<tr>-->
<!--	 <td align="center"><a href="singledeal?bill="<?php echo $data[$i]['billid']; ?>""><?php  echo $data[$i]['bbuydate']; ?></a></td> -->
<!--	 <td align="center"><?php echo $data[$i]['bgoodsname']; ?></td>-->
<!--	 <td align="center"><?php echo $data[$i]['bgoodsprice'];  ?></td>-->
<!--	 <td align="center"><?php echo $data[$i]['address'];  ?></td>-->
<!--	 <td align="center"><?php echo $data[$i]['addressee'];  ?></td>-->
<!--	 <td align="center"><?php echo $data[$i]['paytype'];  ?></td>-->
	
<!--		</tr>-->
		
<!--	<?php } ?>-->
<!--		</table></div>-->

      
<!--</div>-->

<!--<script >-->

<!--$( document ).ready(function(){-->
  
  
  
<!-- var indx=0;-->
<!--   $(function(){-->
<!--    tabs($("#tabs01 a"), $('#container01 .con'));  -->
<!--})-->




<!--});-->


<!--var tabs = function(tab, con){-->
<!--        tab.click(function(){-->
<!--        var indx = tab.index(this);-->
        <!--//alert(indx);-->
<!--        tab.removeClass('current');-->
<!--        $(this).addClass('current');-->
<!--        con.hide();-->
<!--        con.eq(indx).show();-->
<!--              })}-->
  
   
    
    
    



  
  
<!--</script>-->
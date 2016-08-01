
    </div>

<div class="col-md-9">
	<div class="mens-toolbar">
<!--sort bar-->          
          <div class="sort">
		        
    		</div>
	        <div class="pager">   
	    
		   		<div class="clearfix"></div>
	    	</div>
     	    <div class="clearfix"></div>
	     </div>
	     <!--sort bar--> 
	     
<!--products-->	    	     
	          <div class="span_2">
	          
<div class="content">
  <div class="content_box">
	<div class="men cart">
			<p align="center">此次購物車內容</p>
				<?php if(isset($_SESSION[car])){ ?>
		<table border="1" align="center">
			<tr>
		<th>客人編號</th>	<th>產品編號</th>	<th>價格</th>	<th>品名</th> <th>購買時間</th><th>&nbsp</th><th>&nbsp</th>
			</tr>
			<tr>
			
			<?php foreach($_SESSION[car] as $key =>$value ){ ?>
	
				<td><?php  printf($_SESSION[car][$key][0]);?></td>
				<td><?php  printf($_SESSION[car][$key][1]);?></td>
				<td><?php  printf($_SESSION[car][$key][2]);?></td>
				<td><?php  printf($_SESSION[car][$key][3]);?></td>
				<td><?php  printf($_SESSION[car][$key][4]);?></td>
				<td><a href="pay?gId=<?php print_r($_SESSION[car][$key][1]); ?>&mId=<?php print_r($key);?>" style="color:blue;">結帳</a></td>
				<td><a href="?delete=<?php print_r($key); ?>" style="color:blue;">刪除</a></td>
					
		</tr>
		
		<?php } ?>

		<?php }else{ ?>
		<p align="center">您還未購物!!您可以到<a href="index" style="color:blue;">這裡</a>選購喔!</p>
		<?php } ?>
	
		</table>
		
		
		
		<p align="center">--------------------------------------------------------------------------------------------------------------</p>
		<p align="center">--------------------------------------------------------------------------------------------------------------</p>
		
		<p align="center">購買歷史</p>	
		<?php if(count($data)!=0){ ?>
		<table border="1" align="center">
			<tr>
		   <th>下單日期</th> <th>商品名稱</th>	<th>價格</th> <th>地址</th> <th>收件人</th> <th>付費方式</th> 
		</tr>
			<?php for($i=0;$i<=count($data)-1;$i++){ ?>
		<tr>
	 <td align="center"><?php  echo $data[$i]['bbuydate']; ?></td> 
	 <td align="center"><?php echo $data[$i]['bgoodsname']; ?></td>
	 <td align="center"><?php echo $data[$i]['bgoodsprice'];  ?></td>
	 <td align="center"><?php echo $data[$i]['address'];  ?></td>
	 <td align="center"><?php echo $data[$i]['addressee'];  ?></td>
	 <td align="center"><?php echo $data[$i]['paytype'];  ?></td>
	
		</tr>
	<?php } ?>
		<?php }else{ ?>
		<p align="center">目前您還未有任何購買紀錄!!!</p>	
			<?php } ?>
	
		</table>
		
		
	
		
		<div class="clearfix"><hr></div>
	

		
		<!--echo $row['bill'];-->
	    <!--<h1>It appears that your cart is currently empty!</h1>-->
	    <!--<h2>You can continue browsing <a href="men.php">here</a>.</h2>-->
    </div>
    
				     </div>
	  
				  <div class="clearfix"></div>
			  </div>
			  
			  
<!--products-->
            </div>
      
          <div class="clearfix"> </div>
    </div>


	
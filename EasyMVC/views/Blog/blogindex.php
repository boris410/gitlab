<?php $i = $_GET['pagestart'];
	  $e = $_GET['pageend'];

?>
<div class="col-md-9">
	

	<div class="mens-toolbar">
	        <div class="pager">   
		   		<div class="clearfix"></div>
	    	</div>
	</div>
   	     
	          		<div class="span_2">
	          	<?php for($i;$i<=$e;$i++){ //將物品顯示出來?>
					<?php if (isset($data[$i])){?>
				    		<form action="userpersonal" method="post">
				    			<table>
				    				<tr>
				    					<td><button type="submit ">使用者:&nbsp;&nbsp;<?php print_r($data[$i][aEmail]); ?></button></td>
				    					<input type="hidden" name="user" value="<?php print_r($data[$i][aEmail]); ?>">
				    				</tr>
				    			</table>
				    		</form>
					 <?php } ?>	    
				    <?php } ?>
				     </div>
				  <div class="clearfix"></div>
</div>
			  
			  

   














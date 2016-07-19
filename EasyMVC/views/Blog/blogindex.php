
<div class="col-md-9">
	<div class="mens-toolbar">
	        <div class="pager">   
		   		<div class="clearfix"></div>
	    	</div>
	</div>
   	     
	          		<div class="span_2">
	          		<?php for($i=0;$i<=count($data)-1;$i++){ //將物品顯示出來?>
				    
						    <div class="col_sm_6" style="border-color:#aaaaee;border-width:3px;border-style:solid;padding:5px;">
						    	<a href="userpersonal?user=<?php print_r($data[$i][aEmail]); ?>">
						    	    	<ui>
						    			使用者:&nbsp;&nbsp;<?php print_r($data[$i][aEmail]); ?>
						    			</ui>
						    	</a>
						    </div>
				    <?php } ?>
				     </div>
				  <div class="clearfix"></div>
</div>
			  
			  

   














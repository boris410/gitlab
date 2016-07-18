
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
	          	
	          	
	          	
	          <div class="content" > 
	
		<?php for($i=0;$i<=count($data)-1;$i++){ //將物品顯示出來?>
				    <div class="col_1_of_single1 span_1_of_single1">
				       <a href="single?&gId=<?php print_r($data[$i][gId]); ?>">
				     <img src="<?php echo "/gitlab/EasyMVC/Home/";print_r($data[$i][gpicurl]); ?>" class="img-responsive" alt=""/>
				     <h3><?php  	print_r($data[$i][gname]); ?></h3>
				   	 <p><?php print_r($data[$i][introduct]); ?></p>
				   	 <h4>$<?php  print_r($data[$i][gPrice]); ?></h4>
			  	        </a>  
				    </div>
				    <?php } ?>
		
		
		
	</div>
	<div class="content" > 
	
		
			<form action="" method="post" enctype="multipart/form-data">
				    Select image to upload:
				    <input type="file" name="fileToUpload" id="fileToUpload">
				    Input Name of Product:
				    <input type="text" name="gname" id="fileToUpload"><br>
				    Input Price of Product:
				    <input type="text" name="gPrice" id="fileToUpload"><br>
				    Input Introduce of Product:
				    <input type="text" name="gintroduce" id="fileToUpload">
				    <input type="submit" value="Upload Image" name="add">
			</form>
		
		
	</div>
	
	
			     </div>
	  
				  <div class="clearfix"></div>
			  </div>
			  
			  
<!--products-->
            </div>
      
          <div class="clearfix"> </div>
    </div>


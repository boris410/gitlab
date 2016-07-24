
</div>

<?php $i = $_GET['pagestart'];
	  $e = $_GET['pageend'];

?>
		<div class="col-md-9">
				
			     <!--sort bar--> 
			     
		<!--products-->	    	    
			<?php for($i;$i<=$e;$i++){ //將物品顯示出來?>
				<?php if (isset($data[$i])){?>
						<div class="content"  > 
								<form action="" method="POST">
										
											    <div  class="col_1_of_single1 span_1_of_single1">
												     <img src="<?php echo "/EasyMVC/bootstrap/";print_r($data[$i][gpicurl]); ?>" class="img-responsive" alt=""/>
												   	 <p><?php print_r($data[$i][introduct]); ?></p>
												   	 <h4>$<?php  print_r($data[$i][gPrice]); ?></h4>
												   	 <button name="delete" type="submit" value="<?php print_r($data[$i][gpicurl]); ?>">Delete</button>
											    </div>
											
								</form>
								
								
								
						</div>
				
					<?php } ?>
			<?php } ?>
		<!--products-->	  
		<div class="clearfix"></div>
		</div>
		
		
		
		
		
		<!--add from--->
		<div  class="col-md-12 "> 
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
		<!--add from--->

      
        



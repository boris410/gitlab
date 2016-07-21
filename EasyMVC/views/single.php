
</div>

<div class="col-md-9">
	<div class="mens-toolbar">
          <div class="sort">
    		</div>
	        <div class="pager">   
	    
		   		<div class="clearfix"></div>
	    	</div>
 
     	    <div class="clearfix"></div>
	     </div>
 	     
	          <div class="span_2">
	          	
	          	<div class="grid images_3_of_2">
						<ul id="etalage">
							<li>
								<a href="optionallink.php">
								
									<img class="etalage_source_image" src="<?php echo $data['gpicurl']; ?>" class="img-responsive" title="" />
								</a>
							</li>
						</ul>
						 <div class="clearfix"></div>		
				  </div> 
				  <div class="desc1 span_3_of_2">
				    <h1><?php echo $data['gname']; ?></h1>
				  
				    <p class="m_5"  id="price"> </p>
				    <p class="m_5">$<?php echo $data['gPrice']; ?></span> </p>
				    <div class="btn_form">
						<!--點選Buy時傳送buy及gId到本頁面判斷是否選擇購買-->
					<a href="?&addc=1&gId=<?php echo $_GET['gId']; ?>"><input type="submit" value="ADD TO CAR" title="" name="buy" id="buy"> </a><!--按鈕後購物車+888-->
					 </div>
				
					 <p class="m_text2"><?php echo $data['introduct'];?></p>
				  </div>
			     </div>
	  
				  <div class="clearfix"></div>
			  </div>
			  
			  
<!--products-->
            </div>
      
          <div class="clearfix"> </div>
    </div>



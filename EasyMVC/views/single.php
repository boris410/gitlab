
<!--<div class="content">-->
<!--  <div class="content_box">-->
<!--	<div class="men">-->
<!--	  <div class="single_top">-->
<!--	       <div class="col-md-9 single_right">-->
	       	
	       	
	       	
	       	
	       	
	   	       
				  
				  
				  
<!--				  <div class="clearfix"></div>	-->
<!--       </div>-->

<!--      <div class="clearfix"> </div>-->
<!--     </div>-->
    
<!--    </div>-->
   
<!--   </div>-->
<!--</div>	-->
<!--<link href="css/flexslider.css" rel='stylesheet' type='text/css' />-->
<!--							  <script defer src="js/jquery.flexslider.js"></script>-->
<!--							  <script type="text/javascript">-->
<!--								$(function(){-->
<!--								  SyntaxHighlighter.all();-->
<!--								});-->
								
<!--								$(window).load(function(){-->
<!--								  $('.flexslider').flexslider({-->
<!--									animation: "slide",-->
<!--									start: function(slider){-->
<!--									  $('body').removeClass('loading');-->
<!--									}-->
<!--								  });-->
<!--								});-->
								
								
<!--								$("#buy").click(function(){-->
									  
									   
        						  
<!--        						  if ($('p[name="price"]')){-->
<!--        						  	parseInt("123")-->
<!--        							var x = $.cookie("car");-->
        						
<!--        							x = parseInt(x) + 800;-->
<!--        							$.cookie("car",x);-->
<!--        						  }-->
        						 
<!--							});-->
								
						
<!--							  </script>-->
							  
							  
							  
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
				  
				    <p class="m_5"  id="price"><?php echo $data['gPrice']; ?> </p>
				    <p class="m_5">$ 888 </span> <a href="#">click for offer</a></p>
				    <div class="btn_form">
						 
						<!--點選Buy時傳送buy及gId到本頁面判斷是否選擇購買-->
					<a href="?&addc=1&gId=<?php echo $_GET['gId']; ?>"><input type="submit" value="ADD TO CAR" title="" name="buy" id="buy"> </a><!--按鈕後購物車+888-->
					
					 </div>
					 <span class="m_link"><a href="#">login to save in wishlist</a> </span>
					 <p class="m_text2"><?php echo $data['gintroduct'];?></p>
				  </div>
	          	
	         
				    
				    
				    
				    
				    
				     </div>
	  
				  <div class="clearfix"></div>
			  </div>
			  
			  
<!--products-->
            </div>
      
          <div class="clearfix"> </div>
    </div>



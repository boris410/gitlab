
</div>

<div class="col-md-9">
	
<div class="mens-toolbar">
	
</div>
  	     
	          <div class="span_2">
	          
<div class="panel panel-info">
	
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
				    
				    <div class="btn_form">
						 
						<!--點選Buy時傳送buy及gId到本頁面判斷是否選擇購買-->
					<a href="?&addc=1&gId=<?php echo $_GET['gId']; ?>"><input type="submit" value="ADD TO CAR" title="" name="buy" id="buy"> </a><!--按鈕後購物車+888-->
					
					 </div>
					 <span class="m_link"><a href="#">login to save in wishlist</a> </span>
					 <p class="m_text2"><?php echo $data['gintroduct'];?></p>
				  </div>
	
	
	
	 		<form  method="post" action="cart?deal=<?php echo $_GET['pay'] ?>">
                        <div class="panel-heading">Address</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Shipping Address</h4>
                                </div>
                            </div>
                             <div class="form-group">
                                <div class="col-md-12"><strong>收件地址:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <strong>收件人:</strong>
                                    <input type="text" name="addressee" class="form-control" value="" />
                                </div>
                                <div class="span1"></div>
                                <div class="col-md-6 col-xs-12">
                                    <p>&nbsp;</p>
                                    <p>先生/小姐</p>
                                </div>
                            </div>
                            <div class="form-group">
                            	<div class="col-md-12"><strong>付費方式</strong></div>
                                <div class="col-md-12">
									<label for="male">ATM</label>
									<input type="radio" name="paytype" id="male" value="ATM"><br>
									<label for="female">Creadit-card</label>
									<input type="radio" name="paytype" id="female" value="creadit_car"><br>
  								</div>
  								</div>
                            </div>
                        </div>
                        
                        
                        <button type="submit" value="" name=paysubmit>確定</button>
                        <button type="submit" value="" name=paysubmit>取消</button>
                </form>
                    </div>
<!--products-->
            </div>
      
          <div class="clearfix"> </div>
    </div>


	

</div>
<div class="col-md-9">
	
<div class="mens-toolbar">
	
</div>
  	     
	          <div class="span_2">
	          
<div class="panel panel-info">
	
	      	<div class="grid images_3_of_2">
						<ul id="etalage" style="list-style:none;">
							<li>
								<a href="optionallink.php">
									<img class="etalage_source_image" src="/gitlab/EasyMVC/bootstrap/<?php echo $data[0]['gpicurl']; ?>" class="img-responsive" title="" />
								</a>
							</li>
						</ul>
						 <div class="clearfix"></div>		
				  </div> 
				  
				  
				  
				  
				  <div class="desc1 span_3_of_2">
				    <h1><?php echo $data[0]['gname']; ?></h1>
				  
				    <p class="m_5"  id="price">$<?php echo $data[0]['gPrice']; ?> </p>
				    
				    <div class="btn_form">
						 
						<!--點選Buy時傳送buy及gId到本頁面判斷是否選擇購買-->
				
					
					 </div>
					
					 <p class="m_text2"><?php echo $data[0]['gintroduct'];?></p>
				  </div>
	
	
	
	 		<form  method="post" action="cart">
                       
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                  
                                </div>
                            </div>
                             <div class="form-group">
                                <div class="col-md-12"><strong>收件地址:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" value="" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <strong>收件人:</strong>
                                    <input type="text" name="addressee" class="form-control" value="" required/>
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
									<input type="radio" name="paytype" id="male" value="ATM" required><br>
									<label for="female">Creadit-card</label>
									<input type="radio" name="paytype" id="female" value="creadit_car" required><br>
  								</div>
  								</div>
                            </div>
                        </div>
                        
                        
                        <button type="submit" value="1" name=paysubmit>確定</button>
                         <input type="hidden" value="<?php print_r($_GET['mId']);?>" name=deal>確定</input>
                        <a href="cart"><button type="button" value="" name=paysubmit>取消</button></a>
                </form>
                    </div>
<!--products-->
            </div>
      
          <div class="clearfix"> </div>
    </div>


	
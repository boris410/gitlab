


<!--<div class="block block-list block-compare">-->
<!--    <div class="block-title">-->
<!--        <strong><span>Compare Products                    </span></strong>-->
<!--    </div>-->
<!--    <div class="block-content">-->
<!--            <p class="empty">You have no items to compare.</p>-->
<!--        </div>-->
<!--</div>-->
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
	          	<?php for($i=0;$i<=count($data)-1;$i++){ //將物品顯示出來?>
				    <div class="col_1_of_single1 span_1_of_single1">
				       <a href="single?&gId=<?php print_r($data[$i][gId]); ?>">
				     <img src="<?php print_r($data[$i][gpicurl]); ?>" class="img-responsive" alt=""/>
				     <h3><?php  	print_r($data[$i][gname]); ?></h3>
				   	 <p><?php print_r($data[$i][introduct]); ?></p>
				   	 <h4>$<?php  print_r($data[$i][gPrice]); ?></h4>
			  	        </a>  
				    </div>
				    <?php } ?>
				     </div>
	  
				  <div class="clearfix"></div>
</div>
			  
			  
<!--products-->
            </div>
      
          <div class="clearfix"> </div>
    </div>


















<!--<div class="content">-->
<!--  <div class="content_box">-->
<!--	<div class="men">-->
<!--	  <div class="col-md-3 sidebar">-->
<!--	  	<div class="block block-layered-nav">-->
<!--		    <div class="block-title">-->
<!--		        <strong><span>Shop By</span></strong>-->
<!--		    </div>-->
<!--    <div class="block-content">-->
                                    
<!--            <dl id="narrow-by-list">-->
<!--                               <dt class="odd">processus</dt>-->
<!--					 <dd class="odd">-->
<!--								<ol>-->
<!--										    <li> <a href="#"><span class="price1">US$&nbsp;0,00</span> - <span class="price1">US$&nbsp;99,99</span></a>(4)</li>-->
<!--										    <li><a href="#"><span class="price1">US$&nbsp;100,00</span> - <span class="price1">US$&nbsp;199,99</span></a>(4)</li>-->
<!--										    <li><a href="#"><span class="price1">US$&nbsp;200,00</span> - <span class="price1">US$&nbsp;299,99</span></a>(1)</li>-->
<!--										    <li><a href="#"><span class="price1">US$&nbsp;400,00</span> - <span class="price1">US$&nbsp;499,99</span></a>(1)</li>-->
<!--										    <li><a href="#"><span class="price1">US$&nbsp;800,00</span> and above</a>(1)</li>-->
<!--								</ol>-->
<!--					</dd>-->
<!--                           		 <dt class="even">Manufacturer</dt>-->
<!--                    <dd class="even">-->
<!--<ol>-->
<!--    <li>-->
<!--                <a href="#">Calvin Klein</a>-->
<!--                        (2)-->
<!--            </li>-->
<!--    <li>-->
<!--                <a href="#">Diesel</a>-->
<!--                        (1)-->
<!--            </li>-->
<!--    <li>-->
<!--                <a href="#">Polo</a>-->
<!--                        (1)-->
<!--            </li>-->
<!--    <li>-->
<!--                <a href="#">Tommy Hilfiger</a>-->
<!--                        (1)-->
<!--            </li>-->
<!--    <li>-->
<!--                <a href="#">Versace</a>-->
<!--                        (1)-->
<!--            </li>-->
<!--</ol>-->
<!--</dd>-->
<!--                                                                    <dt class="last odd">Color</dt>-->
<!--                    <dd class="last odd">-->
<!--<ol>-->
<!--    <li>-->
<!--        Black                        (0)-->
<!--            </li>-->
<!--    <li>-->
<!--                <a href="#">Blue</a>-->
<!--                        (2)-->
<!--            </li>-->
<!--    <li>-->
<!--                <a href="#">Green</a>-->
<!--                        (1)-->
<!--            </li>-->
<!--    <li>-->
<!--                <a href="#">Grey</a>-->
<!--                        (1)-->
<!--            </li>-->
<!--    <li>-->
<!--                <a href="#">Red</a>-->
<!--                        (1)-->
<!--            </li>-->
<!--    <li>-->
<!--                <a href="#">White</a>-->
<!--                        (1)-->
<!--            </li>-->
<!--</ol>-->
<!--</dd>-->
<!--                                            </dl>-->
           
<!--            </div>-->
<!--</div>-->
<!--<div class="block block-cart">-->
<!--        <div class="block-title">-->
<!--        <strong><span>Carrello</span></strong>-->
<!--    </div>-->
<!--    <div class="block-content">-->
<!--                        <p class="empty">You have no items in your shopping cart.</p>-->
<!--        </div>-->
<!--</div>-->
<!--<div class="block block-list block-compare">-->
<!--    <div class="block-title">-->
<!--        <strong><span>Compare Products                    </span></strong>-->
<!--    </div>-->
<!--    <div class="block-content">-->
<!--            <p class="empty">You have no items to compare.</p>-->
<!--        </div>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-md-9">-->
<!--	<div class="mens-toolbar">-->
<!--sort bar-->          
<!--          <div class="sort">-->
          <!--     	<div class="sort-by">-->
		        <!--    <label>Sort By</label>-->
		        <!--    <select>-->
		        <!--                    <option value="">-->
		        <!--            Popularity               </option>-->
		        <!--                    <option value="">-->
		        <!--            Price : High to Low               </option>-->
		        <!--                    <option value="">-->
		        <!--            Price : Low to High               </option>-->
		        <!--    </select>-->
		        <!--</div>-->
		        
<!--    		</div>-->
<!--	        <div class="pager">   -->
	     <!--      <div class="limiter visible-desktop">-->
	     <!--       <label>Show</label>-->
	     <!--       <select>-->
	     <!--                       <option value="" selected="selected">-->
	     <!--               9                </option>-->
	     <!--                       <option value="">-->
	     <!--               15                </option>-->
	     <!--                       <option value="">-->
	     <!--               30                </option>-->
	     <!--                   </select> per page        -->
	     <!--        </div>-->
	     <!--  		<ul class="dc_pagination dc_paginationA dc_paginationA06">-->
				  <!--  <li><a href="#" class="previous">Pages</a></li>-->
				  <!--  <li><a href="#">1</a></li>-->
				  <!--  <li><a href="#">2</a></li>-->
			  	<!--</ul>-->
<!--		   		<div class="clearfix"></div>-->
<!--	    	</div>-->
	    	
	    	
	    
<!--     	    <div class="clearfix"></div>-->
<!--	     </div>-->
	     <!--sort bar--> 
	     
<!--products-->	    	     
<!--	          <div class="span_2">-->
	          	<?php //for($i=0;$i<=count($data)-1;$i++){ //將物品顯示出來?>
<!--				    <div class="col_1_of_single1 span_1_of_single1">-->
<!--				       <a href="single?&gId=<?php //print_r($data[$i][gId]); ?>">-->
<!--				     <img src="<?php //print_r($data[$i][gpicurl]); ?>" class="img-responsive" alt=""/>-->
<!--				     <h3><?php  //	print_r($data[$i][gname]); ?></h3>-->
<!--				   	 <p><?php //print_r($data[$i][introduct]); ?></p>-->
<!--				   	 <h4>$<?php  //print_r($data[$i][gPrice]); ?></h4>-->
<!--			  	        </a>  -->
<!--				    </div>-->
<!--				    <?php //} ?>-->
<!--				     </div>-->
	  
<!--				  <div class="clearfix"></div>-->
<!--			  </div>-->
			  
			  
<!--products-->
<!--            </div>-->
            
            
            
            
            
            
<!--          <div class="clearfix"> </div>-->
<!--    </div>-->
<!--	<div class="footer_top">-->
<!--	  <div class="span_of_4">-->
<!--		<div class="col-md-3 box_4">-->
<!--			<h4>Shop</h4>-->
<!--			<ul class="f_nav">-->
<!--				<li><a href="#">new arrivals</a></li>-->
<!--				<li><a href="#">men</a></li>-->
<!--				<li><a href="#">women</a></li>-->
<!--				<li><a href="#">accessories</a></li>-->
<!--				<li><a href="#">kids</a></li>-->
<!--				<li><a href="#">brands</a></li>-->
<!--				<li><a href="#">trends</a></li>-->
<!--				<li><a href="#">sale</a></li>-->
<!--				<li><a href="#">style videos</a></li>-->
<!--			</ul>	-->
<!--		</div>-->
<!--		<div class="col-md-3 box_4">-->
<!--			<h4>help</h4>-->
<!--			<ul class="f_nav">-->
<!--				<li><a href="#">frequently asked  questions</a></li>-->
<!--				<li><a href="#">men</a></li>-->
<!--				<li><a href="#">women</a></li>-->
<!--				<li><a href="#">accessories</a></li>-->
<!--				<li><a href="#">kids</a></li>-->
<!--				<li><a href="#">brands</a></li>-->
<!--			</ul>				-->
<!--		</div>-->
<!--		<div class="col-md-3 box_4">-->
<!--			<h4>account</h4>-->
<!--			<ul class="f_nav">-->
<!--				<li><a href="#">login</a></li>-->
<!--				<li><a href="#">create an account</a></li>-->
<!--				<li><a href="#">create wishlist</a></li>-->
<!--				<li><a href="#">my shopping bag</a></li>-->
<!--				<li><a href="#">brands</a></li>-->
<!--				<li><a href="#">create wishlist</a></li>-->
<!--			</ul>-->
<!--		</div>-->
<!--		<div class="col-md-3 box_4">-->
<!--			<h4>popular</h4>-->
<!--			<ul class="f_nav">-->
<!--				<li><a href="#">new arrivals</a></li>-->
<!--				<li><a href="#">men</a></li>-->
<!--				<li><a href="#">women</a></li>-->
<!--				<li><a href="#">accessories</a></li>-->
<!--				<li><a href="#">kids</a></li>-->
<!--				<li><a href="#">brands</a></li>-->
<!--				<li><a href="#">trends</a></li>-->
<!--				<li><a href="#">sale</a></li>-->
<!--				<li><a href="#">style videos</a></li>-->
<!--				<li><a href="#">login</a></li>-->
<!--				<li><a href="#">brands</a></li>-->
<!--			</ul>			-->
<!--		</div>-->
<!--		<div class="clearfix"></div>-->
<!--	</div>-->
		<!-- start span_of_2 -->
<!--		<div class="span_of_2">-->
<!--			<div class="span1_of_2">-->
<!--				<h5>need help? <a href="#">contact us <span> &gt;</span> </a> </h5>-->
<!--				<p>(or) Call us: +22-34-2458793</p>-->
<!--			</div>-->
<!--			<div class="span1_of_2">-->
<!--				<h5>follow us </h5>-->
<!--				<div class="social-icons">-->
<!--					     <ul>-->
<!--					        <li><a href="#" target="_blank"></a></li>-->
<!--					        <li><a href="#" target="_blank"></a></li>-->
<!--					        <li><a href="#" target="_blank"></a></li>-->
<!--					        <li><a href="#" target="_blank"></a></li>-->
<!--					       <li class="last2"><a href="#" target="_blank"></a></li>-->
<!--						</ul>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="clearfix"></div>-->
<!--		</div>-->
<!--		<div class="copy">-->
<!--		   <p>Copyright &copy; 2015.Company name All rights reserved.More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>-->
<!--		</div>-->
<!--     </div>-->
<!--   </div>-->
<!--</div>	-->
<!--</body>-->
<!--</html>		-->



















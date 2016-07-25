</div>

<div class="col-md-9" >


	<div class="span_2" >

		<div class="grid images_3_of_2">
			<ul id="etalage">
				<li style="list-style-type: none;">
					<a href="optionallink.php">
								
									<img class="etalage_source_image" src="/gitlab/EasyMVC/bootstrap/<?php echo $data['gpicurl']; ?>" class="img-responsive" title="" />
								</a>
				</li>
			</ul>

		</div>

		<div class="btn_form">
			<h1><?php echo $data['gname']; ?></h1>

			<p class="m_5" id="price"> </p>
			<p class="m_5">$
				<?php echo $data['gPrice']; ?>
				</span>
			</p>


			<!--點選Buy時傳送buy及gId到本頁面判斷是否選擇購買-->
			<a href="?&addc=1&gId=<?php echo $_GET['gId']; ?>"><input type="submit" value="ADD TO CAR" title="" name="buy" id="buy"> </a>
			<!--按鈕後購物車+888-->


			<p class="m_text2">
				<?php echo $data['introduct'];?>
			</p>
		</div>

	</div>
		
</div>

<div class="col-md-9">
	<div class="btn_form">
		<ul id="etalage" >
			<li >商品圖檔顏色會因個人電腦螢幕不同而有所差異，商品皆以實品為準。</li>
			<li>賣場大部份為預購商品，預購商品追加約填單後7-30個工作天 (不含假日)，急需商品的買家請考慮清楚再購買。</li>
			<li>商品顏色皆以廠商命名為主，實際顏色較接近下方平拍圖，因不同螢幕顯示程度、與個人觀感不同將與實品造成些微色差， 
   				 賣場已盡量完整呈現實品顏色，對色準嚴格要求的買家，還請您慎重考慮再下標，避免造成想像差異的困擾喔！</li>
			<li>因工廠排版裁布製作時手法皆有些許不同故接縫處圖案並非完全對稱和平行，請能接受的水水再進行下標。</li>
			
		</ul>


	</div>
</div>



<div class="clearfix"></div>

</div>


<!--products-->
</div>

<div class="clearfix"> </div>
</div>

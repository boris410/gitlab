<?php $i = $_GET['pagestart'];
	  $e = $_GET['pageend'];

?>
<div class="col-md-12">

	<!--products-->
	<?php for($i;$i<=$e;$i++){ //將物品顯示出來?>
	<?php if (isset($data[$i])){?>
	<div class="span_2">

		<div class="col_1_of_single1 span_1_of_single1">
			<a href="single?&gId=<?php print_r($data[$i][gId]); ?>">
		
				<img src="/gitlab/EasyMVC/bootstrap/<?php print_r($data[$i][gpicurl]); ?>" class="img-responsive" alt="" />
				<p style="font-size:20px;color:#6363FF;">
					§--<?php print_r($data[$i][introduct]); ?>
				</p>
				<h4 style="color:red;">$<?php  print_r($data[$i][gPrice]); ?></h4>
			</a>
		</div>

	</div>
	<?php } ?>
	<?php } ?>

	<div class="clearfix"></div>


	<div class="clearfix"> </div>
</div>

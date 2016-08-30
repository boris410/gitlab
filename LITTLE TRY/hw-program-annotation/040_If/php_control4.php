<?php//類似於elseif的多層判斷，針對要判斷的變數產生的不同結果來執行，最後要加break跳出否則會有錯誤
	header("content-type: text/html; charset=utf-8");
	$num = 3;
	switch ($num){
		case 0:
			echo "零";
			break;
		case 1:
			echo "壹";
			break;
		case 2:
			echo "貳";
			break;
		case 3:
			echo "參";
			break;
		case 4:
			echo "肆";
			break;
		case 5:
			echo "伍";
			break;
		case 6:
			echo "陸";
			break;
		case 7:
			echo "柒";
			break;
		case 8:
			echo "捌";
			break;
		case 9:
			echo "玖";
			break;
		default:
			echo "unknown";
	}  // end of switch
?>
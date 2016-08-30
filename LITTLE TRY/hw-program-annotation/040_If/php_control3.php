<?php//增加多層分支判斷，判斷成績介於60~70   70~80  80~90  90~100的分數如果都沒有就是fail
	$score = 95;
	if ($score >=60 && $score < 70) {
		echo 'D';
	} elseif ($score>=70 && $score<80) {
		echo 'C';
	} elseif ($score>=80 && $score<90) {
		echo 'B';		
	} elseif ($score>=90 && $score<=100) {
		echo 'A';		
	} else {
		echo 'Fail';
	}
?>
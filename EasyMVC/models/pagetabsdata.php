<?php
class pagetabsdata extends load{
    //資料庫連結
    function indexpage($clickpage){
    $db = $this->model("database");
    $select = $db->select("SELECT * FROM goods ORDER BY gId");
   
    $data_nums = count($select); //統計總比數
    
    $per = 6; //每頁顯示項目數量
    $pages = ceil($data_nums/$per); //取得不小於值的下一個整數//得到的結果為總頁數
    
    if (!isset($clickpage )){ //假如$_GET["page"]未設置
        $page=1; //則在此設定起始頁數
    } else {
        if($clickpage>$pages){//判斷如果透過網址輸入頁面超過最大頁面 就回到第一頁
            $page =1;
        }else{
            $page = intval($clickpage); //確認頁數只能夠是數值資料
        }
        
    }
    
    
    $start = ($page)*$per; //每一頁開始的資料序號

   	if($page==0){
			$page=1;
		}

		 $_GET['pagestart']=($page-1)*$per;//計算商品起始
		 $_GET['pageend']=(($page*$per)-1);//計算商品最後一項
		 
		 
		 $array=array(//將起始頁 末頁 商品起始 商品末端 以及資料庫撈的資料丟到前端
		     'data_nums'=>$data_nums,
		     'page'     =>$page,
		     'pages'    =>$pages,
		     'pagestart'=>$pagestart,
		     'pageend'  =>$pageebd,
             'data'     =>$result   
		     );
		     //mysql_close($link);
		     return $array;
    }
		 
}		 
?>

<?php 
class blogaddp extends Controller{
    function addp($name,$price,$gintroduce){
            if(!file_exists("bootstrap/images/".$_FILES['fileToUpload']['name'])){//檢查圖檔存到EasyMVC/Home/images下有無重複
                if($name!=null or $price != null or  $gintroduce != null){//判斷是否有輸入名稱、價格、說明欄位
                            $file="images/".$_FILES['fileToUpload']['name'];
                            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"bootstrap/images/".$_FILES["fileToUpload"]["name"]);//圖檔存到EasyMVC/Home/images下
                            
                            $link2 = $this->getConnect();
                            $insert = $link2->prepare("INSERT INTO goods(gname,gPrice,gintroduct,gpicurl)VALUE(?,?,?,?)");
                            $insert->bindValue(1,$name);//對table  member新增使用者訊息
                            $insert->bindValue(2,$price);//對table  member新增使用者訊息
                            $insert->bindValue(3,$gintroduce);//對table  member新增使用者訊息
                            $insert->bindValue(4,$file);//對table  member新增使用者訊息
                            $insert->execute();
                            $link = null;
                            return true;
                }else{
                    echo "請檢察品名、價格、說明或是";
                    return false;
                }            
            }else{return false;};
    }
    function deladdp($delnum){//刪除gId對應在mysql中的圖片unset這個post 再重新整理導回同一頁 
                            $link2 = $this->getConnect();
                            $del = $link2->prepare("delete from goods where gpicurl= ? ");
                            $del->bindValue(1,$delnum);
                            $del->execute();
                            $file = "bootstrap/".$delnum; //加入資料夾名稱
                            unlink($file);//從資料夾目錄刪除這個圖檔
                                if(!file_exists($file)){
                                    unset($_POST['delete']);
                                    mysql_close($link);
                                    return true;
                                }else return false;

                }

        
    
            
    
}


?>
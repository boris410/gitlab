<?php 
class blogaddp extends Controller{
    function addp($name,$price,$gintroduce){
            if(!file_exists("bootstrap/images/".$_FILES['fileToUpload']['name'])){//檢查圖檔存到EasyMVC/Home/images下有無重複
                if($name!=null or $price != null or  $gintroduce != null){//判斷是否有輸入名稱、價格、說明欄位
                            $this->model("blogphp");
                            $blogphp = new blogphp();
                            $link = $this->DB();
                            $file="images/".$_FILES['fileToUpload']['name'];
                            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"bootstrap/images/".$_FILES["fileToUpload"]["name"]);//圖檔存到EasyMVC/Home/images下
                            $command = "insert into goods(gname,gPrice,gintroduct,gpicurl)value('$name','$price','$gintroduce','$file')";//輸入的名稱價格路徑存到mysql 
                            mysql_query($command,$link);
                            mysql_close($link);
                            return true;
                }else{
                    echo "請檢察品名、價格、說明或是";
                    return false;
                }            
            }else{return false;};
    }
    function deladdp($delete){//刪除gId對應在mysql中的圖片unset這個post 再重新整理導回同一頁 
                          
                            $link = $this->DB();
                            $command = "delete from goods where gpicurl='$delete'";//以 檔案路徑為比對 刪除指定的項目
                            mysql_query($command, $link);
                            $file = "bootstrap/".$delete; //加入資料夾名稱
                            unlink($file);//從資料夾目錄刪除這個圖檔
                                if(!file_exists($file)){
                                    unset($_POST['delete']);
                                    mysql_close($link);
                                    return true;
                                }else return false;

                }

        
    
            
    
}


?>
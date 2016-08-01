<?php 
class blogaddp extends Controller{
    function addp(){
            if(!file_exists("bootstrap/images/".$_FILES['fileToUpload']['name'])){//檢查圖檔存到EasyMVC/Home/images下有無重複
                   
                    if(isset($_POST['gname']))
                    {
                            $file="images/".$_FILES['fileToUpload']['name'];
                            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"bootstrap/images/".$_FILES["fileToUpload"]["name"]);//圖檔存到EasyMVC/Home/images下
                            $db = $this->model("database");
                            $db->insert("INSERT INTO goods(gname,gPrice,gintroduct,gpicurl)VALUE('$_POST[gname]','$_POST[gPrice]','$_POST[gintroduce]','$file')");
                            return true;
                    }
           
            }
    }
    function deladdp(){//刪除gId對應在mysql中的圖片unset這個post 再重新整理導回同一頁
                            $db = $this->model("database");
                            $db->delet("DELETE FROM goods WHERE gpicurl= '$_POST[prod]'");
                            $file = "bootstrap/".$_POST['prod']; //加入資料夾名稱
                            unlink($file);//從資料夾目錄刪除這個圖檔
                                if(!file_exists($file)){
                                    unset($_POST['prod']);
                                    $link = null;
                                    return true;
                                }else return false;
    }

        
    
            
    
}


?>
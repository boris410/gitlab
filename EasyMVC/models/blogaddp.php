<?php 
    class blogaddp extends load{
        private $db;
        function __construct(){
             $this->db = $this->model("database");
        }
        function addp($gname,$gPrice,$gintroduce){
            if(!file_exists("bootstrap/images/".$_FILES['fileToUpload']['name'])){//檢查圖檔存到EasyMVC/Home/images下有無重複
                if($gname!=null){
                    $file="images/".$_FILES['fileToUpload']['name'];
                    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"bootstrap/images/".$_FILES["fileToUpload"]["name"]);//圖檔存到EasyMVC/Home/images下
                    $this->db->insert("INSERT INTO goods(gname,gPrice,gintroduct,gpicurl)VALUE('$gname','$gPrice','$gintroduce','$file')");
                    return true;
                }
            }
        }
    
        function deladdp($prod){//刪除gId對應在mysql中的圖片unset這個post 再重新整理導回同一頁
            
            $this->db->delet("DELETE FROM goods WHERE gpicurl= '$prod'");
            $file = "bootstrap/".$prod; //加入資料夾名稱
            unlink($file);//從資料夾目錄刪除這個圖檔
            if(!file_exists($file)){
                return true;
            }
        }
    }
?>
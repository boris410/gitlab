<?php 
class blogaddp extends Controller{
    function addp(){
            if(!file_exists("Home/images/".$_FILES['fileToUpload']['name'])){//檢查圖檔存到EasyMVC/Home/images下有無重複
                   
                    if(isset($_POST['gname']))
                    {
                            $this->model("blogphp");
                            $blogphp = new blogphp();
                            $dblink = $blogphp->dbconnect();
                            $file="images/".$_FILES['fileToUpload']['name'];
                            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"Home/images/".$_FILES["fileToUpload"]["name"]);//圖檔存到EasyMVC/Home/images下
                            $command = "insert into goods(gname,gPrice,gintroduct,gpicurl)value('$_POST[gname]','$_POST[gPrice]','$_POST[gintroduce]','$file')";//輸入的名稱價格路徑存到mysql 
                            mysql_query($command,$dblink);
                            unset($_POST);
                            header("location: addProduct");
                    }else{
                        echo "沒有檔案";
                    }
           
            }else{
                
                echo "檔案名稱重複";
               $blogfiele ="Blog/images/".$_FILES['fileToUpload']['name'];
               echo $blogfiele;
                
            }
            // var_dump($_FILES["fileToUpload"]["name"]);
            // var_dump($_FILES["fileToUpload"]["type"]);
            // var_dump($_FILES["fileToUpload"]["sizee"]);
            
            
            
                }
    function deladdp(){//刪除gId對應在mysql中的圖片unset這個post 再重新整理導回同一頁 
                            $this->model("blogphp");
                            $blogphp = new blogphp();
                            $dblink = $blogphp->dbconnect();
                            
                            $command = "delete from goods where gID=$_POST[delete]";
                            mysql_query($command,$dblink);
                            echo $command;
                            unset($_POST['delete']);
                            header("location: addProduct");
            
                }

        
    
            
    
}


?>
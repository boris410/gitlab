<?php 
class blogaddp extends Controller{
    function addp(){
            if(!file_exists("Home/images/".$_FILES['fileToUpload']['name'])){//檢查圖檔存到EasyMVC/Home/images下有無重複
                   
                    if(isset($_POST['gname']))
                    {
                            $this->model("blogphp");
                            $blogphp = new blogphp();
                            $link = $this->DB();
                            $file="images/".$_FILES['fileToUpload']['name'];
                            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"Home/images/".$_FILES["fileToUpload"]["name"]);//圖檔存到EasyMVC/Home/images下
                            $command = "insert into goods(gname,gPrice,gintroduct,gpicurl)value('$_POST[gname]','$_POST[gPrice]','$_POST[gintroduce]','$file')";//輸入的名稱價格路徑存到mysql 
                            mysql_query($command,$link);
                            unset($_POST);
                            mysql_close($link);
                            header("location: addProduct");
                    }else{
                        echo "沒有檔案";
                    }
           
            }else{
                
                echo "檔案名稱重複";
               
                
            }
           
            
            
            
                }
    function deladdp(){//刪除gId對應在mysql中的圖片unset這個post 再重新整理導回同一頁 
                          
                            $link = $this->DB();
                            $command = "delete from goods where gpicurl='$_POST[delete]'";//以 檔案路徑為比對 刪除指定的項目
                            mysql_query($command, $link);
                            $file = "Home/".$_POST['delete']; //加入資料夾名稱
                            unlink($file);//從資料夾目錄刪除這個圖檔
                            unset($_POST['delete']);
                            mysql_close($link);
                            header("location: addProduct");
            
                }

        
    
            
    
}


?>
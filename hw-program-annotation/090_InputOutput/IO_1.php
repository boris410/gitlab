<?php

echo "Path and FileName:" . __FILE__ . "<br />";//顯示此檔案的路徑及檔名
echo "Path: " . dirname ( __FILE__ )."<br />";//顯示此檔案的路徑
echo "Filename: " . basename ( __FILE__ ) ."/data/team.txt". "<br />";//可以先顯示目錄串接檔案路徑的字串來得到指定檔案的路徑
echo "Filesize: " . filesize ( __FILE__ );//顯示檔案大小


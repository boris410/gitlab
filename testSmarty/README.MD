smarty

    templates   ---顯示網頁的樣板

    templates_c ---產生輸出後的網頁

    main.php    ---主要核心檔案

    test.php    ---中介檔案用來產生顯示網頁

smarty

    foreach顯示前端樣板

利用 foreach 來呈現 array2
<{foreach item=index2 from=$array2}>

    <{foreach key=key2 item=item2 from=$index2}>

        <{$key2}>: <{$item2}>

    <{/foreach}>

<{/foreach}>
第一層foreach
$array2相同於php檔內接收儲存資料的變數名稱
並放到變數index2中
item = index2

第二層foreach
從index2變數中將資料取出到item2變數，並指定key值到變數key2中顯示出來

smarty

    使用上的感想是，能夠讓沒有MVC觀念的人透過smarty的規則，完成
    前後端分離的程式碼，對於大型程式比較有明顯益處，益處在於爾後
    有大型改版時，不論前端如何修改，只要在templates內的樣本中的
    數名稱設定正確，後端程式碼也不用有絲毫的變更，對此在MVC中要達
    到這樣的程式碼功力是要有一定的深度的。



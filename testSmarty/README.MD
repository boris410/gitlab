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


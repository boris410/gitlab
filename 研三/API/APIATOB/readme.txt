
API使用說明

創立帳號
    api名稱 createCount
    參數    userName
    url     https://yanlearn-boris-yan.c9users.io/gitlab/%E7%A0%94%E4%B8%89/API/APIATOB/API.php/createCount?userName=
    response 成功:創立新帳號成功
             失敗:參數帶錯 or 帳號已存在


取餘額
    api名稱 getBalance
    參數    userName
    url     https://yanlearn-boris-yan.c9users.io/gitlab/%E7%A0%94%E4%B8%89/API/APIATOB/API.php/getBalance?userName=
    response 成功:餘額=XXXX
             失敗:參數帶錯 or 帳號不存在


轉帳
    api名稱 transfer
    參數    userName
            money
            type  (IN OR OUT) 大寫
            transId 不可以重複
    url     https://yanlearn-boris-yan.c9users.io/gitlab/%E7%A0%94%E4%B8%89/API/APIATOB/API.php/transfer?userName=&money=&type=&transId=
    response 成功:存入成功 or 轉出成功
             失敗:參數帶錯 or 帳號不存在 or 序號重複 or 餘額不足 or 輸入金額小於0


轉帳明細
    api名稱 getDetail
    參數    userName
            transId (轉帳transId)
    url     https://yanlearn-boris-yan.c9users.io/gitlab/%E7%A0%94%E4%B8%89/API/APIATOB/API.php/getDetail?userName=&transId=
    response 成功: 轉帳序號:XXX
                   轉帳帳號:XX
                   轉帳動作:IN or OUT
                   操作金額:xxxx
                   剩餘金額:xxxxx
             失敗: 參數帶錯 or 序號不存在


<!--建立活動頁面-->
<div class="col-sm-12"  style="border:3px gray solid; margin:3px;padding:3px;" >
        <form action="" method="post">
        <h3>活動名稱 :
                <input type="text" name="build_name" required="required">
        </h3>
        
        <h3>活動人數 :
                <input type="text" name="build_people" required="required">
        </h3>
        
        <h3>是否攜伴 :
                <input type="radio" name="partner" value="0"required="required"> 否
                <input type="radio" name="partner" value="1"required="required"> 是
        </h3>
        
        <h3>報名日期 :
                <input type="text" name="applytime_start" required="required">~ 截止日期時間數:<input type="text" name="applytime_end" required="required">
        </h3>
        
        <h3>參加方式 :
                <input type="radio" name="takepart_type" value="accending" required="required"> 報名參加
                <input type="radio" name="takepart_type" value="free" required="required"> 自由參加
        </h3>
        <h3>參加人員類型 :
                <select name="partpeopletype" required="required">
                　<option value="manage">主管級</option>
                　<option value="employ">一般員工</option>
                </select>
        </h3>
        <br>
        <h3>
                <input type="submit" name="submit" value="submit" style="position:center;">
        </h3>
        </form>
</div>





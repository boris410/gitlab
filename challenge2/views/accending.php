<!--參加頁面-->
<div class="col-sm-12"  style="border:3px gray solid; margin:3px;padding:3px;" >
        <form action="" method="post">
        <h3>活動名稱: <?php print_r($data[0][action_name]) ?> </h3>
        <h3>參加人數: <?php print_r($data[0][action_people]) ?> </h3>
        <h3>目前人數: <?php print_r($data[0][action_nowpeoples]) ?> </h3>
        <h3>員工編號: <input type="text" name="employ"  id="employ" ></h3>
        是否攜伴: 
        <?php if($data[0][action_partner]==1){?>
        <input type="radio" class="takepeopleradio" name="takepeople" value="false" required="required" checked="checked"> 否
        <input type="radio" class="takepeopleradio" name="takepeople" value="true" required="required"> 是
        <input type="text" class="peoplenumbers" name="peoplenumbers" id="peoplenumbers" value="" required="required"> 
        <?php }else{ ?>
          不可攜伴 
        <?php } ?>
        <br>
        <input type="hidden" name="action_id" value="<?php echo $data[0][action_id]; ?>"> 
        <input type="hidden" class="submitaccount" name="submit"> 
        <button type="button" class="checkaccount">送出</button>
        </form>
</div>


<script>

$(document).ready(function(){
  $('#employ').change(function(){
      if($('#employ').val().length==8){
        $.ajax({  
        url  : "/gitlab/challenge2/Home/ajax",
        data : {employ : $('#employ').val()},
        type : 'POST',
        // dataType : 'JSON',
        success: function(jsonsd) {
        alert(jsonsd);
        }
        });
      }
});
 
  

//   $('.peoplenumbers').attr('disabled', 'disabled');
//   $('.peoplenumbers').val(0);
//   $('.peoplenumbers').hide();
  
// $('.takepeopleradio').click(function(){
// var ra = $('input:radio[name=takepeople]:checked').val();
//   if(ra=="true"){
//     $('.peoplenumbers').attr('disabled', false);
//     $('.peoplenumbers').show();
//   }else{
//     $('.peoplenumbers').attr('disabled', 'disabled');
//     $('.peoplenumbers').val(0);
//       $('.peoplenumbers').hide();
//   }

//   });
  
  // $('.checkaccount').click(function(){
  //   //var j = $('#employ').val()
  //   $.ajax({  
  //       url  : "/gitlab/challenge2/Home/ajax",
  //       data : {employ : $('#employ').val(),peoplenumbers : $('#peoplenumbers').val()},
  //       type : 'POST',
  //       // dataType : 'JSON',
  //       success: function(jsonsd) {
  //       alert(jsonsd);
  //       }
  //   });
  // });
  
});
  </script>

<?php
session_start();
require_once("createBoom.php");
?>

<html>
    <meta chartset="UTF-8">
<script type="text/javascript" src="jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="jquery-3.1.0.js"></script>
<script type="text/javascript" src="megamenu.js"></script>
<body>
<form >
<table border=1>

    <?php for ($x=0;$x<=9;$x++) { ?>
    <tr>
        <?php  for ($y=0;$y<=9;$y++) { ?>
            <td>
                <button class="clickcl" type="button" style="width:40px;height:40px;font-size:20px;"  id="<?php print_r("$x$y"); ?>" value="<?php print_r("$x,$y"); ?>"></button>
            </td>
         <?php  } ?>
    </tr>
    <?php } ?>

    <br>
    </table>
</form>
        <script type=text/javascript>

            $("button").on("click", function(){
            var a = $(this).val();
            var ar = a.split(",");
            var x = ar[0];
            var y = ar[1];
            $.post("map_game.php", { xi: x, yi: y}, function(data){
                if(data.length > 5) {
                        var first = JSON.parse(data);
                        $.each(first, function(index, value){
                            var zero = value.split(" ");
                            $("#"+zero[0]+zero[1]).text("0");
                        });

                }

                if(data.length <= 5) {
                     $("#"+x+y).text(data);
                }



            });

            //var text = {"x":x,"y":y};
                // $.ajax({
                //     url: "map_game.php",
                //     data: {text},
                //     type:"POST",
                //     //dataType:'json',
                //     success: function(change){
                //
                //     },
                //      error:function(xhr, ajaxOptions, thrownError){
                //         alert("error");
                //      }
                // });
            })

        </script>
</body>
</html>
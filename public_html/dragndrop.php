<?php
$onlyLoggedIn = false;
$onlyLoggedOff = false;
include('php_includes/header.php'); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/dragndrop.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        

        <div class="cardDivLifted" id="liftedCard"></div>









        <div class="boardContainer">
            <?php include("_board.php"); ?>
        </div>
        












        <script>


            var liftedCard = document.getElementById("liftedCard");
            function lift(element){
                liftedCard.innerHTML = element.innerHTML;

            }




            var hasLiftedCard = false;
            $(".cardContainer").mousedown(function(){
                if (!hasLiftedCard) {
                    $("#liftedCard").html($(this).html());
                    hasLiftedCard = true;
                }
            });


            


            $(".cardContainer").mouseover(function(){
                if (hasLiftedCard) {
                    $(this).css("padding-top", "200px");
                }
            });
            $(".cardContainer").mouseleave(function(){
                if (hasLiftedCard) {
                    $(this).css("padding-top", "0px");
                }
            });




            $(document).on('mousemove', function(e){
                $('#liftedCard').css({
                    left:  e.pageX - 175,
                    top:   e.pageY - 150
                });
                if (hasLiftedCard) {
                    e=e || window.event;
                    pauseEvent(e);
                }
            });
            function pauseEvent(e){
                if(e.stopPropagation) e.stopPropagation();
                if(e.preventDefault) e.preventDefault();
                e.cancelBubble=true;
                e.returnValue=false;
                return false;
            }
        </script>


        <?php
        include("_footer.php");
        ?>
    </body>
</html>

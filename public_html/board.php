<?php
$onlyLoggedIn = false;
$onlyLoggedOff = false;
include('php_includes/header.php');

$boardid = $_GET['id'];

?>
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
    <body id="body">
        

        

        



    <?php include("_board.php"); ?>




        
        












        <script>
        




            var liftedCard = document.getElementById("liftedCard");
            function lift(element){
                liftedCard.innerHTML = element.innerHTML;

            }




            var hasLiftedCard = false;
            var liftedCardId = 0;
            $("body").on("mousedown", ".cardContainer",(function(){
                if (!hasLiftedCard) {
                    $("#liftedCard").html($(this).html());
                    $(this).css("visibility", "hidden");
                    $(this).css("height", "0px");
                    hasLiftedCard = true;
                    liftedCardId = $(this).attr("cardid");
                    $(liftedCard).css("visibility", "visible");
                }
            }));


            

            var hoveredCard;
            var hasHoveredCard = false;
            var placeAboveHoveredCard = false;


            $("body").on("mouseover", ".cardContainer",(function(){
                if (hasLiftedCard) {
                    hoveredCard = this;
                    hasHoveredCard = true;
                }

                
            }));
            $("body").on("mouseleave", ".cardContainer", (function(){
                if (hasLiftedCard) {
                    $(hoveredCard).css("padding-top", "0px");
                    $(hoveredCard).css("padding-bottom", "0px");
                    hasHoveredCard = false;
                }
            }));



        

            $("body").on("mouseup", ".cardContainer", (function(){
                if (hasLiftedCard) {
                    if (hasHoveredCard) {
                        var placeNextTo = $(hoveredCard).attr('cardid');
                        $.post("moveCard.php",{liftedCardId: liftedCardId, placeNextTo: placeNextTo, placeAboveHoveredCard: placeAboveHoveredCard},updateLists);
                        hasLiftedCard = false;
                        hasHoveredCard = false;
                        $(liftedCard).css("visibility", "hidden");
                    }
                }
            }));
            $("body").on("mouseup", ".listDivContainer", function(){
                if (!hasHoveredCard && hasLiftedCard) {
                    $.post("moveCardToBottom.php",{listId: $(this).attr("listid"), liftedCardId: liftedCardId}, updateLists);
                    hasLiftedCard = false;
                    hasHoveredCard = false;
                    $(liftedCard).css("visibility", "hidden");
                }
            });

            updateLists();
            function updateLists(){
                $(".listDivContainer").each(function(){
                    var listId = $(this).attr("listid");
                    var newNeedUpdate;
                    $.ajaxSetup({async:false});
                    $.post("checkIfBoardListNeedUpdate.php", {listId: listId}, function(data){newNeedUpdate = data;});
                    if (newNeedUpdate != $(this).attr("lastupdate")) {
                        $(this).data("lastupdate", newNeedUpdate);
                        $(this).load("loadBoardList.php", {listId: listId, title: $(this).attr("title")});
                    }
                });
            }
            setInterval(updateLists, 2000);




            var positionX;
            $(document).on('mousemove', function(e){

                $('#liftedCard').css({
                    left:  e.pageX - 150,
                    top:   e.pageY - 50,
                    WebkitTransform: "rotateZ("+((e.pageX - 150) - positionX)+"deg)",
                    "-moz-transform": "rotateZ("+((e.pageX - 150) - positionX)+"deg)"
                });
                positionX = e.pageX - 150;
                if (hasLiftedCard) {
                    e=e || window.event;
                    pauseEvent(e);


                    
                    if (e.pageY - $(hoveredCard).offset().top < 95 && hasHoveredCard) {
                        $(hoveredCard).css("padding", "90px 0px 0px 0px");
                        placeAboveHoveredCard = true;
                    }
                    else if (e.pageY - $(hoveredCard).offset().top >= 95 && hasHoveredCard) {
                        $(hoveredCard).css("padding", "0px 0px 90px 0");
                        placeAboveHoveredCard = false;
                    }
                }
                
            });
            function pauseEvent(e){
                if(e.stopPropagation) e.stopPropagation();
                if(e.preventDefault) e.preventDefault();
                e.cancelBubble=true;
                e.returnValue=false;
                return false;
            }




            $(".addCardButton").on("click", function(){

            });
        </script>

    </body>
</html>

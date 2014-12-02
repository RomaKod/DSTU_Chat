<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<!-- <audio src="1.mp3" autoplay></audio> -->

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>DSTU-Chat</title>

    <link rel="stylesheet" href="style.css" type="text/css" />




    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="chat.js"></script>
    <script type="text/javascript">


        var name = prompt("Ведите ваш ник:", "Koder");


    	if (!name || name === ' ') {
    	   name = "Koder";
    	}


    	name = name.replace(/(<([^>]+)>)/ig,"");


    	$("#name-area").html("Вы: <span>" + name + "</span>");


        var chat =  new Chat();
    	$(function() {

    		 chat.getState();


             $("#sendie").keydown(function(event) {

                 var key = event.which;


                 if (key >= 33) {

                     var maxLength = $(this).attr("maxlength");
                     var length = this.value.length;


                     if (length >= maxLength) {
                         event.preventDefault();
                     }
                  }
    		 																																																});

    		 $('#sendie').keyup(function(e) {

    			  if (e.keyCode == 13) {

                    var text = $(this).val();
    				var maxLength = $(this).attr("maxlength");
                    var length = text.length;


                    if (length <= maxLength + 1) {

    			        chat.send(text, name);
    			        $(this).val("");

                    } else {

    					$(this).val(text.substring(0, maxLength));

    				}


    			  }
             });

    	});
    </script>

</head>

<body onload="setInterval('chat.update()', 1000)">

    <div id="page-wrap">

        <center><h2>DSTU-Chat</h2> <br><h3>"By Roma and Maga"</h3></center>

        <p id="name-area"></p>

        <div id="chat-wrap"><div id="chat-area"></div></div>

        <form id="send-message-area">
           <center> <p>Ведите сообщение: </p></center>
            <textarea id="sendie" maxlength = '100' ></textarea>
        </form>

    </div>


</body>

</html>
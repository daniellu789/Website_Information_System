<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>基本信息</title>
<meta charset="utf-8">
<meta name="keywords" content="datetimepicker, jquery插件" />
<meta name="description" content="基本信息" />
<link rel="stylesheet" type="text/css" href="../css/main.css" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/main.css" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
<style type="text/css">
a{color:#007bc4/*#424242*/; text-decoration:none;}
a:hover{text-decoration:underline}
ol,ul{list-style:none}
body{height:100%; font:12px/18px Tahoma, Helvetica, Arial, Verdana, "\5b8b\4f53", sans-serif; color:#51555C;}
img{border:none}
.flightinfo{width:500px; margin:20px auto; clear:both;}
.flightinfo h4{height:32px; line-height:20px; font-size:12px}
.flightinfo h4 span{font-weight:500; font-size:12px}
.flightinfo p{line-height:28px;}
pre{padding:6px 0 0 0; color:#666; line-height:20px; background:#f7f7f7}
.left-info{
   float:left;
}
.right-info{
   float:right;
}

fieldset{

   width: 220px;
   float: left;
   line-height:10px;
   min-height: 556px;
}
#main{
    clear:both;
}
#initial_flight,#final_flight{
   color:red;
   font-weight:2.0em;
   font-size: 15px;
}
#usrname{
   float:right;
   font-weight: bold;
   font-size: large;
}
#page1{
  display: none;
}
.ui-timepicker-div .ui-widget-header { margin-bottom: 8px;}
.ui-timepicker-div dl { text-align: left; }
.ui-timepicker-div dl dt { height: 25px; margin-bottom: -25px; }
.ui-timepicker-div dl dd { margin: 0 10px 10px 65px; }
.ui-timepicker-div td { font-size: 90%; }
.ui-tpicker-grid-label { background: none; border: none; margin: 0; padding: 0; }
.ui_tpicker_hour_label,.ui_tpicker_minute_label,.ui_tpicker_second_label,.ui_tpicker_millisec_label,.ui_tpicker_time_label{padding-left:20px}
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery-ui-slide.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery-ui-slide.min.js"></script>
<SCRIPT type=text/javascript src="js/jquery.min.js"></SCRIPT>
<SCRIPT type=text/javascript src="js/lavalamp.min.js"></SCRIPT>
<SCRIPT type=text/javascript src="js/xixi.js"></SCRIPT>
<script type="text/javascript">

$(function(){
 $.ajax({                                      
      url: 'get_flightinfo.php',                  //the script to call to get data          
      data: "",                        //you can insert url argumnets here to pass to api.php
                                       //for example "id=5&parent=6"
      dataType: 'json',                //data format      
      success: function(data)          //on recieve of reply
      {
      
         for(var i=0;i<data.length;i++){
            if(data[i] == null||data[i]=="0000-00-00 00:00:00"){
               data[i] = "";
              } 
         }


         var tag=new Array("QQ","TEL","PreviousSchool","CurrentCity","major","status");
         for(var i = 0; i<tag.length;i++){
         $('#'+tag[i]).val(data[i+6]);
         }
   
      } 
    });

   $('#submit').click(function(){
      //alert("hello world");
      //alert($('#flightno_1').val());
      var dataform = $("form").serialize();
      alert(dataform);
      //var user = $("#user").val();   
      //var txt = $("#txt").val();   
      $.ajax({   
         type: "POST",   
         url: "updatebasic.php",   
         data: dataform,   
         success: function(msg){  
        $('#msg').text(msg); 
            if(msg==1){   
                //alert(msg);
            }else{   
                //alert(msg);
            }   
         }    
    });  
   });


});
</script>


<SCRIPT type=text/javascript>
$(function(){
    $(".lavaLamp").lavaLamp({ fx: "backout", speed: 700 });
    $("#menu1").click(function(evt){

         // $('<div id="msg" />').addClass("loading").html("正在登录...").css("color","#999").appendTo('#loading');
         alert("开始");
         $("#page1").show();
         //window.location.href="http://localhost/pickup2013/sandbox/basicinfo.php";
          //$('#contents #contents-main').load('http://localhost/pickup2013/sandbox/basicinfo.php');
        // $("#msg").remove();
         
          //evt.preventDefault();
    });


});
</SCRIPT>


</head>


<!--            ************************                    -->

<body>

<br /><br /><br /><br /><br /><br />
<DIV id="wrapper">
<UL class=lavaLamp>
  <LI><A href="#" id="menu1">Personal Information</A></LI>
  <LI><A href="#" id="menu2">Flight Info</A></LI>
  <LI><A href="#" id="menu3">Pickup Info</A></LI>
  <LI><A href="#" id="menu4">Contact Us</A></LI>
</UL>

<!--<A title="Rss Feed" href="http://www.mobanwang.com/"><IMG style="FLOAT: right" src="images/RSS_icons.png"></A>-->
</DIV>


<div id="contents">
<div id="loading"></div>
<div id="contents-main"></div>


<div id="page1">
<form action="#" method="post">
    <h4>ID:  <?php
    if(isset($_SESSION['user'])){
    	echo $_SESSION['user'];
    }
    else{

    	echo "no user";
    }
    ?>
	</h4>

   <h4>QQ</h4>
	 <p><input type="text" name = "QQ" id="QQ" /></p>
	 <h4>Phone Number of China</h4>
	 <p><input type="text" name = "TEL" id="TEL" /></p>
	 <h4>Previous School</h4>
	 <p><input type="text" name = "PreviousSchool" id="PreviousSchool" /></p>
	 <h4>Current City</h4>
	 <p><input type="text" name = "CurrentCity" id="CurrentCity" /></p>

	 	<h4>专业</h4>
	    <p><input type="text" name = "major" id="major" /></p>
   	 	<h4>学位</h4>
	 	<select id="status" name = "status">
			<option value="Undergraduate">Undergraduate</option>
			<option value="Master" selected>Master</option>
			<option value="Ph.D">Ph.D</option>
			<option value="Visitor Scholar">Visitor Scholar</option>
			<option value="其他">其他</option>
		</select>
	<input type = "button" value = "Save" id = "submit" action = "#" />
</form>
</div>
</div>
</body>

</html>

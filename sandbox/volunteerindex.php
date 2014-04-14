<?php
session_start();
if(!isset($_SESSION['user'])){
        echo "<script>var url='../index.php';
            window.location.href=url;</script>";
}
/* <?php
      session_start();
      unset($_SESSION['user']);
      session_destroy();
*/
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Flight Info</title>
<meta name="keywords" content="datetimepicker, jquery插件" />
<meta name="description" content="Helloweba演示平台，演示XHTML、CSS、jquery、PHP案例和示例" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
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
input{width:200px; height:20px; line-height:20px; padding:2px; border:1px solid #d3d3d3}
pre{padding:6px 0 0 0; color:#666; line-height:20px; background:#f7f7f7}
.left-info{
   float:left;
}
.right-info{
   float:right;
}
fieldset{
    margin-top: 30px;
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
.ui-timepicker-div .ui-widget-header { margin-bottom: 8px;}
.ui-timepicker-div dl { text-align: left; }
.ui-timepicker-div dl dt { height: 25px; margin-bottom: -25px; }
.ui-timepicker-div dl dd { margin: 0 10px 10px 65px; }
.ui-timepicker-div td { font-size: 90%; }
.ui-tpicker-grid-label { background: none; border: none; margin: 0; padding: 0; }
.ui_tpicker_hour_label,.ui_tpicker_minute_label,.ui_tpicker_second_label,.ui_tpicker_millisec_label,.ui_tpicker_time_label{padding-left:20px}
</style>

<!--<SCRIPT type="text/javascript" src="js/jquery.min.js"></SCRIPT>
<SCRIPT type="text/javascript" src="js/xixi.js"></SCRIPT> -->
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.compatibility.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery-ui-slide.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>

<!-- <SCRIPT type=text/javascript src="js/jquery.min.js"></SCRIPT> -->
 <SCRIPT type="text/javascript" src="js/lavalamp.min.js"></SCRIPT> 
<!--  <SCRIPT type=text/javascript src="js/xixi.js"></SCRIPT>   -->
<script type="text/javascript">
   var globledata="";
   var showuser="";
   function refresh(){
    $.ajax({cache: false});  
    $.ajax({      

            url: 'get_volunteerinfo.php?user_name='+showuser,                  //the script to call to get data          
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
               globledata=data;    
            } 
          });
 }
$(function(){
      showuser=<?php
      if(isset($_SESSION['user'])){
        echo "'".$_SESSION['user']."'";
      }
      else{
       echo "'';var url='../index.php';
            window.location.href=url;";
      }
      ?>;
      $("#showname").text(showuser);
      refresh();  

   $('#submit').click(function(){
      var dataform = $("form").serialize();
      $.ajax({   
         type: "POST",   
         url: "updatevolunteer.php",   
         data: dataform,   
         success: function(msg){  
        $('#msg').text(msg); 
            if(msg==1){   
              alert("success");
               alert("success");
                $('<div id="message" />').text("Save成功...").css("color","#999").appendTo('#loading');
                $("#message").fadeIn(5000);
                $("#message").remove(); 
            }else{   
                alert(msg);
            }   
         }    
    });  
   });
});
</script>


<SCRIPT type=text/javascript>
$(function(){//
      
    $(".lavaLamp").lavaLamp({ fx: "backout", speed: 700 });//
    $("#menu1").click(function(evt){//
      alert("hello0");
      $("#contents").children().hide();
      $("#showname").show();
      refresh();
      var tag=new Array("Telephone","outofgnv","Time");
               for(var i = 0; i<tag.length;i++){
               $('#'+tag[i]).val(globledata[i+6]);
               }
         $("#page1").show();
alert("hello1");


      refresh();

       var tag=new Array("Telephone","outofgnv","Time");
             for(var i = 0; i<tag.length;i++){
                 $('#'+tag[i]).val(globledata[i+6]);
       }



    });




      $("#menu2").click(function(evt){
      $("#contents").children().hide();
      $("#showname").show();
      
      alert("hello1");



        $("#page2").show();
    });



});//
</SCRIPT>

</head>


<body>
    <DIV id="wrapper">
    <UL class=lavaLamp>
      <LI><A href="#" id="menu1">Pickup Info</A></LI>
      <LI><A href="#" id="menu2">接机新生</A></LI>
    </UL>
    </DIV>

<div id="loading"></div>
<div id="contents">
    <div id="showname"></div>


  <div id="page1">
  <form id="form" action="#" method="post">
      
     <h4>Phone Number</h4>
     <p><input type="text" name = "Telephone" id="Telephone" /></p>


     <h4>是否愿意接GNV以外的机场</h4>
    <select id="status" name = "outofgnv">
      <option value="否">否</option>
      <option value="可考虑" selected>可考虑</option>
      <option value="是">是</option>
    </select>

     <h4>日期、时间偏好</h4>
     <p><input type="text" size="225" name = "Time" id="Time" /></p>

    <input type = "button" value = "Save" id = "submit" action = "#" />
  </form>
</div>




 







</div>

</body>
</html>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Pickup Info</title>
<meta name="keywords" content="datetimepicker, jquery插件" />
<meta name="description" content="Helloweba演示平台，演示XHTML、CSS、jquery、PHP案例和示例" />
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


         var tag=new Array("FamilyMember","LugBag","LugBox","LugBin","NeedTemp","TempApart");
         for(var i = 0; i<tag.length;i++){
         $('#'+tag[i]).val(data[i+47]);
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
         url: "updatelast.php",   
         data: dataform,   
         success: function(msg){  
        $('#msg').text(msg); 
            
            if(msg==1){   
                alert(msg);
                window.location.href="http://www.google.com";
            }else{   
                alert(msg);
            }   
         }    
    });  
   });


});
</script>
</head>
<body>

<form action="#" method="post">
      <h4>Famliy Member No.</h4>
  <select id="FamilyMember" name = "FamilyMember">
      <option value="0"selected>0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
    </select>
      <h4>Number of Bags</h4>
    <select id="LugBag" name = "LugBag">
      <option value="0"selected>0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
    </select>
      <h4>Number of Boarding Suitcase</h4>
      <select id="LugBox" name = "LugBox">
      <option value="0"selected>0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
    </select>
      <h4>Number of Checked Baggage</h4>
      <select id="LugBin" name = "LugBin">
      <option value="0"selected>0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
    </select>
    <h4>Whether Need Temporary Bedroom</h4>
      <select id="NeedTemp" name = "NeedTemp">
      <option value="0"selected>否</option>
      <option value="1">是</option>
    </select>
    <h4>Name of Villege (if available)</h4>
    <p><input type="text" name = "TempApart" id="TempApart" /></p>
    <input type = "button" value = "Save" id = "submit" action = "#" />
</form>

</body>
</html>

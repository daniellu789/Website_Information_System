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
<title>新生信息</title>
<meta name="keywords" content="datetimepicker, jquery插件" />
<meta name="description" content="Helloweba演示平台，演示XHTML、CSS、jquery、PHP案例和示例" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<style type="text/css">
a{color:#007bc4/*#424242*/; text-decoration:none;}
a:hover{text-decoration:underline}
ol,ul{list-style:none}

    .submit_button {
        
        -moz-box-shadow: 0px 10px 14px -7px #3e7327;
        -webkit-box-shadow: 0px 10px 14px -7px #3e7327;
        box-shadow: 0px 10px 14px -7px #3e7327;
        
        background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #77b55a), color-stop(1, #72b352));
        background:-moz-linear-gradient(top, #77b55a 5%, #72b352 100%);
        background:-webkit-linear-gradient(top, #77b55a 5%, #72b352 100%);
        background:-o-linear-gradient(top, #77b55a 5%, #72b352 100%);
        background:-ms-linear-gradient(top, #77b55a 5%, #72b352 100%);
        background:linear-gradient(to bottom, #77b55a 5%, #72b352 100%);
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#77b55a', endColorstr='#72b352',GradientType=0);
        
        background-color:#77b55a;
        
        -moz-border-radius:4px;
        -webkit-border-radius:4px;
        border-radius:4px;
        
        border:1px solid #4b8f29;
        
        display:inline-block;
        color:#ffffff;
        font-family:arial;
        font-size:13px;
        font-weight:bold;
        padding:6px 12px;
        text-decoration:none;
        
        text-shadow:0px 1px 0px #5b8a3c;
        
    }
    .submit_button:hover {
        
        background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #72b352), color-stop(1, #77b55a));
        background:-moz-linear-gradient(top, #72b352 5%, #77b55a 100%);
        background:-webkit-linear-gradient(top, #72b352 5%, #77b55a 100%);
        background:-o-linear-gradient(top, #72b352 5%, #77b55a 100%);
        background:-ms-linear-gradient(top, #72b352 5%, #77b55a 100%);
        background:linear-gradient(to bottom, #72b352 5%, #77b55a 100%);
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#72b352', endColorstr='#77b55a',GradientType=0);
        
        background-color:#72b352;
    }
    .submit_button:active {
        position:relative;
        top:1px;
    }
.ui-datepicker.ui-widget.ui-widget-content.ui-helper-clearfix.ui-corner-all {
    z-index: 3 !important;
}
body{height:100%; font:12px/18px Tahoma, Helvetica, Arial, Verdana, "\5b8b\4f53", sans-serif; color:#51555C;}
img{border:none}
.flightinfo{width:500px; margin:20px auto; clear:both;}
.flightinfo h4{height:32px; line-height:20px; font-size:12px}
.flightinfo h4 span{font-weight:500; font-size:12px}
.flightinfo p{line-height:28px;}
input{line-height:20px; padding:2px; border:1px solid #d3d3d3}
pre{padding:6px 0 0 0; color:#666; line-height:20px; background:#f7f7f7}
#page3 h4{
  padding-top: 16px;
}
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
   line-height:8px;
   min-height: 560px;
}
#main{
    clear:both;
}
legend,#initial_flight,#final_flight{
   margin-bottom: 10px;
   font-weight:2.0em;
   font-size: 15px;

}
#initial_flight,#final_flight{
  color:red;
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
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.4.3.min.js"></script>

<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery-ui-slide.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.compatibility.js"></script>
<SCRIPT type="text/javascript" src="js/lavalamp.min.js"></SCRIPT> 
<script type="text/javascript">
$(function(){
   $("#menu5").click(function(evt){
    <?php
      //unset($_SESSION['user']);
      ?>
      window.location.href='../index.php';
    });
});
</script>

<script type="text/javascript">
   var globledata="";
   var showuser=" ";
   
   function refresh(){
    $.ajax({cache: false});  
   
    $.ajax({      

            url: 'get_flightinfo.php?user_name='+showuser,                  //the script to call to get data          
            data: "",                        //you can insert url argumnets here to pass to api.php
                                             //for example "id=5&parent=6"
            dataType: 'json',              //data format      
            success: function(data)          //on recieve of reply
            {                       
            for(var i=0;i<data.length;i++){
                  if(data[i] == null||data[i]=="0000-00-00 00:00:00"){
                     data[i] = "";
                    } 
               } 
               globledata=data; 
               if(globledata){
                $("#showname").text("Hello, "+globledata[4]);
              }   
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
      refresh();  

      
   $('#submit').click(function(){
      var dataform = $("form").serialize();
      $.ajax({   
         type: "POST",   
         url: "updatebasic.php",   
         data: dataform,   
         success: function(msg){  
        $('#msg').text(msg); 
            if(msg==1){   
              alert("Save成功");
                $('<div id="message" />').text("Save成功...").css("color","#999").appendTo('#loading');
                $("#message").fadeIn(5000);
                $("#message").remove(); 
            }else{   
                //alert(msg);
            }   
         }    
    });  
   });


});


/*

   function refresh1(){
     $.ajax({cache: false});  
       window.otable0.fnClearTable();
       window.otable0.fnDestroy();
              window.otable0 = $('#example').dataTable( {
                
                "bProcessing": true,
                "bSort": false,
                "sAjaxSource": "getvolunteerinfo.php?user_name="+showuser,
                "aoColumns": [
                  { "mData": "vid" },
                  { "mData": "vname" },
                  { "mData": "vgender" },
                  { "mData": "vemail" },
                  { "mData": "vtel" },
                "fnInitComplete": function () {  
               $(".sorting").unbind('click');
            $("tr th").unbind('click'); 

            $("#example tbody tr").unbind("click");
            $("#example tbody tr").bind("click",function( e ) {
            if ( $(this).hasClass('row_selected') ) {
            $(this).removeClass('row_selected');
            }
          else {
            otable0.$('tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
          }
        });

          }
              } );
           $("#example tbody tr").click( function( e ) {
          if ( $(this).hasClass('row_selected') ) {
            $(this).removeClass('row_selected');
          }
          else {
            otable0.$('tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
          }
        });
          $("select").change(function () {
          $('#example tbody tr,#example3 tbody tr').unbind('click'); 
          $('#example tbody tr,#example3 tbody tr').bind('click',function() {
           if ( $(this).hasClass('row_selected') ) {
            $(this).removeClass('row_selected');
            }
          else {
            otable0.$('tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
          }
        } ); 
          });





          $('#example_next').click( function() {
             
             $('#example tbody tr,#example3 tbody tr').unbind('click'); 
           $('#example tbody tr,#example3 tbody tr').bind('click',function( e ) {
          if ( $(this).hasClass('row_selected') ) {
            $(this).removeClass('row_selected');
          }
          else {
            otable0.$('tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
          }
        });
        } ); 



        $('.dataTables_filter input').keyup(function() {
           $("#example tbody tr").click( function( e ) {
          if ( $(this).hasClass('row_selected') ) {
            $(this).removeClass('row_selected');
          }
          else {
            otable0.$('tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
          }
        });
        });
 
      
   }

   */
</script>


<SCRIPT type=text/javascript>
$(function(){
      
    $(".lavaLamp").lavaLamp({ fx: "backout", speed: 700 });
    $("#menu0").click(function(evt){
       $("#contents").children().hide();
       $("#showname").show();
       $("#page0").show();
    });
    $("#menu1").click(function(evt){
      $("#contents").children().hide();
      $("#showname").show();
      refresh();
      var tag=new Array("QQ","TEL","PreviousSchool","CurrentCity","hometown","major","status");
               for(var i = 0; i<tag.length;i++){
               $('#'+tag[i]).val(globledata[i+7]);
               }
         $("#page1").show();

    });
$("#menu2").click(function(evt){
      $("#contents").children().hide();
      $("#showname").show();
      refresh();
       var tag=new Array(
        "flightno_1","leave_1","leave_city_1","leave_airport_1","arrive_1","arrive_city_1","arrive_airport_1",
        "flightno_2","leave_2","leave_city_2","leave_airport_2","arrive_2","arrive_city_2","arrive_airport_2",
        "flightno_3","leave_3","leave_city_3","leave_airport_3","arrive_3","arrive_city_3","arrive_airport_3",
        "flightno_4","leave_4","leave_city_4","leave_airport_4","arrive_4","arrive_city_4","arrive_airport_4",
        "flightno_5","leave_5","leave_city_5","leave_airport_5","arrive_5","arrive_city_5","arrive_airport_5");
             for(var i = 0; i<tag.length;i++){
                 $('#'+tag[i]).val(globledata[i+14]);
       }
        $("#page2").show();
    });


$("#menu3").click(function(evt){
      $("#contents").children().hide();
      $("#showname").show();
      refresh();
       var tag=new Array("FamilyMember","LugBag","LugBox","LugBin","NeedTemp","NeedRoommate","TempApart","otherneed");
         for(var i = 0; i<tag.length;i++){
         $('#'+tag[i]).val(globledata[i+49]);
         }
        $("#page3").show();
    });

    $("#menu4").click(function(evt){
       $("#contents").children().hide();
       $("#showname").show();
       $("#page4").show();
    });

   $("#menu6").click(function(evt){
      $("#contents").children().hide();
      $("#showname").show();
      $("#page5").show();
      refreshvo();   
    });

   $("#menu7").click(function(evt){
      $("#contents").children().hide();
      $("#showname").show();
      $("#page6").show();  
    });

});
</SCRIPT>

<SCRIPT type=text/javascript>
$(function(){
   
   $('#leave_1').datetimepicker({altFormat: "yy-mm-dd"});
   $('#arrive_1').datetimepicker({altFormat: "yy-mm-dd"});
   $('#leave_2').datetimepicker({altFormat: "yy-mm-dd"});
   $('#arrive_2').datetimepicker({altFormat: "yy-mm-dd"});
   $('#leave_3').datetimepicker({altFormat: "yy-mm-dd"});
   $('#arrive_3').datetimepicker({altFormat: "yy-mm-dd"});
   $('#leave_4').datetimepicker({altFormat: "yy-mm-dd"});
   $('#arrive_4').datetimepicker({altFormat: "yy-mm-dd"});
   $('#leave_5').datetimepicker({altFormat: "yy-mm-dd"});
   $('#arrive_5').datetimepicker({altFormat: "yy-mm-dd"});

   $('#fight_submit').click(function(){
      //alert("hello world");
      //alert($('#flightno_1').val());
      var dataform = $("form").serialize();
      //alert(dataform);
      //var user = $("#user").val();   
      //var txt = $("#txt").val();   
      $.ajax({   
         type: "POST",   
         url: "update_flight.php",   
         data: dataform,   
         success: function(msg){  
        $('#msg').text(msg); 
            if(msg==1){ 
            alert("Save成功");
              
                $('<div id="message" />').text("Save成功...").css("color","#999").appendTo('#loading');
                $("#message").fadeIn(5000);
                $("#message").remove(); 
                //alert(msg);
            }else{   
                alert(msg);
            }   
         }    
    });  
   });

 

   $('#lastsubmit').click(function(){
      //alert("hello world");
      //alert($('#flightno_1').val());
      var dataform = $("form").serialize();
      //alert(dataform);
      //var user = $("#user").val();   
      //var txt = $("#txt").val();   
      $.ajax({   
         type: "POST",   
         url: "updatelast.php",   
         data: dataform,   
         success: function(msg){  
        $('#msg').text(msg); 
            
            if(msg==1){   
                alert("Save成功");
                $('<div id="message" />').text("Save成功...").css("color","#999").appendTo('#loading');
                $("#message").fadeIn(5000);
                $("#message").remove(); 
               
            }else{   
                //alert(msg);
            }   
         }    
    });  
   });

});



function refreshvo(){
     $.ajax({cache: false});  

    $.ajax({      

            url: 'getvolunteerinfo.php?user_name='+showuser,                  //the script to call to get data          
            data: "",                        //you can insert url argumnets here to pass to api.php
                                             //for example "id=5&parent=6"
            dataType: 'json',              //data format      
            success: function(data)          //on recieve of reply
            {                       
            /*
            for(var i=0;i<data.length;i++){
                  if(data[i] == "1"){
                     data[i] = "Female";
                    } 
                    else
                    {
                      data[i] = "Male";
                    }
                    */

                     globledatav=data; 
                  $('#vid').text(globledatav[0]);
                  $('#vlastname').text(globledatav[1]);
                  $('#vfirstname').text(globledatav[2]);
                  if(globledatav[3]=="1")
                  {
                    $('#vgender').text("Female");
                  }
                  else if(globledatav[3]=="0")
                  {
                    $('#vgender').text("Male");
                  }
                  
                  $('#vemail').text(globledatav[4]);
                  $('#vtelephone').text(globledatav[5]);
                  $("#page5").show();  
               } 
             
           // var tag=new Array("vlastname","vfirstname","vgender","vemail","vtelephone");
             
            
          });
   }

</script>
</head>


<body>
    <DIV id="wrapper">
    <UL class=lavaLamp>
      <LI><A href="#" id="menu0">Homepage</A></LI>
      <LI><A href="#" id="menu1">Personal Info</A></LI>
      <LI><A href="#" id="menu2">Flight Info</A></LI>
      <LI><A href="#" id="menu3">Pickup Info</A></LI>
      <LI><A href="#" id="menu6">Volunteer</A></LI>
      <LI><A href="#" id="menu7">Coupons</A></LI>
      <LI><A href="#" id="menu4">Contact Us</A></LI>
      <LI><A href="#" id="menu5">Sign Out</A></LI>
    </UL>
    </DIV>

<div id="loading"></div>
<div id="contents">
    <div id="showname"></div>



<div id="page0">
  <br>
 <h4>Hello, pickup service has finished for 2013, this pickup system will reopen for next summer, 2014. Thank you very much!</h4>

  <h4>If you have any question or suggestion about this system, you may contact <a href="mailto:danjie@cise.ufl.edu">danjie@cise.ufl.edu</a> </h4>
 <!--
 <h3>2013年新生接机、临时住宿指南</h3>
<p>热烈欢迎大家来到佛罗里达大学，光荣的成为Gator Nation里骄傲的一员。FACSS（佛罗里达大学中国学生学者联谊会）在此预祝大家旅途愉快。FACSS利用Sign Up系统统计新生信息并为新生安排接机和临时住宿。如果您单独联系老生来接机，或者您不需FACSS提供的服务，我们仍然建议您通过Sign Up系统向FACSS通告自己有关的信息，以便FACSS维护新生通讯列表，同时确保您得到FACSS发放的重要信息，也助于邀请您参加各种活动。</p>
<p>请您仔细阅读以下的接机和临时住宿指南。在注册时，您必须接受这些服务条款以使用FACSS提供的接机和临时住宿服务。</p>
<br>
<h4>FACSS可能提供接机的机场</h4>
<p>1. 强烈建议新生选择Gainesville Regional Airport (GNV)，FACSS承诺为到达GNV机场的新生提供免费接机。</p>
<p>2. 对于飞来Orlando机场的同学,我们推荐提前购买机场大巴（比如<a href = "http://www.redcoachusa.com/" style = "color:blue" target="_blank"> red coach</a>）坐来Gainesville，到达Gainesville后，我们会负责接送至临时住宿地点。如果由于特殊原因需要志愿者去Jacksonville或者奥兰多接机，我们会尽最大努力安排志愿者前往接机,因为路途遥远占用时间精力较多,希望被接机的同学同时对我们的志愿者表示一定的感谢并负担相应的油费.</p>
<br>
<h4>接机及临时住宿的具体方式</h4>
<p>1. GNV机场的接机.</p>
<p>从七月底到八月上中旬的新生到达高峰期间我们会有专人在一天内机场有航班到达的时段连续值守迎接新生.此前跟之后,我们会根据接机系统新生申请接机的信息安排FACSS执委会成员及/或志愿者前往机场接机.</p>
<p>2. jacksonville及orlando机场的接机</p>
<p>Jacksonville机场距离Gainesville市区距离约一百二十公里,且只有国道而无高速公路连接,单程用时约一小时四十分钟上下.Orlando机场距离Gainesville市区距离约200公里,有高速(其中一半左右为收费高速)连接,单程用时约两小时.根据此前的经验,从到机场适当等待到装卸妥当行李启程,通常用时半小时至一小时,具体用时取决于航班准点情况及托运行李到达是否顺利等因素.考虑到这些事实,并继承去年FACSS接机政策的惯例,我们建议如果能成功得到安排,新生为前往此二机场接机的志愿者同学建议支付<font style = "color:blue" target="_blank"> 50美金（JAX）</font>及<font style = "color:blue" target="_blank"> 70美金（MCO）</font>给志愿者并表示感谢.需要注意的是,作为UF学生政府下属的官方非营利性组织,FACSS在接机过程中的作用仅限于协助新同学联系志愿者,并不涉及与新同学的现金往来,或其他形式的经济活动.与此同时,因为长途旅行的不OK性,我们再次强烈建议新同学飞来GNV机场.</p>
<p>3.临时住宿.</p>
<p>对于已经落实小区住宿的同学,我们会直接送至对应小区.尚未落实住宿的同学,我们会送至FACSS申请到的Gainesville城内几个小区提供的临时住宿地点提供原则上不超过三天的免费住宿.如果情况特殊并且住宿资源许可,可酌情延长临时住宿时间，但新生需要负担相应的房租费用.</p>
<h4>Sign Up</h4>
<p>1. 在获得来美签证后，所有新生可使用 FACSS 新生信息管理系统（Newcomers Information Management System （NIMS））登记。网址为 http://uflchina.org/pickup2013 。新生必须使用完全真实的信息，并使用最常用的 Email 邮箱进行注册。所有 FACSS 的重要文件包括接机志愿者的联系信息将发送到您提供的这个 Email 地址，因此推荐新生定时查看邮箱。</p>
<p>2. 每位新生必须自己注册，且只能注册一次。凡是成功注册申请接机及临时住宿的同学,FACSS可兑现上一章节中相关的承诺.对于未能Complete这一过程,也未在抵达美国前通过其他渠道联系FACSS的同学,FACSS会尽量代为安排接机及临时住宿,但资源原则上会被优先安排给已注册的同学.</p>
<p>3. 注册时，您需要设置一个ID和Password。这样可以保证您从返系统修改并更新自己的信息。Personal Information必须完全准确无误。认真填写自己的院系。</p>
<p>4. 输入行程：在注册时如果您还没有购买机票，可以暂时不用填写机票信息。一旦购买完机票，请您第一时间用您的ID和Password登入系统并输入完整的机票信息。我们需要您的从离开中国国境的那一班航班起，及之后的所有Flight Info(请务Requisite写出发航班和Final Flight)。例子：如果您的行程是沈阳-上海-亚特兰大-甘城，那么我们需要您提供上海-亚特兰大-甘城的所有Flight Info。</p>
<p>5. 对于结伴成行的新同学,即便您的同伴已经成功进行注册,您仍需本人Complete接机注册程序,以便于FACSS妥善的统筹安排志愿者接机及临时住宿资源.</p>
<p>6. 如果您有孩子随行，请通过系统输入您孩子的年龄和身高等信息。佛罗里达州州法要求车辆使用专用座椅承载身高不够的孩子。FACSS 会对此情况做特殊安排。</p>
<p>7. 临时住宿：注册过程中会问您Whether Need Temporary Bedroom，如果您需要，请务必在相应位置打勾。如果您有健康上或者其他方面特殊要求，请事先Contact Us。</p>
<p>8. 寻找室友：系统会问您是否在寻找室友，如果您选择是，您的信息可以被其他寻找室友的新生看到，以方便大家联系．如果不想公开自己的信息，可将自己的信息设置成保密。</p>
<p>9. FACSS承诺不会向第三方泄露您的Personal Information。</p>
<br>
<h4>接机流程</h4>
<p>1. 请新生务必按照我们要求，提供并核实Personal Information， FACSS在您注册后，会给你回复一封邮件。如果您在注册三天后还没有在新生信息中看到您的记录，请发邮件给facssnewcomer@gmail.com询问。</p>
<p>2. 当您填写完旅程的信息之后（包括抵达机场，日期（当地时间），航空公司和Flight No.等），FACSS会回复您，并开始为您寻找志愿者。请新生在NIMS系统中核实自己的信息无误。</p>
<p>3. 当FACSS为您寻找到志愿者之后，FACSS会立即通过email通知您，这封邮件包括志愿者的相关信息。通常这个过程应该不晚于您出发前一周。在您出发前 3-5 天，FACSS 将邮件最后与您确认所有重要信息，并且推荐新生和志愿者取得联系，以方便接机的顺利进行。 </p>
<p>4. 请您在抵达后自己按照机场的指示前往指定行李传送带(Baggage Claim)提取托运行李，同时，我们要求接机者亦到该处与您会面。另外，由于特殊的华人面孔，新生与接机者之间的相认十分简单，请不必担心。</p>
<br>
<h4>各种意外或突发事件的处理 </h4>
<p>1. 新生因故改变航班，需提前3天通知FACSS；如航班晚点，新生需在第一时间通知FACSS。如果在Transfer过程中误机或航班延误，新生可以利用机场的投币电话或借用候机大厅其他乘客的手机来联系FACSS紧急联系人。 </p>
<p>2. 如果原定的志愿者因故无法前往，FACSS会尽力安排新的志愿者前往，同时FACSS会尽可能通知您本人。 </p>
<p>3. 如果您在已经提取了行李之后还没有见到接机者，请您在原地耐心等候一段时间，由于机场路途遥远，路上情况千变万化，接机者因故迟到并不罕见。如果半个小时之后接机者仍然没有出现，请您同学生会负责人联络，或者如果您有接机者的Phone Number，也可直接与其联系，如果发生了异常情况，FACSS会根据情况为您做出新的适当的安排。</p>
<br>
<p>FACSS紧急Phone Number, 您到达美国机场后可以联络。原则上只有接机异常情况下联系紧急联系人，紧急联系人并不负责解答新生的其他生活或学习问题，更拒绝任何骚扰行为。若新生有其他学习生活相关问题，请发邮件至facssnewcomer@gmail.com进行询问。</p>
<p>缪沂普：352-226-7466</p>
<p>蔡崇伟：352-214-7880</p>
<p>若遇紧急突发事件威胁到您人身生命安全，请立刻拨打９１１联系执法部门。</p>
<br>
<h4>临时住宿</h4>
<p>另外，新生如需提供临时住处，FACSS会联络安排。原则上FACSS只提供三天的临时住宿。在FACSS的专用临时住处，请您从第三天开始每天交10美元。根据往年经验，由于新生数量众多，对于临时住宿需求巨大，临时住处必将非常紧张，FACSS希望申请临时住宿的新生能体谅我们的难处和其他后来新生的需求，尽早找到其他住房（新生一般在到达3天内可以找到合适的住房）。FACSS也将尽力为新生提供必要的帮助。新生可以通过新生系统查看其他寻找住房的新生。我们将于七月中旬在网站公布部分特价房源信息，请新生密切注意！</p>
<br>
<h4>注意事项</h4>
<p>FACSS愿尽最大的努力来帮助新生，同时也恳请新生配合我们的工作。凡出现以下任一情况者，FACSS保留拒绝提供帮助的权力。</p>
<p>1. 信息不全或信息有误；</p>
<p>2. 新生因本人主观原因变更计划且没有及时通知FACSS。</p>
<p>个人隐私条款：用户在FACSS新生信息管理系统（Newcomers Information Management System(NIMS)）上获得的私人信息必须只能被用作寻找飞友和室友等指定的用途．FACSS会对Personal Information的使用进行严格的监督和管理．FACSS是UF的官方学生组织，其成员受到佛罗里达州法和UF规章制度保护，任何违法使用别人信息的行为，FACSS将依法上报给UF Dean of Students Office 和 UF Police Department.如果任何用户被骚扰，请发邮件给FACSS投诉。</p>
<p>如果您对本文有任何的疑惑或是建议，请和FACSS联系。</p>
<p>所有关于新生服务的问题，请发邮件到facssnewcomer@gmail.com进行询问，我们会第一时间对于您的问题进行回复, 谢谢。</p>
<p><p>新生信息管理系统问题，请发邮件至 daniellu789@gmail.com</p></p>
-->
</div>

  <div id="page1">
  <form id="form1" action="#" method="post">
      

     <h4>QQ</h4>
     <p><input type="text" name = "QQ" id="QQ" /></p>
     <h4>Phone Number of China</h4>
     <p><input type="text" name = "TEL" id="TEL" /></p>
     <h4>Previous School</h4>
     <p><input type="text" name = "PreviousSchool" id="PreviousSchool" /></p>
     <h4>Current City</h4>
     <p><input type="text" name = "CurrentCity" id="CurrentCity" /></p>
     <h4>Hometown</h4>
     <p><input type="text" name = "hometown" id="hometown" /></p>

      <h4>UF Major</h4>
        <p><input type="text" name = "major" id="major" /></p>
        <h4>UF Program</h4>
        <br>
      <select id="status" name = "status">
        <option value="Undergraduate">Undergraduate</option>
        <option value="Master" selected>Master</option>
        <option value="Ph.D">Ph.D</option>
        <option value="Visitor Scholar">Visitor Scholar</option>
        <option value="其他">Other</option>
      </select>
      <p>
    <input type = "button" value = "Save" id = "submit" class="submit_button" action = "#" />
  </p>
  </form>
</div>




     <div id="page2">
    <form id="form2" action="#" method="post">
<div id="usrname"></div>
      <fieldset> 
          <legend id="initial_flight"></legend> 
            <h3>First Flight（Requisite）</h3>
            <br>
            <br>
            <br>
             <h4>Flight No.</h4>
             <p><input type="text" name = "flightno_1" id="flightno_1" /></p>
             <h4>Departure Time</h4>
             <p><input type="text" name = "leave_1" id="leave_1" /></p>
             <h4>Departure City</h4>
             <p><input type="text" name = "leave_city_1" id="leave_city_1" /></p>
             <h4>Departure Airport</h4>
             <p><input type="text" name = "leave_airport_1" id="leave_airport_1" /></p>

             <h4>Arrival Time</h4>
             <p><input type="text" name = "arrive_1" id="arrive_1" /></p>
             <h4>Arrival City</h4>
             <p><input type="text" name = "arrive_city_1"  id="arrive_city_1" /></p>
             <h4>Arrival Airport</h4>
             <p><input type="text" name = "arrive_airport_1" id="arrive_airport_1" /></p>
        </fieldset>

      

       <fieldset> 
          <legend></legend> 
          <h4>Transfer1（Not Last Flight）</h4>
            <br>
            <br>
            <br>
             <h4>Flight No.</h4>
             <p><input type="text" name = "flightno_2" id="flightno_2" /></p>
             <h4>Departure Time</h4>
             <p><input type="text" name = "leave_2"  id="leave_2" /></p>
             <h4>Departure City</h4>
             <p><input type="text" name = "leave_city_2" id="leave_city_2" /></p>
             <h4>Departure Airport</h4>
             <p><input type="text" name = "leave_airport_2" id="leave_airport_2" /></p>

             <h4>Arrival Time</h4>
             <p><input type="text" name = "arrive_2" id="arrive_2" /></p>
             <h4>Arrival City</h4>
             <p><input type="text" name= "arrive_city_2" id="arrive_city_2" /></p>
             <h4>Arrival Airport</h4>
             <p><input type="text" name = "arrive_airport_2" id="arrive_airport_2" /></p>
        </fieldset>

      <fieldset> 
          <legend></legend> 
          <h4>Transfer2（Not Last Flight）</h4>
            <br>
            <br>
            <br>
             <h4>Flight No.</h4>
             <p><input type="text" name = "flightno_3" id="flightno_3" /></p>
             <h4>Departure Time</h4>
             <p><input type="text" name = "leave_3" id="leave_3" /></p>
             <h4>Departure City</h4>
             <p><input type="text" name = "leave_city_3" id="leave_city_3" /></p>
             <h4>Departure Airport</h4>
             <p><input type="text" name = "leave_airport_3" id="leave_airport_3" /></p>

             <h4>Arrival Time</h4>
             <p><input type="text" name="arrive_3" id="arrive_3" /></p>
             <h4>Arrival City</h4>
             <p><input type="text" name="arrive_city_3" id="arrive_city_3" /></p>
             <h4>Arrival Airport</h4>
             <p><input type="text" name= "arrive_airport_3" id="arrive_airport_3" /></p>
        </fieldset>

          <fieldset> 
          <legend></legend> 
          <h4>Transfer3（Not Last Flight）</h4>
            <br>
            <br>
            <br>
             <h4>Flight No.</h4>
             <p><input type="text" name="flightno_4" id="flightno_4" /></p>
             <h4>Departure Time</h4>
             <p><input type="text" name= "leave_4" id="leave_4" /></p>
             <h4>Departure City</h4>
             <p><input type="text" name="leave_city_4" id="leave_city_4" /></p>
             <h4>Departure Airport</h4>
             <p><input type="text" name="leave_airport_4" id="leave_airport_4" /></p>

             <h4>Arrival Time</h4>
             <p><input type="text" name="arrive_4" id="arrive_4" /></p>
             <h4>Arrival City</h4>
             <p><input type="text" name="arrive_city_4" id="arrive_city_4" /></p>
             <h4>Arrival Airport</h4>
             <p><input type="text" name="arrive_airport_4" id="arrive_airport_4" /></p>
        </fieldset>

          <fieldset> 
            <legend></legend> 
            <h3>Final Flight（Requisite）</h3>
            <br>
            <br>
            <br>
             <h4>Flight No.</h4>
             <p><input type="text" name="flightno_5" id="flightno_5" /></p>
             <h4>Departure Time</h4>
             <p><input type="text" name="leave_5" id="leave_5" /></p>
             <h4>Departure City</h4>
             <p><input type="text" name="leave_city_5" id="leave_city_5" /></p>
             <h4>Departure Airport</h4>
             <p><input type="text" name="leave_airport_5" id="leave_airport_5" /></p>

             <h4>Arrival Time</h4>
             <p><input type="text" name="arrive_5" id="arrive_5" /></p>
             <h4>Arrival City</h4>
             <p><input type="text" name="arrive_city_5" id="arrive_city_5" /></p>
             <h4>Arrival Airport</h4>
             <p><input type="text" name="arrive_airport_5" id="arrive_airport_5" /></p>
             <input type="button" id="fight_submit" class="submit_button" value="Save" />
        </fieldset>
             <!--<div id="msg"></div>-->
           
    </form>
       </div>
 


<div id="page3">
<form id="form3" action="#" method="post">
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
      <option value="0"selected>No</option>
      <option value="1">Yes</option>
    </select>
    <h4>Whether Need Roommate</h4>
      <select id="NeedRoommate" name = "NeedRoommate">
      <option value="0"selected>No</option>
      <option value="1">Yes</option>
    </select>
    <h4>Name of Villege (if available)</h4>
    <p><input type="text" name = "TempApart" id="TempApart" /></p>
    <h4>Personal Statement</h4>
    <br>
    <textarea type="text" name = "otherneed" id="otherneed" class="input" style="width:40%; height:90px"></textarea>
    <br>
    <br>
    <input type = "button" value = "Save" id = "lastsubmit" class="submit_button" action = "#" />
    <br>
    <p>Personal Statement Can be：</p>
    <p>1. Specifiy the data if you need temporary bedroom</p>
    <p>2. The height of your Children if they come with you</p>
    <p>3. Other</p>
</form>

</div>






<div id="page4">
  <br>
  <!--
  <h3>联系邮箱</h3>
  <p>学习生活相关问题，请发邮件至 facssnewcomer@gmail.com</p>
  <p>新生信息管理系统问题，请发邮件至 daniellu789@gmail.com</p>
  <br>
<h3>接机紧急联系人</h3>
<p>缪沂普：352-226-7466</p>
<p>蔡崇伟：352-214-7880</p>

-->
</div>


<div id="page5">

<br>
<h3>Pickup Volunteer Info</h3>
<br>
<p><label>Volunteer ID：</label><label id="vid"></label><label id="vid"></label></p>
<p><label>Name:</label><label id="vlastname"></label><label id="vfirstname"></label></p>
<p><label>Gender:</label><label id="vgender"></label></p>
<p><label>Email:</label><label id="vemail"></label></p>
<p><label>Contact Phone Number：</label><label id="vtelephone"></label></p>


</div>

<div id="page6">
  <br>
<h3>Housing:</h3>
<br>
<h4>TIVOLI APARTMENTS</h4>
<p>1. Rent Discount - $30 off monthly rent & 1/2 off deposit per apartment when you sign a lease by July 10th (此优惠延长至8/2/2013)</p>
<p>2. FACSS members will receive a prepaid $50 Visa gift card at move-in new residents only</p>
<p>3. FACSS members can pre-order electronics, books, etc and have them shipped to Tivoli to be stored until move-in</p>
<h4>University Terrace West (Email: cn789@yahoo.com Tel: 352-327-8816)</h4>
<p>3800 SW 20th Ave Gainesville，FL 32607</p>
<p>房屋类型：4 bedroom /4 bathroom</p>
<p>价格:$350/per room（包网络,水电）</p>
<p>时间：7月即可入住</p>
<p>合同期：12个月</p>
<p>地段优良，与学校仅一街相隔；</p>
<p>出行方便，门口就是公交车站，直达学校中心Reitz Union的巴士每五分钟一班</p>
<p>配套齐全，步行10分钟到Butler Plaza（有Wal-Mart，Publix，Best Buy等大型超市和AT&T、Verizon、T-Mobile）；</p>
<p>设施齐全，每人房间独立门锁、独立卫浴、Walk-in衣帽间、吊扇+中央空调，厨房配置炉灶、烤箱、冰箱、抽油烟机，客厅配有餐桌、椅子，室内装有洗衣机、烘干机</p>
<br>
<h3>通讯:</h3>

<p>经与AT&T洽谈， 2013-2014年度FACSS的新老生均可享有以下优惠，</p>
<p>1. 新生选择在AT&T购买新手机，可享受每月基本话费<font style = "color:red" target="_blank"> 17%的折扣</font>，而往年的折扣只有10%，一般UF员工的折扣也只有15%，相比之下是相当优惠的！只要你持续使用这个账户，终身享有这个优惠！此外，在AT&T购买手机配件可享有40%的优惠。</p>
<p>2. 提供以旧换新服务。如果你现有的智能手机情况良好，以旧换新将为你节省<font style = "color:red" target="_blank"> 高达</font>$100。</p>
<p>3. 购买平板电脑或为已有平板电脑 （iPad等）开通网络服务无需押金。</p>
<br>
<h3>娱乐：</h3>
<p>为了促进甘城华人社交生活，Stage 7 KTV（甘城唯一一家KTV） 限期为新生提供如下优惠：2013年8月1日至2013年9月1日之间，如果新生和老生（比如接机的人）一起来Stage 7 KTV 唱歌，只需新生在前台出示UFID即可享受房费五折优惠！同时欢迎大家在微博上关注@Stage7KTV甘城店，及时获取各种折扣信息！</p>





</div>


</div>

</body>
</html>

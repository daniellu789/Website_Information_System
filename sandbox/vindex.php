<?php
session_start();
if(!isset($_SESSION['user'])){
        echo "<script>var url='../vindex.php';
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
<title>Newcomers Information Management System</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/media/images/favicon.ico" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />

<style type="text/css">
#contents{
  height: 100%;
  top:30px;
  clear:both;
  display: inline-block;
  box-shadow: 0 0 5px #C3C3C3;
  padding:15px;
  margin:5%;
  width: 87%;
}
#page1,#page2,#page3,#page4{
display: none;
top:30px;
clear:both;
}
#message{
   position: fixed;
   left:70%;
   top:20%;
   box-shadow: 0 0 10px #C3C3C3;
}
.lavaLamp{
  margin-left: 40px;
}
.lavaLamp li{
  float:left;
  margin-right:50px; 
  list-style-type:none;
}
</style>

<style type="text/css" title="currentStyle">
      @import "css/demo_page.css";
      @import "css/demo_table.css";
</style>



<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>

    <script type="text/javascript" charset="utf-8">

    function loadrequest(){
        $.ajax({cache: false});  
   
           $.ajax({      

            url: 'vshowrequest.php?user_name='+showuser,                  //the script to call to get data          
            data: "",                        //you can insert url argumnets here to pass to api.php
                                             //for example "id=5&parent=6"
            //dataType: 'json',              //data format      
            success: function(msg)          //on recieve of reply
            {                       
            $('#msg').text(msg); 

          

            if(msg==1){   
              alert("Save成功aaaa"+msg);
            }else{   
              alert(msg);
            }  
            } 

          });    
    }


      $(document).ready(function() {
          var resultArray = [];
          var resultArray2 = [];


         
         

         //page3url=vshowrequest.php?user_name=asd;
         





          $("select").change(function () {
          $('#example tbody tr,#example3 tbody tr').unbind('click'); 
          $('#example tbody tr,#example3 tbody tr').bind('click',function() {
          $(this).toggleClass('row_selected');
        } ); 
          });



          $('#example_next').click( function() {
          $('#example tbody tr,#example3 tbody tr').unbind('click'); 
          $('#example tbody tr,#example3 tbody tr').bind('click',function() {
          $(this).toggleClass('row_selected');
        } ); 
        } ); 

        $('.dataTables_filter input').keyup(function() {
          $('#example tbody tr,#example3 tbody tr').unbind('click'); 
          $('#example tbody tr,#example3 tbody tr').bind('click',function() {
          $(this).toggleClass('row_selected');
        } ); 
        });

        $(".sorting").unbind('click');
        $("tr th").unbind('click'); 


        $('#button1').click(function() {  
          resultArray = [];
          var trlist = $("tr[class~='row_selected']");
          trlist.each(function(){
            resultArray.push($(this).children(":first").text());
          });


          $.ajax({        
          type: "POST",
          url: "vrequest.php?user_name="+showuser,
          data: {vrequestdata:resultArray},
          success: function(msg) {
          alert(msg);
       }
    }); 

        });






        $('#button2,#button32').click(function() {
          $("tr[class~='row_selected']").toggleClass("row_selected");
        });


      } );

    </script>

<!-- 
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.2.min.js"></script>-->
<!--
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery-ui-slide.min.js"></script>
   <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script> 
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.compatibility.js"></script>-->


<SCRIPT type="text/javascript" src="js/lavalamp.min.js"></SCRIPT> 


<script type="text/javascript">
$(function(){
   $("#menu5").click(function(evt){
    <?php
      //unset($_SESSION['user']);
      ?>
      window.location.href='../vindex.php';
    });
});
</script>

<script type="text/javascript">
   var vglobledata="";
   var nglobledata="";
   var showuser=" ";
   window.otable1;
   window.otable2;
   window.otable3;
   window.otable0;
   function refresh1(){
     $.ajax({cache: false});  

    $.ajax({      

            url: 'vpickupinfo.php?user_name='+showuser,                  //the script to call to get data          
            data: "",                        //you can insert url argumnets here to pass to api.php
                                             //for example "id=5&parent=6"
            dataType: 'json',              //data format      
            success: function(data)          //on recieve of reply
            {                       

               vglobledata=data; 
            $("#contents").children().hide();
            $("#showname").show(); 
            $(".sorting").unbind('click');
            $("tr th").unbind('click');  
           // var tag=new Array("vlastname","vfirstname","vgender","vemail","vtelephone");
                  $('#vlastname').text(vglobledata[3]);
                  $('#vfirstname').text(vglobledata[4]);
                  $('#vgender').text(vglobledata[5]);

                  if(vglobledata[5]=="1")
                  {
                    $('#vgender').text("Female");
                  }
                  else
                  {
                    $('#vgender').text("Male");
                  }
                  
                  $('#vemail').text(vglobledata[6]);
                  $('#vtelephone').text(vglobledata[7]);


                   $('#vemailornot').val(vglobledata[8]);
                   if(vglobledata[9]==null)
                   {
                     $('#vapprovednum').text("0");
                   }
                   else
                   {
                     $('#vapprovednum').text(vglobledata[9]);
                   }
                  
                   $('#vhelpornot').val(vglobledata[10]);
                   $('#vhometwon').val(vglobledata[11]);
                   $('#vPreviousSchool').val(vglobledata[12]);
                   $('#vsupplement').val(vglobledata[13]);
             $("#page1").show();  
            } 
          });
   }

   function refresh2(){
     $.ajax({cache: false}); 
     window.otable0.fnClearTable();
     window.otable0.fnDestroy();
     window.otable0 = $('#example').dataTable( {

              "bProcessing": true,
              "bSort": false,
              "sAjaxSource": "getnewcomerinfo.php",
              "aoColumns": [
                { "mData": "ID" },
                { "mData": "lastname" },
                { "mData": "gender" },
                { "mData": "PreviousSchool" },
                { "mData": "hometown" },
                { "mData": "Major" },
                { "mData": "arrive_5" },
                { "mData": "arrive_airport_5" },
                { "mData": "LugBag" },
                { "mData": "LugBox" },
                { "mData": "LugBin" },
                { "mData": "FamilyMember" }],
              "fnInitComplete": function () { 
           $("select").change(function () {
          $('#example tbody tr,#example3 tbody tr').unbind('click'); 
          $('#example tbody tr,#example3 tbody tr').bind('click',function() {
          $(this).toggleClass('row_selected');
        } ); 
          }); 
            $('#example_next').click( function() {
          $('#example tbody tr,#example3 tbody tr').unbind('click'); 
          $('#example tbody tr,#example3 tbody tr').bind('click',function() {
          $(this).toggleClass('row_selected');
        } ); 
        } ); 

              $(".sorting").unbind('click');
            $("tr th").unbind('click');      
              $('#example tbody tr').bind('click',function() {
              $(this).toggleClass('row_selected');
            } );  }
            } );
   }


   function refresh(){
    $.ajax({cache: false});  
   
    $.ajax({      

            url: 'vpickupinfo.php?user_name='+showuser,                  //the script to call to get data          
            data: "",                        //you can insert url argumnets here to pass to api.php
                                             //for example "id=5&parent=6"
            dataType: 'json',              //data format      
            success: function(data)          //on recieve of reply
            {                       
            for(var i=0;i<data.length;i++){
                  if(data[i] == null){
                     data[i] = "0";
                    } 
               } 
               vglobledata=data; 
               if(vglobledata){
                $("#showname").text("Hello, "+vglobledata[4]);
              }   
            } 
          });

          window.otable0 = $('#example').dataTable( {
                "bProcessing": true,
                "bSort": false,
                "sAjaxSource": "getnewcomerinfo.php",
                "aoColumns": [
                  { "mData": "ID" },
                  { "mData": "lastname" },
                  { "mData": "gender" },
                  { "mData": "PreviousSchool" },
                  { "mData": "hometown" },
                  { "mData": "Major" },
                  { "mData": "arrive_5" },
                  { "mData": "arrive_airport_5" },
                  { "mData": "LugBag" },
                  { "mData": "LugBox" },
                  { "mData": "LugBin" },
                  { "mData": "FamilyMember" }],
                "fnInitComplete": function () {  

                $(".sorting").unbind('click');
            $("tr th").unbind('click');      
                $('#example tbody tr').bind('click',function() {
                $(this).toggleClass('row_selected');
              } );  }
              } );

            window.otable1 = $('#example3').dataTable( {

            "bProcessing": true,
            "sAjaxSource":"vshowrequest.php?user_name="+showuser,//"getnewcomerinfo.php",//"$page3url",
            "aoColumns": [
              { "mData": "ID" },
              { "mData": "lastname" },
             { "mData": "gender" },
              { "mData": "PreviousSchool" },
              { "mData": "hometown" },
              { "mData": "Major" },
              { "mData": "arrive_5" },
              { "mData": "arrive_airport_5" },
              { "mData": "LugBag" },
              { "mData": "LugBox" },
              { "mData": "LugBin" },
              { "mData": "FamilyMember" }],
            "fnInitComplete": function () {
                     $(".sorting").unbind('click');
            $("tr th").unbind('click'); 
            $('#example3 tbody tr').bind('click',function() {
            $(this).toggleClass('row_selected');
          } );  }
          } );

          window.otable2 = $('#example3_2').dataTable( {

            "bProcessing": true,
            "sAjaxSource":"vshowrequestsucceed.php?user_name="+showuser,//"getnewcomerinfo.php",//"$page3url",
            "aoColumns": [
              { "mData": "ID" },
              { "mData": "lastname" },
              { "mData": "gender" },
              { "mData": "QQ" },
              { "mData": "email" },
              { "mData": "PreviousSchool" },
              { "mData": "hometown" },
              { "mData": "Major" },
              { "mData": "flightno_5" },
              { "mData": "arrive_5" },
              { "mData": "arrive_airport_5" },
              { "mData": "LugBag" },
              { "mData": "LugBox" },
              { "mData": "LugBin" },
              { "mData": "FamilyMember" }],
            "fnInitComplete": function () {
                     $(".sorting").unbind('click');
            $("tr th").unbind('click'); 
            $('#example3_2 tbody tr').bind('click',function() {
            $(this).toggleClass('row_selected');
          } );  }
          } );

           window.otable3 = $('#example3_3').dataTable( {

            "bProcessing": true,
            "sAjaxSource":"vshowrequestfail.php?user_name="+showuser,//"getnewcomerinfo.php",//"$page3url",
            "aoColumns": [
              { "mData": "ID" },
              { "mData": "lastname" },
              { "mData": "gender" },
              { "mData": "PreviousSchool" },
              { "mData": "hometown" },
              { "mData": "Major" },
              { "mData": "arrive_5" },
              { "mData": "arrive_airport_5" },
              { "mData": "LugBag" },
              { "mData": "LugBox" },
              { "mData": "LugBin" },
              { "mData": "FamilyMember" }],
            "fnInitComplete": function () {
               $(".sorting").unbind('click');
            $("tr th").unbind('click');       
            $('#example3_3 tbody tr').bind('click',function() {
            $(this).toggleClass('row_selected');
          } );  }
          } );
    
     
 }

   function refresh3(){
    $.ajax({cache: false});  
   
    $.ajax({      

            url: 'vpickupinfo.php?user_name='+showuser,                  //the script to call to get data          
            data: "",                        //you can insert url argumnets here to pass to api.php
                                             //for example "id=5&parent=6"
            dataType: 'json',              //data format      
            success: function(data)          //on recieve of reply
            {                       
            for(var i=0;i<data.length;i++){
                  if(data[i] == null){
                     data[i] = "0";
                    } 
               } 
               vglobledata=data; 
               if(vglobledata){
                $("#showname").text("Hello, "+vglobledata[4]);
              }   
            } 
          });

           window.otable1.fnClearTable();
           window.otable1.fnDestroy();
          window.otable1 = $('#example3').dataTable( {

            "bProcessing": true,
            "sAjaxSource":"vshowrequest.php?user_name="+showuser,//"getnewcomerinfo.php",//"$page3url",
            "aoColumns": [
              { "mData": "ID" },
              { "mData": "lastname" },
              { "mData": "gender" },
              { "mData": "PreviousSchool" },
              { "mData": "hometown" },
              { "mData": "Major" },
              { "mData": "arrive_5" },
              { "mData": "arrive_airport_5" },
              { "mData": "LugBag" },
              { "mData": "LugBox" },
              { "mData": "LugBin" },
              { "mData": "FamilyMember" }],
            "fnInitComplete": function () {
                $("select").change(function () {
          $('#example tbody tr,#example3 tbody tr').unbind('click'); 
          $('#example tbody tr,#example3 tbody tr').bind('click',function() {
          $(this).toggleClass('row_selected');
        } ); 
          });
                 $('#example3_next').click( function() {
          $('#example tbody tr,#example3 tbody tr').unbind('click'); 
          $('#example tbody tr,#example3 tbody tr').bind('click',function() {
          $(this).toggleClass('row_selected');
        } ); 
        } ); 

               $(".sorting").unbind('click');
            $("tr th").unbind('click');       
            $('#example3 tbody tr').bind('click',function() {
            $(this).toggleClass('row_selected');
          } );  }
          } 
          );


           window.otable2.fnClearTable();
           window.otable2.fnDestroy();
          window.otable2 = $('#example3_2').dataTable( {

            "bProcessing": true,
            "sAjaxSource":"vshowrequestsucceed.php?user_name="+showuser,//"getnewcomerinfo.php",//"$page3url",
            "aoColumns": [
              { "mData": "ID" },
              { "mData": "lastname" },
              { "mData": "gender" },
              { "mData": "QQ" },
              { "mData": "email" },
              { "mData": "PreviousSchool" },
              { "mData": "hometown" },
              { "mData": "Major" },
              { "mData": "flightno_5" },
              { "mData": "arrive_5" },
              { "mData": "arrive_airport_5" },
              { "mData": "LugBag" },
              { "mData": "LugBox" },
              { "mData": "LugBin" },
              { "mData": "FamilyMember" }]
          } 
          );


           window.otable3.fnClearTable();
           window.otable3.fnDestroy();
          window.otable3 = $('#example3_3').dataTable( {

            "bProcessing": true,
            "sAjaxSource":"vshowrequestfail.php?user_name="+showuser,//"getnewcomerinfo.php",//"$page3url",
            "aoColumns": [
              { "mData": "ID" },
              { "mData": "lastname" },
              { "mData": "gender" },
              { "mData": "PreviousSchool" },
              { "mData": "hometown" },
              { "mData": "Major" },
              { "mData": "arrive_5" },
              { "mData": "arrive_airport_5" },
              { "mData": "LugBag" },
              { "mData": "LugBox" },
              { "mData": "LugBin" },
              { "mData": "FamilyMember" }]
          } 
          );

    
     
 }


$(function(){

      showuser=<?php
      if(isset($_SESSION['user'])){
        echo "'".$_SESSION['user']."'";
      }
      else{
       echo "'';var url='../vindex.php';
            window.location.href=url;";
      }
      ?>;
      refresh();  

      
   $('#submit1').click(function(){
      var dataform = $("#form1").serialize();
      //alert(dataform);
      $.ajax({   
         type: "POST",   
         url: "vupdateinfo.php",   
         data: dataform,   
         success: function(msg){  
        $('#msg').text(msg); 
            if(msg==1){   
              alert("Save成功");
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
$(function(){
      
    //$(".lavaLamp").lavaLamp({ fx: "backout", speed: 700 });
    $("#menu0").click(function(evt){
       $("#contents").children().hide();
       $("#showname").show();
       $("#page0").show();
    });
    $("#menu1").click(function(evt){
      
      refresh1();

    });
$("#menu2").click(function(evt){
      $("#contents").children().hide();
      $("#showname").show();
      $("#page2").show();
      refresh2();
      $('#example tbody tr').unbind('click'); 
      $('#example tbody tr').bind('click',function() {
      $(this).toggleClass('row_selected');
    } ); 
    });


$("#menu3").click(function(evt){
      
      $("#contents").children().hide();
      $("#showname").show();
      
      
      $("#page3").show();
      refresh3();
      $('#example3 tbody tr').unbind('click'); 
          $('#example3 tbody tr').bind('click',function() {
          $(this).toggleClass('row_selected');
        } ); 

    });

        $('#button31').click(function() {  
          resultArray2 = [];
          var trlist = $("#example3 tr[class~='row_selected']");
          trlist.each(function(){
            resultArray2.push($(this).children(":first").text());
          });


          $.ajax({        
          type: "POST",
          url: "vdelete.php?user_name="+showuser,
          data: {vrequestdata:resultArray2},
          success: function(msg) {
          alert(msg);
          refresh3();
          }
         }); 

        });


    $("#menu4").click(function(evt){
       $("#contents").children().hide();
       $("#showname").show();
       $("#page4").show();
    });

});
</SCRIPT>










</head>


<body>
    <DIV id="wrapper">
    <UL class=lavaLamp>
      <LI><A href="#" id="menu0">Homepage</A></LI>
      <LI><A href="#" id="menu1">Personal Information</A></LI>
      <LI><A href="#" id="menu2">Newcomer!</A></LI>
      <LI><A href="#" id="menu3">Application Result</A></LI>
      <LI><A href="#" id="menu4">Contact Us</A></LI>
      <LI><A href="#" id="menu5">Sign Out</A></LI>
    </UL>
    </DIV>

<div id="loading"></div>
<div id="contents">
    <div id="showname"></div>



<div id="page0">
  <br>
<h3>各位志愿者/老生：</h3>
<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp你们好！很感谢大家能够支持接机工作。</p>
<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp每年此时我们都会不禁忆起当年，我们自己初到美国时的那些未知与不安，这些也正是新生们现在的感受，他们特别需要老生们的帮助，他们也特别感谢老生们的付出。</p>
<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp甘城华人社区的互帮互助是长久以来的传统，我们也都曾在彼此的帮助中受益。新生接机工作需要大量的志愿者参与，让新生落地第一步得到保障。大家的包容和爱心，对新生伸出的一双双援手，是我们FACSS的坚强后盾，是接机工作的顺利进行的重要保障！</p>
<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp对于非GNV路途较远的机场，您可向新生索取适当的路费，建议JAX每趟50美金，MCO每趟70美金。</p>
<p>以下是对今年接机系统的一些声明，望大家在使用系统前仔细阅读：</p>
<p>1. 希望您登记真实的联系信息，以便接机期间的联络工作顺利进行。FACSS将删除所有信息不全或虚假信息注册用户，同时保证不会将任何Volunteer Info泄漏给第三方。</p>
<p>2. 接机志愿者可以根据系统提供的部分新生信息自由选择想要接送的新生，点击新生即可提交申请。我们会在24小时内通过或者拒绝您的申请。如果您的申请得到通过，您将负责从特定机场接送此新生，并获得新生的详细信息。如果你的申请没有通过，可能是其他志愿者先提交了同一个新生的接机申请，或者是新生自行在系统更改了接机需求。</p>
<p>3. 望大家抱着负责的态度，在确认接机后，请务必落实好接机的工作。我相信大家都不愿意看到因为我们的疏忽而造成任何新生在机场的苦苦等待。</p>
<p>4. 如果志愿者有特殊情况在确认接机后无法Complete接机工作，请立即联系负责接机工作的紧急联系人，联系方式如下：</p>
<p>缪沂普：352-226-7466</p>
<p>蔡崇玮：352-214-7880</p>
<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp最后，FACSS衷心感谢大家的付出和帮助！祝大家有个愉快的夏天！</p>
<br>
<p>FACSS</p>





</div>

  <div id="page1">
  <form id="form1" action="#" method="post">
      

     <p><label>Volunteer Name:</label> <label id="vlastname"></label><label id="vfirstname">加载中...</label></p>
     <p><label>Gender:</label> <label id="vgender">加载中...</label></p>
     <p><label>Eamil：</label> <label id="vemail">加载中...</label></p>
     <p><label>Phone Number：</label> <label id="vtelephone">加载中...</label></p>
     <p><label>Approved Application Number:</label> <label id="vapprovednum">加载中...</label></p>
     <p><label>Whether need email remind：</label>                         
    <select id="vemailornot" name = "vemailornot">
      <option value="1" selected>Yes</option>
      <option value="0" >No</option>
    </select>

     <p><label>Whether provide other help：</label>                         
    <select id="vhelpornot" name = "vhelpornot">
      <option value="1" selected>Yes</option>
      <option value="0" >No</option>
    </select>
          
    <p><label>Hometown：</label><input type="text" name = "vhometwon" id="vhometwon" /></p>
    <p><label>Previous School：</label><input type="text" name = "vPreviousSchool" id="vPreviousSchool" /></p>

    <p>*Personal Statement</p>
    <textarea type="text" name = "vsupplement" id="vsupplement" class="input" style="width:40%; height:100px"></textarea>

    </p>
    


    <input type = "button" value = "Save" id = "submit1" class="submit_button" action = "#" />

    <p>*Personal Statement Can be：</p>
     <p>1. Newcomer name who you have contacted</p>
     <p>2. Questions and suggestions</p>
  </form>
</div>




     <div id="page2">
    
      
      <div id="dynamic">
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
          <thead>
            <tr>


              <th width="8%">Newcomer ID</th>
              <th width="8%">Last Name</th>
               <th width="2%">Gender</th>
              <th width="15%">Previous School</th>
              <th width="10%">Hometown</th>
              <th width="12%">UF Major</th>
              <th width="13%">Arrival Time</th>
              <th width="10%">Arrival Airport</th>
              <th width="5%">Number of Bags</th>
              <th width="7%">Boarding Suitcase</th>
              <th width="7%">Checked Baggage</th>
              <th width="5%">Family Member Number</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
          <tfoot>
            <tr>
              <th>Newcomer ID</th>
              <th>Last Name</th>
              <th>Gender</th>
              <th>Previous School</th>
              <th>Hometown</th>
              <th>UF Major</th>
              <th>Arrival Time</th>
              <th>Arrival Airport</th>
              <th>Number of Bags</th>
              <th>Boarding Suitcase</th>
              <th>Checked Baggage</th>
              <th>Family Member Number</th>
              
            </tr>
          </tfoot>
        </table>
      </div>

<br>
<br>
      <div>
        <button id="button1">OK</button>
        <button id="button2">Clean Selected Items</button>
      </div>
    
    <br>
     <p style="color:green;"> Note：You can click the table item to select one or more newcomers to apply, and then click OK to submit</p>
     
    
       </div>
 


<div id="page3">
<h3 style="color:blue;">*Application Checking</h3>

   
      
      <div id="dynamic3">
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="example3">
          <thead>
            <tr>


              <th width="8%">Newcomer ID</th>
              <th width="8%">Last Name</th>
              <th width="2%">Gender</th>
              <th width="15%">Previous School</th>
              <th width="10%">Hometown</th>
              <th width="12%">UF Major</th>
              <th width="13%">Arrival Time</th>
              <th width="10%">Arrival Airport</th>
              <th width="5%">Number of Bags</th>
              <th width="7%">Boarding Suitcase</th>
              <th width="7%">Checked Baggage</th>
              <th width="5%">Family Member Number</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
          <tfoot>
            <tr>
              <th>Newcomer ID</th>
              <th>Last Name</th>
              <th>Gender</th>
              <th>Previous School</th>
              <th>Hometown</th>
              <th>UF Major</th>
              <th>Arrival Time</th>
              <th>Arrival Airport</th>
              <th>Number of Bags</th>
              <th>Boarding Suitcase</th>
              <th>Checked Baggage</th>
              <th>Family Member Number</th>
              
            </tr>
          </tfoot>
        </table>
      </div>
<br>
<br>
      <div>
        <button id="button31">Cancel Application</button>
        <button id="button32">Clean Selected Items</button>
  
    </div>
    <br>
      <p style="color:green;">*Checking Status: You can cancel any application you like, but you cannot cancel application once your application approved.</p>



    <h3 style="color:blue;">*Approved</h3>

      
      <div id="dynamic3_2">
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="example3_2">
          <thead>
            <tr>


              <th width="8%">Newcomer ID</th>
              <th width="8%">Name</th>
              <th width="8%">Gender</th>
              <th width="8%">QQ</th>
              <th width="8%">Email</th>
              <th width="15%">Previous School</th>
              <th width="10%">Hometown</th>
              <th width="12%">UF Major</th>
              <th width="4%">Arrival Flight</th>
              <th width="13%">Arrival Time</th>
              <th width="10%">Arrival Airport</th>
              <th width="5%">Number of Bags</th>
              <th width="7%">Boarding Suitcase</th>
              <th width="7%">Checked Baggage</th>
              <th width="5%">Family Member Number</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
          <tfoot>
            <tr>
              <th>Newcomer ID</th>
              <th>Name</th>
              <th>Gender</th>
              <th>QQ</th>
              <th>Email</th>
              <th>Previous School</th>
              <th>Hometown</th>
              <th>UF Major</th>
              <th>Arrival Flight</th>
              <th>Arrival Time</th>
              <th>Arrival Airport</th>
              <th>Number of Bags</th>
              <th>Boarding Suitcase</th>
              <th>Checked Baggage</th>
              <th>Family Member Number</th>
              
            </tr>
          </tfoot>
        </table>
      </div>

     <br>
      <p style="color:green;">*Approved Status: You will see more information about newcomer after your application approved </p>
     
    <h3 style="color:blue;">*UnApproved</h3>

  
      
      <div id="dynamic3_3">
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="example3_3">
          <thead>
            <tr>


              <th width="8%">Newcomer ID</th>
              <th width="8%">Last Name</th>
              <th width="2%">Gender</th>
              <th width="15%">Previous School</th>
              <th width="10%">Hometown</th>
              <th width="12%">UF Major</th>
              <th width="13%">Arrival Time</th>
              <th width="10%">Arrival Airport</th>
              <th width="5%">Number of Bags</th>
              <th width="7%">Boarding Suitcase</th>
              <th width="7%">Checked Baggage</th>
              <th width="5%">Family Member Number</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
          <tfoot>
            <tr>
              <th>Newcomer ID</th>
              <th>Last Name</th>
              <th>Gender</th>
              <th>Previous School</th>
              <th>Hometown</th>
              <th>UF Major</th>
              <th>Arrival Time</th>
              <th>Arrival Airport</th>
              <th>Number of Bags</th>
              <th>Boarding Suitcase</th>
              <th>Checked Baggage</th>
              <th>Family Member Number</th>
              
            </tr>
          </tfoot>
        </table>
      </div>
      <br>


      <p style="color:green;">*Reasons for unapproved:</p>
      <p style="color:green;">1. More than one volunteers have same newcomer application, and based on "first come first service", your application unapproved at this time.</p>
      <p style="color:green;">2. Newcomer cancel or change his/her trip.</p>
</div>






<div id="page4">
  <br>
  <h3>Contract Infomation</h3>
<!--  <p>接机安排问题，请发邮件至 facssnewcomer@gmail.com</p>
  <p>新生信息管理系统问题，请发邮件至 danjie@cise.ufl.edu</p>
  <br>
<h3>接机紧急联系人</h3>
<p>缪沂普：352-226-7466</p>
<p>蔡崇伟：352-214-7880</p>
-->



</div>



</div>

</body>
</html>

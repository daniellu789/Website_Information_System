<?php
session_start();
if(!isset($_SESSION['user'])){
        echo "<script>var url='../aindex.php';
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
<title>管理员系统</title>
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

            url: 'avrequest.php?user_name='+showuser,                  //the script to call to get data          
            data: "",                        //you can insert url argumnets here to pass to api.php
                                             //for example "id=5&parent=6"
            //dataType: 'json',              //data format      
            success: function(msg)          //on recieve of reply
            {                       
            $('#msg').text(msg); 

          

            if(msg==1){   
              //alert("Save成功aaaa"+msg);
            }else{   
              //alert(msg);
            }  
            } 

          });    
    }


      $(document).ready(function() {
          var resultArray = [];
          var resultArray2 = [];


         
         

         //page3url=vshowrequest.php?user_name=asd;
         
         $('#buttonDN').click(function() { 
          var deletenewcomer = document.getElementById('deletenewcomer');

          resultArray = [];
          resultArray.push(deletenewcomer.value);

         if(confirm("OK删除ID号为 "+deletenewcomer.value+" 新生？")){

           


          $.ajax({        
          type: "POST",
          url: "adeletenewcomer.php?user_name="+showuser,
          data: {arequestdata:resultArray},
          success: function(msg) {
          alert(msg);
          }
         }); 

          }

         });




          $('#buttonDV').click(function() { 
          var deletev = document.getElementById('deletev');

          resultArray = [];
          resultArray.push(deletev.value);

         if(confirm("OK删除ID号为 "+deletev.value+" 志愿者？")){
           
          $.ajax({        
          type: "POST",
          url: "adeletevolunteer.php?user_name="+showuser,
          data: {arequestdata:resultArray},
          success: function(msg) {
          alert(msg);
          }
         }); 

          }

         });



         $('#buttonRN').click(function() { 
          var rearrange = document.getElementById('rearrange');

          resultArray = [];
          resultArray.push(rearrange.value);

         if(confirm("重新给ID号为 "+rearrange.value+" 的新生分配志愿者？")){
           
          $.ajax({        
          type: "POST",
          url: "arearrange.php?user_name="+showuser,
          data: {arequestdata:resultArray},
          success: function(msg) {
          alert(msg);
          }
         }); 

          }

         });



          $('#buttonNP').click(function() { 
          var noneedpick = document.getElementById('noneedpick');

          resultArray = [];
          resultArray.push(noneedpick.value);

         if(confirm("OKID号为 "+noneedpick.value+" 新生不需要接机？")){
           
          $.ajax({        
          type: "POST",
          url: "anoneedpick.php?user_name="+showuser,
          data: {arequestdata:resultArray},
          success: function(msg) {
          alert(msg);
          }
         }); 

          }

         });

         



        $('#buttonA1').click(function() { 
          resultArray = [];

          var trlist = $("tr[class~='row_selected']");
          trlist.each(function(){
            //alert($(this).children(":first").text());
            resultArray.push($(this).children(":nth-child(9)").text());
            resultArray.push($(this).children(":nth-child(2)").text());
            resultArray.push($(this).children(":nth-child(1)").text());
            resultArray.push($(this).children(":nth-child(8)").text());
          });

          
        if(confirm("OK将 "+resultArray[0]+" 新生分配给志愿者 "+resultArray[1]+" 接机？")){

           //alert(resultArray[2]);

          $.ajax({        
          type: "POST",
          url: "aarrange.php?user_name="+showuser,
          data: {arequestdata:resultArray},
          success: function(msg) {
          alert(msg);
          refresh1();
          }
         }); 
        } 
         
         


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
      window.location.href='../aindex.php';
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
       window.otable0.fnClearTable();
       window.otable0.fnDestroy();
              window.otable0 = $('#example').dataTable( {
                
                "bProcessing": true,
                "bSort": false,
                "sAjaxSource": "avrequest.php?user_name="+showuser,
                "aoColumns": [
                  { "mData": "vid" },
                  { "mData": "vname" },
                  { "mData": "vgender" },
                  { "mData": "vemail" },
                  { "mData": "vtel" },
                  { "mData": "approvednum" },
                  { "mData": "submittime" },
                  { "mData": "ID" },
                  { "mData": "cname" },
                  { "mData": "Email" },
                  { "mData": "arrive_airport_5" },
                  { "mData": "arrive_5" }],
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


 function refresh2(){

    $.ajax({cache: false});  
   
    $.ajax({      

            url: 'apickupinfo.php?user_name='+showuser,                  //the script to call to get data          
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
            "sAjaxSource":"admin_getnewcomerinfo.php",//"getnewcomerinfo.php",//"$page3url",
            "aoColumns": [
              { "mData": "ID" },
              { "mData": "name" },
              { "mData": "Gender" },
              { "mData": "Email" },
              { "mData": "arrive_5" },
              { "mData": "arrive_airport_5" },
              { "mData": "FamilyMember" },
              { "mData": "NeedTemp" },
              { "mData": "otherneed" },
              { "mData": "PickupID" }]
          } );
            window.otable2.fnClearTable();
            window.otable2.fnDestroy();
          window.otable2 = $('#example3_2').dataTable( {

            "bProcessing": true,
            "sAjaxSource":"admin_getallnewcomerinfo.php",//"getnewcomerinfo.php",//"$page3url",
            "aoColumns": [
              { "mData": "ID" },
              { "mData": "name" },
              { "mData": "Gender" },
              { "mData": "Email" },
              { "mData": "arrive_5" },
              { "mData": "arrive_airport_5" },
              { "mData": "FamilyMember" },
              { "mData": "NeedTemp" },
              { "mData": "otherneed" },
              { "mData": "PickupID" }]
          } );
            window.otable3.fnClearTable();
            window.otable3.fnDestroy();
           window.otable3 = $('#example3_3').dataTable( {

            "bProcessing": true,
            "sAjaxSource":"admin_getallvolunteerinfo.php",//"getnewcomerinfo.php",//"$page3url",
            "aoColumns": [
              { "mData": "ID" },
              { "mData": "name" },
              { "mData": "Gender" },
              { "mData": "Email" },
              { "mData": "telephone" },
              { "mData": "emailornot" },
              { "mData": "approvednum" },
              { "mData": "helpornot" },
              { "mData": "supplement" }]
          } );
    
     
 }






   function refresh(){

    $.ajax({cache: false});  
   
    $.ajax({      

            url: 'apickupinfo.php?user_name='+showuser,                  //the script to call to get data          
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
                "sAjaxSource": "avrequest.php?user_name="+showuser,
                "aoColumns": [
                  { "mData": "vid" },
                  { "mData": "vname" },
                  { "mData": "vgender" },
                  { "mData": "vemail" },
                  { "mData": "vtel" },
                  { "mData": "approvednum" },
                  { "mData": "submittime" },
                  { "mData": "ID" },
                  { "mData": "cname" },
                  { "mData": "Email" },
                  { "mData": "arrive_airport_5" },
                  { "mData": "arrive_5" }],
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

            window.otable1 = $('#example3').dataTable( {

            "bProcessing": true,
            "sAjaxSource":"admin_getnewcomerinfo.php",//"getnewcomerinfo.php",//"$page3url",
            "aoColumns": [
              { "mData": "ID" },
              { "mData": "name" },
              { "mData": "Gender" },
              { "mData": "Email" },
              { "mData": "arrive_5" },
              { "mData": "arrive_airport_5" },
              { "mData": "FamilyMember" },
              { "mData": "NeedTemp" },
              { "mData": "otherneed" },
              { "mData": "PickupID" }]
          } );

          window.otable2 = $('#example3_2').dataTable( {

            "bProcessing": true,
            "sAjaxSource":"admin_getallnewcomerinfo.php",//"getnewcomerinfo.php",//"$page3url",
            "aoColumns": [
              { "mData": "ID" },
              { "mData": "name" },
              { "mData": "Gender" },
              { "mData": "Email" },
              { "mData": "arrive_5" },
              { "mData": "arrive_airport_5" },
              { "mData": "FamilyMember" },
              { "mData": "NeedTemp" },
              { "mData": "otherneed" },
              { "mData": "PickupID" }]
          } );

           window.otable3 = $('#example3_3').dataTable( {

            "bProcessing": true,
            "sAjaxSource":"admin_getallvolunteerinfo.php",//"getnewcomerinfo.php",//"$page3url",
            "aoColumns": [
              { "mData": "ID" },
              { "mData": "name" },
              { "mData": "Gender" },
              { "mData": "Email" },
              { "mData": "telephone" },
              { "mData": "emailornot" },
              { "mData": "approvednum" }]
          } );
    
     
 }

   


$(function(){

      showuser=<?php
      if(isset($_SESSION['user'])){
        echo "'".$_SESSION['user']."'";
      }
      else{
       echo "'';var url='../aindex.php';
            window.location.href=url;";
      }
      ?>;
      refresh();  

      
   $('#submit1').click(function(){
      var dataform = $("#form1").serialize();
      alert(dataform);
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
      $("#contents").children().hide();
      $("#showname").show();
      $("#page1").show();
      refresh1();   
      //loadrequest();
    });

$("#menu2").click(function(evt){
       $("#contents").children().hide();
       $("#showname").show();
       $("#page2").show();
    });

$("#menu3").click(function(evt){
      
      $("#contents").children().hide();
      $("#showname").show();
      
      
      $("#page3").show();
     refresh2();
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
      <LI><A href="#" id="menu1">审核</A></LI>
      <LI><A href="#" id="menu2">分配管理</A></LI>
      <LI><A href="#" id="menu3">数据信息</A></LI>
      <LI><A href="#" id="menu4">Contact Us</A></LI>
      <LI><A href="#" id="menu5">退出Login</A></LI>
    </UL>
    </DIV>

<div id="loading"></div>
<div id="contents">
    <div id="showname"></div>



<div id="page0">
  <br>
<h3>2013年新生接机、临时住宿管理员系统</h3>


</div>
<!--
  <div id="page1">
  <form id="form1" action="#" method="post">
      

     <p><label>接机志愿者姓First name:</label> <label id="vlastname"></label><label id="vfirstname">加载中...</label></p>
     <p><label>Gender:</label> <label id="vgender">加载中...</label></p>
     <p><label>Eamil：</label> <label id="vemail">加载中...</label></p>
     <p><label>Phone Number：</label> <label id="vtelephone">加载中...</label></p>
     <p><label>已确认接机新生数量:</label> <label id="vapprovednum">加载中...</label></p>
     <p><label>是否愿意接受邮件通知：</label>                         
    <select id="vemailornot" name = "vemailornot">
      <option value="0">否</option>
      <option value="1" selected>是</option>
    </select>
    </p>
    


    <input type = "button" value = "Save" id = "submit1" class="submit_button" action = "#" />

     
  </form>
</div>
-->



     <div id="page1">
    
      
      <div id="dynamic">
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
          <thead>
            <tr>


              <th width="8%">Volunteer ID</th>
              <th width="8%">志愿者姓名</th>
              <th width="15%">志愿者性别</th>
              <th width="10%">志愿者Email</th>
              <th width="12%">志愿者电话</th>
              <th width="13%">志愿者已审核接机数</th>
              <th width="10%">提交申请时间</th>
              <th width="5%">新生ID</th>
              <th width="7%">新生姓名</th>
              <th width="7%">新生Email</th>
              <th width="5%">Arrival Airport</th>
              <th width="5%">Arrival Time</th>

            </tr>
          </thead>
          <tbody>
            
          </tbody>
          <tfoot>
            <tr>
              <th>Volunteer ID</th>
              <th>志愿者姓名</th>
              <th>志愿者性别</th>
              <th>志愿者Email</th>
              <th>志愿者电话</th>
              <th>志愿者已审核接机数</th>
              <th>提交申请时间</th>
              <th>新生ID</th>
              <th>新生姓名</th>
              <th>新生Email</th>
              <th>Arrival Airport</th>
              <th>Arrival Time</th>
              
            </tr>
          </tfoot>
        </table>
      </div>

<br>
      <div>
        <button id="buttonA1">OK</button>
        <button id="button2">取消选择</button>
      </div>
    
       </div>
 
<div id="page2">
<h3 style="color:blue;">删除新生账号</h3>
<p>请输入该新生的ID：&nbsp&nbsp<input type="text" name= "deletenewcomer" id="deletenewcomer" />&nbsp&nbsp<button id="buttonDN">OK</button></p>
<p>说明：删除该新生账号后，如果已经有志愿者申请该新生（正在审核中、通过审核或审核失败），将从志愿者审核栏中消失。</p>


<h3 style="color:blue;">删除志愿者账号</h3>
<p>请输入该志愿者的ID：&nbsp&nbsp<input type="text" name= "deletev" id="deletev" />&nbsp&nbsp<button id="buttonDV">OK</button></p>
<p>说明：删除该志愿者账号后，同时删除该志愿者所有申请，如果该志愿者已经有通过审核分配新生（们），新生（们）将被设为“未接机状态”，其他志愿者可以重新申请接该新生（们）。</p>

<h3 style="color:blue;">重新分配新生接机志愿者</h3>
<p>请输入该新生的ID：&nbsp&nbsp<input type="text" name= "rearrange" id="rearrange" />&nbsp&nbsp<button id="buttonRN">OK</button></p>
<p>说明：使用该功能后，对于已经分配志愿者的新生，将重新出现在志愿者的“Newcomer!”栏目中，原先分配结果被取消，同时原先对该新生申请失败的志愿者重新变为正在审核状态。</p>

<h3 style="color:blue;">不需要接机的新生</h3>
<p>请输入该新生的ID：&nbsp&nbsp<input type="text" name= "noneedpick" id="noneedpick" />&nbsp&nbsp<button id="buttonNP">OK</button></p>
<p>说明：使用该功能后，新生不会出现在志愿者“Newcomer!”栏目中，如果已经有志愿者申请该新生（正在审核中、通过审核或审核失败），志愿者申请状态都将变为申请失败。</p>




</div>

<div id="page3">
<h3 style="color:blue;">未分配接机的新生</h3>

      <div id="dynamic3">
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="example3">
          <thead>
            <tr>


              <th width="3%">新生ID</th>
              <th width="5%">姓名</th>
              <th width="1%">性别</th>
              <th width="10%">Email</th>
              <th width="3%">Arrival Time</th>
              <th width="5%">Arrival Airport</th>
              <th width="5%">同行家人</th>
              <th width="20%">Whether Need Temporary Bedroom</th>
              <th width="5%">Personal Statement</th>
              <th width="3%">接机Volunteer ID</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
          <tfoot>
            <tr>
              <th>新生ID</th>
              <th>姓名</th>
              <th>性别</th>
              <th>Email</th>
              <th>Arrival Time</th>
              <th>Arrival Airport</th>
              <th>同行家人</th>
              <th>Whether Need Temporary Bedroom</th>
              <th>Personal Statement</th>
              <th>接机Volunteer ID</th>

              
            </tr>
          </tfoot>
        </table>
      </div>




      <br>

    <h3 style="color:blue;">所有新生信息</h3>

      
      <div id="dynamic3_2">
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="example3_2">
          <thead>
            <tr>


              <th width="3%">新生ID</th>
              <th width="5%">姓名</th>
              <th width="1%">性别</th>
              <th width="10%">Email</th>
              <th width="3%">Arrival Time</th>
              <th width="5%">Arrival Airport</th>
              <th width="5%">同行家人</th>
              <th width="20%">Whether Need Temporary Bedroom</th>
              <th width="5%">Personal Statement</th>
              <th width="3%">接机Volunteer ID</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
          <tfoot>
            <tr>
              <th>新生ID</th>
              <th>姓名</th>
              <th>性别</th>
              <th>Email</th>
              <th>Arrival Time</th>
              <th>Arrival Airport</th>
              <th>同行家人</th>
              <th>Whether Need Temporary Bedroom</th>
              <th>Personal Statement</th>
              <th>接机Volunteer ID</th>
              
            </tr>
          </tfoot>
        </table>
      </div>

     <br>

    <h3 style="color:blue;">志愿者总信息</h3>

  
      
      <div id="dynamic3_3">
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="example3_3">
          <thead>
            <tr>

              <th width="8%">Volunteer ID</th>
              <th width="8%">姓名</th>
              <th width="15%">性别</th>
              <th width="10%">Email</th>
              <th width="12%">Phone Number</th>
              <th width="13%">是否愿意接受邮箱提醒</th>
              <th width="10%">已审核接机人数</th>
              <th width="10%">是否愿意提供其他服务</th>
              <th width="10%">Personal Statement</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
          <tfoot>
            <tr>
              <th>Volunteer ID</th>
              <th>姓名</th>
              <th>性别</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>是否愿意接受邮箱提醒</th>
              <th>已审核接机人数</th>
              <th>是否愿意提供其他服务</th>
              <th>Personal Statement</th>
            </tr>
          </tfoot>
        </table>
      </div>




</div>






<div id="page4">
  <br>
  <h3>联系邮箱</h3>
  <p>学习生活相关问题，请发邮件至 facssnewcomer@gmail.com</p>
  <p>新生信息管理系统问题，请发邮件至 daniellu789@gmail.com</p>
  <br>
<h3>接机紧急联系人</h3>
<p>缪沂普：352-226-7466</p>
<p>蔡崇伟：352-214-7880</p>




</div>



</div>

</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="signup" />
<title>Sign Up</title>
<!--<link rel="stylesheet" type="text/css" href="../css/main.css" />-->
<style type="text/css">
#user_success{color:green;}
#user_fail{color:red;}
#wizard {border:5px solid #789;font-size:12px;height:660px;margin:20px auto;width:570px;overflow:hidden;position:relative;-moz-border-radius:5px;-webkit-border-radius:5px;}
#wizard .items{width:20000px; clear:both; position:absolute;}
#wizard .right{float:right;}
#wizard #status{height:35px;background:#123;padding-left:25px !important;}
#status li{float:left;color:#fff;padding:10px 30px;}
#status li.active{background-color:#369;font-weight:normal;}
.input{width:240px; height:18px; margin:10px auto; line-height:20px; border:1px solid #d3d3d3; padding:2px}
.page{padding:20px 30px;width:500px;float:left;}
.page h3{font-family: sans-serif; height:42px; font-size:16px; border-bottom:1px dotted #ccc; margin-bottom:20px; padding-bottom:5px}
.page p{line-height:24px;}
.page p label{font-size:14px; display:block;}
.btn_nav{height:36px; line-height:36px; margin:20px auto;}
.prev,.next{width:100px; height:32px; line-height:32px; background:url(btn_bg.gif) repeat-x bottom; border:1px solid #d3d3d3; cursor:pointer}
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="js/scrollable.js"></script> </head>
<body>
<div id="header">
</div>

<div id="main">
   <form action="#" method="post">
    <div id="wizard">
    <ul id="status">
      <li class="active"><strong>1.</strong>Create New Account</li>
      <li><strong>2.</strong>Contact Infomation</li>
      <li><strong>3.</strong>Complete</li>
    </ul>

    <div class="items">
      <div class="page">
               <h3>FACSS Newcomers Information Management System</h3>
               <p><label>ID：</label><input type="text" class="input" id="user" name="username" /><div id="check"></div><div id="check1"></div></p>
               <p><label>Password：</label><input type="password" class="input" id="pass" name="password" /><div id="check2"></div></p>
               <p><label>Confirm Password：</label><input type="password" class="input" id="pass1" name="password1" /><div id="check3"></div></p>
               
               <div class="btn_nav">
                  <input type="button" class="next right" value="Next&raquo;" />
               </div>
      </div>
      <div class="page">
                <h3>Contact Information<br/><em></em></h3>   
                <p><label>Last name:</label><input type="text" class="input" id="lastname" name="lastname" /><div id="check4"></div></p>
                <p><label>First name:</label><input type="text" class="input" id="firstname" name="firstname" /><div id="check44"></div></p>
               
                <p><label>Gender:</label>
                        <input type="radio" name="gender" value="0">Male
                        <input type="radio" name="gender" value="1">Female
                    <div id="check5"></div>
                </p>
               <p><label>E-mail：</label><input type="text" class="input" id="email" name="email" /><div id="check6"></div></p>

               <p><label>Register Code：</label><input type="text" class="input" id="invitnumber" name="invitnumber" /><div id="check66"></div></p>

                  <div class="btn_nav">
                  <input type="button" class="prev" style="float:left" value="&laquo;Previous" />
                  <input type="button" class="next right" value="Next&raquo;" />
               </div>
            </div>
      <div class="page">
               <h3>Complete Registration<br/><em></em></h3>
            
               <p>Click OK to Complete Registration</p>
               <br/>
               <br/>
               <br/>
               <div class="btn_nav">
                  <input type="button" class="prev" style="float:left" value="&laquo;Previous" />
                  <input type="button" class="next right" id="sub" value="OK" />
               </div>
            </div>
    </div>
  </div>
</form><br />
<br />
<br />

</div>
<div id="footer">
</div>
<script type="text/javascript">
function validEmail(v) {
    var r = new RegExp("[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?");
    return (v.match(r) == null) ? false : true;
}
$(function(){
  var user;
  var pass;
  var name;
  var gender;
  var email;
  
  
         $("#wizard").scrollable({
      onSeek: function(event,i){
      $("#status li").removeClass("active").eq(i).addClass("active");
      },
      onBeforeSeek:function(event,i){ 
      if(i==1){
        user = $("#user").val();
        //$(".items:nth-child[0] #user").class("border","2px solid red");
        if(user==""){
           $("#check1").html("<p id='user_fail'>Sorry, ID cannot be empty.！</p>").fadeOut(2500);
          return false;
        }
        pass = $("#pass").val();
        var pass1 = $("#pass1").val();
        if(pass==""){
            $("#check2").html("<p id='user_fail'>Sorry, Password cannot be empty.！</p>").fadeOut(2500);
          return false;
        }
        if(pass1 != pass){
            $("#check3").html("<p id='user_fail'>Please confirm your password！</p>").fadeOut(2500);
          return false;
        }

      }
      if(i==2){

        lastname = $("#lastname").val();
          if(lastname==""){
              $("#check4").html("<p id='user_fail'>Last name is not avaible:( </p>").fadeOut(2500);
          return false;            
        }
        firstname = $("#firstname").val();
          if(firstname==""){
              $("#check44").html("<p id='user_fail'>First name is not avaible:( </p>").fadeOut(2500);
          return false;            
        }
        gender = $("input[@name='gender']:checked").val();
        if (!gender) {
             $("#check5").html("<p id='user_fail'>Please fill your gender</p>").fadeOut(2500);
          return false;  
          }

          email = $("#email").val();
        if(!validEmail(email)){
              $("#check6").html("<p id='user_fail'>Please check the formati of your email</p>").fadeOut(2500);
              return false;             
        }
        invitnumber = $("#invitnumber").val();
          if(invitnumber==""){
              $("#check66").html("<p id='user_fail'>Please fill your Register Code</p>").fadeOut(2500);
          return false;            
        }
    }
    }
    
  });
  $("#user").blur(function(){

    var blurUser = $("#user").val()
    var changeUrl = "includes/acheckdup.php?action=check&user_name="+blurUser;

    $.get(changeUrl,function(msg){
      if(msg==1){

          $("#check").html("<p id='user_fail'>Sorry, this ID already taken, please use another one！</p>");
      }
      else{

        $("#check").html("<p id='user_success'>This ID is available！</p>");
        
      }
               
             
    }); 
    return false; 

/*
    var blurUser = "user_name="+$("#user").val();
  if(blurUser!=""){
  $.ajax({
    type: "POST", 
         url: "checkdup.php",   
         data: blurUser,   
         success: function(msg){   
            if(msg==1){   
                alert(msg);

            }else{   
                alert(msg);
            }   
         }    
  }
     
    );
  }
*/
  });  
  $("#sub").click(function(){
    var dataform = $("form").serialize();
    //alert(dataform);
    //var user = $("#user").val();   
      //var txt = $("#txt").val();   
      $.ajax({   
         type: "POST",   
         url: "includes/ainsert.php",   
         data: dataform,   
         success: function(msg){   
            if(msg==1){   
                alert("Congratulations, Please Click OK!");
                window.location.href='aindex.php'
            }else{   
                alert(msg);
            }   
         }    
    });  
  });
});
</script>

</body>
</html>

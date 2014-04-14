// JavaScript Document

$(function(){

    $("#user").focus();

	$("input:text,textarea,input:password").focus(function() {

		$(this).addClass("cur_select");

    });

    $("input:text,textarea,input:password").blur(function() {

		$(this).removeClass("cur_select");

    });



	$(".btn2").live('click',function(){



		window.location.href='asignup.php';

	});









	$(".btn").live('click',function(){

		var user = $("#user").val();

		var pass = $("#pass").val();

		if(user==""){

			$('<div id="msg" />').html("ID不能为空！").appendTo('.sub').fadeOut(2000);

			$("#user").focus();

			return false;

		}

		if(pass==""){

			$('<div id="msg" />').html("Password不能为空！").appendTo('.sub').fadeOut(2000);

			$("#pass").focus();

			return false;

		}

		$.ajax({

			type: "POST",

			url: "alogin.php?action=login",

			dataType: "json",

			data: {"user":user,"pass":pass},

			beforeSend: function(){

				//alert("hello_2");

				$('<div id="msg" />').addClass("loading").html("正在登录...").css("color","#999").appendTo('.sub');

			},

			success: function(json){

			

				if(json.success==1){

					//alert("hello_3");

					window.location.href='sandbox/aindex.php';

					return true;

				}else{

					//alert("hello_4");

					

					$('<div id="errmsg" />').html(json.msg).css("color","#999").appendTo('.sub').fadeOut(2000);

					$("#msg").remove();

					return false;

				}

			}

		});

	});

	

	$("#logout").live('click',function(){

		$.post("alogin.php?action=logout",function(msg){

			if(msg==1){

				window.location.href='sandbox/aindex.php';//'http://localhost/pickup2013/index.php';

			  /*  $("#result").remove();

			    var div = "<div id='login_form'><p><label>ID：</label> <input type='text' class='input' name='user' id='user' /></p><p><label>Password：</label> <input type='password' class='input' name='pass' id='pass' /></p><div class='sub'><input type='submit' class='btn' value='Sign In' /></div></div>";

			    $("#login").append(div);

			    */

			}

		});

	});

});
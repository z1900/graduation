$(document).ready(function(){

	function registerSwitch(){
		$("#dou-title>span").click(function(){
			var curIndex=$("#dou-title>span").index(this);
			$("#dou-box .dou-switch").hide("300").eq(curIndex).show("300");
			$("#dou-title>span").removeClass("dou-title-color").eq(curIndex).addClass("dou-title-color");
		})
		$("#dou-title>span:eq(0)").click(function(){
			$("#dou-title .switch-bottom").animate({left:"0"});
		})
		$("#dou-title>span:eq(1)").click(function(){
			$("#dou-title .switch-bottom").animate({left:"49.5%"});
		})
	}
	registerSwitch();

	function removeInitial(){
		$("#dou-register input").blur(function(){
			$("#errorMessages>p").remove();
		})

		$("#dou-submit").click(function(){
			$(".dou-wrap .dou-login .login-err>p").remove();
		})
	}
	removeInitial();

	function refreshCode(){
		$("#code-refresh").click(function(){
			$(this).attr("src", "PHP/verifyCode.php?r="+Math.random())
		})
	}
	refreshCode();

	function saveMsg(){
		$("#save").click(function(){
			$("#userUpdate").trigger("submit");
		})
	}
	saveMsg();

	function maskChange(trig, mask, mshow, mhide){
		$(trig).click(function(){
			var h=$(document).scrollTop()+"px";
			$(mask).css("top",h).show(100);
		})
		$(mhide).click(function(){
			$(mask).hide(100);
		})
	}
	maskChange("#watch-book", "#bookMask", null, "#bookMaskHide, #bookCancel");
	maskChange("#roomApply", "#payMask", null, "#payCancel");
	maskChange("#bcRulesRead", "#rulesMask", null, "#rules-close, #rulesAgree");


	function headerControl(whichHeader){
		$(window).scroll(function(){
			var h=$(document).scrollTop();
			var rh=parseInt($(whichHeader).css("height"));
			if (h>rh) {
				$(whichHeader).hide();
			} else {
				$(whichHeader).show();
			}
		})
	}
	headerControl("#bcheader");

	function paidOver(){
		$("#payConfirm").click(function(){
			var h=$(document).scrollTop()+"px";
			$("#payMask").hide(100);
			$("#paidMask").css("top",h).show();

			var i=3;
			function count(){
				if(i>0){
					$("#countdown").html(i);
					i--;
				}
			}

			setInterval(function(){
				count();
			},1000)

			setTimeout(function(){
				goIndex();
			} , 4000);

		})		
	}
	paidOver();

	function goIndex(){
		location.href="seek.html";
	}

	function adminTab(){
		$("#adminLeft>span").click(function(){
			var index=$("#adminLeft>span").index(this);
			$("#adminLeft>span").removeClass("active").eq(index).addClass("active");
			$("#adminRight .rightMid .listShow").hide(300).eq(index).show(300);
		})
	}
	adminTab();
	
	function setpixel(height, width){
		var h=(window.innerHeight)+"px";
		var w=(window.innerWidth-220)+"px";
		$(height).css("height", h);
		$(width).css("width", w);
	}
	setpixel("#adminLeft", null);

})

window.onresize=function(){
	setpixel("#adminLeft", null);
}

function setpixel(height, width){
	var h=(window.innerHeight)+"px";
	var w=(window.innerWidth-220)+"px";
	$(height).css("height", h);
	$(width).css("width", w);
}

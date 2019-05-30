$(document).ready(function(){
	function checkUsername() {
		$.ajax({
			type:"POST",
			url:"PHP/checkUsername.php",
			data:{uname:$("#uname").val()},
			success:function(data){
				$("#userError").html(data);
			}
		})
	}

	function doLogin(){
		$.ajax({
			type:"POST",
			url:"PHP/doLogin.php",
			data:$("#dou-login").serialize(),
			success:function(data){
				if (data.status) {
					$(".dou-wrap .dou-login .login-err").html(data.msg);
					location.href="personal.php";
				} else {
					$(".dou-wrap .dou-login .login-err").html(data.msg);
				}
			},
			error:function(xhr){
				console.log(xhr.status);
			},
			dataType: "json"
		})
	}

	function doRegister(){
		$.ajax({
			type:"POST",
			url:"PHP/doUserReg.php",
			data:$("#dou-register").serialize(),
			dataType:"json",
			success:function(data){
				if (data.status==true) {
					alert(data.msg);
				}else{
					$("#userError").html(data.msg);
				}
			},
			error:function(xhr){
				console.lgo(xhr.status);
			}
		})
	}

	$("#dou-register input:eq(0)").blur(function(){
		checkUsername();
	})

	$("#dou-register input:gt(0)").focus(function(){
		$("#userError").html("");
	})

	$("#dou-submit").click(function(){
		doLogin();
	})

	$("#dou-register-submit").click(function(){
		doRegister();
	})

	function checkAdmin() {
		$("#bloginSubmit").click(function() {
			$("#bloginError>p").remove();
			$.ajax({
				type: "POST",
				url: "../PHP/doAdminLogin.php",
				data: $("#bloginForm").serialize(),
				dataType: "json",
				success: function(data) {
					if (data.status==true) {
						$("#bloginError").html(data.msg);
						location.href="../admin/admin.php";
					} else {
						$("#bloginError").html(data.msg);
					}
				},
				error: function(xhr) {
					console.log(xhr.status);
				}
			});
		})
	}
	checkAdmin();

	function userAdd(){
		var formData = new FormData($("#uadd")[0]);
		$.ajax({
			type:"POST",
			url:"../admin/php/userAdd.php",
			dataType:"json",
			data:formData,
			contentType:false,
			processData:false,
			success:function(data){
				if (data.status==true) {
					alert(data.msg)
				}else{
					alert(data.msg);
				}
			},
			error:function(xhr){
				console.log(xhr.status);
			}
		})
	}
	$("#cadd").click(function(){
		userAdd();
	})

	function search(){
		$.ajax({
			type:"GET",
			url:"../admin/php/userSearch.php",
			data:{key:$("#key").val()},
			dataType:"json",
			success:function(data){
				var addHtml='';
				$(data).each(function(){
					addHtml+='<tr>'
					+'<td>'+data.uid+'</td>'
					+'<td>'+data.username+'</td>'
					+'<td>'+data.gender+'</td>'
					+'<td>'+data.birthdate+'</td>'
					+'<td>'+data.mail+'</td>'
					+'<td><img src="../images/profile/'+data.profile+'" alt="" /></td>'
					+'<td>'
					+'<a href="../adminEdit.php?uid='+data.uid+'">修改</a>'
					+'<a href="php/userDelete.php?uid='+data.uid+'" onclick="return confirm(\'确认删除吗？\')">删除</a>'
					+'</td>'
					+'</tr>'
				})
				$("#stable").append(addHtml);
			},
			error:function(xhr){
				console.log(xhr.status);
			}
		})
	}
	$("#conSearch").click(function(){
		$("#stable tr:gt(0)").remove();
		search();
	})
})
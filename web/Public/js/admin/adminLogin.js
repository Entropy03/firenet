
var userObj = {
	'login' : function(){
		var username  = $('#username').val();
		var password  = $('#password').val();
		var autoLogin = $('#autoLogin').prop("checked");
		if(username==''){
			alert("请输入用户名");
		}
		if(password==''){
			alert("请输入密保");
		}
		var data = {'username':username,'password':password,'autoLogin':autoLogin};
		$.post('/fire.php/AuSubmit ', data, function(data) {

		        switch (data) {
		            case 1:
		                window.location.href = '/fire.php/';
		                break;
		            case 2:
		                alert("登录失败");
		                break;
		            case 3:
		                alert("用户密码错误");
		                break;
		            case 4:
		                alert("当前已经录");
		                break;
		            case 5:
		                alert("用户未审核");
		                break;
		            default:
		                alert("未知错误");
		        }

    		}, 'json');
	 }
}

$(function(){

	$("#fullname_error_message").hide();
	$("#username_error_message").hide();
	$("#email_error_message").hide();
	$("#password_error_message").hide();

	var error_fullname = false;
	var error_username = false;
	var error_email = false;
	var error_password = false;

	$('#fullname').focusout(function(){
		check_fullname();
	});


	function check_fullname(){
		var fullname_length = $("#fullname").val().length;
		if(fullname_length < 5 || fullname_length > 20){
			$("#fullname_error_message").html("Should be between 5 to 20 character");
			$("#fullname_error_message").show();

			var error_fullname = true;
		}
		else
		{
			$("#fullname_error_message").hide();
		}
	}

});


$("#update").submit(function(){

	var error_fullname = false;
	var error_username = false;
	var error_email = false;
	var error_password = false;

	if(error_fullname == false){
		return true;
	}
	else
	{
		return false;
	}

});
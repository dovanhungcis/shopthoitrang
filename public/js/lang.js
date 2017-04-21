$(document).ready(function() {
	$("#languageSwitcher").change(function() {
		var locale = $(this).val();
		var _token = $("input[name=_token]").val();
		console.log(locale);
	});

	$.ajax({
		url : "/language",
		type : "POST",
		data : {
			locale : locale,
			_token : _token
		},
		datatype : 'json',
		success : function(data) {

		},
		error : function(data) {

		},
		beforeSend : function(data) {

		},
		complete : function(data) {
			window.location.reload(true);
		}
	});
});
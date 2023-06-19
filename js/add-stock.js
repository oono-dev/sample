$(function(){
	$("#itm001").change(function(){
		if($(this).is(":checked")){
			$("#itm001-input").prop("disabled",false);
		}else{
			$("#itm001-input").prop("disabled",true);	
            $("#itm001-input").prop("value", '');
		}
	});
    $("#itm002").change(function(){
		if($(this).is(":checked")){
			$("#itm002-input").prop("disabled",false);
		}else{
			$("#itm002-input").prop("disabled",true);	
            $("#itm002-input").prop("value", '');
		}
	});
    $("#itm003").change(function(){
		if($(this).is(":checked")){
			$("#itm003-input").prop("disabled",false);
		}else{
			$("#itm003-input").prop("disabled",true);	
            $("#itm003-input").prop("value", '');
		}
	});
    $("#itm004").change(function(){
		if($(this).is(":checked")){
			$("#itm004-input").prop("disabled",false);
		}else{
			$("#itm004-input").prop("disabled",true);
            $("#itm004-input").prop("value", '');	
		}
	});
    $("#itm005").change(function(){
		if($(this).is(":checked")){
			$("#itm005-input").prop("disabled",false);
		}else{
			$("#itm005-input").prop("disabled",true);
            $("#itm005-input").prop("value", '');	
		}
	});
    $("#itm006").change(function(){
		if($(this).is(":checked")){
			$("#itm006-input").prop("disabled",false);
		}else{
			$("#itm006-input").prop("disabled",true);
            $("#itm006-input").prop("value", '');	
		}
	});
    $("#itm007").change(function(){
		if($(this).is(":checked")){
			$("#itm007-input").prop("disabled",false);
		}else{
			$("#itm007-input").prop("disabled",true);
            $("#itm007-input").prop("value", '');	
		}
	});
    $("#itm008").change(function(){
		if($(this).is(":checked")){
			$("#itm008-input").prop("disabled",false);
		}else{
			$("#itm008-input").prop("disabled",true);	
            $("#itm008-input").prop("value", '');
		}
	});
    
});

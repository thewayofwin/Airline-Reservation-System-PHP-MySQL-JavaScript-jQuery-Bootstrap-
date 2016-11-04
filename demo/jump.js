$(document).ready(function() {
	$("#oneway").show();
	$("#roundtrip").hide();
	$("#all").hide();
	
	$("#button1").click(function(){		
		$("#oneway").show();
		$("#roundtrip").hide();
		$("#all").hide();
	});
	$("#button2").click(function(){
		$("#roundtrip").show();
		$("#oneway").hide();
		$("#all").hide();
	});
	$("#button3").click(function(){
		$("#oneway").hide();
		$("#roundtrip").hide();
		$("#all").show();
	});
});
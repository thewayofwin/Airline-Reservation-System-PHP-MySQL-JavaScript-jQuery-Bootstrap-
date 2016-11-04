$(document).ready(function() {
var checking_html='Checking...';
$('#check_username_availability').click(function() {
	
$('#username_availability_result').html(checking_html);


check_availability();
});

});



function check_availability() {
var username=$('#username').val();
// use ajax to run the check
$.post("checkUser.php", { username : username },
function(result) {
if(result==1) {
$('#username_availability_result').html(username + ' already exists');
} else {
$('#username_availability_result').html(username + ' is Available');
}
});
}
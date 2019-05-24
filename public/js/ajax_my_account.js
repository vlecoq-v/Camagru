var btn = document.getElementById('submit_chg_username');
var text = document.getElementById('username_rgstr');

// var new_username = <?php  ?>;

var request = new XMLHttpRequest();

request.onreadystatechange = function() {
  if(request.readyState === 4) {
    // placeholder.style.border = '1px solid #e8e8e8';
    if(request.status === 200) { 
      text.placeholder = request.responseText;
    } else {
      text.placeholder = 'An error occurred during your request: ' +  request.status + ' ' + request.statusText;
    } 
  }
}
 
console.log("in the shit");

request.open('Get', 'controller/script_username.php');
 
// console.log(request.responseText);

btn.addEventListener('click', function() {
	console.log("button heard");
	console.log(request.responseText);
	// var str = "username=";
	// str.concat()
	// this.style.display = 'none';
	// request.send();
});
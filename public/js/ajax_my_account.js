var btn = document.getElementById('submit_chg_username');
var text = document.getElementById('username_rgstr');

// var new_username = <?php  ?>;

var request = new XMLHttpRequest();

request.onreadystatechange = function() {
  if(request.readyState === 4) {
    if(request.status === 200) { 
      text.placeholder = request.responseText;
    } else {
      text.placeholder = 'An error occurred during your request: ' +  request.status + ' ' + request.statusText;
    } 
  }
}
 

request.open('Get', 'controller/script_username.php');
 
// console.log(request.responseText);

btn.addEventListener('click', function() {
});
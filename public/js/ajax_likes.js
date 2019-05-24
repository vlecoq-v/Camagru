var btn = document.getElementById('submit_chg_username');
var text = document.getElementById('username_rgstr');


var request = new XMLHttpRequest();

request.onreadystatechange = function() {
  if(request.readyState === 4) {
    // placeholder.style.border = '1px solid #e8e8e8';
    if(request.status === 200) { 
		// console.log(request.responseText);
    //   text.placeholder = request.responseText;
    } else {
    //   text.placeholder = 'An error occurred during your request: ' +  request.status + ' ' + request.statusText;
    } 
  }
}
 
console.log("in the shit");

request.open('Post', 'index.php?action=like');
request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

// console.log(request.responseText);

document.addEventListener('click', function(event) {
	// if (event.target.)
	className = event.target.className;
	console.log(className);
	console.log(className.includes("heart"));
	if (className.includes("heart")) {
		id = event.target.parentNode.id;
		console.log(event.target.parentNode);
		console.log(id);
		request.send("id=".concat(id));
	}
	// if (Classname.search("heart"))
	// 	console.log(event.target.className.search("heart"));
	// console.log(event.target);
	// console.log(parentDiv = event.target.parentNode);
	// Object.values(event.target);
	console.log("button heard");
	// console.log(request.responseText);
	// var str = "username=";
	// str.concat()
	// this.style.display = 'none';
	// request.send();
});
var request = new XMLHttpRequest();

request.onreadystatechange = function() {
  if (request.readyState === 4) {
    if (request.status === 200) {
      var response = request.responseText.split(";");
      var nb_like = document.getElementById(id.concat("_nb"));
      nb_like.innerHTML = response[1];
      var like = document.getElementById(id);
      if (response[0] == "false") like.className = "icon is-small";
      else like.className = "icon is-small has-text-primary";
    }
  }
};

document.addEventListener("click", function(event) {
  request.open("Post", "index.php?action=like", true);
  request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  className = event.target.className;
  if (className.includes("heart")) {
    id = event.target.parentNode.id;
    request.send("id=".concat(id));
  }
});

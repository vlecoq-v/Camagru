document.addEventListener('click', function(event) {
	pic_id = event.target.id;
	if (pic_id.includes("pic_src_gallery")) {
		id = pic_id.substring(pic_id.length - 2, pic_id.length);
		if (confirm("Do you want to delete this picture?")) {
			var request = new XMLHttpRequest();
			request.open('Post', 'index.php?action=delete_pic');
			request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			request.send("id=".concat(id));
			window.location = "index.php?action=picture";
		}
	}
});	
document.addEventListener("click", function(event, dlt_my_gallery) {
  pic_id = event.target.id;
  if (pic_id.includes("pic_src_gallery")) {
    id = pic_id.substring(pic_id.length - 2, pic_id.length);
    id = pic_id.split(";")[1];
    if (confirm("Do you want to delete this picture?")) {
      var request = new XMLHttpRequest();
      request.open("Post", "index.php?action=delete_pic");
      request.setRequestHeader(
        "Content-Type",
        "application/x-www-form-urlencoded"
      );
      request.send("id=".concat(id));
      return (function(id) {
        my_gallery = document.getElementById("my_gallery");
        pic_rmv = document.getElementById("pic_src_gallery;".concat(id));
        my_gallery.removeChild(pic_rmv);
      })(id);
    }
  }
});

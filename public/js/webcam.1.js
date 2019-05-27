var video = document.getElementById("videoElement");
var pic_button  = document.querySelector('#pic_button');
var download = document.getElementById('download');
var overlay = document.getElementById("overlay");
var another_button = document.getElementById("another_button");
var request = new XMLHttpRequest();
var canvas = document.getElementById("canvas");

if (navigator.mediaDevices.getUserMedia) {
  navigator.mediaDevices.getUserMedia({ video: true })
    .then(function (stream) {
      video.srcObject = stream;
    })
    .catch(function (err0r) {
      console.log("Something went wrong!");
    });
}

function changeImage() {
  var canvas = document.getElementById("[object HTMLCanvasElement]");
  var img = canvas.toDataURL("image/png");

  var upload = document.getElementById('upload_hidden');
  // canvas.style.display = "none";
  upload.value = img;
}

function leave_overlay() {
  // overlay.style.display = "none";
  // overlay_back.style.display = "none";
  document.location = '/index.php';
}


request.onreadystatechange = function takepicture(callback) {
  var canvas = document.getElementById("canvas");
  var overlay = document.getElementById("overlay");
  var overlay_back = document.getElementById("overlay_back");
  var filter = document.getElementById("selected_filter");

  width = video.offsetWidth;
  height = video.offsetHeight;
  canvas.width = width;
  canvas.height = height;
  // console.log(video.videoWidth);
  // console.log(video.offsetWidth);
  // console.log(video.height);
  canvas.getContext('2d').drawImage(video, 0, 0, width, height);
  // imagecopymerge($canvas, $filter, 0, 0, 0, 0)
  canvas.id = canvas;
  overlay.style.display = "block";
  overlay_back.style.display = "block";
  console.log(typeof callback);
  // another_button.style = submit.style;
  // echo typeof(callback);
  if (typeof callback === "function")
    callback();
  else
    changeImage();
};

pic_button.addEventListener('click', function(ev) {
  request.open('Get', 'index.php?action=filter_pic', true);
  request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  request.send();
  // changeImage(takepicture());
  // takepicture(changeImage);
ev.preventDefault();
}, false);

// ------------------ Creates the canvas and displays it within overlay --------



another_button.addEventListener('click', function(ev) {
  leave_overlay();
})

// ------------------ Sets the value of the upload form to the image --------





// function download_pic() {
//   var canvas = document.getElementById("canvas");
//   var img    = canvas.toDataURL("image/png");
//   var main_div = document.getElementById("columns");

//   console.log(canvas);
//   canvas = canvas.Value;
//   console.log(canvas);
//   console.log(img);
// }

// function uploadImage() {
//   var canvas = document.getElementById("canvas");
//   var img = canvas.toDataURL("image/png");
//   var form = document.getElementById('uploadForm');
//   var formData = new FormData(form);
//   var xhr = new XMLHttpRequest();

//   console.log("sent");
//   console.log(img);
//   xhr.open('POST', 'upload.php', true);
//   xhr.setRequestHeader('Content-Type', 'application/upload');
//   xhr.send(img);
//   console.log(xhr.responseText);
// }


// var video = document.querySelector("#videoElement");
var video = document.getElementById("videoElement");
var pic_button  = document.querySelector('#pic_button');
// var canvas       = document.getElementById('canvas');
// var canvas       = document.querySelector('#canvas');
var photo        = document.querySelector('#photo');
var width = document.getElementById('videoElement').clientWidth;
var height = document.getElementById('videoElement').clientHeight;
var download = document.getElementById('download');
var overlay = document.getElementById("overlay");
var another_button = document.getElementById("another_button");
// var submit = document.getElementById("submit");

if (navigator.mediaDevices.getUserMedia) {
  navigator.mediaDevices.getUserMedia({ video: true })
    .then(function (stream) {
      video.srcObject = stream;
    })
    .catch(function (err0r) {
      console.log("Something went wrong!");
    });
}

pic_button.addEventListener('click', function(ev){
  // changeImage(takepicture());
  takepicture(changeImage);
ev.preventDefault();
}, false);

another_button.addEventListener('click', function(ev) {
  leave_overlay();
})
// ------------------ Creates the canvas and displays it within overlay --------

function takepicture(callback) {
  var canvas = document.getElementById("canvas");
  var overlay = document.getElementById("overlay");
  var overlay_back = document.getElementById("overlay_back");
 
  width = video.offsetWidth;
  height = video.offsetHeight;
  canvas.width = width;
  canvas.height = height;
  console.log(video.videoWidth);
  console.log(video.offsetWidth);
  console.log(video.height);
  canvas.getContext('2d').drawImage(video, 0, 0, width, height);
  canvas.id = canvas;
  overlay.style.display = "block";
  overlay_back.style.display = "block";
  // another_button.style = submit.style;
  callback();
};

// ------------------ Sets the value of the upload form to the image --------

function changeImage() {
  var canvas = document.getElementById("[object HTMLCanvasElement]");
  var img = canvas.toDataURL("image/png");

  var upload = document.getElementById('upload_hidden');
  // canvas.style.display = "none";
  upload.value = img;
  // window.alert("ok");
  // window.alert(img);
  // console.log(upload.value);
}

function leave_overlay() {
  // overlay.style.display = "none";
  // overlay_back.style.display = "none";
  document.location = '/index.php';
}

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


var video = document.getElementById("videoElement");
var pic_button = document.querySelector('#pic_button');
var photo = document.querySelector('#photo');
var width = document.getElementById('videoElement').clientWidth;
var height = document.getElementById('videoElement').clientHeight;
var download = document.getElementById('download');
var overlay = document.getElementById("overlay");
var another_button = document.getElementById("another_button");
var filter = document.getElementById("selected_filter");
var videoWrapper = document.getElementById("videoWrapper");
var canvas = document.createElement("canvas");

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
  console.log(video.style.display);
  console.log(video.parentNode);

  ev.preventDefault();
}, false);

erase_button.addEventListener('click', function(ev) {
  canvas.style.display = 'none';
  video.style.display = 'run-in';

  erase_button_div.style.display = 'none';

});

another_button.addEventListener('click', function(ev) {
  leave_overlay();
})

// ------------------ Creates the canvas and displays it within overlay --------

function takepicture(callback) {
  // var canvas = document.getElementById("canvas");
  var overlay = document.getElementById("overlay");
  var overlay_back = document.getElementById("overlay_back");
  var filter = document.getElementById("selected_filter");
  var erase_button_div = document.getElementById("erase_button_div");

  rect = video.getBoundingClientRect();
  console.log(rect);
  width = rect.width;
  canvas.style.top = 0;
  // canvas.style.left = video.offsetLeft;
  // width = video.offsetWidth;
  height = video.offsetHeight;
  canvas.width = width;
  canvas.height = height;
  // video.parentNode.removeChild(video);
  video.style.display = "none";
  // erase_button_div.style.display = "inline";
  console.log(erase_button_div);
  // console.log(video.videoWidth);
  // console.log(video.offsetWidth);
  // console.log(video.height);
  // console.log(typeof filter);
  // console.log(filter);
  canvas.getContext('2d').drawImage(video, 0, 0, width, height);
  // canvas.getContext('2d').drawImage(filter, width / 2, 0, width / 2, height / 2);
  // imagecopymerge($canvas, $filter, 0, 0, 0, 0);
  canvas.id = canvas;
  // overlay.style.display = "block";
  // overlay_back.style.display = "block";
  // another_button.style = submit.style;
  videoWrapper.appendChild(canvas);
  canvas.style.display = "inline-flex";
  if (typeof callback === "function")
    callback();
};

// ------------------ Sets the value of the upload form to the image --------

function changeImage() {
  var canvas = document.getElementById("[object HTMLCanvasElement]");
  var img = canvas.toDataURL("image/png");

  var upload = document.getElementById('upload_hidden');
  
  console.log(rect);
  // canvas.style.display = "none";
  upload.value = img;
  // window.alert("ok");
  // window.alert(img);
  // console.log(upload.value);
}

function leave_overlay() {
  // overlay.style.display = "none";
  // overlay_back.style.display = "none";
  // document.location = 'index.php?action=picture';
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


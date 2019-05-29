var video = document.getElementById("videoElement");
var pic_button = document.querySelector('#pic_button');
var photo = document.querySelector('#photo');
var width = document.getElementById('videoElement').clientWidth;
var height = document.getElementById('videoElement').clientHeight;
var download = document.getElementById('download');
var overlay = document.getElementById("overlay");
var another_button = document.getElementById("another_button");
var videoWrapper = document.getElementById("videoWrapper");
var canvas = document.createElement("canvas");
var upload_button = document.getElementById("upload_button");
var filter = document.getElementById("radio_1");


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
  // takepicture(changeImage);
  takepicture();

  ev.preventDefault();
}, false);

upload_button.addEventListener('click', function(ev) {

  // ---FRONT BUTTONS ---

  canvas.style.display = 'none';
  video.style.display = 'inline-flex';

  erase_button_div.style.display = 'none';
  upload_button_div.style.display = 'none';

    // --- SEND TO BACK ---

    var request = new XMLHttpRequest();

    // console.log(filter);
    // console.log(filter.childNodes[1]);
    var filter_src = filter.childNodes[1].src;
    var img = canvas.toDataURL("image/png");
    // console.log(filter_src);
    // console.log(img);
  
    request.open('Post', 'index.php?action=upload', true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("filter=".concat(filter_src).concat("&img=".concat(img)));
    setTimeout(function(){ return(false); }, 5000);
    // console.log("event heard");
});

erase_button.addEventListener('click', function(ev) {

  // ---FRONT BUTTONS ---

  canvas.style.display = 'none';
  video.style.display = 'inline-flex';

  erase_button_div.style.display = 'none';
  upload_button_div.style.display = 'none';


});

// ------------------ Creates the canvas and displays it within overlay --------

function takepicture(callback) {
  // var canvas = document.getElementById("canvas");
  var overlay = document.getElementById("overlay");
  var overlay_back = document.getElementById("overlay_back");
  var filter = document.getElementById("selected_filter");
  var erase_button_div = document.getElementById("erase_button_div");
  var upload_button_div = document.getElementById("upload_button_div");

  canvas.style.top = 0;
  width = video.offsetWidth;
  height = video.offsetHeight;
  canvas.width = width;
  canvas.height = height;
  video.style.display = "none";
  erase_button_div.style.display = "flex";
  upload_button_div.style.display = "flex";
  // console.log(erase_button_div);
  canvas.getContext('2d').drawImage(video, 0, 0, width, height);
  canvas.id = canvas;
  videoWrapper.appendChild(canvas);
  canvas.style.display = "inline-flex";
  if (typeof callback === "function")
    callback();
};

// ------------------ Sets the value of the upload form to the image --------

// function changeImage() {
//   var canvas = document.getElementById("[object HTMLCanvasElement]");
//   var img = canvas.toDataURL("image/png");
//   var upload = document.getElementById('upload_hidden');
  
//   upload.value = img;
// }
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
var preview = document.getElementById("preview");
var radio_1 = document.getElementById('radio_1');
var radio_2 = document.getElementById('radio_2');

if (navigator.mediaDevices.getUserMedia) {
  navigator.mediaDevices.getUserMedia({ video: true })
    .then(function (stream) {
      video.srcObject = stream;
    })
    .catch(function (err0r) {
      console.log("Something went wrong!");
    });
}

// ------------------ Get the selected filter and display it --------

radio_1.addEventListener('click', function(ev) {
  preview.src = radio_1.childNodes[1].src;
  radio_1.childNodes[0].checked = true;
}, false);

radio_2.addEventListener('click', function(ev) {
  preview.src = radio_2.childNodes[1].src;
  radio_2.childNodes[0].checked = true;
  console.log(video.offsetHeight);
  preview.height = video.offsetHeight;
}, false);

radio_3.addEventListener('click', function(ev) {
  preview.src = radio_3.childNodes[1].src;
  radio_3.childNodes[0].checked = true;
}, false);

// window.onload = function () { 
// }

// ------------------ change its position on the image and records it --------





// ------------------ Define action for buttons --------

pic_button.addEventListener('click', function(ev){
  // takepicture(changeImage);
  takepicture();

  ev.preventDefault();
}, false);

erase_button.addEventListener('click', function(ev) {
  // ---FRONT BUTTONS ---

  canvas.style.display = 'none';
  video.style.display = 'inline-flex';

  erase_button_div.style.display = 'none';
  upload_button_div.style.display = 'none';
});

// ------------------ Creates the canvas and displays it within overlay --------

function takepicture(callback) {
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
  canvas.getContext('2d').drawImage(video, 0, 0, width, height);
  canvas.id = canvas;
  videoWrapper.appendChild(canvas);
  canvas.style.display = "inline-flex";
  if (typeof callback === "function")
    callback();
};

// ------------------ Upload to server to merge images --------

upload_button.addEventListener('click', function(ev) {
  // ---FRONT BUTTONS ---

  canvas.style.display = 'none';
  video.style.display = 'inline-flex';

  erase_button_div.style.display = 'none';
  upload_button_div.style.display = 'none';

  // --- SEND TO BACK ---

  var request = new XMLHttpRequest();
  var img = canvas.toDataURL("image/png");

  if (document.getElementById('radio_1').childNodes[0].checked) {
    var filter_src = document.getElementById('radio_1').childNodes[1].src;
  }
  else if (document.getElementById('radio_2').childNodes[0].checked) {
    var filter_src = document.getElementById('radio_2').childNodes[1].src;
  }
  else if (document.getElementById('radio_3').childNodes[0].checked) {
    var filter_src = document.getElementById('radio_3').childNodes[1].src;
  }
  request.open('Post', 'index.php?action=upload', true);
  request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  request.send("filter=".concat(filter_src).concat("&img=".concat(img)));
});

// ------------------ Sets the value of the upload form to the image --------

// function changeImage() {
//   var canvas = document.getElementById("[object HTMLCanvasElement]");
//   var img = canvas.toDataURL("image/png");
//   var upload = document.getElementById('upload_hidden');
  
//   upload.value = img;
// }
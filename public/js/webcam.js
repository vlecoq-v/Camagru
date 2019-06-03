var video = document.getElementById("videoElement");
var photo = document.querySelector('#photo');
var download = document.getElementById('download');
var overlay = document.getElementById("overlay");
var videoWrapper = document.getElementById("videoWrapper");
var canvas = document.createElement("canvas");
var upload_button = document.getElementById("upload_button");
var preview = document.getElementById("preview");

if (navigator.mediaDevices.getUserMedia) {
  navigator.mediaDevices.getUserMedia({ video: true })
    .then(function (stream) {
      video.srcObject = stream;
    })
    .catch(function (err0r) {
      console.log("Something went wrong with the webcam userMedia authorisation!");
    });
}

// ------------------ draw the upload file -----------------
var upload_file_button = document.getElementById('upload_file_button');
var upload_file = document.getElementById('upload_file');

upload_file.addEventListener('change', function (ev) {
  var img = new Image();
  img.onError = alert("Only images are allowed for upload, Gifs will take firm frame only");
  img.onload = draw;
  img.src = URL.createObjectURL(this.files[0]);
}, false);

function draw() {
  width = this.width;
  height = this.height;
  canvas.style.top = 0;
  canvas.width = width;
  canvas.height = height;
  video.style.display = "none";
  erase_button_div.style.display = "flex";
  upload_button_div.style.display = "flex";
  canvas.getContext('2d').drawImage(this, 0,0);
  canvas.style.width = "100%";
  videoWrapper.appendChild(canvas);
  canvas.style.display = "inline-flex";
}

upload_file_button.addEventListener('click', function(ev) {
  upload_file.click();
}, false);


// ------------------ Get the selected filter and display it --------
var radio_1 = document.getElementById('radio_1');
var radio_2 = document.getElementById('radio_2');
var radio_3 = document.getElementById('radio_3');

radio_1.addEventListener('click', function(ev) {
  preview.src = radio_1.childNodes[1].src;
  radio_1.childNodes[0].checked = true;
}, false);

radio_2.addEventListener('click', function(ev) {
  preview.src = radio_2.childNodes[1].src;
  radio_2.childNodes[0].checked = true;
  width = videoWrapper.offsetWidth / 3.3;
  preview.width = width;
}, false);

radio_3.addEventListener('click', function(ev) {
  preview.src = radio_3.childNodes[1].src;
  radio_3.childNodes[0].checked = true;
}, false);


// ------------------ change its position on the image and records it --------


// ------------------ Define action for buttons --------
var pic_button = document.querySelector('#pic_button');
var another_button = document.getElementById("another_button");

pic_button.addEventListener('click', function(ev){
  if (video.style.display == "none")
    document.getElementById("erase_button").click();
  else
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

function takepicture() {
  canvas.style.top = 0;
  width = video.offsetWidth;
  height = video.offsetHeight;
  canvas.width = width;
  canvas.height = height;
  video.style.display = "none";
  erase_button_div.style.display = "flex";
  upload_button_div.style.display = "flex";
  canvas.getContext('2d').drawImage(video, 0, 0, width, height);
  videoWrapper.appendChild(canvas);
  canvas.style.display = "inline-flex";
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
  window.location = "index.php?action=picture";
});

// ------------------ Sets the value of the upload form to the image --------
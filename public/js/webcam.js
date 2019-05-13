var video = document.querySelector("#videoElement");
var pic_button  = document.querySelector('#pic_button');
var canvas       = document.querySelector('#canvas');
var photo        = document.querySelector('#photo');
var width = document.getElementById('videoElement').clientWidth;
var height = document.getElementById('videoElement').clientHeight;
var download = document.getElementById('download');


// var width = 320;
// var height = 0;


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
  takepicture();
ev.preventDefault();
}, false);

download.addEventListener('click', function(ev){
  uploadImage();
ev.preventDefault();
}, false);

submit.addEventListener('click', function(ev){
  changeImage();
ev.preventDefault();
}, false);

function takepicture() {
  var element = document.createElement('a');

  canvas.width = width;
  canvas.height = height;
  canvas.getContext('2d').drawImage(video, 0, 0, width, height);
  // element.setAttribute("download", canvas);
  // element.style.display = 'none';
  // document.body.appendChild(element);
  // canvas.download();

  // element.click();

  // document.body.removeChild(element);
  // var data = canvas.toDataURL('image/png');
  // document.write(data);
  // photo.setAttribute('src', canvas);
};

function download_pic() {
  var canvas = document.getElementById("canvas");
  var img    = canvas.toDataURL("image/png");
  var main_div = document.getElementById("columns");

  console.log(canvas);
  canvas = canvas.Value;
  console.log(canvas);
  console.log(img);

//   canvas.src = "img";
//   // window.alert("ok");
//   console.log("in !");
//   // window.alert(img);
//   // window.open(img);
//   // window.open(canvas);
//   // document.write('<img src="'+img+'"/>');
//     // var btn = document.createElement("a");
//     // btn.setAttribute("href", img);
//     // btn.setAttribute("download", "test.png");
//     // main_div.appendChild(btn);
//     // img.fetch('/public/img', {method: "POST", body: img});

//     var request = new XMLHttpRequest();
//   request.open("POST", "http://foo.com/submitform.php");
//   request.send(formData);
//     // var a = $("<a>")
//     // .attr("href", img)
//     // .attr("download", "img.png")
//     // .appendTo("body");

// btn.click();

// a.remove();
}

function uploadImage() {
  var canvas = document.getElementById("canvas");
  var img = canvas.toDataURL("image/png");
  var form = document.getElementById('uploadForm');
  var formData = new FormData(form);
  var xhr = new XMLHttpRequest();

  console.log("sent");
  console.log(img);
  // window.alert("sent");
  // formData.append('upload', img.src);
  xhr.open('POST', 'upload.php', true);
  xhr.setRequestHeader('Content-Type', 'application/upload');
  xhr.send(img);
  console.log(xhr.responseText);

  // var canvasData = testCanvas.toDataURL("image/png");
  // var ajax = new XMLHttpRequest();
  // ajax.open("POST",'testSave.php',false);
  // ajax.setRequestHeader('Content-Type', 'application/upload');
  // ajax.send(canvasData );

  // xhr.open('POST', img, true);
  // xhr.addEventListener('load', function ()
}

function changeImage() {
  var canvas = document.getElementById("canvas");
  var img = canvas.toDataURL("image/png");

  var upload = document.getElementById('upload');
  upload.value = img;
}
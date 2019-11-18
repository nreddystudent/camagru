let width = 500,
	height = 0,
	filter = 'none',
	streaming = false;
	const video = document.getElementById('video');
	const canvas = document.getElementById('canvas');
	const photos = document.getElementById('photos');
	const posts = document.getElementById('posts');
	const photoButton = document.getElementById('photo-button');
	const uploadButton = document.getElementById('upload-button');
	const clearButton = document.getElementById('clear-button');
	const photoFilter = document.getElementById('photo-filter');
	const stickercanvas = document.getElementById('stickercanvas');
	//Get media stream
	navigator.mediaDevices .getUserMedia({video: true, audio:false}
		)
	.then(function(stream){
		video.srcObject = stream ;
		video.play();
	} )
	.catch(function(err){
		console.log(`Error: ${err}` )
	});
	

	video.addEventListener('canplay', function(e) {
		if (!streaming){
			height = video.videoHeight / (video.videoWidth / width);	
			video.setAttribute('width', width);
			video.setAttribute('height', height);
			canvas.setAttribute('width', width);
			canvas.setAttribute('height', height);
			resizecanvas(video);
			streaming = true;
		}		
	}, false);
// Photo button event
	photoButton.addEventListener('click', function(e){
		takePicture();
		e.preventDefault()
	}, false);

	//filter event
	photoFilter.addEventListener('change', function(e){
		//set filter to option
		filter = e.target.value;
		//set filter to video
		video.style.filter = filter;
		e.preventDefault();
	})

	//clear event
	clearButton.addEventListener('click', function(e){
		content = stickercanvas.getContext('2d');
		photos.innerHTML = '';
		filter = 'none';
		video.style.filter = filter;
		content.clearRect(0, 0, stickercanvas.width, stickercanvas.height);
		photoFilter.selectedIndex = 0;

	})

//take picture from canvas
	function takePicture(){
		const context = canvas.getContext('2d');
		if (width && height){
			canvas.width = width;
			canvas.height = height;
		}
		context.setTransform(-1,0,0,1,canvas.width,0);
		context.drawImage(video, 0, 0, width, height);
		const imgURL = canvas.toDataURL('image/png');
		const stickerURL = stickercanvas.toDataURL('image/png')
		const img = document.createElement('img');
		img.setAttribute('src', imgURL);
		saveImage(imgURL, filter, stickerURL);
		//set filter
		img.style.filter = filter;
		
	}
	function saveImage(imgURL, filter, stickerURL){
		var ajax = new XMLHttpRequest();
		ajax.open("POST", "", true);
		ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		ajax.onload = function(){
			let element = document.createElement("img");
			element.src = "/camagru/images/"+ajax.responseText;
			
			posts.insertBefore(element, posts.childNodes[0]);
		}
		ajax.send("imgData="+imgURL+"&filter="+filter+"&stickerData="+stickerURL);
	}

	function putSticker(sticker){
		var context = stickercanvas.getContext("2d");
		console.log(stickercanvas.height);
		context.drawImage(sticker, 0, 0, stickercanvas.width*4, stickercanvas.height*4, sticker.width/2, sticker.height/2, stickercanvas.width, stickercanvas.height);
		console.log(stickercanvas);
	};

	function resizecanvas(size){
		let w = size.offsetWidth;
		let h = size.offsetHeight;
		stickercanvas.width = w;
		stickercanvas.height = h;
	}
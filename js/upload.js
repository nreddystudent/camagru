let width = 500,
	height = 0,
	filter = 'none',
	streaming = false;
	const video = document.getElementById('video');
	const canvas = document.getElementById('canvas' );
	const photos = document.getElementById('photos');
	const photoButton = document.getElementById('photo-button');
	const clearButton = document.getElementById('clear-button');
	const photoFilter = document.getElementById('photo-filter');

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

		photos.innerHTML = '';
		filter = 'none';
		video.style.filter = filter;
		photoFilter.selectedIndex = 0;

	})

//take picture from canvas
	function takePicture(){
		const context = canvas.getContext('2d');
		if (width && height){
			canvas.width = width;
			canvas.height = height;
		}
		context.drawImage(video, 0, 0, width, height);
		const imgURL = canvas.toDataURL('image/png');
		const img = document.createElement('img');

		img.setAttribute('src', imgURL);
		//set filter
		img.style.filter = filter;

		photos.appendChild(img);
	}
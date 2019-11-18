const inpfile =  document.getElementById("file");
const previewContainer =  document.getElementById("imagePreview");
const previewImage = previewContainer. querySelector(".img-preview__image"); 
const previewDefaultText =  previewContainer.querySelector(".image-preview__default-text");
const stickercanvas = document.getElementById("stickercanvas");
const photoFilter = document.getElementById('photo-filter');
const clearButton = document.getElementById('clear-button');
const uploadButton = document.getElementById("submit-button");
let filter = 'none';
let imgURL = null;
// previewImage.width= width;
// previewImage.height = height;
let c = null;
previewImage.addEventListener("load", function(){
	let width = previewImage.width;
	let height = previewImage.height;
	c = document.createElement('canvas');
	c.width = width;
	c.height = height;
	resizecanvas(c);
	c.getContext('2d').drawImage(previewImage,0,0,width,height);
})
inpfile.addEventListener("change", function(){
	const file=this.files[0];
	if (file && file.type == "image/png" || file.type == "image/gif" || file.type == "image/jpeg" || file.type == "image/jpg"){
		stickercanvas.style.display = "block";
		const reader = new FileReader;
		previewDefaultText.style.display = "none";
		previewImage.style.display = "block";
		
		reader.addEventListener("load", function(){
			previewImage.setAttribute("src", this.result);
			});
		reader.readAsDataURL(file); 
	}
	else{
		previewDefaultText.style.display = null;
		previewImage.style.display = null;
		previewImage.setAttribute("src", ""); 
	}
});

	photoFilter.addEventListener('change', function(e){
	//set filter to option
	filter = e.target.value;
	//set filter to video
	previewImage.style.filter = filter;
	e.preventDefault();
})

function putSticker(sticker){
	var context = stickercanvas.getContext("2d");
	context.drawImage(sticker, 0, 0, stickercanvas.width, stickercanvas.height);
};

clearButton.addEventListener('click', function(e){
	content = stickercanvas.getContext('2d');
	filter = 'none';
	previewImage.style.filter = filter;
	content.clearRect(0, 0, stickercanvas.width, stickercanvas.height);
	photoFilter.selectedIndex = 0;

});
	uploadButton.addEventListener('click' ,function(){
		let photo = document.getElementById("file");
		if (photo.files.length == 1){
			const reader = new FileReader();
			reader.readAsDataURL(photo.files[0]);
			reader.addEventListener("load", function(e){
				imgURL = c.toDataURL();
				let stickerURL = stickercanvas.toDataURL('image/png');
				saveImage(imgURL, filter, stickerURL)
			});
		}
	});

function saveImage(imgURL, filter, stickerURL){
	var ajax = new XMLHttpRequest();
	ajax.open("POST", "", true);
	ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	ajax.onload = function(){
		if (ajax.responseText != "wrong file type"){
			let element = document.createElement("img");
			element.src = "/camagru/images/"+ajax.responseText;
			posts.insertBefore(element, posts.childNodes[0]);
			console.log(ajax.responseText);
		}
	}
	ajax.send("imgData="+imgURL+"&filter="+filter+"&stickerData="+stickerURL);
}
function resizecanvas(size){
	let w = size.width;
	let h = size.height;
	stickercanvas.width = w;
	stickercanvas.height = h;
}
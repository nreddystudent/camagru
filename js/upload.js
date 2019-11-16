const inpfile =  document.getElementById("file");
const previewContainer =  document.getElementById("imagePreview");
const previewImage = previewContainer. querySelector(".img-preview__image"); 
const previewDefaultText =  previewContainer.querySelector(".image-preview__default-text");
const stickercanvas = document.getElementById("stickercanvas");
const photoFilter = document.getElementById('photo-filter');
inpfile.addEventListener("change", function(){
	const file=this.files[0];
	if (file){
		const reader = new FileReader;
		previewDefaultText.style.display = "none";
		previewImage.style.display = "block";

		reader.addEventListener("load", function(){
			 previewImage.setAttribute("src", this.result);
			 stickercanvas.width = previewImage.width;
			 stickercanvas.height = previewImage.height;
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

clearButton.addEventListener('click', function(e){
	content = stickercanvas.getContext('2d');
	photos.innerHTML = '';
	filter = 'none';
	previewImage.style.filter = filter;
	content.clearRect(0, 0, stickercanvas.width, stickercanvas.height);
	photoFilter.selectedIndex = 0;

})

const inpfile =  document.getElementById("file");
const previewContainer =  document.getElementById("imagePreview");
const previewImage = previewContainer. querySelector(".img-preview__image"); 
const previewDefaultText =  previewContainer.querySelector(".image-preview__default-text");

inpfile.addEventListener("change", function(){
	const file=this.files[0];
	if (file){
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
document.getElementById("settings").addEventListener('click', function(){
		settings = document.getElementsByClassName("settings_dropdown");
		if (settings[0].style.display == 'flex')
		{
			for (var i = 0; i < settings.length; i++) {
				settings[i].style.display = 'none';
			}
		}
		else{
			for (var i = 0; i < settings.length; i++) {
				settings[i].style.display = 'flex';
			}
		}
});


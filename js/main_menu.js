
function makeNav(){
	var list = document.getElementById("nav");
	if (list.classList.contains("active")){
		list.classList.remove("active");
		nav.style.height = "auto";
	}
	else{
		list.classList.add("active");
		nav.style.height = "100vh";
	}
}
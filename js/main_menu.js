
function makeNav(){
	var list = document.getElementById("nav");
	if (list.classList.contains("active")){
		list.classList.remove("active");
	}
	else{
		list.classList.add("active");
	}
}
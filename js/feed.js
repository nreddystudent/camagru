function likeme(likeid, postid){
    let likebtn = document.getElementById(likeid);
        ajax = new XMLHttpRequest;
        ajax.open("POST", "http://localhost:8080/camagru/feed", true);
		ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        ajax.onload = function(){
			console.log(ajax.responseText);
		}
		ajax.send("likeData="+postid);
        if (likebtn.children[0].style.fill != 'red')
        likebtn.children[0].style.fill = 'red';
    else{
        likebtn.children[0].style.fill = 'white';
    }
}
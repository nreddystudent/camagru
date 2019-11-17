function likeme(likeid, postid, counter, userid){
    let likebtn = document.getElementById(likeid);
        ajax = new XMLHttpRequest;
        ajax.open("POST", "/camagru/feed", true);
		ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        ajax.onload = function(){
			document.getElementById(counter).innerHTML = ajax.responseText;
		}
		ajax.send("likeData="+postid+"&likeUID="+userid);
        if (likebtn.children[0].style.fill != 'red')
        likebtn.children[0].style.fill = 'red';
    else{
        likebtn.children[0].style.fill = 'white';
    }
}
window.addEventListener('scroll', moving);

function getDocumentHeight(){
    const html = document.documentElement;
    const body = document.body;
    return Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);
}

function pixelsScrolled(){
    return window.pageYOffset;
}

function loadMore(){
    let loadposts = new XMLHttpRequest;
    postsdisplayed = document.getElementById("postCount").value;
    loadposts.open("POST", "/camagru/feed", true);
    loadposts.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    loadposts.onload = function(){
        document.documentElement.innerHTML = this.response;
    }
    loadposts.send("postsDisplayed="+postsdisplayed)
}
function moving(){
    if (pixelsScrolled() < getDocumentHeight() - window.innerHeight - 5)
        return;
    loadMore();
}
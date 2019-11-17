let oldid = null;
window.addEventListener('load', function(){
    var loader = document.querySelector(".loader");
    loader.className += "hidden";
    loader = document.querySelector(".loaderwrapper");
    loader.className += "hidden";
});

function addContent(id){
    if(oldid != null)
        removeContent(oldid);
    var newid = 'bgcont' + id;
    var name = document.getElementById(newid);
    name.classList.add("active");
    oldid = id;
     };
function removeContent(id){
    var newid = 'bgcont' + id;
    var name = document.getElementById(newid);
    name.classList.remove("active");
     };
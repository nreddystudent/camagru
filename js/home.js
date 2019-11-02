window.addEventListener('load', function(){
    var loader = document.querySelector(".loader");
    loader.className += "hidden";
    loader = document.querySelector(".loaderwrapper");
    loader.className += "hidden";
});

function addContent(id){
    var newid = 'bgcont' + id;
    var name = document.getElementById(newid);
        console.log(newid);
        name.classList.add("active");
     };
function removeContent(id){
    var newid = 'bgcont' + id;
    var name = document.getElementById(newid);
        console.log(newid);
        name.classList.remove("active");
     };
function likeme(likeid){
    let likebtn = document.getElementById(likeid);
    console.log(likebtn.children[0].style.fill);
    if (likebtn.children[0].style.fill != 'red')
        likebtn.children[0].style.fill = 'red';
    else{
        likebtn.children[0].style.fill = 'white';
    }
}
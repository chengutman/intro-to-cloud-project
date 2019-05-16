
var initialSize = 80;
var countBoxes = 0, clicks = 0;
var chosen, couple, first, second,single;
var top = 20, fontSize = 40;
function addFloatBox() {
    const body = document.getElementsByTagName('boxes_game')[0];
    const box = document.createElement('div');
    box.className = 'floatBox';
    body.prepend(box);
}
document.getElementById('addFloatBox');

function createBoxes() {
    couple = Math.floor(Math.random() * 25) + 65;
    while(couple===single)
    {
        couple=Math.floor(Math.random() * 25) + 65;
    }
    if (countBoxes % 2 === 0) {
        single = Math.floor(Math.random() * 25) + 65;
    }
    first = Math.floor(Math.random() * 3);
    second = Math.floor(Math.random() * 3);
    while(first===second)
    second = Math.floor(Math.random() * 3);
    for (var i = 0; i < 3; i++) {
        newBox = document.createElement("div");
        newBox.style.width = initialSize + 'px';
        newBox.style.height = initialSize + 'px';
        newBox.style.backgroundColor = '#000000';
        newBox.style.marginLeft = "64px";
        newBox.style.marginRight = "64px";
        newBox.style.marginTop = "123px";
        newBox.style.fontSize = fontSize + 'px';
        newBox.style.textAlign = "center";
        newBox.style.lineHeight=initialSize+"px";
        newBox.style.verticalAlign="middle";
        initialSize = initialSize + 20;
        fontSize += 20;
        document.getElementById("boxes_game").appendChild(newBox);
        if (i === first || i === second) {
            newBox.innerHTML = String.fromCharCode(couple);
        }

        else {
            newBox.innerHTML = String.fromCharCode(single);
        }
        newBox.addEventListener('click', boxOpen);
        countBoxes++;
    }
}
function boxOpen() {
    this.style.color = "white";
    if (clicks===1)
    {
        if((chosen.innerHTML).localeCompare(this.innerHTML)===0 &&this!=chosen)
        {
            this.style.backgroundColor="green";
            chosen.style.backgroundColor="green";
            this.removeEventListener('click',boxOpen);
            chosen.removeEventListener('click',boxOpen);
        }
        else{                                                    //the user can see for 1 sec the letter before disappear            
            setTimeout(()=> {
                this.style.color="black";
                chosen.style.color="black";
            }, 750)       
        }
        clicks=0;
    }
    else{
        chosen=this;
        clicks++;
    }

}
window.onload=function(){
    var pageLoad = document.createElement("div");
    document.body.appendChild(pageLoad);
    pageLoad.style.position="absolute";
    pageLoad.style.backgroundColor="black";
    pageLoad.style.top="21px";
    pageLoad.style.right="23px";
    pageLoad.style.height="80px";
    pageLoad.style.width="80px";
    pageLoad.className="start_button";
    pageLoad.addEventListener('click', createBoxes);
}

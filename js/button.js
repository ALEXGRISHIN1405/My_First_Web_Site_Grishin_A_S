
const button = document.createElement('button');
button.innerText = 'Click me';

button.addEventListener("click", setImageVisible);

img=document.getElementById("images");

function setImageVisible() {
    if (img.style.visibility == 'visible'){
        img.style.visibility = ('hidden');
    } else {
        img.style.visibility = ('visible');
    }   
}

document.body.appendChild(button);
var count = 0;


document.getElementById("This_button").onclick = function () {
    count++;
    if (count % 2 == 0) {
        document.getElementById("demo").innerHTML = "";
    } else {
        var img = document.createElement("img");
        img.src = "./img/logo.png";
        document.getElementById("demo").appendChild(img);
    }
}

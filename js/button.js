var count = 0;
document.getElementById("myButton").onclick = function() {
    count++;
    if (count % 2 == 0) {
        document.getElementById("demo").innerHTML = "";
    }
    else {
        var img = document.createElement("img");
        img.src = "https://www.minezone.pro/uploads/posts/2012-10/1349349060_face2-300x300.jpg"
        document.getElementById("demo").appendChild(img)
    }
}
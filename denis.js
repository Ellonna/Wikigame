var denis = function(key) {
    if (key.key == 'a') {
        let img = document.createElement("img");
        img.setAttribute("src", "denis.jpeg");
        img.setAttribute("alt", "Denis Brogniart");
        var corps = document.getElementById("denis").appendChild(img);
        let sound = document.createElement("audio");
        let source = document.createElement("source");
        source.setAttribute("src", "AH.ogg");
        sound.appendChild(source);
        sound.style.display = "none";
        document.getElementById("denis").appendChild(sound);
        sound.play();
        setTimeout(function() {
            let divDenis = document.getElementById("denis");
            divDenis.removeChild(divDenis.getElementsByTagName("img")[0])
        }, 500);
        setTimeout(function() {
            let divDenis = document.getElementById("denis");
            divDenis.removeChild(divDenis.getElementsByTagName("audio")[0])
        }, 500);
    }
}
document.addEventListener("keyup", denis);

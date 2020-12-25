var button = document.getElementById("next");
pravila.style.display = "none";
kviz.style.display = "none";

button.onclick = function(){
    var div1 = document.getElementById("pocetak");
    var div2 = document.getElementById("pravila");
    var div3 = document.getElementById("kviz");
    var ime = document.getElementById("name").value;

    if (div1.style.display !== "none" && ime !=="" ){
        div1.style.display = "none";
        div2.style.display = "block";
        div3.style.display = "none";
        return true;
    }
    else {
        div1.style.display = "block";
        div2.style.display = "none";
        div3.style.display = "none";
        alert("Niste uneli ime!");
        return false;
    }
    
};

var button2 = document.getElementById("pocni");

button2.onclick = function(){
    var div1 = document.getElementById("pocetak");
    var div2 = document.getElementById("pravila");
    var div3 = document.getElementById("kviz");
    if (div2.style.display !== "none"){
        div1.style.display = "none";
        div2.style.display = "none";
        div3.style.display = "block";
    }
    else {
        div2.style.display = "block";
        
    }
};

var i = 0;
var tacni = 0 ;

generate(0);

function generate(index) {
    document.getElementById("question").innerHTML = jsonData[index].q;
    document.getElementById("optt1").innerHTML = jsonData[index].opt1;
    document.getElementById("optt2").innerHTML = jsonData[index].opt2;
    document.getElementById("optt3").innerHTML = jsonData[index].opt3;
    document.getElementById("optt4").innerHTML = jsonData[index].opt4;

    document.getElementById("optt1").style.color = "black";
    document.getElementById("optt2").style.color = "black";
    document.getElementById("optt3").style.color = "black";
    document.getElementById("optt4").style.color = "black";
}

var dalje = document.getElementById("sledece");
dalje.onclick = () => {
    if (document.getElementById("opt1").checked && jsonData[i].opt1 == jsonData[i].answer) {
        tacni++;
        document.getElementById("optt1").style.color = "green";
    }
    if (document.getElementById("opt1").checked && jsonData[i].opt1 !== jsonData[i].answer) {
        document.getElementById("optt1").style.color = "red";
    }
    if (document.getElementById("opt2").checked && jsonData[i].opt2 == jsonData[i].answer) {
        tacni++;
        document.getElementById("optt2").style.color = "green";
    }
    if (document.getElementById("opt2").checked && jsonData[i].opt2 !== jsonData[i].answer) {
        document.getElementById("optt2").style.color = "red";
    }
    if (document.getElementById("opt3").checked && jsonData[i].opt3 == jsonData[i].answer) {
        tacni++;
        document.getElementById("optt3").style.color = "green";
    }
    if (document.getElementById("opt3").checked && jsonData[i].opt3 !== jsonData[i].answer) {
        document.getElementById("optt3").style.color = "red";
    }
    if (document.getElementById("opt4").checked && jsonData[i].opt4 == jsonData[i].answer) {
        tacni++;
        document.getElementById("optt4").style.color = "green";
    }
    if (document.getElementById("opt4").checked && jsonData[i].opt4 !== jsonData[i].answer) {
        document.getElementById("optt4").style.color = "red";
    }

    i++;
    if(jsonData.length-1 < i){
        document.write("<body style='background-color:black;'>");
        document.write("<div style='color:white;font-size:18pt;text-align:center;'></br></br></br></br></br></br></br></br></br></br></br></br>*****Vas rezultat je: "+tacni+"/10*****</div>");
        document.write("</body>");
    }
    setTimeout(generate(i), 3000);
}

var odustani = document.getElementById("prekid");
odustani.onclick = () => {
    location.reload();
}

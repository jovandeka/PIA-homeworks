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
}
  
function checkAnswer() {
    if (document.getElementById("opt1").checked && jsonData[i].opt1 == jsonData[i].answer) {
        tacni++;
    }
    if (document.getElementById("opt2").checked && jsonData[i].opt2 == jsonData[i].answer) {
        tacni++;
    }
    if (document.getElementById("opt3").checked && jsonData[i].opt3 == jsonData[i].answer) {
        tacni++;
    }
    if (document.getElementById("opt4").checked && jsonData[i].opt4 == jsonData[i].answer) {
        tacni++;
    } 

    i++;
    if(jsonData.length-1 < i){
        document.write("<body style='background-color:#348322;'>");
        document.write("<div style='color:#ffffff;font-size:18pt;text-align:center;'>*****Vas rezultat je: "+tacni+"*****</div>");
        document.write("</body>");
    }
    generate(i);
  }

var odustani = document.getElementById("prekid");
odustani.onclick = () => {
    location.reload();
}

function unos() {
    var ime = document.getElementById("name").value;
  
    if (ime != null){
        alert("Uspesno ste uneli ime");
        return true;
    } 
  }

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
    if (document.getElementById("opt4").checked && jsonData[i].opt3 == jsonData[i].answer) {
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

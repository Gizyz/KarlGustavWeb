
var reg;
var part;
var parti_valg;
var valg_array; 
var valg_area;
reg = document.getElementById("reg");
part = document.getElementById("parti");
parti_valg = document.getElementById("parti_valg");
valg_area = document.getElementById("myDiv");
valg_array = [
    {parti:"Ap", Stemmer:0},
    {parti:"H",Stemmer:0},
    {parti:"FrP",Stemmer:0},
    {parti:"Sp",Stemmer:0},
    {parti:"SV",Stemmer:0},
    {parti:"V",Stemmer:0},
    {parti:"KrF",Stemmer:0},
    {parti:"MDG",Stemmer:0},
    {parti:"R",Stemmer:0},
 ]; 

display()
reg.addEventListener("click", register);

console.log(valg_array)


function register(e) {
    var valg = parti_valg.value;
    valg_array[valg].Stemmer += 1






    console.log(valg_array)

    display()
}
function sendToSql(){}
function display() {
    valg_area.innerHTML = '';
    for (i = 0; i < valg_array.length; i++) {
        var parti = document.createElement("P");
        parti.innerHTML = valg_array[i].parti + ": " + valg_array[i].Stemmer;
        valg_area.appendChild(parti);
    }
}
//in function start() werden alle window.onload zusammengefasst
function start() {
  init();
  showSidemap();
  
}
window.onload = start;

/*--------------------------------------------------------------------------------------------------------------------*/

function init(){
    
	//Variable prnt fuer Druck-Funktion deklarieren
	var prnt=document.getElementById('drucken');
	prnt.onclick=callPrint;
	
	//Variable smap fuer Weiterleitung deklarieren
	var smap=document.getElementById('sidemap');
	smap.onclick=callSidemap;
	
	//Variablen fuer Schwierigkeitsgrad
	var levEasy=document.getElementById('8');
	levEasy.onclick=spielLeicht;
	var levHard=document.getElementById('12');
	levHard.onclick=spielMittel;
	var levHarder=document.getElementById('24');
	levHarder.onclick=spielSchwer;
	
	var neustart=document.getElementById('neustart');
	neustart.onclick=neuesSpiel;
	
	//wenn der Spieler nicht mehr spielen will
	var spielBeenden=document.getElementById('beenden');
	spielBeenden.onclick=unwilligerSpieler;
	
	//Variablen fuer das Memoryspiel initialisieren
    memory_werte = []; // leeres Array zum speichern
    memory_feld_id = []; //tile = Fliese // leeres Array zum speichern zum speichern der Feld-Ids
    memory_gefunden = 0; //Fliese umgekippt   //zaehlt die umgedrehten Felder
    memory_fehlversuche = 0;//Zaehlt die Fehlversuche
    memory_array = memory_array = ['1','2','3','4','5','6','7','8','9','10','11','12'];//Array mit allen 12 Bildern wird initialisiert
    
 
}//Ende init()
/*-----------------------------------------------------------------------------------------------------------------*/

//Funktion zum drucken
function callPrint(){
	window.print(); 
}//Ende callPrint

//Funktion oeffnet sidemap.xml im seperaten Fenster	
function callSidemap(Adresse){
    MeineSidemap = window.open("http://slimou.de/WebSpace/Web-Programmierung/AbschlussPraese/xml/sidemap.xml", "Sidemap", "width=250px, height=750px, top=50px");
    MeineSidemap.focus();
}//Ende callSidemap

/*--------------------------------------------------------------------------------------------------------------------*/



//Pruefung der Emaileingabe

function pruefung() {
    // Initialisierung des Arrays
	var form = document.forms[0];
	
	// fehler wird die Namen der nicht ausgefuellten Felder beinhalten
	var fehler = "";
	// Überpruefung der Textfelder
	if(form.name.value == ""){
		fehler = fehler + "Bitte einen Namen angeben.\n";
	}
	// Ueberpruefung der Textarea
	if(form.nachricht.value == ""){
		fehler = fehler + "Bitte eine Nachricht eingeben.\n";
	}

	/*Email pruefen
	es wird erst geprueft, ob etwas eingegeben wurde und wenn ja,
	wird die Syntax geprueft*/
	if(form.email.value != ""){
	var x = document.forms["kontakt"]["email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        fehler = fehler + "Bitte eine gueltige Email-Adresse eingeben.\n";
    }}
	// Fehlermeldung 
	if(fehler != ""){
		var fehlerText = "Folgende Felder wurden nicht ausgefüllt:\n\n";
		fehlerText = fehlerText + fehler;
		window.alert(fehlerText);
		return false;
	}
	return true;
}//Ende pruefung()


function pruefungRegistri() {
    // Initialisierung des Arrays
	var form = document.forms[0];
	
	// fehler wird die Namen der nicht ausgefuellten Felder beinhalten
	var fehler = "";
	// Überpruefung der Textfelder
	if(form.name.value == ""){
		fehler = fehler + "Bitte einen Namen angeben.\n";
	}
	// Ueberpruefung der Textarea
	if(form.nachricht.value == ""){
		fehler = fehler + "Bitte eine Nachricht eingeben.\n";
	}
	// Ueberpruefung der Textarea
	if(form.emailRegistri.value == ""){
		fehler = fehler + "Bitte geben Sie Ihre Email-Adresse an..\n";
	}
	/*Email pruefen
	es wird erst geprueft, ob etwas eingegeben wurde und wenn ja,
	wird die Syntax geprueft*/
	if(form.email.value != ""){
	var x = document.forms["kontakt"]["email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        fehler = fehler + "Bitte eine gueltige Email-Adresse eingeben.\n";
    }}
	// Fehlermeldung 
	if(fehler != ""){
		var fehlerText = "Folgende Felder wurden nicht ausgefüllt:\n\n";
		fehlerText = fehlerText + fehler;
		window.alert(fehlerText);
		return false;
	}
	return true;
}//Ende pruefung()
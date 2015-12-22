/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//nous appliquons simplement une couleur d'arrière plan aux objets traités, 
function couleur(obj) {
     obj.style.backgroundColor = "#FFFFFF";
}

 function check() {
	var msg = "";
 
//Vérification du mail s'il n'est pas vide on vérifie le . et @
 
		if (document.formulaire.mail.value != "")	{
		indexAroba = document.formulaire.mail.value.indexOf('@');
		indexPoint = document.formulaire.mail.value.indexOf('.');
		if ((indexAroba < 0) || (indexPoint < 0))		{
 
//dans le cas ou il manque soit le . soit l'@ on modifie la couleur d'arrière plan du champ mail et définissons un message d'alerte
 
			document.formulaire.mail.style.backgroundColor = "#F3C200";
			msg += "Le mail est incorrect\n";
		}
	}
 
//Notre champs mail est vide donc on change la couleur et on défini un autre message d'alerte
 
	else	{
		document.formulaire.mail.style.backgroundColor = "#F3C200";
		msg += "Veuillez saisir votre mail.\n";
	}
 
//ici nous vérifions si le champs nom et vide, changeons la couleur du champs et définissons un message d'alerte
if (document.formulaire.nom.value == "")	{
		msg += "Veuillez saisir votre nom\n";
		document.formulaire.nom.style.backgroundColor = "#F3C200";
	}
 
//meme manipulation pour le champ prénom
if (document.formulaire.prenom.value == "")	{
		msg += "Veuillez saisir votre prenom\n";
		document.formulaire.prenom.style.backgroundColor = "#F3C200";
	}
 
//Si aucun message d'alerte a été initialisé on retourne TRUE
	if (msg == "") return(true);
 
//Si un message d'alerte a été initialisé on lance l'alerte
	else	{
		alert(msg);
		return(false);
	}
}
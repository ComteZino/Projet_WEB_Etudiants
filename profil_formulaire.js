function afficheFormulaire(){
    var element = document.getElementById("modifForm");
    if(element!=null){
            element.parentNode.removeChild(element);
    }
    //creation de la balise form dans le div principal
    divPrincipal = document.getElementById("divPrincipal");
    formEnfant = document.createElement("form");
    formEnfant.setAttribute("id","envoyer");
    //formEnfant.setAttribute("method","get");
    //formEnfant.setAttribute("action","");
    divPrincipal.appendChild(formEnfant);

    //creation de la partie 1 du formulaire
    formForumlaire= document.getElementById("envoyer");
    fieldsetEnfant = document.createElement("fieldset");
    fieldsetEnfant.setAttribute("id","part1");
    formForumlaire.appendChild(fieldsetEnfant);


    //creation la partie 1 du formulaire
    partieFormulaire1= document.getElementById("part1");
    numTitrePartie1 = document.createElement("legend");
    numTitrePartie1.setAttribute("id","titre1");
    partieFormulaire1.appendChild(numTitrePartie1);
    legend1= document.getElementById("titre1");
    span1=document.createElement("span");
    span1.setAttribute("id","number1");
    span1.setAttribute("class","number");
    legend1.appendChild(span1);
    remplaceTexte(span1,"1");
    remplaceTexte(legend1,"Qui êtes-vous?");
    inputNom=document.createElement("input");
    inputNom.setAttribute("type","nom");
    inputNom.setAttribute("placeholder","nom : ");
    partieFormulaire1.appendChild(inputNom);
    inputPrenom=document.createElement("input");
    inputPrenom.setAttribute("type","prenom");
    inputPrenom.setAttribute("placeholder","Prénom : ");
    partieFormulaire1.appendChild(inputPrenom);
    inputDtn=document.createElement("input");
    inputDtn.setAttribute("type","dtn");
    inputDtn.setAttribute("placeholder","Date de naissance : ");
    partieFormulaire1.appendChild(inputDtn);


    //creation de la  partie 2 du formulaire
    fieldsetEnfant2 = document.createElement("fieldset");
    fieldsetEnfant2.setAttribute("id","part2");
    formForumlaire.appendChild(fieldsetEnfant2);

    //creation la partie 2 du formulaire
    partieFormulaire2= document.getElementById("part2");
    numTitrePartie2 = document.createElement("legend");
    numTitrePartie2.setAttribute("id","titre2");
    partieFormulaire2.appendChild(numTitrePartie2);
    legend2= document.getElementById("titre2");
    span2=document.createElement("span");
    span2.setAttribute("id","number2");
    span2.setAttribute("class","number");
    legend2.appendChild(span2);
    remplaceTexte(span2,"2");
    remplaceTexte(legend2,"Votre passage dans l'établissement");
    labelAnEntre = document.createElement("label");
    labelAnEntre.setAttribute("for","anEntre");
    partieFormulaire2.appendChild(labelAnEntre);
    remplaceTexte(labelAnEntre,"En quelle année êtes-vous entré(e)?");
    selectAnEntre = document.createElement("select");
    selectAnEntre.setAttribute("id","anEntre");
    partieFormulaire2.appendChild(selectAnEntre);
    optionAnEntre = document.createElement("option");
    optionAnEntre.setAttribute("value","");
    selectAnEntre.appendChild(optionAnEntre);
    labelAnSortie = document.createElement("label");
    labelAnSortie.setAttribute("for","anSortie");
    partieFormulaire2.appendChild(labelAnSortie);
    remplaceTexte(labelAnSortie,"En quelle année êtes-vous sorti(e)?");
    selectAnSortie = document.createElement("select");
    selectAnSortie.setAttribute("id","anSortie");
    partieFormulaire2.appendChild(selectAnSortie);
    optionAnSortie = document.createElement("option");
    optionAnSortie.setAttribute("value","");
    selectAnSortie.appendChild(optionAnSortie);
    labelCursur = document.createElement("label");
    labelCursur.setAttribute("for","cursus");
    partieFormulaire2.appendChild(labelCursur);
    remplaceTexte(labelCursur,"Cursus poursuivi dans l'établissement");
    selectCursur = document.createElement("select");
    selectCursur.setAttribute("id","cursus");
    partieFormulaire2.appendChild(selectCursur);
    optionCursur = document.createElement("option");
    optionCursur.setAttribute("value","");
    selectCursur.appendChild(optionCursur);


    //creation de la partie 3 du formulaire
    fieldsetEnfant3 = document.createElement("fieldset");
    fieldsetEnfant3.setAttribute("id","part3");
    formForumlaire.appendChild(fieldsetEnfant3);
    //creation la partie 3 du formulaire
    partieFormulaire3= document.getElementById("part3");
    numTitrePartie3 = document.createElement("legend");
    numTitrePartie3.setAttribute("id","titre3");
    partieFormulaire3.appendChild(numTitrePartie3);
    legend3= document.getElementById("titre3");
    span3=document.createElement("span");
    span3.setAttribute("id","number3");
    span3.setAttribute("class","number");
    legend3.appendChild(span3);
    remplaceTexte(span3,"3");
    remplaceTexte(legend3,"Comment vous contacter?");
    inputAdresse=document.createElement("input");
    inputAdresse.setAttribute("type","adresse");
    inputAdresse.setAttribute("placeholder","Adresse : ");
    partieFormulaire3.appendChild(inputAdresse);
    inputCp=document.createElement("input");
    inputCp.setAttribute("type","cp");
    inputCp.setAttribute("placeholder","Code postal : ");
    partieFormulaire3.appendChild(inputCp);
    inputVille=document.createElement("input");
    inputVille.setAttribute("type","ville");
    inputVille.setAttribute("placeholder","Ville : ");
    partieFormulaire3.appendChild(inputVille);
    inputTelfixe=document.createElement("input");
    inputTelfixe.setAttribute("type","telfixe");
    inputTelfixe.setAttribute("placeholder","Téléphone fixe : ");
    partieFormulaire3.appendChild(inputTelfixe);
    inputMobile=document.createElement("input");
    inputMobile.setAttribute("type","mobile");
    inputMobile.setAttribute("placeholder","Mobile : ");
    partieFormulaire3.appendChild(inputMobile);
    inputEmail=document.createElement("input");
    inputEmail.setAttribute("type","email");
    inputEmail.setAttribute("placeholder","Email : ");
    partieFormulaire3.appendChild(inputEmail);

    //creation de la partie 4 du formulaire
    fieldsetEnfant4 = document.createElement("fieldset");
    fieldsetEnfant4.setAttribute("id","part4");
    formForumlaire.appendChild(fieldsetEnfant4);
    //creation la partie 4 du formulaire
    partieFormulaire4= document.getElementById("part4");
    numTitrePartie4 = document.createElement("legend");
    numTitrePartie4.setAttribute("id","titre4");
    partieFormulaire4.appendChild(numTitrePartie4);
    legend4= document.getElementById("titre4");
    span4=document.createElement("span");
    span4.setAttribute("id","number4");
    span4.setAttribute("class","number");
    legend4.appendChild(span4);
    remplaceTexte(span4,"4");
    remplaceTexte(legend4,"Poursuite d'études");
    inputFormation=document.createElement("input");
    inputFormation.setAttribute("type","formation");
    inputFormation.setAttribute("placeholder","Formation : ");
    partieFormulaire4.appendChild(inputFormation);
    inputAnnee=document.createElement("input");
    inputAnnee.setAttribute("type","annee");
    inputAnnee.setAttribute("placeholder","Année : ");
    partieFormulaire4.appendChild(inputAnnee);
    inputDiscipline=document.createElement("input");
    inputDiscipline.setAttribute("type","discipline");
    inputDiscipline.setAttribute("placeholder","Discipline : ");
    partieFormulaire4.appendChild(inputDiscipline);



    //creation de la partie 5 du formulaire
    fieldsetEnfant5 = document.createElement("fieldset");
    fieldsetEnfant5.setAttribute("id","part5");
    formForumlaire.appendChild(fieldsetEnfant5);
    //creation la partie 5 du formulaire
    partieFormulaire5= document.getElementById("part5");
    numTitrePartie5 = document.createElement("legend");
    numTitrePartie5.setAttribute("id","titre5");
    partieFormulaire5.appendChild(numTitrePartie5);
    legend5= document.getElementById("titre5");
    span5=document.createElement("span");
    span5.setAttribute("id","number5");
    span5.setAttribute("class","number");
    legend5.appendChild(span5);
    remplaceTexte(span5,"5");
    remplaceTexte(legend5,"Votre parcours professionnel");
    inputPosteOccupe=document.createElement("input");
    inputPosteOccupe.setAttribute("type","posteoccupe");
    inputPosteOccupe.setAttribute("placeholder","Poste occupé : ");
    partieFormulaire5.appendChild(inputPosteOccupe);
    labelTypeContract = document.createElement("label");
    labelTypeContract.setAttribute("for","typeContract");
    partieFormulaire5.appendChild(labelTypeContract);
    remplaceTexte(labelTypeContract,"Type de contrat de travail");
    selectTypeContract = document.createElement("select");
    selectTypeContract.setAttribute("id","typeContract");
    partieFormulaire5.appendChild(selectTypeContract);
    optionTypeContract = document.createElement("option");
    optionTypeContract.setAttribute("value","");
    selectTypeContract.appendChild(optionTypeContract);

    inputEntreprise=document.createElement("input");
    inputEntreprise.setAttribute("type","entreprise");
    inputEntreprise.setAttribute("placeholder","Entreprise : ");
    partieFormulaire5.appendChild(inputEntreprise);
    inputAdresseEntreprise=document.createElement("input");
    inputAdresseEntreprise.setAttribute("type","adresseEnt");
    inputAdresseEntreprise.setAttribute("placeholder","Adresse : ");
    partieFormulaire5.appendChild(inputAdresseEntreprise);
    inputSecteurAct=document.createElement("input");
    inputSecteurAct.setAttribute("type","secteurEnt");
    inputSecteurAct.setAttribute("placeholder","Secteur d'activité : ");
    partieFormulaire5.appendChild(inputSecteurAct);

    //créaction du boutton d'envoi du formulaire
    btnForm = document.createElement("input");
    btnForm.setAttribute("type","submit");
    btnForm.setAttribute("value","Modifier");
    formForumlaire.appendChild(btnForm);
	
}

function remplaceTexte(el, texte) {
    if (el != null) {
        var nouveauNoeud = document.createTextNode(texte);
        el.appendChild(nouveauNoeud);
    }
}
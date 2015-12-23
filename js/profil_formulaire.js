function afficheFormulaire(text){
    var totalInfo=text.split('/');
    var element = document.getElementById("modifForm");
    if(element!=null){
            element.parentNode.removeChild(element);
    }
    //creation de la balise form dans le div principal
    divPrincipal = document.getElementById("divPrincipal");
    formEnfant = document.createElement("form");
    formEnfant.setAttribute("id","profil");
    formEnfant.setAttribute("method","POST");
    formEnfant.setAttribute("action","traitement_profil.php");
    formEnfant.setAttribute("name","formulaire");
    formEnfant.setAttribute("onsubmit","return verifForm(this)");
    divPrincipal.appendChild(formEnfant);

    //creation de la partie 1 du formulaire
    formForumlaire= document.getElementById("profil");
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
    inputNom.setAttribute("id","nom");
    inputNom.setAttribute("type","nom");
    inputNom.setAttribute("name","nom");
    inputNom.setAttribute("placeholder","nom : ");
    inputNom.setAttribute("onblur","verifNom(this);");
    if(totalInfo[0]!==null){
        inputNom.setAttribute("value",totalInfo[0].replace("-"," "));
    }
    partieFormulaire1.appendChild(inputNom);
    erreurnom=document.createElement("p");
    erreurnom.setAttribute("id","erreurnom");
    partieFormulaire1.appendChild(erreurnom);
    inputPrenom=document.createElement("input");
    inputPrenom.setAttribute("name","prenom");
    inputPrenom.setAttribute("id","prenom");
    inputPrenom.setAttribute("type","prenom");
    inputPrenom.setAttribute("placeholder","Prénom : ");
    inputPrenom.setAttribute("onblur","verifPrenom(this);");
    if(totalInfo[1]!==null){
        inputPrenom.setAttribute("value",totalInfo[1].replace("-"," "));
    }
    partieFormulaire1.appendChild(inputPrenom);
    erreurprenom=document.createElement("p");
    erreurprenom.setAttribute("id","erreurprenom");
    partieFormulaire1.appendChild(erreurprenom);
    inputDtn=document.createElement("input");
    inputDtn.setAttribute("name","dtn");
    inputDtn.setAttribute("id","dtn");
    inputDtn.setAttribute("type","dtn");
    inputDtn.setAttribute("placeholder","Date de naissance : ");
    inputDtn.setAttribute("onblur","verifDtn(this);");
    if(totalInfo[2]!==null){
        inputDtn.setAttribute("value",totalInfo[2]);
    }
    partieFormulaire1.appendChild(inputDtn);
    erreurdtn=document.createElement("p");
    erreurdtn.setAttribute("id","erreurdtn");
    partieFormulaire1.appendChild(erreurdtn);


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
    selectAnEntre.setAttribute("name","anEntre");
    selectAnEntre.setAttribute("id","anEntre");
    selectAnEntre.setAttribute("onclick","verifAnEntre(this);");
    partieFormulaire2.appendChild(selectAnEntre);
    optionAnEntre0 = document.createElement("option");
    optionAnEntre0.setAttribute("value"," ");
    selectAnEntre.appendChild(optionAnEntre0);
    var i=1980;
    var ladate=new Date();
    while(i<=ladate.getFullYear()){
        optionAnEntre = document.createElement("option");
        optionAnEntre.setAttribute("value",i);
        selectAnEntre.appendChild(optionAnEntre);
        remplaceTexte(optionAnEntre,i);
         if(totalInfo[3]==i){
            $('#anEntre>option[value="'+i+'"]').attr('selected', true);
        }
        i++;
    }
    //document.getElementById("anEntre").selectedIndex="-1";
    erreuranentre=document.createElement("p");
    erreuranentre.setAttribute("id","erreuranentre");
    partieFormulaire2.appendChild(erreuranentre);
    labelAnSortie = document.createElement("label");
    labelAnSortie.setAttribute("for","anSortie");
    partieFormulaire2.appendChild(labelAnSortie);
    remplaceTexte(labelAnSortie,"En quelle année êtes-vous sorti(e)?");
    selectAnSortie = document.createElement("select");
    selectAnSortie.setAttribute("name","anSortie");
    selectAnSortie.setAttribute("id","anSortie");
    selectAnSortie.setAttribute("onclick","verifAnSortie(this);");
    partieFormulaire2.appendChild(selectAnSortie);
    optionAnSortie0 = document.createElement("option");
    optionAnSortie0.setAttribute("value"," ");
    selectAnSortie.appendChild(optionAnSortie0);
    var j=1980;
    while(j<=ladate.getFullYear()){
        optionAnSortie = document.createElement("option");
        optionAnSortie.setAttribute("value",j);
        selectAnSortie.appendChild(optionAnSortie);
        remplaceTexte(optionAnSortie,j);
        if(totalInfo[4]==j){
            $('#anSortie>option[value="'+j+'"]').attr('selected', true);
        }
        j++;
    }
    //document.getElementById("anSortie").selectedIndex="-1";
    erreuransortie=document.createElement("p");
    erreuransortie.setAttribute("id","erreuransortie");
    partieFormulaire2.appendChild(erreuransortie);
    labelCursur = document.createElement("label");
    labelCursur.setAttribute("for","cursus");
    partieFormulaire2.appendChild(labelCursur);
    remplaceTexte(labelCursur,"Cursus poursuivi dans l'établissement");
    selectCursus = document.createElement("select");
    selectCursus.setAttribute("name","cursus");
    selectCursus.setAttribute("id","cursus");
    selectCursus.setAttribute("onclick","verifCursus(this);");
    partieFormulaire2.appendChild(selectCursus);
    optionCursus0 = document.createElement("option");
    optionCursus0.setAttribute("value"," ");
    selectCursus.appendChild(optionCursus0);
    optionCursus = document.createElement("option");
    optionCursus.setAttribute("value","BTS AM");
    selectCursus.appendChild(optionCursus);
    remplaceTexte(optionCursus,"BTS Assistant de manager");
    optionCursus1 = document.createElement("option");
    optionCursus1.setAttribute("value","BTS AG");
    selectCursus.appendChild(optionCursus1);
    remplaceTexte(optionCursus1,"BTS Assistant de gestion PME-PMI");
    optionCursus2 = document.createElement("option");
    optionCursus2.setAttribute("value","BTS CGO");
    selectCursus.appendChild(optionCursus2);
    remplaceTexte(optionCursus2,"BTS Comptabilité et gestion des organisations");
    optionCursus3 = document.createElement("option");
    optionCursus3.setAttribute("value","BTS SIO");
    selectCursus.appendChild(optionCursus3);
    remplaceTexte(optionCursus3,"BTS Services Informatiques aux Organisations");
    optionCursus4 = document.createElement("option");
    optionCursus4.setAttribute("value","BTS MUC");
    selectCursus.appendChild(optionCursus4);
    remplaceTexte(optionCursus4,"BTS Management des unités commerciales");
    optionCursus5 = document.createElement("option");
    optionCursus5.setAttribute("value","BTS NRC");
    selectCursus.appendChild(optionCursus5);
    remplaceTexte(optionCursus5,"BTS Négociation et relation client");
    optionCursus6 = document.createElement("option");
    optionCursus6.setAttribute("value","BTS TPL");
    selectCursus.appendChild(optionCursus6);
    remplaceTexte(optionCursus6,"BTS Transport et Prestations logistiques");
    optionCursus7= document.createElement("option");
    optionCursus7.setAttribute("value","BTS C");
    selectCursus.appendChild(optionCursus7);
    remplaceTexte(optionCursus7,"BTS Communication");
    if(totalInfo[5].replace("-"," ")=="BTS AM"){
        $('#cursus>option[value="'+"BTS AM"+'"]').attr('selected', true);
    }
    else{
        if(totalInfo[5].replace("-"," ")=="BTS AG"){
            $('#cursus>option[value="'+"BTS AG"+'"]').attr('selected', true);
        }
        else
        {
             if(totalInfo[5].replace("-"," ")=="BTS CGO"){
                $('#cursus>option[value="'+"BTS CGO"+'"]').attr('selected', true);
            }
            else{
                if(totalInfo[5].replace("-"," ")=="BTS SIO"){
                    $('#cursus>option[value="'+"BTS SIO"+'"]').attr('selected', true);
                }
                else{
                    if(totalInfo[5].replace("-"," ")=="BTS-MUC"){
                        $('#cursus>option[value="'+"BTS MUC"+'"]').attr('selected', true);
                    }
                    else{
                         if(totalInfo[5].replace("-"," ")=="BTS NRC"){
                             $('#cursus>option[value="'+"BTS NRC"+'"]').attr('selected', true);
                        }
                        else{
                            if(totalInfo[5].replace("-"," ")=="BTS TPL"){
                                 $('#cursus>option[value="'+"BTS TPL"+'"]').attr('selected', true);
                            }
                            else{
                                if(totalInfo[5].replace("-"," ")=="BTS C"){
                                    $('#cursus>option[value="'+"BTS C"+'"]').attr('selected', true);
                                 }
                            }
                        }
                    }
                }
                
            }
        }
    }
    erreurcursus=document.createElement("p");
    erreurcursus.setAttribute("id","erreurcursus");
    partieFormulaire2.appendChild(erreurcursus);

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
    inputAdresse.setAttribute("name","adresse");
    inputAdresse.setAttribute("id","adresse");
    inputAdresse.setAttribute("type","adresse");
    inputAdresse.setAttribute("placeholder","Adresse : ");
    inputAdresse.setAttribute("onblur","verifAdresse(this);"); 
    if(totalInfo[6]!==null){
        inputAdresse.setAttribute("value",totalInfo[6].replace(/-/gi," "));
    }
    partieFormulaire3.appendChild(inputAdresse);
    erreuradresse=document.createElement("p");
    erreuradresse.setAttribute("id","erreuradresse");
    partieFormulaire3.appendChild(erreuradresse);
    inputCp=document.createElement("input");
    inputCp.setAttribute("name","cp");
    inputCp.setAttribute("id","cp");
    inputCp.setAttribute("type","cp");
    inputCp.setAttribute("placeholder","Code postal : ");
    inputCp.setAttribute("onblur","verifCp(this);"); 
    if(totalInfo[7]!==null){
        inputCp.setAttribute("value",totalInfo[7]);
    }
    partieFormulaire3.appendChild(inputCp);
    erreurcp=document.createElement("p");
    erreurcp.setAttribute("id","erreurcp");
    partieFormulaire3.appendChild(erreurcp);
    inputVille=document.createElement("input");
    inputVille.setAttribute("name","ville");
    inputVille.setAttribute("id","ville");
    inputVille.setAttribute("type","ville");
    inputVille.setAttribute("placeholder","Ville : ");
    inputVille.setAttribute("onblur","verifVille(this);"); 
    if(totalInfo[8]!==null){
        inputVille.setAttribute("value",totalInfo[8].replace(/-/gi," "));
    }
    partieFormulaire3.appendChild(inputVille);
    erreurville=document.createElement("p");
    erreurville.setAttribute("id","erreurville");
    partieFormulaire3.appendChild(erreurville);
    inputTelfixe=document.createElement("input");
    inputTelfixe.setAttribute("name","telfixe");
    inputTelfixe.setAttribute("id","telfixe");
    inputTelfixe.setAttribute("type","telfixe");
    inputTelfixe.setAttribute("placeholder","Téléphone fixe : ");
    inputTelfixe.setAttribute("onblur","verifTelFixe(this);"); 
    if(totalInfo[9]!==null){
        inputTelfixe.setAttribute("value",totalInfo[9]);
    }
    partieFormulaire3.appendChild(inputTelfixe);
    erreurtelfixe=document.createElement("p");
    erreurtelfixe.setAttribute("id","erreurtelfixe");
    partieFormulaire3.appendChild(erreurtelfixe);
    inputMobile=document.createElement("input");
    inputMobile.setAttribute("name","mobile");
    inputMobile.setAttribute("id","mobile");
    inputMobile.setAttribute("type","mobile");
    inputMobile.setAttribute("placeholder","Mobile : ");
    inputMobile.setAttribute("onblur","verifMobile(this);"); 
    if(totalInfo[10]!==null){
        inputMobile.setAttribute("value",totalInfo[10]);
    }
    partieFormulaire3.appendChild(inputMobile);
     erreurmobile=document.createElement("p");
    erreurmobile.setAttribute("id","erreurmobile");
    partieFormulaire3.appendChild(erreurmobile);
    inputEmail=document.createElement("input");
    inputEmail.setAttribute("name","email");
    inputEmail.setAttribute("id","email");
    inputEmail.setAttribute("type","email");
    inputEmail.setAttribute("placeholder","Email : ");
    inputEmail.setAttribute("onblur","verifEmail(this);"); 
    if(totalInfo[11]!==null){
        inputEmail.setAttribute("value",totalInfo[11]);
    }
    partieFormulaire3.appendChild(inputEmail);
     erreuremail=document.createElement("p");
    erreuremail.setAttribute("id","erreuremail");
    partieFormulaire3.appendChild(erreuremail);


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
    inputFormation.setAttribute("name","formation");
    inputFormation.setAttribute("id","formation");
    inputFormation.setAttribute("type","formation");
    inputFormation.setAttribute("placeholder","Formation : ");
    inputFormation.setAttribute("onblur","verifFormation(this);"); 
    if(totalInfo[12]!==null){
        inputFormation.setAttribute("value",totalInfo[12].replace(/-/gi," "));
    }
    partieFormulaire4.appendChild(inputFormation);
    erreurformation=document.createElement("p");
    erreurformation.setAttribute("id","erreurformation");
    partieFormulaire4.appendChild(erreurformation);
    labelAnneeFormation = document.createElement("label");
    labelAnneeFormation.setAttribute("for","anneeformation");
    partieFormulaire4.appendChild(labelAnneeFormation);
    remplaceTexte(labelAnneeFormation,"Année de la formation :");
    selectAnnee = document.createElement("select");
    selectAnnee.setAttribute("name","annee");
    selectAnnee.setAttribute("id","annee");
    selectAnnee.setAttribute("onclick","verifAnnee(this);");
    partieFormulaire4.appendChild(selectAnnee);
    optionAnnee0 = document.createElement("option");
    optionAnnee0.setAttribute("value"," ");
    selectAnnee.appendChild(optionAnnee0);
    var k=1980;
    while(k<=ladate.getFullYear()){
        optionAnnee = document.createElement("option");
        optionAnnee.setAttribute("value",k);
        selectAnnee.appendChild(optionAnnee);
        remplaceTexte(optionAnnee,k);
        if(totalInfo[13]==j){
            $('#annee>option[value="'+k+'"]').attr('selected', true);
        }
        k++;
    }
    //document.getElementById("anSortie").selectedIndex="-1";
    erreurannee=document.createElement("p");
    erreurannee.setAttribute("id","erreurannee");
    partieFormulaire4.appendChild(erreurannee);
    inputDiscipline=document.createElement("input");
    inputDiscipline.setAttribute("name","discipline");
    inputDiscipline.setAttribute("id","discipline");
    inputDiscipline.setAttribute("type","discipline");
    inputDiscipline.setAttribute("placeholder","Discipline : ");
    inputDiscipline.setAttribute("onblur","verifDiscipline(this);"); 
    if(totalInfo[14]!==null){
        inputDiscipline.setAttribute("value",totalInfo[14].replace(/-/gi," "));
    }
    partieFormulaire4.appendChild(inputDiscipline);
    erreurdiscipline=document.createElement("p");
    erreurdiscipline.setAttribute("id","erreurdiscipline");
    partieFormulaire4.appendChild(erreurdiscipline);



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
    inputPosteOccupe.setAttribute("name","posteoccupe");
    inputPosteOccupe.setAttribute("id","posteoccupe");
    inputPosteOccupe.setAttribute("type","posteoccupe");
    inputPosteOccupe.setAttribute("placeholder","Poste occupé : ");
    inputPosteOccupe.setAttribute("onblur","verifPosteOccupe(this);"); 
    if(totalInfo[15]!==null){
        inputPosteOccupe.setAttribute("value",totalInfo[15].replace(/-/gi," "));
    }
    partieFormulaire5.appendChild(inputPosteOccupe);
    erreurposteoccupe=document.createElement("p");
    erreurposteoccupe.setAttribute("id","erreurposteoccupe");
    partieFormulaire5.appendChild(erreurposteoccupe);
    labelTypeContrat = document.createElement("label");
    labelTypeContrat.setAttribute("for","typeContrat");
    partieFormulaire5.appendChild(labelTypeContrat);
    remplaceTexte(labelTypeContrat,"Type de contrat de travail");
    selectTypeContrat = document.createElement("select");
    selectTypeContrat.setAttribute("name","typecontrat");
    selectTypeContrat.setAttribute("id","typeContrat");
    selectTypeContrat.setAttribute("onclick","verifTypeContrat(this);");
    partieFormulaire5.appendChild(selectTypeContrat);
    optionTypeContrat0 = document.createElement("option");
    optionTypeContrat0.setAttribute("value"," ");
    selectTypeContrat.appendChild(optionTypeContrat0);
    optionTypeContrat = document.createElement("option");
    optionTypeContrat.setAttribute("value","CDI");
    selectTypeContrat.appendChild(optionTypeContrat);
    remplaceTexte(optionTypeContrat,"CDI");
    optionTypeContrat1 = document.createElement("option");
    optionTypeContrat1.setAttribute("value","CDD");
    selectTypeContrat.appendChild(optionTypeContrat1);
    remplaceTexte(optionTypeContrat1,"CDD");
    erreurtypecontrat=document.createElement("p");
    erreurtypecontrat.setAttribute("id","erreurtypecontrat");
    partieFormulaire5.appendChild(erreurtypecontrat);
    if(totalInfo[16]=="CDI"){
        $('#typeContrat>option[value="'+"CDI"+'"]').attr('selected', true);
    }
    else
    { 
        if(totalInfo[16]=="CDD"){
             $('#typeContrat>option[value="'+"CDD"+'"]').attr('selected', true);
        }
    }

    inputEntreprise=document.createElement("input");
    inputEntreprise.setAttribute("name","entreprise");
    inputEntreprise.setAttribute("id","entreprise");
    inputEntreprise.setAttribute("type","entreprise");
    inputEntreprise.setAttribute("placeholder","Entreprise : ");
    inputEntreprise.setAttribute("onblur","verifEntreprise(this);"); 
    if(totalInfo[17]!==null){
        inputEntreprise.setAttribute("value",totalInfo[17].replace(/-/gi," "));
    }
    partieFormulaire5.appendChild(inputEntreprise);
    erreurentreprise=document.createElement("p");
    erreurentreprise.setAttribute("id","erreurentreprise");
    partieFormulaire5.appendChild(erreurentreprise);
    inputAdresseEntreprise=document.createElement("input");
    inputAdresseEntreprise.setAttribute("name","adresseentreprise");
    inputAdresseEntreprise.setAttribute("id","adresseEnt");
    inputAdresseEntreprise.setAttribute("type","adresseEnt");
    inputAdresseEntreprise.setAttribute("placeholder","Adresse : ");
    inputAdresseEntreprise.setAttribute("onblur","verifAdresseEntreprise(this);"); 
    if(totalInfo[18]!==null){
        inputAdresseEntreprise.setAttribute("value",totalInfo[18].replace(/-/gi," "));
    }
    partieFormulaire5.appendChild(inputAdresseEntreprise);
    erreuradresseentreprise=document.createElement("p");
    erreuradresseentreprise.setAttribute("id","erreuradresseentreprise");
    partieFormulaire5.appendChild(erreuradresseentreprise);
    inputSecteurAct=document.createElement("input");
    inputSecteurAct.setAttribute("name","secteuractivite");
    inputSecteurAct.setAttribute("id","secteurEnt");
    inputSecteurAct.setAttribute("type","secteurEnt");
    inputSecteurAct.setAttribute("placeholder","Secteur d'activité : ");
    inputSecteurAct.setAttribute("onblur","verifSecteurActivite(this);"); 
    if(totalInfo[19]!==null){
        inputSecteurAct.setAttribute("value",totalInfo[19].replace(/-/gi," "));
    }
    partieFormulaire5.appendChild(inputSecteurAct);
    erreursecteuractivite=document.createElement("p");
    erreursecteuractivite.setAttribute("id","erreursecteuractivite");
    partieFormulaire5.appendChild(erreursecteuractivite);

    //créaction du boutton d'envoi du formulaire
    btnForm = document.createElement("input");
    btnForm.setAttribute("name","soumettre")
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
//vérification des champs du formulaire
function surligne(champ, test)
{
   if(test)
   {
      champ.style.backgroundColor = "";// si champ à true alors aucune couleur   
   }
   else
   {
      champ.style.backgroundColor = "#D46A6A";// si erreur on met la couleur du fond à rouge      
   }
}

//Fonction pour la vérification du nom 
function verifNom(champ)
{   
   if(champ.value.length > 2 && champ.value.length < 25)//Si le nombre de caractére est inférieur à 2 ou supérieur à 15 alors
   {
      surligne(champ, true);//On appel la fonction surligne et on lui passe en paramétre erreur à true
      document.getElementById("erreurnom").innerHTML = " ";
      return true;
   }
   else//Si la condition n'est pas respecté alors
   {
      surligne(champ, false);//On appel la fonction surligne et on lui passe en paramétre erreur à false
      document.getElementById("erreurnom").innerHTML = "Vous devez saisir votre nom";
      return false;
   }
}
//Fonction pour la vérification du prenom
function verifPrenom(champ)
{   
   if(champ.value.length > 2 && champ.value.length < 25)//Si le nombre de caractére est inférieur à 2 ou supérieur à 15 alors
   {
      surligne(champ, true);//On appel la fonction surligne et on lui passe en paramétre erreur à true
      document.getElementById("erreurprenom").innerHTML = " ";
      return true;
   }
   else//Si la condition n'est pas respecté alors
   {
      surligne(champ, false);//On appel la fonction surligne et on lui passe en paramétre erreur à false
      document.getElementById("erreurprenom").innerHTML = "Vous devez saisir votre prenom";
      return false;
   }
}
//Fonction pour la vérification de la date de naissance
function verifDtn(champ)
{  
   if(champ.value.length!=10)//Si le nombre de caractére est égal à 10
   {
       surligne(champ, false);//On appel la fonction surligne et on lui passe en paramétre erreur à false
       document.getElementById("erreurdtn").innerHTML = "Vous devez saisir votre date de naissance(AAAA-MM-JJ)";
      return false;
   }
   else//Si la condition n'est pas respecté alors
   {
       var dtn=champ.value.split('-');
       var ladate=new Date();
       
       if((parseInt(dtn[0])<1940 || parseInt(dtn[0])>ladate.getFullYear())){
            surligne(champ, false);//On appel la fonction surligne et on lui passe en paramétre erreur à true
            document.getElementById("erreurdtn").innerHTML = "Votre année de naissance est incorrect ";
            return true;
        }
       else//Si la condition n'est pas respecté alors
       {
           if(( parseInt(dtn[1])<0 || parseInt(dtn[1])>12)){
               surligne(champ, false);//On appel la fonction surligne et on lui passe en paramétre erreur à true
                document.getElementById("erreurdtn").innerHTML = "Votre mois de naissance est incorrect ";
                return true;
           }
           else{
               if(( parseInt(dtn[2])<0 || parseInt(dtn[2])>31)){
                   surligne(champ, false);//On appel la fonction surligne et on lui passe en paramétre erreur à true
                    document.getElementById("erreurdtn").innerHTML = "Votre jour de naissance est incorrect ";
                    return true;
               }
               else{
                    surligne(champ, true);//On appel la fonction surligne et on lui passe en paramétre erreur à false
                    document.getElementById("erreurdtn").innerHTML = " ";
                    return false;
               }
           }
            
       }
   }
}
//Fonction pour la vérification de l'année d'entré dans l'établissement
function verifAnEntre(champ){
    if(champ.value!=" ")//Si le nombre de caractére est inférieur à 2 ou supérieur à 15 alors
   {
      surligne(champ, true);//On appel la fonction surligne et on lui passe en paramétre erreur à true
      document.getElementById("erreuranentre").innerHTML = " ";
      return true;
   }
   else//Si la condition n'est pas respecté alors
   {
      surligne(champ, false);//On appel la fonction surligne et on lui passe en paramétre erreur à false
      document.getElementById("erreuranentre").innerHTML = "Vous devez choisir une date d'entré dans l'établissement";
      return false;
   }
}
//Fonction pour la vérification de l'année de sortie dans l'établissement
function verifAnSortie(champ){
    if(champ.value!=" ")//Si le nombre de caractére est inférieur à 2 ou supérieur à 15 alors
   {
      surligne(champ, true);//On appel la fonction surligne et on lui passe en paramétre erreur à true
      document.getElementById("erreuransortie").innerHTML = " ";
      return true;
   }
   else//Si la condition n'est pas respecté alors
   {
      surligne(champ, false);//On appel la fonction surligne et on lui passe en paramétre erreur à false
      document.getElementById("erreuransortie").innerHTML = "Vous devez choisir une date d'entré dans l'établissement";
      return false;
   }
}
//Fonction pour la vérification du cursus
function verifCursus(champ){
    if(champ.value!=" ")//Si le nombre de caractére est inférieur à 2 ou supérieur à 15 alors
   {
      surligne(champ, true);//On appel la fonction surligne et on lui passe en paramétre erreur à true
      document.getElementById("erreurcursus").innerHTML = " ";
      return true;
   }
   else//Si la condition n'est pas respecté alors
   {
      surligne(champ, false);//On appel la fonction surligne et on lui passe en paramétre erreur à false
      document.getElementById("erreurcursus").innerHTML = "Vous devez choisir un cursus";
      return false;
   }
}

//Fonction pour la vérification de l'adresse
function verifAdresse(champ){
     if(champ.value.length > 2 && champ.value.length < 75)//Si le nombre de caractére est inférieur à 2 ou supérieur à 75 alors
   {
      surligne(champ, true);//On appel la fonction surligne et on lui passe en paramétre erreur à true
      document.getElementById("erreuradresse").innerHTML = " ";
      return true;
   }
   else//Si la condition n'est pas respecté alors
   {
      surligne(champ, false);//On appel la fonction surligne et on lui passe en paramétre erreur à false
      document.getElementById("erreuradresse").innerHTML = "Vous devez saisir votre Adresse";
      return false;
   }
}

//Fonction pour la vérification du code postale
function verifCp(champ){
    var i=0;
    var nbN=champ.value.length;
    var totalOK=0;
    while(i<nbN){
        if(champ.value.charAt(i)>=0 && champ.value.charAt(i)<10)
        {
            totalOK++;
        }
        i++;
    }
    if(nbN==5 && totalOK==5){
        surligne(champ, true);//On appel la fonction surligne et on lui passe en paramétre erreur à true
        document.getElementById("erreurcp").innerHTML = " ";
        return true;
    }
    else
    {
        surligne(champ, false);//On appel la fonction surligne et on lui passe en paramétre erreur à true
        document.getElementById("erreurcp").innerHTML = "Vous devez saisir votre code postal ";
        return false;
    }
}

//Fonction pour la vérification de la ville
function verifVille(champ){
    if(champ.value.length > 2 && champ.value.length < 25)//Si le nombre de caractére est inférieur à 2 ou supérieur à 25 alors
   {
      surligne(champ, true);//On appel la fonction surligne et on lui passe en paramétre erreur à true
      document.getElementById("erreurville").innerHTML = " ";
      return true;
   }
   else//Si la condition n'est pas respecté alors
   {
      surligne(champ, false);//On appel la fonction surligne et on lui passe en paramétre erreur à false
      document.getElementById("erreurville").innerHTML = "Vous devez saisir votre ville";
      return false;
   }
}

//Fonction pour la vérification du numéro de téléphone fix
function verifTelFixe(champ){
    var i=0;
    var nbN=champ.value.length;
    var totalOK=0;
    while(i<nbN){
        if(champ.value.charAt(i)>=0 && champ.value.charAt(i)<10)
        {
            totalOK++;
        }
        i++;
    }
    if(nbN==10 && totalOK==10){
        surligne(champ, true);//On appel la fonction surligne et on lui passe en paramétre erreur à true
        document.getElementById("erreurtelfixe").innerHTML = " ";
        return true;
    }
    else
    {
        surligne(champ, false);//On appel la fonction surligne et on lui passe en paramétre erreur à true
        document.getElementById("erreurtelfixe").innerHTML = "Vous devez saisir votre numéro de téléphone fixe(sans espace entre les chiffres) ";
        return false;
    }
}

//Fonction pour la vérification du numéro de portable
function verifMobile(champ){
    var i=0;
    var nbN=champ.value.length;
    var totalOK=0;
    while(i<nbN){
        if(champ.value.charAt(i)>=0 && champ.value.charAt(i)<10)
        {
            totalOK++;
        }
        i++;
    }
    if(nbN==10 && totalOK==10){
        surligne(champ, true);//On appel la fonction surligne et on lui passe en paramétre erreur à true
        document.getElementById("erreurmobile").innerHTML = " ";
        return true;
    }
    else
    {
        surligne(champ, false);//On appel la fonction surligne et on lui passe en paramétre erreur à true
        document.getElementById("erreurmobile").innerHTML = "Vous devez saisir votre numéro de téléphone mobile(sans espace entre les chiffres) ";
        return false;
    }
}

//Fonction pour la vérification de l'email
function verifEmail(champ)
{
    var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');

	if(reg.test(champ.value))
	{
            surligne(champ, true);//On appel la fonction surligne et on lui passe en paramétre erreur à true
            document.getElementById("erreuremail").innerHTML = " ";
            return true;
	}
	else
	{
             surligne(champ, false);//On appel la fonction surligne et on lui passe en paramétre erreur à false
            document.getElementById("erreuremail").innerHTML = "Vous devez saisir votre email";
            return false;
	}
}
//Fonction pour la vérification de la formation
function verifFormation(champ){
    if(champ.value.length > 2 && champ.value.length < 50)//Si le nombre de caractére est inférieur à 2 ou supérieur à 25 alors
   {
      surligne(champ, true);//On appel la fonction surligne et on lui passe en paramétre erreur à true
      document.getElementById("erreurformation").innerHTML = " ";
      return true;
   }
   else//Si la condition n'est pas respecté alors
   {
      surligne(champ, false);//On appel la fonction surligne et on lui passe en paramétre erreur à false
      document.getElementById("erreurformation").innerHTML = "Vous devez saisir votre formation";
      return false;
   }
}

//Fonction pour la vérification du cursus
function verifAnnee(champ){
    if(champ.value!=" ")//Si le nombre de caractére est inférieur à 2 ou supérieur à 15 alors
   {
      surligne(champ, true);//On appel la fonction surligne et on lui passe en paramétre erreur à true
      document.getElementById("erreurannee").innerHTML = " ";
      return true;
   }
   else//Si la condition n'est pas respecté alors
   {
      surligne(champ, false);//On appel la fonction surligne et on lui passe en paramétre erreur à false
      document.getElementById("erreurannee").innerHTML = "Vous devez choisir une année de formation";
      return false;
   }
}

//Fonction pour la vérification de la discipline
function verifDiscipline(champ){
    if(champ.value.length > 2 && champ.value.length < 50)//Si le nombre de caractére est inférieur à 2 ou supérieur à 25 alors
   {
      surligne(champ, true);//On appel la fonction surligne et on lui passe en paramétre erreur à true
      document.getElementById("erreurdiscipline").innerHTML = " ";
      return true;
   }
   else//Si la condition n'est pas respecté alors
   {
      surligne(champ, false);//On appel la fonction surligne et on lui passe en paramétre erreur à false
      document.getElementById("erreurdiscipline").innerHTML = "Vous devez saisir votre discipline";
      return false;
   }
}

//Fonction pour la vérification du poste occupé
function verifPosteOccupe(champ){
    if(champ.value.length > 2 && champ.value.length < 50)//Si le nombre de caractére est inférieur à 2 ou supérieur à 25 alors
   {
      surligne(champ, true);//On appel la fonction surligne et on lui passe en paramétre erreur à true
      document.getElementById("erreurposteoccupe").innerHTML = " ";
      return true;
   }
   else//Si la condition n'est pas respecté alors
   {
      surligne(champ, false);//On appel la fonction surligne et on lui passe en paramétre erreur à false
      document.getElementById("erreurposteoccupe").innerHTML = "Vous devez saisir votre poste occupé";
      return false;
   }
}
//Fonction pour la vérification du type de contrat
function verifTypeContrat(champ){
    if(champ.value!=" ")//Si le nombre de caractére est inférieur à 2 ou supérieur à 15 alors
   {
      surligne(champ, true);//On appel la fonction surligne et on lui passe en paramétre erreur à true
      document.getElementById("erreurtypecontrat").innerHTML = " ";
      return true;
   }
   else//Si la condition n'est pas respecté alors
   {
      surligne(champ, false);//On appel la fonction surligne et on lui passe en paramétre erreur à false
      document.getElementById("erreurtypecontrat").innerHTML = "Vous devez choisir votre type de contrat";
      return false;
   }
}
//Fonction pour la vérification de l'entreprise
function verifEntreprise(champ){
    if(champ.value.length > 2 && champ.value.length < 50)//Si le nombre de caractére est inférieur à 2 ou supérieur à 25 alors
   {
      surligne(champ, true);//On appel la fonction surligne et on lui passe en paramétre erreur à true
      document.getElementById("erreurentreprise").innerHTML = " ";
      return true;
   }
   else//Si la condition n'est pas respecté alors
   {
      surligne(champ, false);//On appel la fonction surligne et on lui passe en paramétre erreur à false
      document.getElementById("erreurentreprise").innerHTML = "Vous devez saisir le nom de votre entreprise";
      return false;
   }
}
//Fonction pour la vérification de l'adresse de l'entreprise
function verifAdresseEntreprise(champ){
    if(champ.value.length > 2 && champ.value.length < 50)//Si le nombre de caractére est inférieur à 2 ou supérieur à 25 alors
   {
      surligne(champ, true);//On appel la fonction surligne et on lui passe en paramétre erreur à true
      document.getElementById("erreuradresseentreprise").innerHTML = " ";
      return true;
   }
   else//Si la condition n'est pas respecté alors
   {
      surligne(champ, false);//On appel la fonction surligne et on lui passe en paramétre erreur à false
      document.getElementById("erreuradresseentreprise").innerHTML = "Vous devez saisir l'adresse de votre entreprise";
      return false;
   }
}
//Fonction pour la vérification du secteur d'activité de l'entreprise
function verifSecteurActivite(champ){
    if(champ.value.length > 2 && champ.value.length < 50)//Si le nombre de caractére est inférieur à 2 ou supérieur à 25 alors
   {
      surligne(champ, true);//On appel la fonction surligne et on lui passe en paramétre erreur à true
      document.getElementById("erreursecteuractivite").innerHTML = " ";
      return true;
   }
   else//Si la condition n'est pas respecté alors
   {
      surligne(champ, false);//On appel la fonction surligne et on lui passe en paramétre erreur à false
      document.getElementById("erreursecteuractivite").innerHTML = "Vous devez saisir le secteur d'activité de votre entreprise";
      return false;
   }
}


//Fonction permettant la validation ou non du formulaire si tout les tests sont ok
function verifForm(profil)
{
   var nomOk = verifNom(profil.nom);
   var prenomOk = verifPrenom(profil.prenom);
   var dtnOk = verifDtn(profil.dtn);
   var anEntreOk = verifAnEntre(profil.anEntre);
   var anSortieOk = verifAnSortie(profil.anSortie);
   var cursusOK = verifCursus(profil.cursus);
   var adresseOK = verifAdresse(profil.adresse);
   var cpOK = verifCp(profil.cp);
   var villeOK = verifVille(profil.ville);
   var telFixeOK = verifTelFixe(profil.telfixe);
   var mobileOK = verifMobile(profil.mobile);
   var emailOk = verifEmail(profil.email);
   var formationOk = verifFormation(profil.formation);
   var anneeOk = verifAnnee(profil.annee);
   var disciplineOk = verifDiscipline(profil.discipline);
   var posteOccupeOk = verifPosteOccupe(profil.posteoccupe);
   var typeContratOk = verifTypeContrat(profil.typecontrat);
   var entrepriseOk = verifEntreprise(profil.entreprise);
   var adresseEntrepriseOk = verifAdresseEntreprise(profil.adresseentreprise);
   var secteurActiviteOk = verifSecteurActivite(profil.secteuractivite);
   if(nomOk && prenomOk && dtnOk && anEntreOk && anSortieOk && cursusOK && adresseOK && cpOK && villeOK && telFixeOK && mobileOK && emailOk)
   {
        document.getElementById("profil").submit();
   }
   else
   {
        alert("Veuillez remplir au minimun les trois premières parties du formulaire correctement");
        return false;
   }
}
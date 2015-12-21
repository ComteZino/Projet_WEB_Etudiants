<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title></title>
      <link rel="stylesheet" href="../css/styleFormulaire.css">
    </head>
    <body>  
	<div class="form-style-5">
            <form>
		<fieldset>
                    <legend><span class="number">1</span>Qui êtes-vous ?</legend>
                    <input type="nom" placeholder="Nom *">
                    <input type="prenom" placeholder="Prénom*">
                    <input type="dtn" placeholder="Date de naissance(A/M/J)*">
		</fieldset>
		<fieldset>
                    <legend><span class="number">2</span>Votre passage dans l'établissement</legend>
                    <label for="anEntre">En quelle année êtes-vous entré(e)?</label>
                    <select id="anEntre" name="field4">
                        <option value=""></option>
                    </select>   
                    <label for="anSortie">En quelle année êtes-vous sorti(e)?</label>
                    <select id="anSortie">
			<option value=""></option>
                    </select>  	
                    <label for="anSortie">Cursus poursuivi dans l'établissement</label>
                    <select id="anSortie">
                        <option value=""></option>
                    </select>  					
		</fieldset>
		<fieldset>
                    <legend><span class="number">3</span>Comment vous contacter?</legend>
                    <input type="adresse" placeholder="Adresse *">
                    <input type="cp" placeholder="Code postal*">
                    <input type="ville" placeholder="Ville">
                    <input type="telfixe" placeholder="Téléphone fixe">
                    <input type="mobile" placeholder="Mobile">
                    <input type="email" placeholder="email">
                </fieldset>
		<fieldset>
                    <legend><span class="number">4</span>Poursuite d'études</legend>
					
		</fieldset>
		<fieldset>
                    <legend><span class="number">5</span>Votre parcours professionnel</legend>
                    <input type="nom" placeholder="Poste occupé *">
                    <label for="anSortie">Type de contrat de travail</label>
                    <select id="anSortie">
			<option value=""></option>
                    </select>  	
                    <input type="prenom" placeholder="Entreprise*">
                    <input type="dtn" placeholder="Adresse">
                    <input type="dtn" placeholder="Secteur d'activité">
		</fieldset>
		<input type="submit" value="Apply" />
            </form>
	</div>
    </body>
</html>
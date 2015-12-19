<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title></title>
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/styleNavigation.css">
    </head>
    <body>
        <header>
            <!-- Entête de la zone considérée -->
            <a>
                <img src="images/logostpaul.png" alt="logo" title="logo" id="logo" /> 
            </a>
        </header>
        <div id="form-main">
          <div id="form-div">
              <p class="name">
                <input name="name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Nom" id="name" />
              </p>

              <p class="email">
                <input name="email" type="text" class="validate[required,custom[email]] feedback-input" id="email" placeholder="Email" />
              </p>

              <p class="text">
                <textarea name="text" class="validate[required,length[6,300]] feedback-input" id="comment" placeholder="Commentaire"></textarea>
              </p>


              <div class="submit">
                <input type="submit" value="Envoyer" id="button-blue"/>
                <div class="ease"></div>
              </div>
            </form>
          </div>
        </div>
    </body>
</html>

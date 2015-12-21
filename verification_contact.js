/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


 <script src="http://code.jquery.com/jquery-1.11.3.min.js">
 
 $(function()
    {
        $("#contact").submit(function(event){
            var nom        = $("#nom").val();
            var email      = $("#email").val();
            var message    = $("#message").val();
            var dataString = nom + email + message;
            var msg_all    = "Merci de remplir tous les champs";
            var msg_alert  = "Merci de remplir ce champs";

            if (dataString  == "") {
                $("#msg_all").html(msg_all);
            } else if (nom == "") {
                $("#msg_nom").html(msg_alert);
            }  else if (email == "") {
                $("#msg_email").html(msg_alert);
            } else if (message == "") {
                $("#msg_message").html(msg_alert);
            } else {
                $.ajax({
                    type : "POST",
                    url: $(this).attr("action"),
                    data: $(this).serialize(),
                    success : function() {
                        $("#contact").html("<p>Formulaire bien envoyé</p>");
                    },
                    error: function() {
                        $("#contact").html("<p>Erreur d'appel, le formulaire ne peut pas fonctionner</p>");
                    }
                });
            }

            return false;
        });
    });

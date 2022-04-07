<?php
    /*---------------------------------------
                IMPORTS
    ---------------------------------------*/
    include './utils/connectBdd.php';
    include './model/model_user.php';
    include './view/view_create_user.php';
    /*---------------------------------------
                    VARIABLES
    ---------------------------------------*/
    //variable qui va contenir les messages d'erreurs
    $msg = "";
    /*---------------------------------------
                TESTS ET LOGIQUE
    ---------------------------------------*/
    //test si le bouton submit à été cliqué
    if(isset($_POST['submit'])){
        //test champs
        if(isset($_POST['name_user']) AND isset($_POST['first_name_user'])
        AND isset($_POST['login_user']) AND isset($_POST['mdp_user'])AND 
        !empty($_POST['name_user']) AND !empty($_POST['first_name_user']) AND
        !empty($_POST['login_user']) AND !empty($_POST['mdp_user'])){
            //récup super globale post
            $nom = $_POST['name_user'];
            $prenom = $_POST['first_name_user'];
            $login = $_POST['login_user'];
            $mdp = $_POST['mdp_user'];
            //option pour hash
            $options = [
                'cost' => 8,
            ];
            //hash
            $mdp = password_hash($mdp, PASSWORD_BCRYPT, $options);
            //ajout en bdd
            adduser($bdd, $nom, $prenom, $login,$mdp);
            //message
            $msg = "$login a été ajouté en BDD";
        }
        //sinon vide
        else{
            $msg = 'Veuillez remplir tous les champs du formulaire';
        }
    }
    //sinon (bouton submit non cliqué)
    else{
        $msg = 'Saisir vos informations de création d\'utilisateur';
    }
    /*---------------------------------------
                GESTION DES ERREURS
    ---------------------------------------*/
    //affichage des messages d'erreur en JS
    echo '<script>
        setMessage("'.$msg.'");  
    </script>'
?>
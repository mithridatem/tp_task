<?php
    /*---------------------------------------
                IMPORTS
    ---------------------------------------*/
    include './utils/connectBdd.php';
    include './model/model_user.php';
    include './view/view_menu.php';
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
            //récupération d'un utilisateur dans $user
            $user = getUserByMail($bdd, $login);
            //test si l'utilisateur existe
            if($user!= null){
                $msg = 'Le compte existe déja';
                //refresh de la page
                echo '<script>
                    refresh(1500, "./add_user.php");
                </script>';
            }
            //sinon on l'ajoute en BDD 
            else{
                //option pour hash
                $options = [
                'cost' => 8,
                ];
                //hash
                $mdp = password_hash($mdp, PASSWORD_BCRYPT, $options);
                //ajout en bdd
                adduser($bdd, $nom, $prenom, $login,$mdp);
                //message
                $msg = "$nom $prenom a été ajouté en BDD";
                //refresh de la page
                echo '<script>
                    refresh(1500, "./add_user.php");
                </script>';
            }
        }
        //sinon vide
        else{
            //message
            $msg = 'Veuillez remplir tous les champs du formulaire';
            //refresh de la page
            echo '<script>
                refresh(1500, "./add_user.php");
            </script>';
        }
    }
    //sinon (bouton submit non cliqué)
    else{
        //message
        $msg = 'Saisir les informations de création d\'utilisateur';
    }
    /*---------------------------------------
                GESTION DES ERREURS
    ---------------------------------------*/
    //affichage des messages d'erreur en JS
    echo '<script>
        //affiche le message d\'erreur 
        setMessage("'.$msg.'");
        //affiche la page sélectionnée dans le menu
        urlStyle();  
    </script>'
?>
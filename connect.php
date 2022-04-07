<?php
    /*---------------------------------------
                    SESSION
    ---------------------------------------*/
    //démarrage de la session
    session_start();
    /*---------------------------------------
                    IMPORTS
    ---------------------------------------*/
    include './utils/connectBdd.php';
    include './model/model_user.php';
    include './view/view_menu.php';
    include './view/view_connexion.php';
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
        //test si les champs sont complétés
        if(isset($_POST['login_user']) AND isset($_POST['mdp_user']) AND
        !empty($_POST['login_user']) AND !empty($_POST['mdp_user'])){
            //récup super globale post
            $login = $_POST['login_user'];
            $mdp = $_POST['mdp_user'];
            //récup de l'utilisateur
            $user = getUserByMail($bdd, $login);
            //test si l'utilisateur existe
            if($user!= null){
                //test du mot de passe
                if(password_verify($mdp,$user[0]['mdp_user'])){
                    //message d'erreur
                    $msg = 'connecté';
                    //génération des super globales
                    $_SESSION['id'] = $user[0]['id_user'];
                    $_SESSION['name'] = $user[0]['name_user'];
                    $_SESSION['firstName'] = $user[0]['first_name_user'];
                    $_SESSION['login'] = $user[0]['login_user'];
                    $_SESSION['connected'] = true;
                    echo '<script>
                        refresh(1500, "./connect.php");
                    </script>';
                }
                //si mauvais mdp
                else{
                    //message d'erreur
                    $msg = 'Mauvais mdp';
                    echo '<script>
                        refresh(1500, "./connect.php");
                    </script>';
                }
            }
            //test si l'utilisateur n'existe pas
            else{
                //message d'erreur
                $msg = 'l\'utilisateur n\'existe pas';
                echo '<script>
                    refresh(1500, "./connect.php");
                </script>';
            }
        }
        //test champs de formulaire vides ou incomplets
        else{
            //message d'erreur
            $msg = 'Veuillez remplir le  formulaire';
            echo '<script>
                refresh(1500, "./connect.php");
            </script>';
        }
    }
    //sinon (bouton submit non cliqué)
    else{
        $msg = 'Saisir vos informations de connexion';
    }
    if(isset($_GET['deconnected'])){
        $msg = 'Déconnecté';
        echo '<script>
            refresh(1500, "./connect.php");
        </script>';
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
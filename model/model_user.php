<?php
    //fonction qui ajoute un utilisateur en BDD(utilisateur)
    function adduser($bdd, $nom, $prenom, $login,$mdp):void{
        try{
            $req = $bdd->prepare('INSERT INTO utilisateur(name_user, first_name_user,
            login_user, mdp_user) 
            VALUES(:nom_util, :prenom_util, :login_util, :mdp_util)');
            $req->execute(array(
                'nom_util' => $nom,
                'prenom_util' =>$prenom,
                'login_util' =>$login,
                'mdp_util' =>$mdp
                ));
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
    //function qui retourne un utilisateur à partir de son login
    function getUserByMail($bdd, $login){
        try{
            $req = $bdd->prepare('SELECT mdp_user FROM utilisateur 
            WHERE login_user=:login_user');
            $req->execute(array(
                'login_user' =>$login,
                ));
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
?>
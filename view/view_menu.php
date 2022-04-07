<?php
    //test si connecté
    if(isset($_SESSION['connected'])){
?>
    <!--Menu connecté-->
    <nav>
        <ul>
            <li><a href="./deco.php" id="deco">Déconnexion</a></li>
        </ul>
    </nav>
    
<?php
    }
    //test si déconnecté
    else{
?>
    <!--Menu déconnecté-->
    <nav>
        <ul>
            <li><a href="./connect.php" id="connected">Connexion</a></li>
            <li><a href="./add_user.php" id="add">Ajouter un compte</a></li>
        </ul>
    </nav>
<?php
    }
?>

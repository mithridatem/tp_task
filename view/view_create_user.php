<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/style/style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <script src="./asset/script/script2.js"></script>
    <title>Create User</title>
</head>
<body>
    <h3>Création d'un compte utilisateur:</h3>
    <div id="createUser">
        <form action="" method="post">
            <p><input type="text" name="name_user" placeholder="saisir son nom"></p>
            <p><input type="text" name="first_name_user" placeholder="saisir son prenom"></p>
            <p><input type="email" name="login_user" 
            pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" 
            name="email" required placeholder="saisir son mail"></p>
            <p><input type="password" name="mdp_user"placeholder="saisir son password"></p>
            <p><input type="submit" value="Ajouter" name="submit"></p>
        </form>
    </div>
    <p id="error"></p>
    <script src="./asset/script/script.js"></script>
</body>
</html>
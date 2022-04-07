<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/style/style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <script src="./asset/script/script2.js"></script>
    <title>connexion</title>
</head>
<body>
<h3>Se connecter:</h3>
    <div id="connexion">
        <form action="" method="post">
            <p><input type="email" name="login_user" 
            pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" 
            name="email" required placeholder="saisir son email"></p>
            <p><input type="password" name="mdp_user" placeholder="saisir son password"></p>
            <p><input type="submit" value="Connexion" name="submit"></p>
        </form>
    </div>
    <p id="error"></p>
    <script src="./asset/script/script.js"></script>
</body>
</html>
//récupération de la zone ou afficher les messages d'erreurs
const zoneError = document.querySelector('#error');
//fonction qui affiche les messages d'erreurs
function setMessage(msg){
    zoneError.innerHTML = "<span>"+msg+"</span>";
}
//fonction qui indique la page sélectionnée (mise en forme du lien dans le menu)
function urlStyle(){
    //récupération de l'url
    let url = document.location.href;
    //découpage de l'url -> nom fichier PHP
    url = url.substring(30);
    //test affiche le nom du fichier dans la console
    console.log(url);
    //test (url)
    switch (url) {
        case 'add_user.php':
        if(document.querySelector('#add')!=null){
            document.querySelector('#add').style.fontSize = '1.5em';
            document.querySelector('#add').style.fontWeight = 'bold';
            document.querySelector('#add').style.color = 'white';
        }
        break;
        case 'connect.php':
        if(document.querySelector('#connected')!=null){
            document.querySelector('#connected').style.fontSize = '1.5em';
            document.querySelector('#connected').style.fontWeight = 'bold';
            document.querySelector('#connected').style.color = 'white';
        }
        if(document.querySelector('#deco')!=null){
            document.querySelector('#deco').style.fontSize = '1.5em';
            document.querySelector('#deco').style.fontWeight = 'bold';
            document.querySelector('#deco').style.color = 'white';
        }
        break;
      }
}
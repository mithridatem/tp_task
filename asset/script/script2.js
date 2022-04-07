//fonction qui refresh la page(params : durée et url)
function refresh(time, url){
    //refresh de la page
    setTimeout(()=>{
        document.location.href= url; 
    }, time); 
}

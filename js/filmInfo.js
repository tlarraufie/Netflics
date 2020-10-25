window.onload=() => {
    
    idFilm = document.querySelector("img").getAttribute("id"); 
    console.log(idFilm);  

    getFilmInfo(idFilm); 
}

function search(){
    var text = document.getElementById("search-bar").value;
    document.getElementById("search-output").innerHTML=text;
}

/**
 * La fonction permet de récupérer un film et l'ensemble de ces informations dans la collections des films
 */
function getFilmInfo(){
    var apiUrl = 'http://netflics.com/api/films/'+idFilm;
    console.log(apiUrl);
    fetch(apiUrl).then(response => {
        return response.json();
    }).then(data => {
        FillData(data);
        //return data;
    }).catch(err => {
    // Do something for an error here
    });
}


/**
 * Fonction qui permet de remplir les element HTML de la vue avec les elements reçu dynamiquement depuis la BDD
 * 
 * @param {*} data  récupère les données reçu par la requete
 */
function FillData(data){
    console.log(data[0]["titre"]);
    console.log(data[0]["affiche"]);
    image = document.querySelector("img");
    image.setAttribute("src",data[0]["affiche"]);
    image.setAttribute("alt",data[0]["titre"]);

    titre = document.getElementById("titre");
    titre.innerHTML= data[0]["titre"];
    
    //remplissage de l'élément auteur
    auteur = document.getElementById("auteur");
    auteur.innerHTML= "<strong>auteur: </strong>&nbsp;"+data[0]["auteur"];

    //remplissage de l'élément distributeur
    distributeur = document.getElementById("distributeur");
    distributeur.innerHTML= "<strong>distributeur: </strong>&nbsp;"+data[0]["distributeur"];

    //remplissage de l'élément duree
    duree = document.getElementById("duree");
    duree.innerHTML= "<strong>durée: </strong>&nbsp;"+data[0]["duree"];

    //remplissage de l'élément date
    date = document.getElementById("date");
    date.innerHTML= "<strong>date:</strong>&nbsp;"+data[0]["date"];
}


var tFav= []; //Déclaration du tableau qui va contenir les films favoris de l'utilisateur connecté

window.onload=() => {

    reloadFavoris(); // permet de rafraichir la liste des films favoris de l'utilisateur 
    getAllFilms(); // lance l'appel à l'api pour récupérer l'ensemble des films de la base
        
}

/**
 * Fonction de recherche, affiche les films qui match avec la valeur entré dans la recherche
 */
function search(){
  
    var input = document.getElementById("search-bar");  //Récupération de l'input 
    var filter = input.value.toUpperCase(); //filtre de recherche
    console.log(filter);

    var filmsContainer, films, tileFooter, tileTitle, i, txtValue; //déclaration des variables

    //on récupère les instances de la collection de films
    filmsContainer = document.getElementById("tile-container");
    films = filmsContainer.getElementsByClassName("tile");
    // console.log(films);

    //Boucle à travers tout les films, et cache ceux qui ne match pas avec la recherche
    for (i = 0; i < films.length; i++) {
        tileFooter = films[i].getElementsByTagName('div')[1]; // on récupère le footer de la brique film  
        tileTitle = tileFooter.getElementsByClassName("title")[0]; //on récupère l'élément qui contient le titre du film
    
        if (tileTitle) {
            txtValue = tileTitle.textContent || tileTitle.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                films[i].style.display = "";
            } else {
                films[i].style.display = "none";
            }
        }
    }
}

//Appel l'api pour récupérer la liste des favoris et les stock dans un tableau
function reloadFavoris(){
    
    tFav.length = 0; // On vide le tableau avant de le remplir avec les nouvelles données

    var apiUrl = 'http://netflics.com/api/films?favoris=true';
    fetch(apiUrl).then(response => {
        return response.json();
    }).then(data => {

    // Remplissage du tableau de favoris      
        for (var object in data) {
            tFav.push(data[object]["idFilm"]);    
        }
        // console.log("RELOAD TAB FAVORIS :"+tFav);

        // return data;
    }).catch(err => {
    // Do something for an error here
    });

}

/**
 * La fonction getFavoris() permet de récupérer les films favoris de l'utilisateur avec un appel à l'api et le variable favoris à true
 */
function getFavoris(){

    var apiUrl = 'http://netflics.com/api/films?favoris=true';
    fetch(apiUrl).then(response => {
        return response.json();
    }).then(data => {
        FillData(data);
        return data;
    }).catch(err => {
    // Do something for an error here
    });
}

/**
 * La fonction getAllFilms() permet de récupérer l'ensemble des films de la collection avec un appel à l'api
 */
function getAllFilms(){

    var apiUrl = 'http://netflics.com/api/films';
    fetch(apiUrl).then(response => {
        return response.json();
    }).then(data => {
        FillData(data);
        // return data;
        
    }).catch(err => {
        // Do something for an error here
    });
    
}


/**
 * Fonction qui permet de remplir la vue du client avec tout les films récupérés
 * On parcour l'ensemble des films : 
 * On clone le template de base de l'affichage d'un film
 * et on insère les données dans les bonnes balises et Tags
 * 
 * @param {*} data récupère les données récupérées par la requête API
 */
function FillData(data){

    if (document.createElement("template").content) {

        //Vide complétement le container et supprime les éléments enfants
        var box = document.querySelector("#tile-container");
        while (box.firstChild) { 
            box.removeChild(box.firstChild); 
        } 

        //Remplissage du container avec les nouveaux enfants
        for (var object in data) {  

            //on récupère le template et on le clone
            var template = document.querySelector("#tile-template");
            var clone = document.importNode(template.content, true);

            //Remplissage de l'image
            var image = clone.querySelector("img");
            image.setAttribute("alt", data[object]["titre"]);
            image.setAttribute("src", data[object]["affiche"]);

            //Remplissage de du lien
            var link = clone.querySelector("a");
            link.setAttribute("href", "filmInfo.php?x="+data[object]["idFilm"]);
            
        
            //Remplissage du titre
            var title = clone.querySelector("p");
            title.innerHTML= data[object]["titre"];

            //Remplissage du bouton
            // var button = clone.querySelector("button");
            // button.setAttribute("onclick", "toggleFavoris("+data[object]["idFilm"]+")");
            

            //Remplissage de l'icon si un utilisateur est connecté
            //Sinon supprime les coeurs
            if(session){
                var icon = clone.querySelector("i");
                icon.setAttribute("onclick", "toggleFavoris("+data[object]["idFilm"]+")");
                icon.setAttribute("id", data[object]["idFilm"]);
            }else{
                var elem = clone.querySelector(".tile-footer");
                var child = clone.querySelector("i");
                elem.removeChild(child);
                
            }
         

            for(var i= 0; i < tFav.length; i++)
            {
                if(tFav[i] === data[object]["idFilm"]){
                    icon.setAttribute("class", "press"); 
                }
            }
            
            //On ajoute notre item dans l'élément
            box.appendChild(clone);
            
        }
        
        
    } else {
        console.log("TEMPLATE : Not support Template tag");
    }
}

/**
 * Fonction qui permet d'ajouter un film dans la liste de favoris de l'utilisateur
 * 
 * @param {*} idFilm id du film que l'on souhaite ajouter
 */
function addFavoris(idFilm){
    
    console.log("addFavoris(): IdFilm = " + idFilm);

    const apiUrl = 'http://netflics.com/api/films?add='+idFilm;
    
    fetch(apiUrl)
    .then(response => {
        return response.json();   
    })
    .then(data => {
                    
        return resultat;
    }).catch(err => {
        // Do something for an error here
    }); 

    

}

/**
 * Fonction qui permet de retirer un film dans la liste de favoris de l'utilisateur
 * 
 * @param {*} idFilm id du film que l'on souhaite retirer
 */
function removeFavoris(idFilm){

    console.log("removeFavoris(): IdFilm = " + idFilm);

    const apiUrl = 'http://netflics.com/api/films?remove='+idFilm;
    
    fetch(apiUrl)
    .then(response => {
        return response.json();   
    })
    .then(data => {
                    
        return resultat;
    }).catch(err => {
        // Do something for an error here
    }); 

    
}


/**
 * Fonction qui est appelée lors du clic sur un bouton coeur, et permet d'ajouter un film dans la liste 
 * ou de le retirer
 * 
 * @param {*} idFilm id du film que l'on souhaite traiter
 */
function toggleFavoris(idFilm){
    
    //ajoute ou retire la classe press qui permet le changement de couleur du coeur
    var icon = document.getElementById(idFilm);
    icon.classList.toggle("press"); // changement d'etat

    //Selon l'etat du bouton, on appelle ADD ou REMOVE
    if(icon.classList[0]=="press"){
        // console.log("call ADD"); 
        addFavoris(idFilm);   
    }else{
        // console.log("call REMOVE");
        removeFavoris(idFilm);
    }

    reloadFavoris();
        
}


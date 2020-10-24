var tFav= [];

window.onload=() => {

    reloadFavoris(); // permet de rafraichir la liste des films favoris de l'utilisateur 
    getAllFilms(); // lance l'appel à l'api pour récupérer l'ensemble des films de la base
        
}

function search(){
  
    var input = document.getElementById("search-bar");  //Récupération de l'input 
    var filter = input.value.toUpperCase(); //filtre de recherche
    console.log(filter);

    var filmsContainer, films, tileFooter, tileTitle, i, txtValue;

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
        console.log("RELOAD TAB FAVORIS :"+tFav);

        // return data;
    }).catch(err => {
    // Do something for an error here
    });

}

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
            
            //Remplissage de l'icon 
            var icon = clone.querySelector("i");
            icon.setAttribute("onclick", "toggleFavoris("+data[object]["idFilm"]+")");
            icon.setAttribute("id", data[object]["idFilm"]);

            
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



function toggleFavoris(idFilm){
    
    var icon = document.getElementById(idFilm);
    icon.classList.toggle("press"); // changement d'etat

    //Selon l'etat du bouton, on appelle ADD ou REMOVE
    if(icon.classList[0]=="press"){
        console.log("call ADD"); 
        addFavoris(idFilm);   
    }else{
        console.log("call REMOVE");
        removeFavoris(idFilm);
    }

    reloadFavoris();
        
}

// function getFavoris(){
//     var apiUrl = 'http://netflics.com/api/films?favoris=true';
// }
// function getAllFilms(){
//     var apiUrl = 'http://netflics.com/api/films';
//     fetch(apiUrl).then(response => {
//         return response.json();
//     }).then(data => {

//         // Work with JSON data here 
//         document.getElementById("tile-container").innerHTML=""; 
//         for (var object in data) {   
            
//             document.getElementById("tile-container")
//                 .innerHTML+=
//                 `
//                 <div class="tile">
//                     <div class="tile-content">
//                         <img src="${data[object]["affiche"]}" alt="affiche ${data[object]["titre"]}">
//                     </div>
//                     <div class="tile-footer">
//                         <p>${data[object]["titre"]}</p>
//                         <button class="btnFavoris" onclick="toggleFavoris(${data[object]["idFilm"]})" "><i id="${data[object]["idFilm"]}" class="fa fa-heart-o"></i></button>
//                         <p id="testp"></p>
//                     </div>
//                 </div>
//                 `;    
                
//         }
//         return resultat;
//         }).catch(err => {
//         // Do something for an error here
//     });
// }

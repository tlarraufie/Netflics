window.onload=() => {
    idFilm = document.querySelector("img").getAttribute("id"); 
    console.log(idFilm);  

    getFilmInfo(idFilm); 
}

function search(){
    var text = document.getElementById("search-bar").value;
    document.getElementById("search-output").innerHTML=text;
}

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


function FillData(data){
    console.log(data[0]["titre"]);
    console.log(data[0]["affiche"]);
    image = document.querySelector("img");
    image.setAttribute("src",data[0]["affiche"]);
    image.setAttribute("alt",data[0]["titre"]);

    titre = document.getElementById("titre");
    titre.innerHTML= data[0]["titre"];
    
    auteur = document.getElementById("auteur");
    auteur.innerHTML= "<strong>auteur: </strong>&nbsp;"+data[0]["auteur"];

    distributeur = document.getElementById("distributeur");
    distributeur.innerHTML= "<strong>distributeur: </strong>&nbsp;"+data[0]["distributeur"];

    duree = document.getElementById("duree");
    duree.innerHTML= "<strong>durée: </strong>&nbsp;"+data[0]["duree"];

    date = document.getElementById("date");
    date.innerHTML= "<strong>date:</strong>&nbsp;"+data[0]["date"];
}
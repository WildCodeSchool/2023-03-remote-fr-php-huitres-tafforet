let ville = "Nantes";

// Afficher à l'entrée de la page une température d'une ville par défaut, ici Paris
// Pour ca on appelle la fonction recevoirTemperature();

recevoirTemperature(ville);

function recevoirTemperature(ville) {


let appid = '6708ac03b28deb3b9d23aa0cdcd2b626';

const url = 'https://api.openweathermap.org/data/2.5/weather?q=' + ville +'&appid='+ appid + '&lang=fr&units=metric';

let requete = new XMLHttpRequest();

requete.open('GET', url);
requete.responseType = 'json';
requete.send();

requete.onload = function() {
    console.log(requete);
        if (requete.readyState == XMLHttpRequest.DONE) {    
            if (requete.status === 200) {
                let temp = requete.response.main.temp;
                let ville =  requete.response.name;
                let icone = requete.response.weather[0].icon;
                let min = requete.response.main.temp_min;
                let max = requete.response.main.temp_max;
                
                let newDiv = document.createElement('div');
                newDiv.innerHTML = '<p>Min : <span class="text-primary font-weight-bold">'+ min + '°C</span>' + '</p> <p>Max : <span class="text-danger font-weight-bold"> ' + max + '°C</span></p>';
                
                let img = document.createElement('img');
                img.src = 'https://openweathermap.org/img/wn/'+icone+'@2x.png';

                let selectVille = document.querySelector('#ville-meteo')
                selectVille.innerHTML = '<h2>' + ville + '</h2>';

                selectVille.append(img);
                selectVille.append(newDiv);

                let selectTemp = document.querySelector('#temperature_label')
                selectTemp.textContent = temp;
            }    
            else {
                alert('Un problème est intervenu, merci de ressaisir une nouvelle ville ou revenir plus tard.');
            }    
        }    
        
    }    
}    

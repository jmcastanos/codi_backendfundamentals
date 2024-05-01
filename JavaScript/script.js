
//no te ejecutes hasta que el documento esté completamente cargado
//document.addEventListener('DOMContentLoaded', function() {

let form = document.querySelector('form#getweather');

form.addEventListener('submit', function(e) {
    e.preventDefault();
    let location = document.getElementById('city').value;
    
    console.log(location);
    getWeather(location);
    

});
navigator.geolocation.getCurrentPosition((position) => {
    getWeather("", position.coords.latitude, position.coords.longitude);
});

function getGeoIp(){
    fetch('https://ipapi.co/json/')
    .then(response => response.json())
    .then(data => {
        console.log(data);
        let city = data.city;
        //let country = data.country_name;
        let lat = data.latitude;
        let lon = data.longitude;
        getWeather(city, lat, lon);
    });

}

function getWeather(location, lat, lon){
    let apiKey = '{API_KEY}';
    let apiUrl = 'https://api.openweathermap.org/data/2.5/weather?lang=es&q=' + location + '&appid=' + apiKey;
    if(typeof lat !== 'undefined' && typeof lon !== 'undefined'){
        apiUrl = 'https://api.openweathermap.org/data/2.5/weather?lang=es&lat=' + lat + '&lon=' + lon + '&appid=' + apiKey;
    }

    fetch(apiUrl)
    .then(response => response.json())
    .then(data => {
        console.log(data);

        let city = data.name;
        let country = data.sys.country;
        let temperature = data.main.temp;
        let description = data.weather[0].description;
        let icon = data.weather[0].icon;

        document.getElementById('cityname').textContent = city + ', ' + country;
        document.getElementById('temperature').textContent = Math.round(temperature - 273.15) + '°C';
        document.getElementById('description').textContent = description;
        document.getElementById('icon').src = 'http://openweathermap.org/img/w/' + icon + '.png';
        
    });
}
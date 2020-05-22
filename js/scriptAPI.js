document.addEventListener('DOMContentLoaded', () => {
//API call
document.getElementById('city-select').addEventListener('change', e =>  {

    let city_choice = e.target.value;
    let weatherCall = new Ajax ('http://api.openweathermap.org/data/2.5/forecast?q=' + city_choice + '&appid=9eedc7a19623f06e74d60ff417bebccc&lang=fr&units=metric');
    weatherCall.ajaxGet(renderWeatherInfoForUser);

});

function renderWeatherInfoForUser (reponseAPI){

    console.log(reponseAPI);
    document.getElementById('city_name').innerHTML = reponseAPI.city.name;
    document.getElementById('weather_icon').src = "http://openweathermap.org/img/wn/" + reponseAPI.list[0].weather[0].icon + ".png";
    document.getElementById('weather_description').innerHTML = reponseAPI.list[0].weather[0].description;
    
}

});
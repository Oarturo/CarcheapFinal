let key='a0f33287558ae3642b668b514aa4e021'
let city_name='Estado de mexico';

/**  window.onload = function(){
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById("output").innerHTML = "Page loaded!";
      });
}*/

    function climaN(){

        let url= `https://api.openweathermap.org/data/2.5/weather?q=${city_name}&appid=${key}&units=metric`
        fetch(url).then((resp) => resp.json()).then(data=>{
            console.log("La temperatura es "+(data.main.temp)+'°');
            console.log(data.weather[0].description);
            output.innerHTML= `<h1>La temperatura es: ${data.main.temp}</h1>`

        });

    }

console.log(climaN());






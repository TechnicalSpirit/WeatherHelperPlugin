let elements = document.getElementsByClassName("weather-helper-block");
let domain = window.location.hostname;
let protocol = location.protocol;

fetch('https://ipapi.co/json/')
    .then(response => response.json())
    .then( data => {

        fetch( `${protocol}//${domain}/wp-json/weather-helper/v1/temperature?city=${data.city}` )
            .then( response => response.json())
            .then( data => {

                console.log(data)

                if(is_data_with_problem(data))
                    return change_elements_content(data.error_message)

                if(!is_temperature_exist(data))
                    return change_elements_content(`${data.location}: unfortunately there is no information`+
                                                          ` about the temperature in this city`)

                change_elements_content(`${data.location}: ${data.temperature}`)
            } )
            .catch( error => {
                change_elements_content("There is a problem with the weather-helper plugin. " +
                                                "Please contact with site administrator.")
                console.error( error );
            } )
        }
    ).catch( error => {
        change_elements_content("No connection to ipapi.co server")
        console.error( error );
    } );

let is_data_with_problem = (data) => {
    return data.hasOwnProperty("error_message");
}

let is_temperature_exist = (data) => {
    return data.hasOwnProperty("temperature") &&
           data.temperature.length !== 0;
}
let change_elements_content  = ( content )  => {
    Array.from(elements).forEach(element => {
        element.innerText = content;
    });
}
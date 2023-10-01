import { setAlert } from "./plugins/alerts.plugin.js";
import { httpClient } from "./plugins/http-client.plugin.js";



const url = '../php/controllers/login.controller.php';

const formLogin = $('#login_form');

export const mainLogin = () => {
    formLogin.on('submit',  async function (event) {
        event.preventDefault();
        let formData = $(this).serialize();

        validateLogin(formData);
        
    })
}

const validateLogin = async (formData) => {

    try{

        const response = JSON.parse( await httpClient.post(url, formData) );
        
        if(response === 0) return setAlert.errorAlert('Usuario o Password incorrectos');

        const typeToken = response[0].typetoken;

        if(typeToken.trim() === 'anemia'){
            return setAlert.successAlert(
                'La operación se ha completado correctamente.',
                null,
                null,
                '../anemia/index.php'
            )
        }

        if(typeToken.trim() === 'hepatitisc'){
            return setAlert.successAlert(
                'La operación se ha completado correctamente.',
                null,
                1500,
                '../anemia/index.php'
            )
        }
    }catch(error){

            // Aquí puedes manejar el error en la petición AJAX
        console.error('An error ocurred in the system, please contact with your administrator:', error);

        return setAlert.errorAlert('Se produjo un error al procesar la solicitud.');
    
    }
}

    

import "./bootstrap";
import "~resources/scss/app.scss";
import.meta.glob(["../img/**"]);
import * as bootstrap from "bootstrap";
import "./chart.js";

const confirmPasswordElem = document.getElementById("password-confirm");
// console.log(confirmPasswordElem);
if(confirmPasswordElem) {
  
  confirmPasswordElem.addEventListener("change", () => {
      const passwordInput = document.getElementById("password");
      // console.log(passwordInput);
      const formResgister = document.getElementById("register-form");
  
      if (passwordInput.value.length !== confirmPasswordElem.value.length) {
          console.log("diversi");
          formResgister.addEventListener('click', (e) => {
            e.preventDefault();
            // console.log('clik');
            document.getElementById('invalida-lenght').innerHTML = `<div class="alert alert-danger mt-3">Attenzione, le lunghezze delle password non corrispondono</div>`;
          })
      }
  
      if(passwordInput.value.length === confirmPasswordElem.value.length) {
        formResgister.addEventListener('click', () => {
          document.getElementById('invalida-lenght').innerHTML = '';
          formResgister.submit()
        })
      }
  });
}



const orderSelectStatusElem = document.querySelectorAll('.orderSelectStatus');

if(orderSelectStatusElem){
  orderSelectStatusElem.forEach(curElem => {
    curElem.addEventListener('change', () => {
      curElem.parentElement.submit();
    })
  });

}


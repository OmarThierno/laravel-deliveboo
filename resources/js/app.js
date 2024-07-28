import "./bootstrap";
import "~resources/scss/app.scss";
import.meta.glob(["../img/**"]);
import * as bootstrap from "bootstrap";
// import "./chart.js"; --> se lo inserisco non mi fa vedere la preview :( allora sono stati importati dinamicamente, in fondo!

//PREVIEW IMG__________________________________________________ 
//(si può usare anche File reader)
const imageInput = document.getElementById("image");
const imagePreviewElem = document.getElementById("preview_image");

if (imageInput && imagePreviewElem) {
    //quando il valore dell'inpunt cambia
    imageInput.addEventListener("change", function () {
        //prelevo il valore dell'input
        const files = imageInput.files;
        //se nell'input c'è il file e
        if (files && files.length > 0) {
            console.log("file esiste");
            //allora preleviamo l'url del file
            const imageUrl = URL.createObjectURL(files[0]);
            console.log(imageUrl);
            //inserire url del file nell'elemento img
            imagePreviewElem.src = imageUrl;
            // mostrare l'immagine
            imagePreviewElem.classList.remove("d-none")
            //Dopo che la preview è stata visualizzata rilasciamo la memoria aalocata al processo di lettura dell'immagine
            imagePreviewElem.onload = () => URL.revokeObjectURL(imagePreviewElem.src);
            //altrimenti
        } else {
            //tolgo url dell'elemto img
            imagePreviewElem.src = "";
            //nascondo l'img
            imagePreviewElem.classList.add("d-none");
          }
    });
}
//PREVIEW IMG FINE__________________________________________________________________

const confirmPasswordElem = document.getElementById("password-confirm");
// console.log(confirmPasswordElem);
if (confirmPasswordElem) {
    confirmPasswordElem.addEventListener("change", () => {
        const passwordInput = document.getElementById("password");
        // console.log(passwordInput);
        const formResgister = document.getElementById("register-form");

        if (passwordInput.value.length !== confirmPasswordElem.value.length) {
            console.log("diversi");
            formResgister.addEventListener("click", (e) => {
                e.preventDefault();
                // console.log('clik');
                document.getElementById(
                    "invalida-lenght"
                ).innerHTML = `<div class="alert alert-danger mt-3">Attenzione, le lunghezze delle password non corrispondono</div>`;
            });
        }

        if (passwordInput.value.length === confirmPasswordElem.value.length) {
            formResgister.addEventListener("click", () => {
                document.getElementById("invalida-lenght").innerHTML = "";
                formResgister.submit();
            });
        }
    });
}
// STATUS ORDERS 
const orderSelectStatusElem = document.querySelectorAll(".orderSelectStatus");

if (orderSelectStatusElem.length > 0) {
    orderSelectStatusElem.forEach((curElem) => {
        curElem.addEventListener("change", () => {
            curElem.parentElement.submit();
        });
    });
}

// FILTER STATUS 
const filterSelectStatusElem = document.querySelector("#filter select");
filterSelectStatusElem.addEventListener('change', () => {
    filterSelectStatusElem.parentElement.submit();
})


// CHART.JS (caricamento dinamico)___________________________
import('./chart.js')
.then((module) => {
    // Inizializza i grafici qui, se necessario
    module.default(); // Esegui la funzione di default esportata da chart.js
})
.catch((err) => {
    console.error("Errore nel caricamento di chart.js", err);
});
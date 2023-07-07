const toggleBtn = document.querySelector('.toggle_btn')
const toggleBtnIcon = document.querySelector('.toggle_btn i')
const dropDownMenu = document.querySelector('.dropdown_menu')

toggleBtn.onclick = function () {
    dropDownMenu.classList.toggle('open')
    const isOpen = dropDownMenu.classList.contains('open')

    toggleBtnIcon.classList = isOpen
        ? 'fa-solid fa-xmark'
        : 'fa-solid fa-bars'
}

// Affichage et fermeture : fenêtre connexion

const connexionBtn = document.querySelectorAll(".btn_connexion");
const connexionForm = document.querySelector("#form_connexion");
const connexionClose = document.querySelector("#close_connexion");
const ombrage = document.querySelector(".ombrage");

connexionBtn.forEach(function (btn) {
    btn.onclick = function () {
        inscriptionForm.style.display = "none"; // Mettre à jour ici
        connexionForm.style.display = "flex";
        ombrage.style.display = "block";
    };
});

connexionClose.onclick = function () {
    connexionForm.style.display = "none";
    ombrage.style.display = "none";
};

// Affichage et fermeture : fenêtre inscription

const inscriptionBtn = document.querySelectorAll(".btn_inscription");
const inscriptionForm = document.querySelector("#form_inscription");
const inscriptionClose = document.querySelector("#close_inscription");

inscriptionBtn.forEach(function (btn) {
    btn.onclick = function () {
        connexionForm.style.display = "none";
        inscriptionForm.style.display = "flex";
        ombrage.style.display = "block";
    };
});

inscriptionClose.onclick = function () {
    inscriptionForm.style.display = "none";
    ombrage.style.display = "none";
};

// Bouton Déconnexion
const decoBtn = document.querySelector("#btn_deconnexion");
const logoutForm = document.querySelector("#logout_form");

decoBtn.addEventListener("click", function(e){
    e.preventDefault();

    fetch("/session", {
        method: "DELETE",
        credentials: "same-origin",
    })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Network réponse pas correct: ${response.status}`);
            }
            // Ajoutez cette ligne pour rediriger vers /forum après la déconnexion
            window.location.href = "/";
        })
        .catch(error => {
            console.error(`Un problème s'est produit lors de l'opération de recherche.: ${error.message}`);
        });
}); // <--- la fermeture correcte pour l'event listener de decoBtn

const btnTbUser = document.querySelectorAll(".icon_tb_user");

btnTbUser.forEach(function(btn) {
    btn.onclick = function(){
        btn.style.backgroundColor = "#E8C0B3";
        btn.style.color = "#BB5A3A";
        btn.style.padding = "18px";
        btnTbUser.forEach(function(autreBtn){
            if(autreBtn !== btn){
                autreBtn.style.backgroundColor = "#BB5A3A";
                autreBtn.style.color = "#E8C0B3";
                autreBtn.style.padding = "18px 0";
            }
        })
    }
})

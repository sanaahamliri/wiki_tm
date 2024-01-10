function validateForm() {
    var nameInput = document.getElementById("username");
    var emailInput = document.getElementById("email");
    var passwordInput = document.getElementById("password");

    const nameRegex = /^[A-Za-z\s]{3,30}$/;
    const emailRegex = /^[a-zA-Z0-9._-]+@[a-z]+\.[a-zA-Z]{2,3}$/;
    var passwordRegex = /^.{8,}$/;


    if (!nameRegex.test(nameInput.value)) {
        alert("Veuillez saisir un nom valide (entre 3 et 30 caractères, lettres et espaces uniquement).");
        return false;
    }


    if (!emailRegex.test(emailInput.value)) {
        alert("Veuillez saisir une adresse e-mail valide.");
        return false;
    }


    if (!passwordRegex.test(passwordInput.value)) {
        alert("Veuillez saisir un mot de passe d'au moins 8 caractères.");
        return false;
    }


    return true;
}
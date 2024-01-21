// const nameInput = document.getElementById("username");
// const emailInput = document.getElementById("email");
// const passwordInput = document.getElementById("password");
// const sendButton = document.querySelector("button[name='submit']");

// const nameRegex = /^[A-Za-z\s]+$/;
// const emailRegex = /^[a-zA-Z0-9._-]+@[a-z]+\.[a-zA-Z]{2,3}$/;
// const passwordRegex = /^.{8,}$/;

// nameInput.addEventListener("input", () => {
//     validateInput(nameInput, nameRegex);
// });

// emailInput.addEventListener("input", () => {
//     validateInput(emailInput, emailRegex);
// });

// passwordInput.addEventListener("input", () => {
//     validateInput(passwordInput, passwordRegex);
// });

// sendButton.addEventListener("click", (event) => {
//     event.preventDefault();

//     if (!nameRegex.test(nameInput.value)) {
//         alert("Please enter a valid name");
//     } else if (!emailRegex.test(emailInput.value)) {
//         alert("Please enter a valid email address");
//     } else if (!passwordRegex.test(passwordInput.value)) {
//         alert("Please enter a valid password (at least 8 characters)");
//     }
// });
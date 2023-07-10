const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
});

const loginButton = document.querySelector('#container .sign-in-container button[type="submit"]');
loginButton.addEventListener('click', (event) => {
    event.preventDefault();
    const urlParams = new URLSearchParams(window.location.search);
    const redirectParam = urlParams.get("redirected");

    if (redirectParam && redirectParam !== "dashboard.html") {
        window.location.href = redirectParam;
    } else {
        const email = document.getElementById('email').value;
        const password = document.getElementById('pwd').value;

        alert(`Email: ${email}\nPassword: ${password}`);

        document.getElementById('email').value = '';
        document.getElementById('pwd').value = '';

        window.location.href = "../Html/dashboard.html";
    }
});

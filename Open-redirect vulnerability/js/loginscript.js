const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

const loginButton = document.getElementById('loginBtn');
    loginButton.addEventListener('click', (event) => {
        event.preventDefault();
        const redirectParam = new URLSearchParams(window.location.search).get("redirected");
        if (redirectParam) {
            window.location.href = decodeURIComponent(redirectParam);
        }
    });

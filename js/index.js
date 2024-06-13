const hamburger = document.getElementById("hamburger");
const popup = document.getElementById("popup");

hamburger.addEventListener("click", hambHandler);

function hambHandler() {
    popup.classList.toggle(`open`);
    hamburger.classList.toggle("active");
}

popup.addEventListener('click', (e) => {
    if (e.target.tagName === 'A') {
        popup.classList.remove('open');
        hamburger.classList.remove('active');
    }
})

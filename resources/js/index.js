import "flowbite";

// ====================================================================================

// ハンバーガーメニュー
let hamburgerBtn = document.getElementById("hamburger-btn");
let hamburgerNav = document.getElementById("navbar-hamburger");
let hamburgerIcon = document.getElementById("hamburgerIcon");
let navLinks = document.getElementsByClassName('navLink');

hamburgerBtn.addEventListener("click",function (){
    if(hamburgerIcon.classList.contains("fa-bars")){
        hamburgerIcon.classList.remove('fa-bars');
        hamburgerIcon.classList.add('fa-xmark');
        hamburgerNav.classList.remove('hideFlag');
    }else{
        hamburgerIcon.classList.remove('fa-xmark');
        hamburgerIcon.classList.add('fa-bars');
        hamburgerNav.classList.add('hideFlag');
    }
})

for(let i=0; i<navLinks.length;i++){
    navLinks[i].addEventListener('click',function() {
        hamburgerIcon.classList.remove('fa-xmark');
        hamburgerIcon.classList.add('fa-bars');
        hamburgerNav.classList.add('hideFlag');
    });
}

// =====================================================================

// よくある質問
const qa = document.querySelectorAll(".js-ac");
function acToggle() {
    const content = this.nextElementSibling;

    content.classList.toggle("is-open");

    const qa = this;
    qa.classList.toggle('is-open');
}

for (let i = 0; i < qa.length; i++) {
    qa[i].addEventListener("click", acToggle);
}

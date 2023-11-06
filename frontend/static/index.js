const burger = document.querySelector(".burger");
const nav =document.querySelector('nav');



burger.addEventListener("click",()=>{
    //toggle open class to the nav 
    nav.classList.toggle("open");
    burger.classList.toggle("open");
})
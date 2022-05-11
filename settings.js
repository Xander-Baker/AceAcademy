var account = document.getElementById("account");
var courses = document.getElementById("courses");
var password = document.getElementById("password");
var content = document.getElementById("content");
var bugs = document.getElementById("bugs");

function disableBodyScroll(){
    const element = document.querySelector("#appBody");
    element.classList.add("stopScroll");
}

disableBodyScroll();
// account appear
document.getElementById("accountClick").addEventListener("click", function(){
    courses.style.visibility = "hidden";
    courses.style.position = "absolute";

    password.style.visibility = "hidden";
    password.style.position = "absolute";

    content.style.position = "hidden";
    content.style.visibility = "absolute";

    account.style.position = "relative";
    account.style.visibility = "visible";
});
// course appear 
document.getElementById("courseClick").addEventListener("click", function(){
    account.style.visibility = "hidden";
    account.style.position = "absolute";
    password.style.visibility = "hidden";
    password.style.position = "absolute";
    content.style.position = "hidden";
    content.style.visibility = "absolute";

    courses.style.position = "relative"
    courses.style.visibility = "visible";
});

// content appear
document.getElementById("contentClick").addEventListener("click", function(){
    account.style.visibility = "hidden";
    account.style.position = "absolute";

    bugs.style.visibility = "hidden";
    bugs.style.position = "absolute";

    courses.style.visibility = "hidden";
    courses.style.position = "absolute";

    password.style.visibility = "hidden";
    password.style.position = "absolute";

    content.style.position = "relative";
    content.style.visibility = "visible";
});


// password appear
document.getElementById("passwordClick").addEventListener("click", function(){
    account.style.visibility = "hidden";
    account.style.position = "absolute";

    bugs.style.visibility = "hidden";
    bugs.style.position = "absolute";

    courses.style.visibility = "hidden";
    courses.style.position = "absolute";
    
    content.style.visibility = "absolute";
    content.style.position = "hidden";

    password.style.position = "relative"
    password.style.visibility = "visible";
});

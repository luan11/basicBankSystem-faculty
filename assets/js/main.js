console.log("main js functions initialized");

var btn_colorMode = document.querySelectorAll(".color-mode");
var bgPrincipal = document.querySelectorAll(".principal");
var bgContent = document.querySelectorAll(".data-fields-section");
var bgInputs = document.querySelectorAll("input");
var bgBody = document.querySelectorAll("body");
var defaultModeSet = true;

function setDefaultStyleCookie(cvalue){
    document.cookie = "style="+cvalue;
}

function deleteDefaultStyleCookie(){
	document.cookie = "style=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}

function getCookie(cname){
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie(){
    var style = getCookie("style");

    if(style == "darkMode"){
        btn_colorMode[0].classList.toggle("color-default");
		bgPrincipal[0].classList.toggle("dark-mode");
		bgContent[0].classList.toggle("dark-mode");
		bgBody[0].classList.toggle("dark-mode");

		for(var i = 0; i < bgInputs.length; i++){
			bgInputs[i].classList.toggle("dark-mode");
		}

		btn_colorMode[0].innerHTML = '<span class="fas fa-palette"></span> Light mode';

		return defaultModeSet = false;
    }
}
checkCookie();

btn_colorMode[0].addEventListener("click",function(){
	btn_colorMode[0].classList.toggle("color-default");
	bgPrincipal[0].classList.toggle("dark-mode");
	bgContent[0].classList.toggle("dark-mode");
	bgBody[0].classList.toggle("dark-mode");

	for(var i = 0; i < bgInputs.length; i++){
		bgInputs[i].classList.toggle("dark-mode");
	}

	if(defaultModeSet){
		deleteDefaultStyleCookie();
		setDefaultStyleCookie("darkMode");
		btn_colorMode[0].innerHTML = '<span class="fas fa-palette"></span> Light mode';
		return defaultModeSet = false;
	}else{
		deleteDefaultStyleCookie();
		setDefaultStyleCookie("default");
		btn_colorMode[0].innerHTML = '<span class="fas fa-palette"></span> Dark mode';
		return defaultModeSet = true;
	}
});


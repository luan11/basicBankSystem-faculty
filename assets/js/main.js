console.log("main js functions initialized");

var btn_colorMode = document.querySelectorAll(".color-mode");
var bgPrincipal = document.querySelectorAll(".principal");
var bgContent = document.querySelectorAll(".data-fields-section");
var bgInputs = document.querySelectorAll("input");
var bgBody = document.querySelectorAll("body");
var defaultModeSet = true;
var alerts = document.querySelectorAll(".alerts");
var alertsTimerBar = document.querySelectorAll(".alerts-bar");

function removeAlerts(){
	var counter = 75;
	var timer = setInterval(function(){

		for(var i = 0; i < alerts.length; i++){
			alertsTimerBar[i].style.width = counter+"%";
		}
		counter--;

		if(timer === 0){
			clearInterval(timer);
		}

	}, 100);

	setTimeout(function(){
		for(var i = 0; i < alerts.length; i++){
			alerts[i].classList.add('outerror');
		}
	},8000);
}
removeAlerts();

function setDefaultStyleCookie(cvalue){
	var expiresDate = new Date(2020, 11, 31).toUTCString();
    document.cookie = "style="+cvalue+"; expires="+expiresDate+"; path=/;";
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

		btn_colorMode[0].innerHTML = '<span class="fas fa-tint-slash"></span> Light mode';

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
		setDefaultStyleCookie("darkMode");
		btn_colorMode[0].innerHTML = '<span class="fas fa-tint-slash"></span> Light mode';
		return defaultModeSet = false;
	}else{
		setDefaultStyleCookie("default");
		btn_colorMode[0].innerHTML = '<span class="fas fa-tint"></span> Dark mode';
		return defaultModeSet = true;
	}
});

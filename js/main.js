// JavaScript Document

//OPEN / CLOSE NAVIGATION
function OpenNavMenu() {
	ActivateNavMenu();
}
function ActivateNavMenu() {
	let nav_menu = document.getElementById("main-header-menu");
	let nav_svg = document.getElementById("main-menu-svg");
	let nav_svg_a = document.getElementById("main-menu-svg-active");
	
	nav_menu.classList.toggle("active-back");
	nav_svg.classList.toggle("hidden");
	nav_svg_a.classList.toggle("hidden");
	
	let nav = document.getElementById("fullNav");
	nav.classList.toggle("hidden");
}

function changeStyle()	{
    if	(window.innerWidth<=1024)	{
		if (!(document.getElementById("main-header-menu").classList.contains("active-back"))) {
			console.log("wwwww");
//			document.getElementById("fullNav").style = "display: none;";
			document.getElementById("fullNav").classList.add("hidden");
		}
	}
	if	(window.innerWidth>1024) {
		document.getElementById("fullNav").classList.remove("hidden");
	}
}  

window.onresize=changeStyle;
window.onload=changeStyle;

// OPEN / CLOSE SOCAILS
function onClickSocials() {
	let socailsList = document.getElementById('socials-list').classList.toggle('hidden');
	let socailsH1 = document.getElementById('socials-h1').classList.toggle('hidden');
}

//OPEN / CLOSE USER SUBMENU
function onClickUserSubmenu() {
	let user_submenu = document.getElementById('user_submenu').classList.toggle('hidden');
}

//OPEN CLOSE LIVESTATS
function OpenStatsMenu() {
	let stats = document.getElementById('live-stats').setAttribute("style", "display: flex;");
	let search = document.getElementById('search-wrapper').setAttribute("style", "display: none;");
}

//OPEN CLOSE SEARCH
function OpenSearchMenu() {
	let search = document.getElementById('search-wrapper').setAttribute("style", "display: flex;");
	let stats = document.getElementById('live-stats').setAttribute("style", "display: none;");
}

// OPEN / CLOSE LANGUAGE CHOOSER MENU
function onClickLanguageChooserMenu() {
	let lang_chooser = document.getElementById('language-chooser-menu').classList.toggle('hidden');
}
function setLng(str){
  if(str == "ru"){
	$("#curLng").attr('src', "images/country-flags/russia.png");
  }else{
	$("#curLng").attr('src', "images/country-flags/united-kingdom.png");
  }
  let lang_chooser = document.getElementById('language-chooser-menu').classList.toggle('hidden');
}

//DOLLARS
function moveFC(){
    $("#cursecr").animate({
      "top": "49px"
    }, 500);
	
    $(".crypto-header").animate({
      backgroundColor:'#34C28D'
    }, 500);
    $(".nav-header").animate({
      backgroundColor:'#4F5A7B'
    }, 500);
}
function moveF(){
    $("#cursecr").animate({
      "top": st
    }, {duration:500, complete:function(){$("#cursecr").css({ top:("")}); } });
	
    $(".crypto-header").animate({
      backgroundColor:'#4F5A7B'
    }, 500);
    $(".nav-header").animate({
      backgroundColor:'#34C28D'
    }, 500);
}


// SOCAILS
let socStatus = 0;
function onClickSocials() {
  if(socStatus == 1){
    $("#socials-list").animate({
      "right": "-190px"
    }, 500);
	
    $("#socials-h1").animate({
      "opacity": "1"
    }, 500);
	
	socStatus = 0;
  }else{
    $("#socials-list").animate({
      "right": "35px"
    }, 1000);
	
    $("#socials-h1").animate({
      "opacity": "0"
    }, 500);
  
	socStatus = 1;
  }
}


function chg(str){
  if(document.getElementById("soc_"+str).src == "https://onecli.biz/img/"+str+"0.png"){
    document.getElementById("soc_"+str).src = "img/"+str+"1.png";
  }
}
function chg_(str){
  if(document.getElementById("soc_"+str).src == "https://onecli.biz/img/"+str+"1.png"){
    document.getElementById("soc_"+str).src = "img/"+str+"0.png";
  }
}



///СЃРѕРѕР±С‰РµРЅРёСЏ
function openF(title, mess){
  document.getElementById("global_alert").style.display=null;
  document.getElementById("global_alert_title").innerHTML = title;
  document.getElementById("global_alert_message").innerHTML = mess;
}


///Р·Р°РєСЂС‹С‚СЊ СЃРѕРѕР±С‰РµРЅРёСЏ
function alertClose(){
  document.getElementById("global_alert").style.display="none";
}
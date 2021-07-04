// JavaScript Document

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}

function OpenDiagPopup() {
	let popup = document.getElementById("diag-popup");
	popup.classList.toggle('hidden');
	
	let popup_svg = document.getElementById("popup-svg");
	popup_svg.classList.toggle('svg-active');
}
// JavaScript Document

function OpenClosedTickets() {
	let closed_section = document.getElementById("closed-tickets");
	let opened = document.getElementById("opened-tickets");
	closed_section.classList.remove('hidden');
	opened.classList.add('hidden');
}

function OpenOpenedTickets() {
	let opened = document.getElementById("opened-tickets");
	let closed_section = document.getElementById("closed-tickets");
	opened.classList.remove('hidden');
	closed_section.classList.add('hidden');
}
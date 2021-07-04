// JavaScript Document

// CLOSE ALL ITEMS
function CloseAllItems() {
	let elements = document.getElementsByClassName('menu-point');
	let elementsArr = Array.from(elements);
	
	let elementsText = document.getElementsByClassName('text');
	let elementsTextArr = Array.from(elementsText);
	
	for (index = 0; index < elementsArr.length; index++) {
//		console.log(elementsArr[index]);
		if (elementsArr[index].classList.contains('active')) {
			elementsArr[index].classList.toggle('active');
		}
		if (!elementsTextArr[index].classList.contains('hidden')) {
			elementsTextArr[index].classList.toggle('hidden');
		}
	}
}

// OPEN INTRODUCTION
function OpenIntroduction() {
	CloseAllItems();
	let button = document.getElementById('introduction-button').classList.add('active');
	let text = document.getElementById('introduction').classList.remove('hidden');
}

// OPEN IDEA ONECLI
function OpenIdea() {
	CloseAllItems();
	let button = document.getElementById('idea-onecli-button').classList.add('active');
	let text = document.getElementById('idea-onecli').classList.remove('hidden');
}

// OPEN AUCTION
function OpenAuction() {
	CloseAllItems();
	let button = document.getElementById('auction-button').classList.add('active');
	let text = document.getElementById('auction').classList.remove('hidden');
}

// OPEN EXCHANGE
function OpenExchange() {
	CloseAllItems();
	let button = document.getElementById('exchange-button').classList.add('active');
	let text = document.getElementById('exchange').classList.remove('hidden');
}

// OPEN NETWORK
function OpenNetwork() {
	CloseAllItems();
	let button = document.getElementById('network-button').classList.add('active');
	let text = document.getElementById('network').classList.remove('hidden');
}

// OPEN AD
function OpenAd() {
	CloseAllItems();
	let button = document.getElementById('ad-button').classList.add('active');
	let text = document.getElementById('ad').classList.remove('hidden');
}

// OPEN INVESTOR
function OpenInvestor() {
	CloseAllItems();
	let button = document.getElementById('investor-button').classList.add('active');
	let text = document.getElementById('investor').classList.remove('hidden');
}

// OPEN PARTNER
function OpenPartner() {
	CloseAllItems();
	let button = document.getElementById('partner-button').classList.add('active');
	let text = document.getElementById('partner').classList.remove('hidden');
}

// OPEN TOKEN
function OpenToken() {
	CloseAllItems();
	let button = document.getElementById('token-button').classList.add('active');
	let text = document.getElementById('token').classList.remove('hidden');
}

// OPEN PERSPECTIVES
function OpenPerspectives() {
	CloseAllItems();
	let button = document.getElementById('perspectives-button').classList.add('active');
	let text = document.getElementById('perspectives').classList.remove('hidden');
}

// OPEN CONCLUSION
function OpenConclusion() {
	CloseAllItems();
	let button = document.getElementById('conclusion-button').classList.add('active');
	let text = document.getElementById('conclusion').classList.remove('hidden');
}

// OPEN CONTACTS
function OpenContacts() {
	CloseAllItems();
	let button = document.getElementById('contacts-button').classList.add('active');
	let text = document.getElementById('contacts').classList.remove('hidden');
}
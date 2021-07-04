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
function OpenAirdrop() {
	CloseAllItems();
	let button = document.getElementById('airdrop-button').classList.add('active');
	let text = document.getElementById('airdrop').classList.remove('hidden');
}

// OPEN IDEA ONECLI
function OpenYoutube() {
	CloseAllItems();
	let button = document.getElementById('youtube-button').classList.add('active');
	let text = document.getElementById('youtube').classList.remove('hidden');
}

// OPEN AUCTION
function OpenArticles() {
	CloseAllItems();
	let button = document.getElementById('articles-button').classList.add('active');
	let text = document.getElementById('articles').classList.remove('hidden');
}

// OPEN EXCHANGE
function OpenVk() {
	CloseAllItems();
	let button = document.getElementById('vk-button').classList.add('active');
	let text = document.getElementById('vk').classList.remove('hidden');
}

// OPEN NETWORK
function OpenInst() {
	CloseAllItems();
	let button = document.getElementById('inst-button').classList.add('active');
	let text = document.getElementById('inst').classList.remove('hidden');
}

// OPEN AD
function OpenTg() {
	CloseAllItems();
	let button = document.getElementById('tg-button').classList.add('active');
	let text = document.getElementById('tg').classList.remove('hidden');
}

// OPEN INVESTOR
function OpenFb() {
	CloseAllItems();
	let button = document.getElementById('fb-button').classList.add('active');
	let text = document.getElementById('fb').classList.remove('hidden');
}

// OPEN PARTNER
function OpenTwitter() {
	CloseAllItems();
	let button = document.getElementById('twitter-button').classList.add('active');
	let text = document.getElementById('twitter').classList.remove('hidden');
}

// OPEN TOKEN
function OpenBtctalk() {
	CloseAllItems();
	let button = document.getElementById('btctalk-button').classList.add('active');
	let text = document.getElementById('btctalk').classList.remove('hidden');
}

// OPEN PERSPECTIVES
function OpenOther() {
	CloseAllItems();
	let button = document.getElementById('other-button').classList.add('active');
	let text = document.getElementById('other').classList.remove('hidden');
}
///онлаин стата
readLiveStat();

setInterval(function() {
  readLiveStat();
}, 10000);
  
///живая стата
function readLiveStat(){
  $.ajax({
    type: "POST",
    url: "php/readLiveStat.php"
  }).done(function( result ){
    var json = JSON.parse(result);
    var str = '';
	  
	for(var i = 0; i < json.length; i++){
      str += '<div class="transaction">';
	  if(json[i][0].length > 10){
        str += "<span>" + json[i][0].slice( 0, 10 )  + "...</span>";
	  }else{
        str += "<span>" + json[i][0] + "</span>";
	  }
      str += '<div><span class="t-uppercase t-white">'+json[i][1]+'</span></div>';
      str += '<div><span class="t-uppercase t-white">Profit: '+json[i][2]+'</span></div></div>';
	}	  
	  
	document.getElementById('lots_live').innerHTML = str;
  });
}


///лоты
var lotsArr = new Array();
var seeCount = 0;
readLots();
setInterval(function() {
  if(seeCount == 0 && lot_see == 0){
     //readLots();
  }
}, 5000);
  
function readLots(){
  lotsArr = new Array();
  $.ajax({
    type: "POST",
    url: "php/readAllLots.php"
  }).done(function( result ){
    var json = JSON.parse(result);
	var str = "";
	  
	for(var i = 0; i < json.length; i++){
		  
      if(json[i][1] >= find_start_num && json[i][1] <= find_end_num){
		lotsArr.push(json[i]);
		
		var curS = "";
        if(json[i][2] == "Доллар"){
	      curS = "$";
        }  
        if(json[i][2] == "Евро"){
          curS = "€";
        } 
  
  
	    str += '<div class="lot">';
		
		str += '<svg style="display: none;" xmlns="http://www.w3.org/2000/svg" width="44" height="28.769" viewBox="0 0 44 28.769"><g transform="translate(0)"><path d="M1461-2196h36a8,8,0,0,1,8,8v20.769Z" transform="translate(-1461 2196)" fill="#ffa200"/><path d="M7.008,9.647,10.1,11.515l-.821-3.52,2.734-2.369-3.6-.305L7.008,2,5.6,5.32,2,5.626,4.734,7.994l-.821,3.52Z" transform="translate(26.985 2)" fill="#fff"/></g></svg>';
		
		str += '<div id="buyLots'+json[i][0]+'" class="total-price"><div><span class="t-white t-size-18 t-uppercase">'+json[i][1]+' ' + curS + '</span></div><div><span class="t-darkgray">Код:</span><span class="t-black t-italic">'+json[i][5]+ '</span></div></div>';
	
		///таймер
		str += '<div class="timer" style="width: 32%;">';
		  str += '<font color="#000000" id="tmr'+json[i][0]+'">10</font><svg width="160" height="160" xmlns="http://www.w3.org/2000/svg">';
		  str += '<circle r="30" cy="81" cx="81" stroke-width="3" stroke="#DCDEE5" fill="none"/>';
		  str += '<circle id="circle'+json[i][0]+'" style="stroke-dasharray: 190;transition: all 1s linear;" r="30" cy="81" cx="81" stroke-width="3" stroke="#6fdb6f" fill="none"/></svg>';
		str += '</div>';
		
        ///просмотр
		str += '<div class="true-price"  id="buyLot'+json[i][0]+'" ><div><div></div></div><div onclick="lotSee('+json[i][0]+')"><span class="t-white">Показать</span></div></div>';		 
        str += '</div>';
		
	  }
	}
    document.getElementById('lots').innerHTML = str;
  });
}



///поиск
var find_start_num = 0;
var find_end_num = 99999999;




  
///просмотр
var lid = 0;
var bls = false;
function lotSee(ids){
  if(!bls){
    seeCount++;
	bls = true;
    lid = ids;
	document.getElementById('buyLot'+ids).innerHTML = '<div><p><span class="t-uppercase t-darkgray"></span><br><span class="t-uppercase"></span></p></div><div style="background-color: #d65252;"><span class="t-white">Загрузка...</span></div>';
    $.ajax({
      type: "POST",
      url: "php/SeeLotsById.php",
      data: {
		id:ids
	  }
    }).done(function( result ){
	  bls = false;
	  if(result == "error"){
	    openF("Внимание!","Ваша сессия была изменена. Проверьте безопасность аккаунта или перезайдите в кабинет.");
	  }else if(result == "error2"){
	    openF("Внимание!","У вас недостаточно средств. Пополните баланс ONX.");
	  }else if(result == "error3"){
	    openF("Внимание!","Данный лот уже продан. По истечении времени лоты будут обновлены.");
	  }else{
	    var json = JSON.parse(result);
	  
	    var curS = "";
        if(json[0][2] == "Доллар"){
	      curS = "$";
        }  
        if(json[0][2] == "Евро"){
          curS = "€";
	    } 
	  
        var flr = ""+json[0][6];
        if(flr.split(".").length > 1){
          if(flr.split(".")[1] < 10){
	        flr = flr.split(".")[0] + "." + flr.split(".")[1]+"0";
	      }
        }
	    
        var flrs = ""+json[0][8];
        if(flrs.split(".").length > 1){
          if(flrs.split(".")[1] < 10){
	        flrs = flrs.split(".")[0] + "." + flrs.split(".")[1]+"0";
	      }
        }
		
	    document.getElementById('buyLot'+ids).innerHTML = '<div ><p><span class="t-uppercase t-darkgray">'+flrs + ' ONX</span><br><span class="t-uppercase">'+flr + " " + curS+'</span></p></div><div style="background-color: #d65252;" onclick="lotBuy('+ids+')"><span class="t-white">Купить</span></div>';
	    document.getElementById('buyLots'+ids).classList.add("opened");
		
	    seeTmr(lid);
		seeBalance();
	  }
    });
  }else{
	openF("Внимание!","Дождитесь загрузки данных лота и повторите попытку.");
  }
}


///отсчёт времени
var time = 10;
var initialOffset = '190';
var lot_see = 0;

function seeTmr(id){
  lot_see++;
  var i = 1
  $('#circle'+id).css('stroke-dashoffset', initialOffset-(1*(initialOffset/time)));
  var interval = setInterval(function() {
      var s = 10 - i;
	  if(s < 10){
		s = "0" + s;
	  }
	  $('#tmr'+id).html(s);
	  
	  if (i == time) {  
        lot_see--;	  
        document.getElementById('buyLot'+id).innerHTML = '<div><div></div></div><div><span class="t-white">Показать</span></div>';
	    document.getElementById('buyLots'+id).classList.remove("opened");
	    $('#tmr'+id).html("10");
		seeCount--;
        clearInterval(interval);
			return;
      }
	  $('#circle'+id).css('stroke-dashoffset', initialOffset-((i+1)*(initialOffset/time)));
      i++;  
  }, 1000);
}



///покупка
var blb = false;
function lotBuy(id){
  if(!blb){
	blb = true;
	document.getElementById('buyLot'+id).innerHTML = '<div><p><span class="t-uppercase t-darkgray"></span><br><span class="t-uppercase"></span></p></div><div style="background-color: #d65252;"><span class="t-white">Загрузка...</span></div>';
    $.ajax({
      type: "POST",
      url: "php/BuyAllLots.php",
      data: {
		  id:id
	  }
    }).done(function( result ){
	  blb = false;
	  if(result == "error"){
	    openF("Внимание!","Ваша сессия была изменена. Проверьте безопасность аккаунта или перезайдите в кабинет.");
	  }else if(result == "error3"){
	    openF("Внимание!","Данный лот уже продан. По истечении времени лоты будут обновлены.");
	  }else{
	    openF("Внимание!","Лот был перенесён в корзину.");
	    readLots();
	  }
    });
  }else{
	openF("Внимание!","Дождитесь загрузки данных лота и повторите попытку.");
  }
}


///допки
var divName = "";
function divOnVis(str){
  divName = str;
  if(divName == "basket"){
    readBasket();
  }
  
   document.getElementById("lots_modals").style.display=null;
   document.getElementById(divName).style.display=null;
}
function divOffVis(str){
   document.getElementById("lots_modals").style.display="none";
   document.getElementById(divName).style.display="none";
}

///корзина
function readBasket(){  
  document.getElementById('readBasketid').classList.add("t-main");
  document.getElementById('readMyBuyid').classList.remove("t-main");
  var table = document.getElementById("basket_table");
  table.innerHTML = "";
  $.ajax({
    type: "POST",
    url: "php/SeeAllLotsMyBuy.php"
  }).done(function( result ){
    var str = '';
	  
    if(result == "error"){
	  openF("Внимание!","Ваша сессия была изменена. Проверьте безопасность аккаунта или перезайдите в кабинет.");
	}else if(result == "error2"){
	  openF("Внимание!","У вас нет зарезервированных лотов.");
	}else{
	  var json = JSON.parse(result);

      var row = table.insertRow();
      var td0 = row.insertCell(0).outerHTML = "<th>Название</th>";
      var td1 = row.insertCell(1).outerHTML = "<th>Номинал лота</th>";
      var td3 = row.insertCell(2).outerHTML = "<th>Цена</th>";
      var td4 = row.insertCell(3).outerHTML = "<th>Время на покупку</th>";
      var td5 = row.insertCell(4).outerHTML = "<th></th>";
		
	  for(var i = 0; i < json.length; i++){
		  
		var curS = "";
        if(json[0][1] == "Доллар"){
	      curS = "$";
        }  
        if(json[0][1] == "Евро"){
          curS = "€";
	    } 
	  
        var flr = ""+json[i][3];
        if(flr.split(".").length > 1){
          if(flr.split(".")[1] < 10){
	        flr = flr.split(".")[0] + "." + flr.split(".")[1]+"0";
	      }
        }
	    
        var flrs = ""+json[i][7];
        if(flrs.split(".").length > 1){
          if(flrs.split(".")[1] < 10){
	        flrs = flrs.split(".")[0] + "." + flrs.split(".")[1]+"0";
	      }
        }	

        ///время		
		timestamp = json[i][5];
		var hours = Math.floor(timestamp / 60 / 60);
		var minutes = Math.floor(timestamp / 60) - (hours * 60);
		var seconds = timestamp % 60;
		
		dt = hours.toString().padStart(2, '0') + ':' + minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0');

		
        row = table.insertRow();
        td0 = row.insertCell(0).outerHTML = '<td>Лот <span class="t-bold-400">№ ' + json[i][4] + '</span></td>';
        td1 = row.insertCell(1).outerHTML = "<td>"+flrs + " ONX</td>";
        td3 = row.insertCell(2).outerHTML = "<td>"+json[i][0] + " " + curS + "<BR>" + (json[i][0]*2) + " ONX</td>";
        td4 = row.insertCell(3).outerHTML = "<td>" + dt + "</td>";
        td5 = row.insertCell(4).outerHTML = '<td><span onclick="buyLotF('+json[i][6]+');">Купить</span></td>';
	  }	  
    }
  });
}
  
  
///купленные
function readMyBuy(){
  document.getElementById('readBasketid').classList.remove("t-main");
  document.getElementById('readMyBuyid').classList.add("t-main");
  var table = document.getElementById("basket_table");
  table.innerHTML = "";
  $.ajax({
    type: "POST",
    url: "php/SeeAllLotsMyTake.php"
  }).done(function( result ){
	if(result == "error"){
	  openF("Внимание!","Ваша сессия была изменена. Проверьте безопасность аккаунта или перезайдите в кабинет.");
	}else if(result == "error2"){
	  openF("Внимание!","У вас нет купленных лотов.");
	}else{
      var row = table.insertRow();
      var td0 = row.insertCell(0).outerHTML = "<th>Название</th>";
      var td1 = row.insertCell(1).outerHTML = "<th>Номинал лота</th>";
      var td3 = row.insertCell(2).outerHTML = "<th>Цена</th>";
      var td4 = row.insertCell(3).outerHTML = "<th>Статус</th>";
		
	  var json = JSON.parse(result);
	  for(var i = 0; i < json.length; i++){
		  
		var curS = "";
        if(json[0][1] == "Доллар"){
	      curS = "$";
        }  
        if(json[0][1] == "Евро"){
          curS = "€";
	    } 
	  
        var flr = ""+json[i][3];
        if(flr.split(".").length > 1){
          if(flr.split(".")[1] < 10){
	        flr = flr.split(".")[0] + "." + flr.split(".")[1]+"0";
	      }
        }
	    
        var flrs = ""+json[i][7];
        if(flrs.split(".").length > 1){
          if(flrs.split(".")[1] < 10){
	        flrs = flrs.split(".")[0] + "." + flrs.split(".")[1]+"0";
	      }
        }	

        row = table.insertRow();
        td0 = row.insertCell(0).outerHTML = '<td>Лот <span class="t-bold-400">№ ' + json[i][4] + '</span></td>';
        td1 = row.insertCell(1).outerHTML = "<td>"+flrs + " ONX</td>";
        td3 = row.insertCell(2).outerHTML = "<td>"+json[i][0] + " " + curS + "<BR>" + (json[i][0]*2) + " ONX</td>";
        td4 = row.insertCell(3).outerHTML = "<td>Куплено</td>";
	  }	
    }
  });
}

///покупка
function buyLotF(lid){
  if(!bls){
    bls = true;
    $.ajax({
      type: "POST",
      url: "php/BuyAllLotsMy.php",
      data: {
	    id:lid
	  }
    }).done(function( result ){
		 bls = false;
        if(result == "error"){
	      openF("Внимание!","Ваша сессия была изменена. Проверьте безопасность аккаунта или перезайдите в кабинет.");
	    }else if(result == "error2"){
	      openF("Внимание!","У вас недостаточно средств. Пополните баланс ONX.");
	    }else if(result == "error3"){
	      openF("Внимание!","Данный лот уже продан. По истечении времени лоты будут обновлены.");
	    }else{
		  seeBalance();
		  readBasket();
		}
      });
  }else{
    openF("Внимание!","Дождитесь загрузки данных лота и повторите попытку.");
  }
}

///баланс
function seeBalance(){
  $.ajax({
    type: "POST",
    url: "php/balance.php"
  }).done(function( result ){
    document.getElementById('user_balance').innerHTML = result + " ONX";
  });
}


///другу
function sendMoney(){
	if($('#send_login').val() == ""){
      openF("Внимание!","Укажите логин,E-mail или телефон");
	}else if($('#send_onx').val() <= 0){
      openF("Внимание!","Укажите сумму перевода.");
	}else{
      $.ajax({
        type: "POST",
        url: "php/sendFriend.php",
		data: {
		  money: $('#send_onx').val(),
		  login: $('#send_login').val()
	    }
      }).done(function( result ){
		if(result == "error"){
	      openF("Внимание!","Ваша сессия была изменена. Проверьте безопасность аккаунта или перезайдите в кабинет.");
	    }else if(result == "error2"){
	      openF("Внимание!","У Вас недостаточно средств для перевода.");
	    }else if(result == "error3"){
	      openF("Внимание!","Такой пользователь не найден");
	    }else if(result == "error4"){
	      openF("Внимание!","Нельзя отправлять себе средства");
	    }else{
	      openF("Внимание!","Перевод одобрен.");
		  seeBalance();
		}		
      });
	}
}





///пополнение
var buy_start_num = 0;
var buy_end_num = 99999999;
function buy_startF(str){
	if(str != ""){
	  str = Number(str.replace(/\D+/g,""));
	  buy_start_num = str;
	  $('#buyONX').val(str);
	  $('#buyDollar').val($('#buyONX').val()/2);
	}else{
	  buy_start_num = 0;
	  $('#buyDollar').val("");
	}
}
function buy_endF(str){
	if(str != ""){
	  str = Number(str.replace(/\D+/g,""));
	  buy_end_num = str;
	  $('#buyDollar').val(str);
	  
	  $('#buyONX').val($('#buyDollar').val()*2);
	}else{
	  buy_end_num = 0;
	  $('#buyONX').val("");
	}
}

var lastImg = "";
function imgSet(str){
  document.getElementById(str).classList.add("active");
  if(lastImg != ""){
    document.getElementById(lastImg).classList.remove("active");
  }
  lastImg = str;
}

function addMoney(){
	if($('#buyDollar').val() == ""){
      openF("Внимание!","Укажите сумму пополнения.");
	}else if(lastImg == ""){
      openF("Внимание!","Укажите платежную систему.");
	}else{
      $.ajax({
        type: "POST",
        url: "php/addBalance.php",
		data: {
		  money: $('#buyDollar').val(),
		  tp: lastImg
	    }
      }).done(function( result ){
		if(result == "error"){
	      openF("Внимание!","Ваша сессия была изменена. Проверьте безопасность аккаунта или перезайдите в кабинет.");
	    }else{
	      openF("Внимание!","Баланс пополнен");
		  seeBalance();
		}		
      });
	}
}



//Вывод
var buy_start_num_sell = 0;
var buy_end_num_sell = 99999999;
function buy_startF_sell(str){
	if(str != ""){
	  str = Number(str.replace(/\D+/g,""));
	  buy_start_num_sell = str;
	  $('#buyONX_sell').val(str);
	  
	  $('#buyDollar_sell').val($('#buyONX_sell').val()/2);
	}else{
	  buy_start_num_sell = 0;
	  $('#buyDollar_sell').val("");
	}
}
function buy_endF_sell(str){
	if(str != ""){
	  str = Number(str.replace(/\D+/g,""));
	  buy_end_num_sell = str;
	  $('#buyDollar_sell').val(str);
	  $('#buyONX_sell').val($('#buyDollar_sell').val()*2);
	}else{
	  buy_end_num_sell = 0;
	  $('#buyONX_sell').val("");
	}
}

///вывод
function sellMoney(){
	if($('#buyDollar_sell').val() == ""){
      openF("Внимание!","Укажите сумму вывода.");
	}else if(lastImgS == ""){
      openF("Внимание!","Укажите платежную систему.");
	}else{
      $.ajax({
        type: "POST",
        url: "php/exitBalance.php",
		data: {
		  money: $('#buyDollar_sell').val(),
		  tp: lastImgS
	    }
      }).done(function( result ){
		if(result == "error"){
	      openF("Внимание!","Ваша сессия была изменена. Проверьте безопасность аккаунта или перезайдите в кабинет.");
	    }else{
	      openF("Внимание!","Вывод одобрен.");
		  seeBalance();
		}		
      });
	}
}
var lastImgS = "";
function imgSetS(str){
  document.getElementById(str).classList.add("active");
  if(lastImgS != ""){
    document.getElementById(lastImgS).classList.remove("active");
  }
  lastImgS = str;
}



///поиск
var find_start_num = 0;
var find_end_num = 99999999;
function find_startF(str){
	if(str != ""){
	  str = Number(str.replace(/\D+/g,""));
	  find_start_num = str;
	  $('#find_start').val(str+"$");
	}else{
	  find_start_num = 0;
	}
}
function find_endF(str){
	if(str != ""){
	  str = Number(str.replace(/\D+/g,""));
	  find_end_num = str;
	  $('#find_end').val(str+"$");
	}else{
	  find_end_num = 999999999;
	}
}


///сброс поиска
function findReset(){
	$('#find_start').val("");
	$('#find_end').val("");
	
    find_start_num = 0;
    find_end_num = 999999999;
	readLots();
}
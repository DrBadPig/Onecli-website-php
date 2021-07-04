
///копирование
function copyLink(link){
  navigator.clipboard.writeText(link)
    .then(() => {
    openF("Внимание!","Ссылка скопирована в буфер обмена.");
  })
  .catch(err => {
    openF("Ошибка!","Не удалось скопировать ссылку");
  });
}

  
///вывод инфо
function getInfo(login){
	
}


///чтение отдельного сообщения
function mesReadAll(id){
  document.getElementById("team_modals_inbox").style.display="none";
  $.ajax({
    type: "POST",
    url: "php/readMesById.php",
	data: {
	  id:id
	}
  }).done(function( result ){
    if(result == "error1"){
      openF("Внимание!","Такого сообщения нет");
    }else{
      document.getElementById("modal_dp").style.display=null;
      document.getElementById("modal_dp_full").style.display=null;
	  
	  var json = JSON.parse(result);
	  
	  document.getElementById('modal_ava').style.backgroundImage = "url(avatars/"+json[0][0]+".jpg)";
	  document.getElementById('modal_author').innerHTML = json[0][0];
	  document.getElementById('modal_email').innerHTML = json[0][5];
	  document.getElementById('modal_time').innerHTML = json[0][3];
	  document.getElementById('modal_theme').innerHTML = 'Тема письма: <span class="t-gray">'+json[0][1]+'</span>';
	  document.getElementById('modal_mes').value = json[0][2];
    }
  });
}


///чтение сообщений
function readMes(){
  $.ajax({
    type: "POST",
    url: "php/readMes.php"
  }).done(function( result ){
    if(result == "error"){
      openF("Внимание!","Ваша сессия была изменена. Проверьте безопасность аккаунта или перезайдите в кабинет.");
    }else{
		
      $("#readMesDiv").css("visibility", "visible");
      $("#team_bg").css("visibility", "visible");
	  $("#team_bg").animate({
        "opacity": 1
      }, 500);
	  
	  var json = JSON.parse(result);
	  var str = '<div class="modal-close-button" onclick="team_inbox_off()"><svg xmlns="http://www.w3.org/2000/svg" width="14.798" height="14.798" viewBox="0 0 14.798 14.798"><g transform="translate(0.707 0.707)"><line x2="13.384" y2="13.384" fill="none" stroke="#fff" stroke-width="2"></line><line x1="13.384" y2="13.384" fill="none" stroke="#fff" stroke-width="2"></line></g></svg></div>';
	  
	  
	  for(var i = 0; i < json.length; i++){
	    str += '<div id="mes_div_'+json[i][4]+'" class="mail unread t-bold-300" onclick="mesReadAll(' + json[i][4] + ');">';
		str += '<div style="background: url(avatars/'+json[i][0]+'.jpg) 100% no-repeat; background-position: center; background-size: cover;" class="photo" width="50px" height="50px"></div>';
		str += '<div class="text"><span><span class="login t-main">' + json[i][0] + '</span> | <span class="t-black t-bold-400">' + json[i][1] + '</span></span>';
		str += '<span class="t-black t-size-12">' + json[i][2] + '</span></div>';
		str += '<span class="date">' + json[i][3] + '</span>';
        str += '</div>';
	  }
	  
	  document.getElementById('team_modals_inbox').innerHTML = str;
    }
  });
}


///отправка сообщения
function sendMesTeam(){
  if($('#message_title').val() == ""){
    openF("Внимание!","Укажите тему сообщения.");
  }else if($('#message_mes').val() == ""){
    openF("Внимание!","Укажите сообщение.");
  }else{
    $.ajax({
      type: "POST",
      url: "php/sendMes.php",
	  data: {
	    theme: $('#message_title').val(),
	    mes: $('#message_mes').val()
	  }
    }).done(function( result ){
	  if(result == "error"){
        openF("Внимание!","Ваша сессия была изменена. Проверьте безопасность аккаунта или перезайдите в кабинет.");
	  }else{
        openF("Внимание!","Сообщение отправлено.");
		team_send_off();
	  }
    });
  }
}


  
///короткии текст
function changeText() {
  var maxlength = 30;
  var strNum = document.getElementById("refLink").length; 
  var str = document.getElementById("refLink").innerHTML;
  document.getElementById("refLink").innerHTML = str.slice( 0, maxlength ) + '...';
  
  strNum = document.getElementById("webLink").length; 
  str = document.getElementById("webLink").innerHTML;
  document.getElementById("webLink").innerHTML = str.slice( 0, maxlength ) + '...';
  
}
changeText();



///рассылка
function team_send(){
  document.getElementById("team_modals_back").style.display=null;
  document.getElementById("team_modals_send").style.display=null;
}
function team_send_off(){
  document.getElementById("team_modals_back").style.display="none";
  document.getElementById("team_modals_send").style.display="none";
}

///входящие
function team_inbox(){
  document.getElementById("team_modals_back").style.display=null;
  document.getElementById("team_modals_inbox").style.display=null;
  
  readMes();
}
function team_inbox_off(){
  document.getElementById("team_modals_back").style.display="none";
  document.getElementById("team_modals_inbox").style.display="none";
  document.getElementById("modal_dp").style.display="none";
  document.getElementById("modal_dp_full").style.display="none";
}
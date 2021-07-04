
	<div class="back">
		<div class="authorize">
			<img src="images/signin/logo-sm.png" alt="logo" width="143px">
<!--			<h1 class="t-main t-size-25 t-bold-400">Регистрация</h1>-->
			<form class="authorize-form">
				<input type="text" id="login" placeholder="Логин">
				<input type="text" id="mail" placeholder="E-mail">
				<input type="password" id="pas1" placeholder="Пароль">
				<input type="password" id="pas2" placeholder="Повтор пароля">
				<input type="tel" id="phone" placeholder="Телефон">
				<input type="text" id="code" placeholder="СМС КОД">
				<span>Уже есть аккаунт? <a href="?authorization">Войдите</a></span>
				<button class="btn auth-btn" onclick="event.preventDefault();chekRegF()" id="regCode">Получить СМС КОД</button>
			</form>
		</div>
		<div class="info">
			<p>Вы находитесь в демо версии кабинета. Находите и фиксируйте баги и ошибки скриншотом, после чего с описанием отправляйте факт ошибки в наш телеграм чат <a href="https://t.me/onecli_fix">@onecli_fix</a></p>
		</div>
	</div>
	
	
	
	<script>
	
	
///регистрация
function chekRegF(){
  if($('#login').val() == ""){
    openF("Внимание!","Укажите желаемый логин");
  }else if($('#mail').val() == "" || !validateEmail($('#mail').val())){
    openF("Внимание!","Укажите Ваш действующии E-mail");
  }else if($('#pas1').val() == "" || $('#pas1').val().length < 5){
    openF("Внимание!","Укажите пароль длиной не меньше 5 символов");
  }else if($('#pas2').val() == "" || $('#pas1').val() != $('#pas2').val()){
    openF("Внимание!","Повторный пароль не совпадает с паролем указанным выше");
  }else{
    $.ajax({
      type: "POST",
      url: "php/registration.php",
      data: {login:$('#login').val(),
	  mail:$('#mail').val(),
	  tel:$('#phone').val(),
	  pas:$('#pas1').val(),
	  code:$('#code').val(),
	  refferal:ref
	  }
    }).done(function( result ){
      if(result == "done"){
		document.getElementById('regCode').innerHTML = "Зарегистрироваться";
        openF("Внимание!","На указанный номер телефона был отправлен код. Вам нужно его ввести и завершить регистрацию. Если код не придет в течении 5 минут, свяжитесь с тех. поддержкой указав свой Логин, E-mail и номер телефона.");
	  }else if(result == "done2"){
        openF("Внимание!","Ваш аккаунт зарегистрирован! Поздравляем! Теперь Вы можете войти в личный кабинет закрыв данное окно.");
	  }else  if(result == "error"){
        openF("Ошибка!","Что-то пошло не так. Просьба связаться с тех. поддержкой указав свой Логин, E-mail и номер телефона.");
	  }else  if(result == "nope"){
        openF("Ошибка!","Ваши данные уже в системе. Просьба связаться с тех. поддержкой указав свой Логин, E-mail и номер телефона.");
	  }
    });
  }
}
	
///почта
function validateEmail(email) {
  const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}
	
	</script>
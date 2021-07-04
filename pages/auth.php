
	<div class="back">
		<div class="authorize">
			<img src="images/signin/logo-sm.png" alt="logo" width="143px">
			<form class="authorize-form">
				<input type="text" id="mailAuth" placeholder="E-mail">
				<input type="password" id="pasAuth" placeholder="Пароль">
				<span>Впервые здесь? <a href="?registration">Зарегистрируйтесь</a></span>
				<button class="btn auth-btn" onclick="event.preventDefault();authF()">Войти</button>
			</form>
		</div>
		<div class="info">
			<p>Вы находитесь в демо версии кабинета. Находите и фиксируйте баги и ошибки скриншотом, после чего с описанием отправляйте факт ошибки в наш телеграм чат <a href="https://t.me/onecli_fix">@onecli_fix</a></p>
		</div>
	</div>


<script>

///авторизация
function authF(){
  if($('#mailAuth').val() == "" || !validateEmail($('#mailAuth').val())){
    openF("Внимание!","Укажите Ваш действующии E-mail");
  }else if($('#pasAuth').val() == "" || $('#pasAuth').val().length < 5){
    openF("Внимание!","Укажите пароль длиной не меньше 5 символов");
  }else{
    $.ajax({
      type: "POST",
      url: "php/auth.php",
      data: {mail:$('#mailAuth').val(),
	  pas:$('#pasAuth').val()
	  }
    }).done(function( result ){
      if(result == "nope"){
        openF("Ошибка!","Указанные данные не верны. Если Вы уверены в корректности введённых данных, обратиесь в тех. поддержку.");
	  }
      if(result == "done"){
        window.location.href = "?account";
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
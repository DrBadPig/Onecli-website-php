<?php
  include('php/fig_con.php');
  $ses = $_SESSION['ses'];
  
  $userstable = "users"; 
  $connection = mysqli_connect($hostname,$username,$password,$dbName) OR DIE("Ошибка"); 
  mysqli_query($connection,"set names utf8");  
  
  $prov = "SELECT * FROM $userstable where session = '$ses'";
  $res = mysqli_query($connection,$prov);
  $numberkk = mysqli_num_rows($res);
  if($numberkk == 0){ 
    $ses = 0;
  }else{
    while ($row=mysqli_fetch_array($res)) { 
      $id = $row['id'];
      $login = $row['login'];
      $tel = $row['mobile'];
      $email = $row['email'];
    }	

    $prov = "SELECT * FROM user_info where uid = '$id'";
    $res = mysqli_query($connection,$prov);
    $numberkk = mysqli_num_rows($res);
    if($numberkk == 0){ 
	  $ava = "oneclickimgava.jpg";
	}else{
      while ($row=mysqli_fetch_array($res)) { 
	    if($row['ava'] == "0"){
	      $ava = "oneclickimgava.jpg";
		}else{
          $ava = $login.".jpg?".time();
		}
        $_SESSION['ava'] = $ava;
        $_SESSION['name'] = $login;
		
        $fname = $row['name'];
        $about = $row['about'];
        $work = $row['position'];
        $vk = $row['vk'];
        $fb = $row['fb'];
        $inst = $row['insta'];
        $tg = $row['telegramm'];
		
        $payeer = $row['payeer'];
        $perfect = $row['perfect'];
        $bank = $row['bank'];
        $qiwi = $row['qiwi'];
        $yadm = $row['yadm'];
        $adv = $row['adv'];
        $bitcoin = $row['bitcoin'];
		
		$spr = true;
		if($payeer == "" && $perfect == "" && $bank == "" && $qiwi == "" && $yadm == "" && $adv == "" && $bitcoin == ""){
		  $spr = false;
		}
      }	
	}
  }
  mysqli_close($connection);
?>



<!--MAIN CONTENT-->
	<main class="main-content">
		<h1 class="t-main hidden">Настройки</h1>
		
		<!--SETTINGS INFO-->
		<div class="settings-info container">
			<div class="div-flex df-center">
				<svg xmlns="http://www.w3.org/2000/svg" width="161" height="4" viewBox="0 0 161 4">
					<rect width="161" height="4" rx="2" fill="#34c28d"/>
				</svg>
			</div>
			<div class="settings-info-wrapper">
				<h2 class="t-white t-uppercase t-size-22 t-bold-400">Настройка аккаунта</h2>
				<span class="t-main t-uppercase t-size-16">Внимание!</span>
				<p class="t-black t-size-14">Для получения и активации личного сайта Onecli. необходимо обязательно заполнить следующие информационные блоки:</p>
				<p class="t-black t-size-14">1. Аватарка;<br>2. Общая информация;<br>3. Социальные сети.</p>
				<p class="t-black t-size-14">Если какой либо из блоков не будет заполнен или в них будет введена недостоверная информация - личный сайт Onecli. активирован не будет. </p>
				<p class="t-black t-size-14">Личный сайт позволит многократно увеличить статистику вашего заработка и поднять общую конверсию вашего развития в компании. Маркетологи Onecli. полностью продумали структуру, психологию поведения пользователей и концепцию сайта, в связи с чем новые участники будут быстро знакомиться с продуктом и принимать решение зарегистрироваться на платформе Onecli. в вашу команду. </p>
				<div class="pws-info div-flex df-center">
					<span class="t-white">Ссылку на сайт вы можете получить в разделе <span class="t-main">"Моя команда"</span>.</span>
				</div>
			</div>
		</div>
		
		<!--USER INFO-->
		<div class="user-info-section container">
			<!--PROFILE INFO-->
			<div class="profile-info container">
				<div id="photo-section" class="photo-section div-flex df-col df-spaceb">
		          <form method="post" enctype="multipart/form-data">
	                <label for="uploadava">
					<svg xmlns="http://www.w3.org/2000/svg" width="66" height="33" viewBox="0 0 66 33">
  						<g transform="translate(-514 -582)">
    						<path d="M66,33A33,33,0,0,1,0,33Z" transform="translate(514 549)" fill="#34c28d"/>
    						<g transform="translate(535.686 586.426)">
      							<g transform="translate(2.314 0.574)">
        							<g>
          								<path d="M16.27,5.474H13.933L12.584,4H8.16V5.474h3.775l1.349,1.474H16.27V15.8H4.474V9.16H3V15.8A1.479,1.479,0,0,0,4.474,17.27h11.8A1.479,1.479,0,0,0,17.744,15.8V6.949A1.479,1.479,0,0,0,16.27,5.474Z" transform="translate(-0.788 -1.788)" fill="#fff"/>
          								<path d="M8,12.686A3.686,3.686,0,1,0,11.686,9,3.687,3.687,0,0,0,8,12.686Zm3.686-2.212a2.212,2.212,0,1,1-2.212,2.212A2.218,2.218,0,0,1,11.686,10.474Z" transform="translate(-2.102 -3.102)" fill="#fff"/>
          								<path d="M3.686,4.686H5.9V3.212H3.686V1H2.212V3.212H0V4.686H2.212V6.9H3.686Z" transform="translate(0 -1)" fill="#fff"/>
        							</g>
      							</g>
    						</g>
						</g>
					</svg></label>
		            <input type="file" name="upload" id="uploadava" style="opacity: 0;position: absolute;z-index: -1;" onChange="loa(this)">
		          </form>
					<div class="user-login div-flex-two">
						<input type="text" id="fName">
					</div>
				</div>
				<div class="profile-info-wrapper t-bold-300">
				<div class="photo-disclaimer">
                        <p>Изображение должно быть формата .JPG или .PNG. Максимальный размер: 2 мб.</p>
                    </div>
					<div class="user-about-section">
						<div class="div-flex df-spaceb">
							<span class="t-uppercase">Должность:</span>
							<div>
								<input type="text" id="work">
							</div>
						</div>
						<div class="div-flex df-spaceb">
							<span class="t-uppercase">О себе:</span>
							<textarea class="text-area t-bold-300" id="about" wrap="soft"></textarea>
						</div>
					</div>
					<div class="user-socials">
						<div class="user-socials-header">
							<span class="t-main t-uppercase t-size-14">Внимание!</span>
							<span class="t-size-12">Адрес соц. сетей вводить с префиксом https://</span>
						</div>
						<div class="user-socials-list">
							<div class="div-flex-two">
								<span class="t-uppercase">Vk.com</span>
								<input type="text" id="vk">
							</div>
							<div class="div-flex-two">
								<span class="t-uppercase">Instagram</span>
								<input type="text" id="inst">
							</div>
							<div class="div-flex-two">
								<span class="t-uppercase">Facebook</span>
								<input type="text" id="fb">
							</div>
							<div class="div-flex-two">
								<span class="t-uppercase">Telegram</span>
								<input type="text" id="tg">
							</div>
						</div>
					</div>
					<button class="btn" onclick="saveAbout();">Сохранить</button>
				</div>
			</div>
			<!--ACCOUNT INFO-->
			<div class="account-info container">
				<h2 class="t-uppercase t-bold-400 t-white t-size-16">Техническая информация</h2>
				<div class="main-account-info t-bold-300">
					<div class="div-flex-two">
						<span class="t-black t-uppercase">Логин:</span>
						<span class="t-darkgray" id="login"></span>
					</div>
					<hr width="90%">
					<div class="div-flex-two">
						<span class="t-black t-uppercase">Email:</span>
						<span class="t-darkgray" id="email"></span>
					</div>
					<hr width="90%">
					<div class="div-flex-two">
						<span class="t-black t-uppercase">Тел:</span>
						<span class="t-darkgray" id="tel"></span>
					</div>
					<hr width="90%">
					<div class="div-flex-two">
						<span class="t-black t-uppercase">Уведомления по электронной почте:</span>
						<label class="switch">
  							<input type="checkbox">
  							<span class="slider round"></span>
						</label>
					</div>
					<hr width="90%">
					<div class="div-flex-two df-col">
						<span class="t-black t-size-12 t-uppercase">Уникальный код для участия в игре и подключения бота:</span>
						<p class="t-white t-size-12 t-uppercase t-bold-300 t-center">iqBtXJaQn6wx1mHc4_zIudM0lP39fK8-</p>
					</div>
				</div>
				<div class="password-change t-bold-300">
					<h3 class="t-uppercase t-bold-300 t-size-16">Изменение пароля</h3>
					<div class="div-flex-two">
						<span class="t-size-14">Код из смс:</span>
						<span class="send-sms t-size-14 t-main" onclick="resSmsF()">Выслать код на номер</span>
					</div>
					<div class="sms-code div-flex-two pass">
						<input type="text" id="codere" style="width:30%">
						<span class="send-sms t-size-14 t-darkgray" id="codeTmr">Код действителен ещё <span>180</span> сек.</span>
					</div>
					<div class="div-flex-two">
						<span class="t-size-14">Новый пароль:</span>
					</div>
					<div class="password-input-div div-flex-two pass" >
						<input type="password" id="pas1re">
						<div class="div-flex df-center" onclick="seePas('pas1re')">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
  								<g>
    								<path d="M0,0H24V24H0Z" fill="none"/>
  								</g>
  								<g>
    								<g>
      								<path d="M12,6.5A9.77,9.77,0,0,1,20.82,12,9.822,9.822,0,0,1,3.18,12,9.77,9.77,0,0,1,12,6.5m0-2A11.827,11.827,0,0,0,1,12a11.817,11.817,0,0,0,22,0A11.827,11.827,0,0,0,12,4.5Z" fill="#232733"/>
      								<path d="M12,9.5A2.5,2.5,0,1,1,9.5,12,2.5,2.5,0,0,1,12,9.5m0-2A4.5,4.5,0,1,0,16.5,12,4.507,4.507,0,0,0,12,7.5Z" fill="#232733"/>
    								</g>
  								</g>
							</svg>
						</div>
					</div>
					<div class="div-flex-two">
						<span class="t-size-14">Повтор пароля:</span>
					</div>
					<div class="password-input-div div-flex-two pass" >
						<input type="password" id="pas2re">
						<div class="div-flex df-center" onclick="seePas('pas2re')">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
  								<g>
    								<path d="M0,0H24V24H0Z" fill="none"/>
  								</g>
  								<g>
    								<g>
      								<path d="M12,6.5A9.77,9.77,0,0,1,20.82,12,9.822,9.822,0,0,1,3.18,12,9.77,9.77,0,0,1,12,6.5m0-2A11.827,11.827,0,0,0,1,12a11.817,11.817,0,0,0,22,0A11.827,11.827,0,0,0,12,4.5Z" fill="#232733"/>
      								<path d="M12,9.5A2.5,2.5,0,1,1,9.5,12,2.5,2.5,0,0,1,12,9.5m0-2A4.5,4.5,0,1,0,16.5,12,4.507,4.507,0,0,0,12,7.5Z" fill="#232733"/>
    								</g>
  								</g>
							</svg>
						</div>
					</div>
		            <button class="btn" onclick="resPass()">Сохранить</button>
				</div>
				<div class="payments t-bold-300">
					<h3 class="t-uppercase t-bold-300 t-size-16">Платежные реквизиты</h3>
					<div class="payments-list">
					<?php
	  if($spr){
		$reads = "readonly";
	  }else{
		  $reads = "";
	  }
	  ?>
	  
	  
						<div class="div-flex-two">
							<span class="">AdvCash кошелек:</span>
							<input type="text" <?= $reads ?> placeholder="Не указано" id="advc">
						</div>
						<div class="div-flex-two">
							<span class="">Bitcoin кошелек:</span>
							<input type="text" <?= $reads ?> placeholder="Не указано" id="btc">
						</div>
						<div class="div-flex-two">
							<span class="">Payeer кошелек:</span>
							<input  type="text" <?= $reads ?> placeholder="Не указано" id="payeer">
						</div>
						<div class="div-flex-two">
							<span class="">QIWI кошелек:</span>
							<input  type="text" <?= $reads ?> placeholder="Не указано" id="qiwi">
						</div>
						<div class="div-flex-two">
							<span>Perfect Money:</span>
							<input  type="text" <?= $reads ?> placeholder="Не указано" id="perfectmoney">
						</div>
						<div class="div-flex-two">
							<span>Банковская карта:</span>
							<input  type="text" <?= $reads ?> placeholder="Не указано" id="bank">
						</div>
						<div class="div-flex-two">
							<span>Яндекс.Деньги:</span>
							<input  type="text" <?= $reads ?> placeholder="Не указано" id="yadm">
						</div>
					</div>
					<div class="warning div-flex df-center">
						<p class="t-white">Внимательно проверяйте и указывайте свои реквизиты, поскольку последующее редактирование возможно только через техническую поддержку.</p>
					</div>
				</div>
	<?php
	  if(!$spr){
		echo '<button class="btn" onclick="reqSave()">Сохранить</button>';
	  }
	  ?>
				
			</div>
		</div>
		
	</main>
	
	
	
	
	
  
  
<script>

///
<?php
  echo 'document.getElementById("photo-section").style.backgroundImage = "url(\"avatars/'.$ava.'\")";'.PHP_EOL;
  echo 'document.getElementById("login").innerHTML = "'.$login.'";'.PHP_EOL;
  echo 'document.getElementById("email").innerHTML = "'.$email.'";'.PHP_EOL;
  echo 'document.getElementById("tel").innerHTML = "'.$tel.'";'.PHP_EOL;
  
  echo 'document.getElementById("fName").value = "'.$fname.'";'.PHP_EOL;
  echo 'document.getElementById("work").value = "'.$work.'";'.PHP_EOL;
  echo 'document.getElementById("about").value = "'.$about.'";'.PHP_EOL;
  echo 'document.getElementById("vk").value = "'.$vk.'";'.PHP_EOL;
  echo 'document.getElementById("fb").value = "'.$fb.'";'.PHP_EOL;
  echo 'document.getElementById("tg").value = "'.$tg.'";'.PHP_EOL;
  echo 'document.getElementById("inst").value = "'.$inst.'";'.PHP_EOL;
  
  if($payeer != ""){
    echo 'document.getElementById("payeer").style.background = "#34C38D";'.PHP_EOL;
    echo 'document.getElementById("payeer").value = "'.$payeer.'";'.PHP_EOL;
  }
  if($perfect != ""){
    echo 'document.getElementById("perfectmoney").style.background = "#34C38D";'.PHP_EOL;
    echo 'document.getElementById("perfectmoney").value = "'.$perfect.'";'.PHP_EOL;
  }
  if($bank != ""){
    echo 'document.getElementById("bank").style.background = "#34C38D";'.PHP_EOL;
    echo 'document.getElementById("bank").value = "'.$bank.'";'.PHP_EOL;
  }
  if($qiwi != ""){
    echo 'document.getElementById("qiwi").style.background = "#34C38D";'.PHP_EOL;
    echo 'document.getElementById("qiwi").value = "'.$qiwi.'";'.PHP_EOL;
  }
  if($yadm != ""){
    echo 'document.getElementById("yadm").style.background = "#34C38D";'.PHP_EOL;
    echo 'document.getElementById("yadm").value = "'.$yadm.'";'.PHP_EOL;
  }
  if($adv != ""){
    echo 'document.getElementById("advc").style.background = "#34C38D";'.PHP_EOL;
    echo 'document.getElementById("advc").value = "'.$adv.'";'.PHP_EOL;
  }
  if($bitcoin != ""){
    echo 'document.getElementById("btc").style.background = "#34C38D";'.PHP_EOL;
    echo 'document.getElementById("btc").value = "'.$bitcoin.'";'.PHP_EOL;
  }

  if($ses == "0"){
	echo 'window.location.href = "https://onecli.biz";';
  }
?>


var xhr=new XMLHttpRequest(),form=new FormData();
function loa(ev)
{
    xhr.open("POST","php/avaloader.php",true);
    form.append("upload",ev.files[0]);
    xhr.send(form); 
}
xhr.onload=function()
{
  if(xhr.response.split(".jpg").length != "2"){
    openF("Ошибка!",xhr.response);
  }else{
    document.getElementById("photo-section").style.backgroundImage = 'url("avatars/'+xhr.response+'?'+Math.random()+'")';
	//document.getElementById("avamini").src = "avatars/"+xhr.response;
  }
}


///о себе
function saveAbout(){
  if($('#fName').val() != ""){
    $.ajax({
      type: "POST",
      url: "php/about.php",
      data: {fname:$('#fName').val(),
	  about:$('#about').val(),
	  work:$('#work').val(),
	  vk:$('#vk').val(),
	  fb:$('#fb').val(),
	  tg:$('#tg').val(),
	  inst:$('#inst').val()
	  }
    }).done(function( result ){
      if(result == "nope"){
        openF("Ошибка!","Ваша сессия была изменена. Повторите авторизацию");
	  }else{
        openF("Внимание!","Ваши данные были обновлены");
	  }
    });
  }else{
    openF("Ошибка!","Указанные свое имя.");
  }
}

<?php
  if(!$spr){
    echo "function reqSave(){if($('#payeer').val() == '' && $('#perfectmoney').val() == '' && $('#bank').val() == '' && $('#qiwi').val() == '' && $('#yadm').val() == '' && $('#advc').val() == '' && $('#btc').val() == ''){";
    echo 'openF("Ошибка!","Укажите хотя бы один платежный реквизит для сохранения данных");';
    echo "}else{";
    echo '$.ajax({type: "POST",url: "php/reqSave.php",data: {payeer:$("#payeer").val(),perfectmoney:$("#perfectmoney").val(),bank:$("#bank").val(),qiwi:$("#qiwi").val(),yadm:$("#yadm").val(), advc:$("#advc").val(),btc:$("#btc").val()}';
    echo '}).done(function( result ){if(result == "nope"){';
    echo 'openF("Ошибка!","Ваша сессия была изменена. Повторите авторизацию");';
    echo '}else{window.location.href = "?account";}});}}';
  }
?>


///смс для сброса
var sec = 180;
var secB = true;
var sint;

function resPass(){
  if($('#pas1re').val() == ""){
    openF("Ошибка!","Укажите новый пароль.");
  }else if($('#pas1re').val().length < 5){
    openF("Внимание!","Укажите пароль длиной не меньше 5 символов");
  }else if($('#pas2re').val() == ""){
    openF("Ошибка!","Повторите новый пароль.");
  }else if($('#pas1re').val() != $('#pas2re').val()){
    openF("Ошибка!","Пароли не совпадают");
  }else  if($('#codere').val() == ""){
    openF("Ошибка!","Укажите SMS код");
  }else{ 
    $.ajax({
      type: "POST",
      url: "php/resPas.php",
      data: {
		coder: $('#codere').val(),
		pas: $('#pas1re').val()
	  }
    }).done(function( result ){
      if(result == "nope"){
        openF("Ошибка!","Ваша сессия была изменена. Повторите авторизацию");
	  }else if(result == "nosms"){
        openF("Ошибка!","Неверный SMS код");
	  }else if(result == "done"){
        openF("Внимание!","Пароль был обновлён. Перезайдите в личный кабинет для корректной работы.");
		 setTimeout(function(e){
	       window.location.href = "https://onecli.biz";
		 },10000);
	  }
    });
  }
}

function resSmsF(){
  if(!secB){
    openF("Ошибка!","Дождитесь окончания действия смс кода");
  }else if($('#pas1re').val() == ""){
    openF("Ошибка!","Укажите новый пароль.");
  }else if($('#pas1re').val().length < 5){
    openF("Внимание!","Укажите пароль длиной не меньше 5 символов");
  }else if($('#pas2re').val() == ""){
    openF("Ошибка!","Повторите новый пароль.");
  }else if($('#pas1re').val() != $('#pas2re').val()){
    openF("Ошибка!","Пароли не совпадают");
  }else{
    clearInterval(sint);
    $.ajax({
      type: "POST",
      url: "php/resSms.php",
      data: {}
    }).done(function( result ){
      if(result == "nope"){
        openF("Ошибка!","Ваша сессия была изменена. Повторите авторизацию");
	  }else if(result == "notime"){
        openF("Внимание!","До новой отправки SMS кода необходимо подождать несколько минут.");
	  }else if(result == "smsError"){
        openF("Ошибка!","Произошла ошибка при отправке SMS. Пожалуйста свяжитесь с тех. поддержкой.");
	  }else if(result == "done"){
        openF("Внимание!","SMS код был отправлен.");
		secB = false;
        sint = setInterval(function() {
		  sec--;
		  sc = sec;
		  if(sc < 10){
			sc = "0"+sc;
		  }
		  document.getElementById("codeTmr").innerHTML = "Код действителен ещё <span>"+sc+"</span> сек.";
		  
		  if(sec <= 0){
			sec = 180;
			secB = true;
			clearInterval(sint);
		    document.getElementById("codeTmr").innerHTML = "Можно запросить SMS код";
		  }
        }, 1000);
	  }
    });
  }
}



function seePas(str){
  if(document.getElementById(str).type == "password"){
    document.getElementById(str).type = "text";
  }else{
    document.getElementById(str).type = "password";
  }	
}

</script>

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
  }
  $balance = rand(15025, 36811)/100;
  $balance2 = rand(652153, 1012896)/100;
  $reit = rand(5,10);
  $team = number_format(rand(1699,3456), 0, ',', ' ');
  $shract = number_format(rand(565651, 1523446), 0, ',', ' ');
  $shract_s = number_format(rand(1523664, 3540034), 0, ',', ' ');
  $prc = rand(15694362,35856655);
  $prc_s = number_format(rand(2727100, 5858734)/100, 2, ',', ' ');
  
?>



	<div id="modals_backgorund" style="display: none;" class="modals">
		<!--SEND SHARES MODAL-->
		<div id="send_shares" style="display: none;" class="modal-send df-col">
			<!-- main content -->
			<div class="modal-send-wrapper div-flex df-col df-spacea">
				<!-- close button -->
				<div class="modal-close-button" onclick="off_send_shares()">
					<svg xmlns="http://www.w3.org/2000/svg" width="14.798" height="14.798" viewBox="0 0 14.798 14.798">
  						<g transform="translate(0.707 0.707)">
    						<line x2="13.384" y2="13.384" fill="none" stroke="#fff" stroke-width="2"/>
    						<line x1="13.384" y2="13.384" fill="none" stroke="#fff" stroke-width="2"/>
  						</g>
					</svg>			
				</div>
				<h2 class="t-uppercase t-size-16 t-bold-300">Отправить доли другу</h2>
				<div class="modal-your-balance div-flex-two t-white t-bold-300">
					<span class="t-size-20">Ваши доли:</span>
					<div>
						<span class="t-size-25">65 456</span>
						<svg xmlns="http://www.w3.org/2000/svg" width="3" height="34" viewBox="0 0 3 34">
  							<path d="M0,0V34" transform="translate(1.5)" fill="none" stroke="#fff" stroke-width="3"/>
						</svg>

					</div>
				</div>
				<input type="text" placeholder="Введите логин получателя:">
				<input type="text" placeholder="Введите email получателя:">
				<input type="text" placeholder="Введите количество долей:">
				<div class="modal-send-sms div-flex-two">
					<button class="btn">Получить СМС для подтверждения</button>
					<input type="text" placeholder="Введите код из СМС">
				</div>
				<div class="modal-timer div-flex-two">
					<div class="modal-timer-wrapper div-flex-two">
						<span>Секунд осталось:</span>
						<div class="seconds">
							<span>30</span>
						</div>
					</div>
					<div class="div-flex df-col df-ali-left t-bold-300">
						<span class="t-gray">Не пришло СМС?</span>
						<span class="t-darkgray">Нажмите, чтобы запросить ещё раз.</span>
					</div>
				</div>
				<button class="btn modal-accept-btn disabled">Подтвердить</button>
			</div>
			<div class="modal-send-shares-footer div-flex df-center df-col t-size-16 t-bold-300">
				<span class="t-error hidden">Неверный код из СМС, повторите попытку</span>
				<span class="t-main">СМС отправлено</span>
				<span class="t-black">Ожидайте от <span class="t-main">1</span> секунды до <span class="t-main">5</span> минут.</span>
			</div>
		</div>
		
		<!--SEND BALANCE MODAL-->
		<div id="send_balance" style="display: none;" class="modal-send df-col">
			<!--SEND BALANCE TO A FRIEND SECTION-->
			<div id="modal_send_balance" style="display: none;" class="modal-send-wrapper div-flex df-col df-spacea">
				<div class="modal-close-button" onclick="off_send_balance()">
					<svg xmlns="http://www.w3.org/2000/svg" width="14.798" height="14.798" viewBox="0 0 14.798 14.798">
  						<g transform="translate(0.707 0.707)">
    						<line x2="13.384" y2="13.384" fill="none" stroke="#fff" stroke-width="2"/>
    						<line x1="13.384" y2="13.384" fill="none" stroke="#fff" stroke-width="2"/>
  						</g>
					</svg>			
				</div>
				<span class="t-uppercase t-gray t-bold-300"><span class="t-main">Отправить Баланс другу</span> | <span onclick="send_reinvest()">Реинвест</span></span>
				<div class="modal-your-balance div-flex-two t-white t-bold-300">
					<span class="t-size-20">Ваш баланс:</span>
					<div>
						<span class="t-size-25">24 548$</span>
						<svg xmlns="http://www.w3.org/2000/svg" width="3" height="34" viewBox="0 0 3 34">
  							<path d="M0,0V34" transform="translate(1.5)" fill="none" stroke="#fff" stroke-width="3"/>
						</svg>

					</div>
				</div>
				<input type="text" placeholder="Введите логин получателя:">
				<input type="text" placeholder="Введите email получателя:">
				<input type="text" placeholder="Введите количество долей:">
				<div class="modal-send-sms div-flex-two">
					<button class="btn">Получить СМС для подтверждения</button>
					<input type="text" placeholder="Введите код из СМС">
				</div>
				<div class="modal-timer div-flex-two">
					<div class="modal-timer-wrapper div-flex-two">
						<span>Секунд осталось:</span>
						<div class="seconds">
							<span>30</span>
						</div>
					</div>
					<div class="div-flex df-col df-ali-left t-bold-300">
						<span class="t-gray">Не пришло СМС?</span>
						<span class="t-darkgray">Нажмите, чтобы запросить ещё раз.</span>
					</div>
				</div>
				<button class="btn modal-accept-btn disabled">Подтвердить</button>
			</div>
			
			<!--REINVEST SECTION-->
			<div id="modal_reinvest" class="modal-send-wrapper modal-send-reinvest div-flex df-col df-spacea">
				<div class="modal-close-button" onclick="off_send_balance()">
					<svg xmlns="http://www.w3.org/2000/svg" width="14.798" height="14.798" viewBox="0 0 14.798 14.798">
  						<g transform="translate(0.707 0.707)">
    						<line x2="13.384" y2="13.384" fill="none" stroke="#fff" stroke-width="2"/>
    						<line x1="13.384" y2="13.384" fill="none" stroke="#fff" stroke-width="2"/>
  						</g>
					</svg>			
				</div>
				<span class="t-uppercase t-gray t-bold-300"><span onclick="send_friend()">Отправить Баланс другу</span> | <span class="t-main">Реинвест</span></span>
				<div class="modal-your-balance div-flex-two t-white t-bold-300">
					<span class="t-size-20">Ваш баланс:</span>
					<div>
						<span class="t-size-25">24 548$</span>
						<svg xmlns="http://www.w3.org/2000/svg" width="3" height="34" viewBox="0 0 3 34">
  							<path d="M0,0V34" transform="translate(1.5)" fill="none" stroke="#fff" stroke-width="3"/>
						</svg>
					</div>
				</div>
				<input type="text" placeholder="Введите сумму реинвеста:">
				
				<div class="modal-share-info div-flex-two">
					<span class="t-bold-300">Текущая цена доли:</span>
					<div class="active-back share-price div-flex-two">
						<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
  							<circle cx="5" cy="5" r="5" fill="#fff"/>
						</svg>
						<span class="t-white">0.01544125$</span>
					</div>
				</div>
				<div class="modal-share-info div-flex-two">
					<span class="t-bold-300">Долей на приобретение:</span>
					<div class="inactive-back shares-to-buy div-flex-two">
						<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
  							<circle cx="5" cy="5" r="5" fill="#fff"/>
						</svg>
						<span class="t-white">72</span>
					</div>
				</div>
				
				<div class="modal-send-sms div-flex-two">
					<button class="btn">Получить СМС для подтверждения</button>
					<input type="text" placeholder="Введите код из СМС">
				</div>
				<div class="modal-timer div-flex-two">
					<div class="modal-timer-wrapper div-flex-two">
						<span>Секунд осталось:</span>
						<div class="seconds">
							<span>30</span>
						</div>
					</div>
					<div class="div-flex df-col df-ali-left t-bold-300">
						<span class="t-gray">Не пришло СМС?</span>
						<span class="t-darkgray">Нажмите, чтобы запросить ещё раз.</span>
					</div>
				</div>
				<button class="btn modal-accept-btn disabled">Сделать реинвест</button>
			</div>
			<div class="modal-send-shares-footer div-flex df-center df-col t-size-16 t-bold-300">
				<span class="t-error hidden">Неверный код из СМС, повторите попытку</span>
				<span class="t-main">СМС отправлено</span>
				<span class="t-black">Ожидайте от <span class="t-main">1</span> секунды до <span class="t-main">5</span> минут.</span>
			</div>
		</div>
		
		<!--PAYMENT SYSTEMS-->
		<div id="send_pay" style="display: none;" class="modal-payment">
			<h2 class="t-main t-uppercase t-size-20 t-bold-400 t-center">Onecli.</h2>
			<div class="modal-close-button">
				<svg xmlns="http://www.w3.org/2000/svg" width="14.798" height="14.798" viewBox="0 0 14.798 14.798">
  					<g transform="translate(0.707 0.707)">
    					<line x2="13.384" y2="13.384" fill="none" stroke="#fff" stroke-width="2"/>
    					<line x1="13.384" y2="13.384" fill="none" stroke="#fff" stroke-width="2"/>
  					</g>
				</svg>
			</div>
			<div class="enter-sum-section div-flex-two">
				<input type="text" placeholder="Введите сумму для покупки..">
				<div>
					<div class="div-flex">
						<span class="t-white t-bold-300">0 долей</span>
					</div>
				</div>
			</div>
			<div class="payment-block">
				<div class="payment"></div>
				<div class="payment"></div>
				<div class="payment"></div>
				<div class="payment"></div>
				<div class="payment"></div>
				<div class="payment"></div>
				<div class="payment"></div>
				<div class="payment"></div>
				<div class="payment"></div>
				<div class="payment"></div>
			</div>
		</div>
	</div>
		
		
			<!--MAIN CONTENT-->
	<main class="main-content">
		<h1 class="t-main hidden">Инвестиции в Onecli.</h1>
		
		<!--SHARES INFO-->
		<div class="shares-info div-flex df-spaceb container">
			<div class="si-block light-green"  onclick="send_balance()">
				<span>Баланс</span>
				<span class="value"><?php echo $balance; ?>$</span>
			</div>
			<div class="si-block green">
				<span>Всего заработано</span>
				<span class="value"><?php echo $balance2; ?>$</span>
			</div>
			<div class="si-block green">
				<span>Команда</span>
				<span class="value"><?php echo $team; ?></span>
			</div>
			<div class="si-block green">
				<span>Мой рейтинг</span>
				<span class="value"><?php echo $reit; ?></span>
			</div>
			<div class="si-block gray">
				<span>Мои активные доли</span>
				<span class="value"><?php echo $shract; ?></span>
			</div>
			<div class="si-block gray">
				<span>Цена за долю</span>
				<span class="value"><?php echo "0.".$prc; ?>$</span>
			</div>
			<div class="si-block gray">
				<span>Осталось долей</span>
				<span class="value"><?php echo $shract_s; ?></span>
			</div>
			<div class="si-block gray">
				<span>Всего инвестировано</span>
				<span class="value"><?php echo $prc_s; ?>$</span>
			</div>
		</div>
		
		<!--SEND SHARES TO A FRIEND BUTTON-->
		<div class="send-shares-btn container div-flex df-spaceb" onclick="send_shares()">
			<svg class="ssf-decor-left" xmlns="http://www.w3.org/2000/svg" width="275.906" height="35.269" viewBox="0 0 275.906 35.269">
  				<path d="M274.717,8.9H7.748S3.514,8.691,1.4,10.879-.689,17.651-.689,17.651v26" transform="translate(1.19 -8.383)" fill="none" stroke="#34c28d" stroke-width="1"/>
			</svg>
			<svg class="ssf-circle" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
  				<circle cx="7.5" cy="7.5" r="7.5" fill="#34c28d"/>
			</svg>
			<span class="t-main t-uppercase">Отправить доли другу</span>
			<svg class="ssf-circle" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
  				<circle cx="7.5" cy="7.5" r="7.5" fill="#34c28d"/>
			</svg>
			<svg class="ssf-decor-right" xmlns="http://www.w3.org/2000/svg" width="275.906" height="35.269" viewBox="0 0 275.906 35.269">
  				<path d="M-.689,43.646H266.279s4.234.21,6.344-1.978,2.094-6.772,2.094-6.772V8.9" transform="translate(0.689 -8.896)" fill="none" stroke="#34c28d" stroke-width="1"/>
			</svg>
		</div>
		
		<!--BRIEF IDEA SECTION-->
		<div class="idea-brief-about container">
			<div class="idea-brief-about-wrapper">
				<h2 class="t-white t-uppercase">Инвестиции в стартап onecli.com</h2>
				<p class="t-white">Инвестируя в стартап Onecli на ранней стадии развития Вы становитесь официальным владельцем долей стартапа и сможете ежемесячно получать постоянно растущую прибыль от общего дохода ведущей компании. Приобретенные доли в процессе развития будут расти в цене, которые впоследствии можно будет продать другим участникам по более высокой цене или оставить на балансе для дальнейшего получения прибыли от компании. <br> Все этапы разработки стартапа будут публичны и Вы также сможете принимать в этом участие. Обеспечьте себе успешное вместе с Onecli.</p>
				<button class="btn" onclick="document.location.replace('?idea');">Читать идею ONECLI. | Предложение</button>
			</div>
		</div>
		
		<!--MAIN PROJECT INFO-->
		<div class="main-info-brief container">
			<div class="main-info-brief-wrapper">
				<div class="info-line">
					<span class="left-info">Направление стартапа:</span>
					<span class="right-info">Валютный аукцион, P2P биржа, Нетворкинг</span>
				</div>
				<div class="info-line">
					<span class="left-info">Выход Beta-версии продукта:</span>
					<span class="right-info">Третий квартал 2019</span>
				</div>
				<div class="info-line">
					<span class="left-info">Страна регистрации:</span>
					<span class="right-info">Великобритания</span>
				</div>
				<div class="info-line">
					<span class="left-info">Валюта стартапа:</span>
					<span class="right-info">Внутренняя валюта "ONX"</span>
				</div>
				<div class="info-line">
					<span class="left-info">Язык стартапа:</span>
					<span class="right-info">Мультиязычный</span>
				</div>
				<div class="info-line">
					<span class="left-info">Тип инвестирования (1 этап):</span>
					<span class="right-info">Краудинвестинг</span>
				</div>
				<div class="info-line">
					<span class="left-info">Продажа долей:</span>
					<span class="right-info">Открыта</span>
				</div>
			</div>
			<span class="t-size-12 t-gray t-bold-300">0 502 23 515 32 79 842 59123 92 9 60013 706869 695 85 8 7 9 17782 9 7 9593 82 96 177 959 12 7 39 82 06069 5959 28 5934</span>
		</div>	
		
		<!--INVESTMENT STAGES SECTION-->
		<div class="investment-stages container">
			<!-- header -->
			<div class="investment-stages-header div-flex-two">
				<svg class="ssf-circle" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
  					<circle cx="7.5" cy="7.5" r="7.5" fill="#34c28d"/>
				</svg>
				<h2 class="t-main t-uppercase">Этапы инвестирования (1/3)</h2>
			</div>
			<!-- stages wrapper -->
			<div class="investment-stages-wrapper">
				<!-- first stage -->
				<div class="investment-stage">
					<div class="status open div-flex df-right">
						<span>Открыт</span>
						<svg xmlns="http://www.w3.org/2000/svg" width="9.637" height="9.637" viewBox="0 0 9.637 9.637">
  							<path d="M5,12.572H7.065v2.065H8.442V11.2H5ZM7.065,7.065H5V8.442H8.442V5H7.065Zm4.13,7.572h1.377V12.572h2.065V11.2H11.2Zm1.377-7.572V5H11.2V8.442h3.442V7.065Z" transform="translate(-5 -5)" fill="#fff"/>
						</svg>
					</div>
					<p class="t-bold-300">
						<span class="t-uppercase t-size-20 t-lspacing-2 t-bold-400">1 этап</span><br><br>
						Первый этап инвестиций. Сумма сбора средств 570 000$ - 10% дохода компании / 10 млн. долей для продажи. Самые выгодные инвестиции, в соотношении суммы и процента. На данном этапе происходит разработка, тестирование, выпуск Beta-версии продукта на рынок и первичная рекламная 
					</p>
					<span class="t-gray t-uppercase">10% / 10 млн долей</span>
				</div>
				<!-- second stage -->
				<div class="investment-stage">
					<div class="status close div-flex df-right">
						<span>Закрыт</span>
						<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
							<path d="M15,6.007,13.993,5,10,8.993,6.007,5,5,6.007,8.993,10,5,13.993,6.007,15,10,11.007,13.993,15,15,13.993,11.007,10Z" transform="translate(-5 -5)" fill="#fff"/>
						</svg>
					</div>
					<p class="t-bold-300">
						<span class="t-uppercase t-size-20 t-lspacing-2 t-bold-400">2 этап</span><br><br>
						Второй этап инвестиций. Сумма сбора средств и % будет рассчитан после первого этапа инвестиций. На данном этапе уже запущена Beta-версия продукта, компания начинает токенизацию долей стартапа и подготовку к листингу на официальных криптовалютных биржах.
					</p>
					<span class="t-gray t-uppercase">?????</span>
				</div>
				<!-- third stage -->
				<div class="investment-stage">
					<div class="status close div-flex df-right">
						<span>Закрыт</span>
						<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
							<path d="M15,6.007,13.993,5,10,8.993,6.007,5,5,6.007,8.993,10,5,13.993,6.007,15,10,11.007,13.993,15,15,13.993,11.007,10Z" transform="translate(-5 -5)" fill="#fff"/>
						</svg>
					</div>
					<p class="t-bold-300">
						<span class="t-uppercase t-size-20 t-lspacing-2 t-bold-400">3 этап</span><br><br>
						Третий этап инвестиций. Сумма сбора средств и % будет рассчитан после второго круга инвестиций. На данном этапе компания уже полностью функционирует самостоятельно и находится в стадии активного роста. Происходит листинг токенов на биржи, идет этап масштабирования и преумножения общей прибыли компании.
					</p>
					<span class="t-gray t-uppercase">?????</span>
				</div>
			</div>
		</div>
		
		<!--BECOME SHAREHOLDER SECTION-->
		<div class="become-shareholder container">
			<h2 class="t-bold-400 t-uppercase t-size-28 t-lspacing-1">Стать дольщиком Onecli.</h2>
			<!-- main content -->
			<div class="become-shareholder-wrapper">
				<svg xmlns="http://www.w3.org/2000/svg" width="26" height="106" viewBox="0 0 26 106">
					  <g transform="translate(-348 -1043)">
						<circle cx="5" cy="5" r="5" transform="translate(348 1043)" fill="#cacdd7"/>
						<circle cx="5" cy="5" r="5" transform="translate(348 1139)" fill="#cacdd7"/>
						<circle cx="8" cy="8" r="8" transform="translate(358 1088)" fill="#34c28d"/>
					  </g>
				</svg>
				<!-- image -->
				<div class="bs-image-container">
                   <div class="bs-image bs-image-top" style="background-image: url(images/fbg3.jpg);"></div>
                    <div class="bs-image" style="background-image: url(images/fbg1.jpg);"></div>
                    <div class="bs-image bs-image-bottom" style="background-image: url(images/fbg2.jpg);"></div>
                </div>
				<!-- main info -->
				<div class="bs-main-content div-flex df-col df-center t-bold-400">
					<h3 class="t-main t-bold-400 t-uppercase t-size-20 t-center">870$ - Пакет "Basic"</h3>
					<h4 class="t-gray t-bold-300 t-center">Инвестировать / Купить доли</h4>
					<div class="bs-content-line">
						<span><span class="t-main">10 000</span> долей</span>
						<img src="images/shares-count.png" alt="33%" width="17px" height="17px">
					</div>
					<hr width="96%">
					<div class="bs-content-line">
						<span><span class="t-main">0.01%</span> дохода компании</span>
					</div>
					<hr width="96%">
					<div class="bs-content-line">
						<span>Стоимость:</span>
						<span class="t-main t-bold-600">870 $</span>
					</div>
					<div class="bs-content-line">
						<button class="btn btn-shadow">Купить</button>
						<textarea class="text-area" rows="1" placeholder="Ввести кол-во долей"></textarea>
					</div>
				</div>
				<!-- paginator vertical -->
				<div class="bs-paginator-vertical div-flex df-spaceb df-col">
					<svg class="paginator-svg" xmlns="http://www.w3.org/2000/svg" width="28" height="29" viewBox="0 0 28 29">
  						<g transform="translate(28) rotate(90)">
    						<g transform="translate(0 0)" fill="none" stroke="#4f5a7b" stroke-width="1">
      							<ellipse cx="14.5" cy="14" rx="14.5" ry="14" stroke="none"/>
      							<ellipse cx="14.5" cy="14" rx="14" ry="13.5" fill="none"/>
    						</g>
    						<path d="M7.029,12.776h0L0,6.315,7.029,0l.943,1.461L2.691,6.315l5.381,4.947v.115l-1.043,1.4Z" transform="translate(9.05 7.568)" fill="#4f5a7b"/>
  						</g>
					</svg>
					<svg class="paginator-svg" xmlns="http://www.w3.org/2000/svg" width="28" height="29" viewBox="0 0 28 29">
 						<g transform="translate(28) rotate(90)">
    						<g transform="translate(0 0)" fill="none" stroke="#4f5a7b" stroke-width="1">
      							<ellipse cx="14.5" cy="14" rx="14.5" ry="14" stroke="none"/>
      							<ellipse cx="14.5" cy="14" rx="14" ry="13.5" fill="none"/>
    						</g>
    						<path d="M7.029,0h0L0,6.461l7.029,6.315.943-1.461L2.691,6.461,8.073,1.514V1.4L7.03,0Z" transform="translate(19.112 20.344) rotate(180)" fill="#4f5a7b"/>
  						</g>
					</svg>
				</div>
				<!-- paginator horizontal -->
				<div class="bs-paginator-horizontal div-flex df-spaceb">
					<svg class="paginator-svg" xmlns="http://www.w3.org/2000/svg" width="29" height="30" viewBox="0 0 29 30">
  						<g transform="translate(0) rotate(0)">
   		 					<g transform="translate(-0.225)" fill="none" stroke="#4f5a7b" stroke-width="1">
      							<ellipse cx="15" cy="14.5" rx="15" ry="14.5" stroke="none"/>
      							<ellipse cx="15" cy="14.5" rx="14.5" ry="14" fill="none"/>
    						</g>
    						<path d="M7.359,13.375h0L0,6.611,7.359,0l.988,1.53L2.817,6.611,8.451,11.79v.12L7.359,13.374Z" transform="translate(9.714 8.016)" fill="#4f5a7b"/>
  						</g>
					</svg>
					<svg class="paginator-svg" xmlns="http://www.w3.org/2000/svg" width="29" height="30" viewBox="0 0 29 30">
					  	<g transform="translate(-1) rotate(0)">
							<g transform="translate(0)" fill="none" stroke="#4f5a7b" stroke-width="1">
						  		<ellipse cx="15" cy="14.5" rx="15" ry="14.5" stroke="none"/>
						  		<ellipse cx="15" cy="14.5" rx="14.5" ry="14" fill="none"/>
							</g>
							<path d="M7.359,0h0L0,6.764l7.359,6.611.988-1.53L2.817,6.764,8.451,1.585v-.12L7.359,0Z" transform="translate(19.759 21.391) rotate(180)" fill="#4f5a7b"/>
					  	</g>
					</svg>
				</div>
			</div>
			<!-- level section -->
			<div class="level-line div-flex df-spacea">
				<span class="t-black t-bold-300" style="margin-left: 10px;">XP</span>
				<span class="t-main t-bold-300 t-size-12" style="position: absolute; right: 30px; top: 5px;">+32 XP</span>
				<svg style="width: 90%; margin-left: -40px;" xmlns="http://www.w3.org/2000/svg" width="926" height="2" viewBox="0 0 926 2">
					<g transform="translate(-363.5 -1416.5)">
						<line x2="333" transform="translate(363.5 1417.5)" fill="none" stroke="#34c28d" stroke-width="2"/>
						<line x2="568" transform="translate(721.5 1417.5)" fill="none" stroke="#4f5a7b" stroke-width="2"/>
						<line x2="26" transform="translate(695.5 1417.5)" fill="none" stroke="#34c28d" stroke-width="2" stroke-dasharray="3 1"/>
					</g>
				</svg>

			</div>
		</div>
		
		<!--AFFILIATE PROGRAMM-->
		<div class="afiliate-programm-block container t-bold-300">
			<span class="decorative t-gray t-lspacing-2">just one click.</span>
			<h2 class="t-uppercase t-main t-lspacing-7 t-bold-400">Партнёрская <span class="t-white">программа</span></h2>
			<p class="t-darkgray">За привлечение инвестиций в стартап Onecli. при работе с партнёрами вы будете получать партнёрский бонус <strong>до 15%</strong>. Ниже доступны два вида пригласительнйо ссылки: классическая с переходом на основной сайт и личная с переходом на ваш лендинг. Настройка лендинга происходит в разделе "Настройки". Для того, чтобы узанть подробные условия программы, перейдиет в раздел "Моя команда". <a class="t-main" href="?team">Изучить подробнее...</a></p>
			<div class="link-block div-flex-two">
				<a href="https://onecli.biz/?ref=<?php echo $login; ?>">https://onecli.biz/?ref=<?php echo $login; ?></a>
				<div>
					<span class="t-size-12 t-gray">Классическая пригласительная ссылка </span>
					<button class="btn" onclick="copyLink('<?php echo "https://onecli.biz/?ref=$login"; ?>')">Скопировать</button>
				</div>
			</div>
			<div class="link-block div-flex-two">
				<a href="https://onecli.com/lp?id=<?php echo $login; ?>">https://onecli.com/lp?id=<?php echo $login; ?></a>
				<div>
					<span class="t-size-12 t-gray">Пригласительная ссылка на ваш лендинг </span>
					<button class="btn btn-gray" onclick="copyLink('<?php echo "https://onecli.com/lp?id=$login"; ?>')">Скопировать</button>
				</div>
			</div>
			<div class="link-buttons">
				<button class="btn" onclick="copyLink('<?php echo "https://onecli.biz/?ref=$login"; ?>')">Скопировать реферальную ссылку</button>
				<button class="btn btn-gray" onclick="copyLink('<?php echo "https://onecli.com/lp?id=$login"; ?>')">Скопировать ссылку на личный лендинг</button>
			</div>
		</div>
		
		<!--PERSONAL STATS-->
		<div class="stats-block container">
			<h2 class="t-main t-bold-400 t-size-20 t-lspacing-7 t-uppercase">Личная статистика</h2>
			<div class="personal-stats-wrapper">
				<div class="stats">
					<span>Заработано реферальных:</span>
					<span>115.190$</span>
				</div>
				<div class="stats">
					<span>Всего рефералов:</span>
					<span>185</span>
				</div>
				<div class="stats">
					<span>Стоимость моих долей:</span>
					<span>2318.64$</span>
				</div>
				<div class="stats">
					<span>Мой процент в компании:</span>
					<span>0,02665067%</span>
				</div>
			</div>
		</div>
		
		<!--GLOBAL STATS-->
		<div class="stats-block container">
			<h2 class="t-main t-bold-400 t-size-20 t-lspacing-7 t-uppercase">Общая статистика</h2>
			<div class="global-stats-wrapper">
				<div class="stats">
					<span>Всего инвестировано:</span>
					<span>2318.64$</span>
				</div>
				<div class="stats">
					<span>Всего зарегистрировано:</span>
					<span>2318.64$</span>
				</div>
				<div class="stats">
					<span>Всего дольщиков:</span>
					<span>250</span>
				</div>
				<div class="stats">
					<span>Выплачено реферальных:</span>
					<span>8742.57$</span>
				</div>
				<div class="stats">
					<span>Зарегистрировано сегодня:</span>
					<span>32 человека</span>
				</div>
			</div>
		</div>
		
		<div class="operation-list container">
			<table class="operations">
				<tr>
					<th>ID</th>
					<th>Дата</th>
					<th class="more"></th>
					<th>Операция</th>
					<th>Сумма</th>
					<th>Баланс</th>
					<th>Статус</th>
				</tr>
				<tr class="inprogress">
					<td>278</td>
					<td>08.12.2021 / 11:39</td>
					<td class="more inprogress">Подробнее...</td>
					<td>ВЫВОД СТРЕДСТВ</td>
					<td>0.0200000 $</td>
					<td>555.555 $</td>
					<td>В процессе</td>
				</tr>
				<tr class="success">
					<td>278</td>
					<td>08.12.2021 / 11:39</td>
					<td class="more success">Подробнее...</td>
					<td>ВЫВОД СТРЕДСТВ</td>
					<td>0.0200000 $</td>
					<td>555.555 $</td>
					<td>Выполнено</td>
				</tr>
				<tr class="success">
					<td>278</td>
					<td>08.12.2021 / 11:39</td>
					<td class="more success">Подробнее...</td>
					<td>ВЫВОД СТРЕДСТВ</td>
					<td>0.0200000 $</td>
					<td>555.555 $</td>
					<td>Выполнено</td>
				</tr>
				<tr class="success">
					<td>278</td>
					<td>08.12.2021 / 11:39</td>
					<td class="more success">Подробнее...</td>
					<td>ВЫВОД СТРЕДСТВ</td>
					<td>0.0200000 $</td>
					<td>555.555 $</td>
					<td>Выполнено</td>
				</tr>
				<tr class="failure">
					<td>278</td>
					<td>08.12.2021 / 11:39</td>
					<td class="more failure">Подробнее...</td>
					<td>ВЫВОД СТРЕДСТВ</td>
					<td colspan="2">Нажмите, чтобы узанть подробности</td>
					<td>Отказано</td>
				</tr>
				<tr class="success">
					<td>278</td>
					<td>08.12.2021 / 11:39</td>
					<td class="more success">Подробнее...</td>
					<td>ВЫВОД СТРЕДСТВ</td>
					<td>0.0200000 $</td>
					<td>555.555 $</td>
					<td>Выполнено</td>
				</tr>
				<tr class="success">
					<td>278</td>
					<td>08.12.2021 / 11:39</td>
					<td class="more success">Подробнее...</td>
					<td>ВЫВОД СТРЕДСТВ</td>
					<td>0.0200000 $</td>
					<td>555.555 $</td>
					<td>Выполнено</td>
				</tr>
				<tr class="success">
					<td>278</td>
					<td>08.12.2021 / 11:39</td>
					<td class="more success">Подробнее...</td>
					<td>ВЫВОД СТРЕДСТВ</td>
					<td>0.0200000 $</td>
					<td>555.555 $</td>
					<td>Выполнено</td>
				</tr>
			</table>
			<div class="operations-table-pager div-flex df-spaceb t-gray">
				<button>
					<svg class="svg-pager" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25">
						<g fill="none" stroke="#4f5a7b" stroke-width="1">
							<circle cx="12.5" cy="12.5" r="12.5" stroke="none"></circle>
							<circle cx="12.5" cy="12.5" r="12" fill="none"></circle>
						</g>
						<path d="M6.1,11.079h0L0,5.477,6.1,0l.818,1.267L2.334,5.477,7,9.766v.1l-.9,1.213Z" transform="translate(8.3 6.563)" fill="#4f5a7b"></path>
					</svg>
				</button>
				<p>
					<span class="current-page">1</span> | <span class="total-pages">35</span>
				</p>
				<button>
					<svg class="svg-pager" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25">
						<g fill="none" stroke="#4f5a7b" stroke-width="1">
							<circle cx="12.5" cy="12.5" r="12.5" stroke="none"></circle>
							<circle cx="12.5" cy="12.5" r="12" fill="none"></circle>
						</g>
						<path d="M6.1,0h0L0,5.6l6.1,5.477.818-1.267L2.334,5.6,7,1.313v-.1L6.1,0Z" transform="translate(16.7 17.642)rotate(180)" fill="#4f5a7b"></path>
					</svg>
				</button>
			</div>
		</div>
		
		
		<!--SHARE EXCHANGE-->
		<div class="share-exchange-block container">
			<div class="decorative"></div>
			<h2 class="t-main t-size-18 t-bold-400 t-uppercase">Биржа долей</h2>
			<div class="tag">Скоро*</div>
			<div class="share-exchange-wrapper">
				<svg class="svg-pager" xmlns="http://www.w3.org/2000/svg" width="28" height="29" viewBox="0 0 28 29">
				  	<g transform="translate(28) rotate(90)">
						<g fill="none" stroke="#34c28d" stroke-width="1">
					  		<ellipse cx="14.5" cy="14" rx="14.5" ry="14" stroke="none"/>
					  		<ellipse cx="14.5" cy="14" rx="14" ry="13.5" fill="none"/>
						</g>
						<path d="M7.029,12.776h0L0,6.315,7.029,0l.943,1.461L2.691,6.315l5.381,4.947v.115l-1.043,1.4Z" transform="translate(9.05 7.568)" fill="#34c28d"/>
				  	</g>
				</svg>
				<div class="share-exchangers-wrapper">
					<table class="exhangers-table">
						<tr>
						  	<td>Richman</td>
						  	<td>5000 долей</td>
						  	<td>3000,99$</td>
						  	<td class="pro">PRO</td>
						  	<td>My price: 0.071$</td>
						  	<td>Market price: 0.077$</td>
						 </tr>
						<tr>
						  	<td>Richman</td>
						  	<td>5000 долей</td>
						  	<td>3000,99$</td>
						  	<td class="start">Start</td>
						  	<td>My price: 0.071$</td>
						  	<td>Market price: 0.077$</td>
						 </tr>
						<tr>
						  	<td>Richman</td>
						  	<td>5000 долей</td>
						  	<td>3000,99$</td>
						  	<td class="vip">Vip</td>
						  	<td>My price: 0.071$</td>
						  	<td>Market price: 0.077$</td>
						 </tr>
						<tr>
						  	<td>Richman</td>
						  	<td>5000 долей</td>
						  	<td>3000,99$</td>
						  	<td class="business">Business</td>
						  	<td>My price: 0.071$</td>
						  	<td>Market price: 0.077$</td>
						 </tr>
						<tr>
						  	<td>Richman</td>
						  	<td>5000 долей</td>
						  	<td>3000,99$</td>
						  	<td class="free">Free</td>
						  	<td>My price: 0.071$</td>
						  	<td>Market price: 0.077$</td>
						 </tr>
					</table>
				</div>
				<svg class="svg-pager" xmlns="http://www.w3.org/2000/svg" width="28" height="29" viewBox="0 0 28 29">
				  	<g transform="translate(28 -0.224) rotate(90)">
						<g transform="translate(0.224)" fill="none" stroke="#34c28d" stroke-width="1">
					  		<ellipse cx="14.5" cy="14" rx="14.5" ry="14" stroke="none"/>
					  		<ellipse cx="14.5" cy="14" rx="14" ry="13.5" fill="none"/>
						</g>
						<path d="M7.029,0h0L0,6.461l7.029,6.315.943-1.461L2.691,6.461,8.073,1.514V1.4L7.03,0Z" transform="translate(19.444 20.345) rotate(180)" fill="#34c28d"/>
				  	</g>
				</svg>
			</div>
		</div>
		
		
		<!--NEWS BLOCK-->
		<div class="news-block">
			<div class="news-header">
				<span class="t-uppercase t-size-14">News | Новости</span>
				<span class="t-uppercase t-size-14">News | Новости</span>
				<span class="t-uppercase t-size-14">News | Новости</span>
				<span class="t-uppercase t-size-14">News | Новости</span>
				<span class="t-uppercase t-size-14">News | Новости</span>
			</div>
			<div class="news-wrapper">
				<div class="news-item">
					<div class="news-about">
						<div class="div-flex-two">
							<img src="../images/bvadimnikol.jpg" alt="admin">
							<span class="t-size-16 t-main">Администратор</span>
						</div>
						<span class="t-black t-size-14 t-bold-300">Март 2019</span>
					</div>
					<div class="news-content" style="background: url(images/news-bg.jpg) 100% no-repeat;">
						<p class="t-white t-size-16 t-bold-300">Информационный сайт доступен для ознакомления и приобретения долей Onecli.</p>
						<div class="div-flex-two read-more">
							<span class="t-main t-size-18 t-bold-500 t-uppercase">Читать далее</span>
							<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
							  	<g transform="translate(9) rotate(45)" fill="none" stroke="#34c28d" stroke-width="1">
									<rect width="12.728" height="12.728" stroke="none"/>
									<rect x="0.5" y="0.5" width="11.728" height="11.728" fill="none"/>
							  	</g>
							  	<path d="M7.033,6.467V5L9.6,7.567,7.033,10.133V8.63A4.533,4.533,0,0,0,3,10.5,4.654,4.654,0,0,1,7.033,6.467Z" transform="translate(2.558 0.916)" fill="#34c28d"/>
							</svg>

						</div>
					</div>
				</div>
				<div class="news-item">
					<div class="news-about">
						<div class="div-flex-two">
							<img src="../images/bvadimnikol.jpg" alt="admin">
							<span class="t-size-16 t-main">Администратор</span>
						</div>
						<span class="t-black t-size-14 t-bold-300">Март 2019</span>
					</div>
					<div class="news-content" style="background: url(images/news-bg.jpg) 100% no-repeat;">
						<p class="t-white t-size-16 t-bold-300">Информационный сайт доступен для ознакомления и приобретения долей Onecli.</p>
						<div class="div-flex-two read-more">
							<span class="t-main t-size-18 t-bold-500 t-uppercase">Читать далее</span>
							<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
							  	<g transform="translate(9) rotate(45)" fill="none" stroke="#34c28d" stroke-width="1">
									<rect width="12.728" height="12.728" stroke="none"/>
									<rect x="0.5" y="0.5" width="11.728" height="11.728" fill="none"/>
							  	</g>
							  	<path d="M7.033,6.467V5L9.6,7.567,7.033,10.133V8.63A4.533,4.533,0,0,0,3,10.5,4.654,4.654,0,0,1,7.033,6.467Z" transform="translate(2.558 0.916)" fill="#34c28d"/>
							</svg>

						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<script src="js/room.js?3"></script>
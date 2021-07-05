<?php


  $balance = rand(15025, 36811)/100;
  $balance2 = rand(652153, 1012896)/100;
  $reit = rand(5,10);
  $team = number_format(rand(1699,3456), 0, ',', ' ');
  
  
  
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
		<h1 class="t-main hidden">Биржа долей - Onecli.</h1>
		
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
		
	</main>
	<script src="js/statistics.js?1"></script>
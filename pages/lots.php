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
    die("Сессия была отключена. Перезайдите или проверьте аккаунт на взлом.");
  }else{
    while ($row=mysqli_fetch_array($res)) { 
      $dollar = ($row['dollar']*2)." ONX";
    }	
  }
  mysqli_close($connection);
?>
	
	<!--MODALS-->
	<div style="display: none;" class="modals" id="lots_modals">
		<!--SEND SUCCESS MODAL-->
		<div style="display: none;" class="send-success-modal">
			<div class="modal-full-wrapper">
				<div class="modal-close-button">
					<svg xmlns="http://www.w3.org/2000/svg" width="14.798" height="14.798" viewBox="0 0 14.798 14.798">
  						<g transform="translate(0.707 0.707)">
    						<line x2="13.384" y2="13.384" fill="none" stroke="#fff" stroke-width="2"/>
    						<line x1="13.384" y2="13.384" fill="none" stroke="#fff" stroke-width="2"/>
  						</g>
					</svg>			
				</div>
				<p>10 RTX пользователю Millioner  успешно отправлено!</p>
				<hr width="70%">
			</div>
		</div>
		
		<!--MONEY PROCESSING MODAL-->
		<div style="display: none;" class="money-processing-modal">
			<div class="modal-full-wrapper">
				<div class="modal-close-button">
					<svg xmlns="http://www.w3.org/2000/svg" width="14.798" height="14.798" viewBox="0 0 14.798 14.798">
  						<g transform="translate(0.707 0.707)">
    						<line x2="13.384" y2="13.384" fill="none" stroke="#fff" stroke-width="2"/>
    						<line x1="13.384" y2="13.384" fill="none" stroke="#fff" stroke-width="2"/>
  						</g>
					</svg>			
				</div>
				<p>Спасибо! Ваша заявка на сумму <span>50$</span> принята! Все заявки обрабатываются оператором! Вывод занимает до <span>72</span> часов!</p>
				<hr width="70%">
			</div>
		</div>
		
		<!--ORDERING MODAL-->
		<div style="display: none;" class="ordering-modal">
			<div class="modal-full-wrapper">
				<div class="modal-close-button">
					<svg xmlns="http://www.w3.org/2000/svg" width="14.798" height="14.798" viewBox="0 0 14.798 14.798">
  						<g transform="translate(0.707 0.707)">
    						<line x2="13.384" y2="13.384" fill="none" stroke="#fff" stroke-width="2"/>
    						<line x1="13.384" y2="13.384" fill="none" stroke="#fff" stroke-width="2"/>
  						</g>
					</svg>			
				</div>
				<h2 class="t-bold-300 t-darkgray t-uppercase">Оформление заказа</h2>
				<div class="text">
					<span>Сумма выигранного Вами лота: <span class="t-main">47RTX</span></span>
					<div><span>Вы получите <span class="t-main">100RTX</span> после оплаты <span class="t-main">47RTX</span></span><span class="tip">1 RTX = 0,5$</span></div>
					<span>Ваша прибыль с лота составляет: <span class="t-main">53RTX (53%)</span></span>
					<span>Вы покупаете лот <span class="t-main">№1234567</span> на сумму <span class="t-main">50$</span></span>
				</div>
				<div class="choose-payment div-flex-two">
					<span class="t-bold-300">Выберите платежную систему:</span>
					<select size="1">
						<option value="1">Visa/MasterCard</option>
						<option value="2">Visa/MasterCard</option>
						<option value="3">Visa/MasterCard</option>
					</select>
				</div>
				<input type="text" placeholder="Введите номер кошелька">
				<button class="btn">Оплатить</button>
			</div>
		</div>
		
		<!--SEND TO A FRIEND MODAL-->
		<div style="display: none;" class="send-friend-modal" id="friend">
			<div class="modal-full-wrapper">
				<div class="modal-close-button" onclick="divOffVis('friend')">
					<svg xmlns="http://www.w3.org/2000/svg" width="14.798" height="14.798" viewBox="0 0 14.798 14.798">
  						<g transform="translate(0.707 0.707)">
    						<line x2="13.384" y2="13.384" fill="none" stroke="#fff" stroke-width="2"/>
    						<line x1="13.384" y2="13.384" fill="none" stroke="#fff" stroke-width="2"/>
  						</g>
					</svg>			
				</div>
				<h2 class="t-bold-300 t-darkgray t-uppercase">Отправить ONX</h2>
				<p class="t-gray t-size-14 t-bold-300"></p>
				<input type="text" placeholder="Логин или E-mail" id="send_login">
				<input type="text" placeholder="Количество" id="send_onx">
				<button class="btn" onclick='sendMoney();'>Отправить</button>
			</div>
		</div>
		
		<!--CART MODAL-->
		<div style="display: none;" class="cart-modal" id="basket">
			<div class="modal-full-wrapper">
				<div class="modal-close-button" onclick="divOffVis('basket')">
					<svg xmlns="http://www.w3.org/2000/svg" width="14.798" height="14.798" viewBox="0 0 14.798 14.798">
  						<g transform="translate(0.707 0.707)">
    						<line x2="13.384" y2="13.384" fill="none" stroke="#fff" stroke-width="2"/>
    						<line x1="13.384" y2="13.384" fill="none" stroke="#fff" stroke-width="2"/>
  						</g>
					</svg>			
				</div>
				
				
				<table class="cart-table" id="basket_table">
				</table>
				
				
				<div class="bottom-menu">
					<div class="pager">
						<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25">
  							<g opacity="0.5">
    							<g fill="none" stroke="#4f5a7b" stroke-width="1">
      								<circle cx="12.5" cy="12.5" r="12.5" stroke="none"></circle>
      								<circle cx="12.5" cy="12.5" r="12" fill="none"></circle>
    							</g>
    							<path d="M6.1,11.079h0L0,5.477,6.1,0l.818,1.267L2.334,5.477,7,9.766v.1l-.9,1.213Z" transform="translate(8.3 6.563)" fill="#4f5a7b"></path>
  							</g>
						</svg>
						<span style="display:none"><span class="t-main" >1</span> | 2</span>
						<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25">
  							<g opacity="0.5">
    							<g fill="none" stroke="#4f5a7b" stroke-width="1">
      								<circle cx="12.5" cy="12.5" r="12.5" stroke="none"></circle>
      								<circle cx="12.5" cy="12.5" r="12" fill="none"></circle>
    							</g>
    							<path d="M6.1,0h0L0,5.6l6.1,5.477.818-1.267L2.334,5.6,7,1.313v-.1L6.1,0Z" transform="translate(16.7 17.642) rotate(180)" fill="#4f5a7b"></path>
  							</g>
						</svg>
					</div>
					<div class="type">
						<span class="t-uppercase t-italic"><span id="readMyBuyid" onclick="readMyBuy()">Оплаченные</span> | <span id="readBasketid" class="t-main" onclick="readBasket()">В обработке</span></span>
					</div>
				</div>
			</div>
		</div>
		
		<!--REFILL MODAL-->
		<div style="display: none;" class="refill-modal" id="buy">
			<div class="modal-full-wrapper">
				<div class="modal-close-button" onclick="divOffVis('buy')">
					<svg xmlns="http://www.w3.org/2000/svg" width="14.798" height="14.798" viewBox="0 0 14.798 14.798">
  						<g transform="translate(0.707 0.707)">
    						<line x2="13.384" y2="13.384" fill="none" stroke="#fff" stroke-width="2"/>
    						<line x1="13.384" y2="13.384" fill="none" stroke="#fff" stroke-width="2"/>
  						</g>
					</svg>			
				</div>
				<h2 class="t-bold-300 t-darkgray t-uppercase">Пополнение баланса</h2>
				<div class="input">
					<span class="t-bold-300">Количество:</span>
					<input type="text" id="buyONX" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');buy_startF(this.value)">
					<span class="t-main">ONX</span>
				</div>
				<div class="tip">
					<span>1 ONX = 0,5$</span>
				</div>
				<div class="input">
					<span class="t-bold-300">Стоимость:</span>
					<input type="text" id="buyDollar" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');buy_endF(this.value)">
					<span class="t-main">$</span>
				</div>
				<div class="payments">
					<span class="t-black t-bold-300">Выберите способ оплаты</span>
					<div class="payments-wrapper">
						<div class="payment" id="pa1" onclick='imgSet("pa1")'></div>
						<div class="payment" id="pa2" onclick='imgSet("pa2")'></div>
						<div class="payment" id="pa3" onclick='imgSet("pa3")'></div>
						<div class="payment" id="pa4" onclick='imgSet("pa4")'></div>
						<div class="payment" id="pa5" onclick='imgSet("pa5")'></div>
						<div class="payment" id="pa6" onclick='imgSet("pa6")'></div>
						<div class="payment" id="pa7" onclick='imgSet("pa7")'></div>
						<div class="payment" id="pa8" onclick='imgSet("pa8")'></div>
						<div class="payment" id="pa9" onclick='imgSet("pa9")'></div>
						<div class="payment" id="pa10" onclick='imgSet("pa10")'></div>
						<div class="payment" id="pa11" onclick='imgSet("pa11")'></div>
						<div class="payment" id="pa12" onclick='imgSet("pa12")'></div>
					</div>
				</div>
				<button class="btn" onclick='addMoney();'>Пополнить</button>
			</div>
		</div>
		
		<!--WITHDRAW MODAL-->
		<div style="display: none;" class="withdraw-modal" id="sell">
			<div class="modal-full-wrapper">
				<div class="modal-close-button" onclick="divOffVis('sell')">
					<svg xmlns="http://www.w3.org/2000/svg" width="14.798" height="14.798" viewBox="0 0 14.798 14.798">
  						<g transform="translate(0.707 0.707)">
    						<line x2="13.384" y2="13.384" fill="none" stroke="#fff" stroke-width="2"/>
    						<line x1="13.384" y2="13.384" fill="none" stroke="#fff" stroke-width="2"/>
  						</g>
					</svg>			
				</div>
				<div class="your-balance t-bold-300">
					<span>Ваш баланс:</span>
					<div style="display:none"><span class="t-uppercase t-bold-400">100 RTX</span></div>
					<div><span class="t-uppercase">1 ONX = 0,5$</span></div>
				</div>
				<h2 class="t-bold-300 t-darkgray t-uppercase">Вывод средств</h2>
				<div class="payments-text">
					<span class="t-black t-bold-300">Укажите платежные реквизиты:</span>
					<div class="payments-wrapper-text">
						<div id="ps1" onclick='imgSetS("ps1")' class="payment-text"><span>Visa/MasterCard</span></div>
						<div id="ps2" onclick='imgSetS("ps2")' class="payment-text">Paypal</div>
						<div id="ps3" onclick='imgSetS("ps3")' class="payment-text">Payeer</div>
						<div id="ps4" onclick='imgSetS("ps4")' class="payment-text">Perfect Money</div>
						<div id="ps5" onclick='imgSetS("ps5")' class="payment-text">AdvCash</div>
						<div id="ps6" onclick='imgSetS("ps6")' class="payment-text">Okpay</div>
						<div id="ps7" onclick='imgSetS("ps7")' class="payment-text">Solid Trust Pay</div>
						<div id="ps8" onclick='imgSetS("ps8")' class="payment-text">Яндекс Деньги</div>
						<div id="ps9" onclick='imgSetS("ps9")' class="payment-text">Payza</div>
						<div id="ps10" onclick='imgSetS("ps10")' class="payment-text">Qiwi Wallet</div>
						<div id="ps11" onclick='imgSetS("ps11")' class="payment-text">Bitcoin</div>
						<div id="ps12" onclick='imgSetS("ps12")' class="payment-text">WalletOne</div>
					</div>
				</div>
				<div class="sum">
					<div style="position: relative;">
						<span class="sum-onx">Сумма ONX</span>
						<input type="text" id="buyONX_sell" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1'); buy_startF_sell(this.value)">
						<span class="sum-dol">Сумма $</span>
						<input type="text" id="buyDollar_sell" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1'); buy_endF_sell(this.value)">
					</div>
					<button class="btn" onclick='sellMoney();'>Вывести</button>
				</div>
			</div>
		</div>
		
	</div>
	
	<!--MAIN CONTENT-->
	<main class="main-content">
		<h1 class="t-main hidden">Лоты - Onecli.</h1>
		
		<!--MONEY INTERACTIONS BUTTONS-->
		<div class="lots-money-interactions div-flex df-spaceb container">
			<div class="money-interaction div-flex-two" onclick="divOnVis('buy');">
				<img src="images/lots/refill.png" alt="refill">
				<span>Пополнить</span>
			</div>
			<div class="money-interaction div-flex-two" onclick="divOnVis('sell');">
				<img src="images/lots/withdraw.png" alt="withdraw">
				<span>Вывести</span>
			</div>
			<div class="money-interaction div-flex-two" onclick="divOnVis('friend');">
				<img src="images/lots/send.png" alt="send">
				<span>Отправить</span>
			</div>
			<div class="money-interaction div-flex-two" onclick="divOnVis('basket');">
				<img src="images/lots/cart.png" alt="cart">
				<span>Корзина</span>
			</div>
		</div>
		
		<!--LOTS SECTIONS-->
		<div class="lots-section container">
			  <div class="current-balance">
                <span>Баланс: <span id="user_balance"><?php echo $dollar; ?></span></span>
                <span>Просмотр = <span>1 ONX</span></span>
                <span>1 ONX = 0.5$</span>
              </div>
			<div class="lots-wrapper">
				<div class="lot-wrapper" id="lots">
				</div>
				<div class="pager" style="display: none;" >
					<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25">
  						<g opacity="0.5">
    						<g fill="none" stroke="#4f5a7b" stroke-width="1">
      							<circle cx="12.5" cy="12.5" r="12.5" stroke="none"/>
      							<circle cx="12.5" cy="12.5" r="12" fill="none"/>
    						</g>
    						<path d="M6.1,11.079h0L0,5.477,6.1,0l.818,1.267L2.334,5.477,7,9.766v.1l-.9,1.213Z" transform="translate(8.3 6.563)" fill="#4f5a7b"/>
  						</g>
					</svg>
					<div class="pages">
						<div class="pages-wrapper">
							<div class="page active"></div>
							<div class="page"></div>
							<div class="page"></div>
							<div class="page"></div>
							<div class="page"></div>
							<div class="page"></div>
							<div class="page"></div>
							<div class="page"></div>
						</div>
						<div class="pages-wrapper second">
							<div class="page"></div>
							<div class="page"></div>
							<div class="page"></div>
							<div class="page"></div>
							<div class="page"></div>
							<div class="page"></div>
							<div class="page"></div>
							<div class="page"></div>
						</div>
					</div>
					<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25">
  						<g opacity="0.5">
    						<g fill="none" stroke="#4f5a7b" stroke-width="1">
      							<circle cx="12.5" cy="12.5" r="12.5" stroke="none"/>
      							<circle cx="12.5" cy="12.5" r="12" fill="none"/>
    						</g>
    						<path d="M6.1,0h0L0,5.6l6.1,5.477.818-1.267L2.334,5.6,7,1.313v-.1L6.1,0Z" transform="translate(16.7 17.642) rotate(180)" fill="#4f5a7b"/>
  						</g>
					</svg>
				</div>
			</div>
			<div class="lots-search">
				<div class="search-wrapper" id="search-wrapper">
					<h2 class="t-uppercase t-bold-400 t-size-18 t-gray"><span onClick="OpenStatsMenu()">Live статистика</span> | <span class="t-main">Поиск</span></h2>
					<hr width="95%">
					<div class="search-price div-flex df-col df-spacea">
						<span class="t-size-14 t-main">Поиск по цене:</span>
						<input type="text" placeholder="От..." id="find_start" oninput="find_startF(this.value)" onchange="readLots();">
						<input type="text" placeholder="До..." id="find_end" oninput="find_endF(this.value)" onchange="readLots();">
					</div>
					<div class="search-type">
						<div class="search-type-wrapper">
							<div class="active" onclick='findReset();'><span>Сбросить</span></div>
						</div>
					</div>
				</div>
				<div style="display: none;" class="live-stats" id="live-stats">
					<h2 class="t-uppercase t-bold-400 t-size-18 t-gray"><span class="t-main">Live статистика</span> | <span onClick="OpenSearchMenu()">Поиск</span></h2>
					<hr width="95%">
					<div class="last-transactions">
						<span class="t-size-14 t-darkgray">Приобретённые лоты:</span>
						<div class="transaction-wrapper" id="lots_live">
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</main>
	<script src="js/lots.js?42"></script>
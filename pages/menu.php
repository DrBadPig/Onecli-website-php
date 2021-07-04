<!--HEADER-->
	<header class="main-header">
		<!--LOGO CONTAINER-->
		<div class="main-logo-div" style="cursor:pointer" onClick="window.location.href='https://onecli.biz'">
			<img class="main-logo" src="images/logo.png" alt="ONECLI. logo">
			<img class="main-logo-title" src="images/logo_title.png" alt="ONECLI. logo">
		</div>
		<!--HEADER RIGHT SIDE-->
		<div class="header-user-info div-flex df-spaceb">
			<!--USER INFO-->
			<div class="main-user-info" onClick="onClickUserSubmenu()">
				
				<span class="user-header-login t-black"> 
				  <?php  echo $_SESSION['name']; ?> 
				</span>
				
				
                <?php
                  if($_SESSION['ava']){
				    echo '<img class="user-header-image" src="avatars/'.$_SESSION['ava'].'" alt="Your image">';
                  }else{
				    echo '<img class="user-header-image" src="images/bvadimnikol.jpg" alt="Your image">';
				  }
                ?>


			</div>
			
			<!--LANGUAGE CHOOSER-->
			<div class="language-chooser div-flex df-center" onClick="onClickLanguageChooserMenu()">
				<img src="images/country-flags/russia.png" alt="russian" id="curLng">
			</div>
			
			<!--NAVIGATION MENU-->
			<div id="main-header-menu" class="main-header-menu div-flex df-center" onClick="OpenNavMenu()">
				<!--CLOSED MENU ICON-->
				<svg class="menu-icon" id="main-menu-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 19">
  					<g transform="translate(0 1)">
 	   					<line x2="25" fill="none" stroke="#fff" stroke-width="2"/>
  	 					<line x2="16.349" transform="translate(0 9.067)" fill="none" stroke="#fff" stroke-width="2"/>
  	  					<line x2="25" transform="translate(0 17)" fill="none" stroke="#fff" stroke-width="2"/>
  					</g>
				</svg>
				<!--OPENED MENU ICON-->
				<svg class="menu-icon hidden" id="main-menu-svg-active" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.349 19">
  					<g transform="translate(0 1)">
    					<line x2="25" fill="none" stroke="#fff" stroke-width="2"/>
    					<line x2="16.349" transform="translate(9 9.067)" fill="none" stroke="#fff" stroke-width="2"/>
    					<line x2="25" transform="translate(0 17)" fill="none" stroke="#fff" stroke-width="2"/>
  					</g>
				</svg>
			</div>
		</div>
	</header>
	
	
		
		
	<!--USER SETTING SUBMENU-->
	<div class="user-submenu hidden" id="user_submenu">
		<ul>
			<li><a href="?account">Настройки</a></li>
			<li><a href="https://onecli.biz/">Выход</a></li>
		</ul>
	</div>
	
	<!--LANGUAGE CHOOSER MENU-->
	<div class="language-chooser-menu hidden" id="language-chooser-menu">
		<div><img class="active" src="images/country-flags/russia.png" alt="russian" onclick="setLng('ru');"></div>
		<div><img src="images/country-flags/united-kingdom.png" alt="uk english" onclick="setLng('en');"></div>
	</div>
	
	<!--NAVIGATION FULL-->
	<nav class="main-navigation" id="fullNav">
		<div class="main-navigation-wrapper">
			<!-- NAVIGATION HEADER -->
			<div class="nav-header div-flex-two" onClick="moveF();">
				<span class="t-white">Навигация</span>
				<img src="images/menu.png" alt="Menu" onClick="onClickNavigation()">
			</div>
			<!-- MENU -->
			
			
			
			<ul class="menu-list">
			<?php 
              if($_SERVER['QUERY_STRING'] == "room"){
                echo '<li class="menu-active"><a href="?room"><img src="images/menu-icons/inv.png">Инвестиции в ONECLI.</a></li>';
			  }else{
                echo '<li><a href="?room" ><img src="images/menu-icons/inv.png">Инвестиции в ONECLI.</a></li>';
			  }	
			  
			  
              if($_SERVER['QUERY_STRING'] == "statistics"){
                echo '<li class="menu-active"><a href="?statistics"><img src="images/menu-icons/stats.png">Статистика</a></li>';
			  }else{
                echo '<li><a href="?statistics" ><img src="images/menu-icons/stats.png">Статистика</a></li>';
			  }	
			  
			  
              if($_SERVER['QUERY_STRING'] == "team"){
                echo '<li class="menu-active"><a href="?team" ><img src="images/menu-icons/team.png">Моя команда</a></li>';
			  }else{
                echo '<li><a href="?team" ><img src="images/menu-icons/team.png">Моя команда</a></li>';
			  }	
			  
			  
              if($_SERVER['QUERY_STRING'] == "exchange"){
                echo '<li class="menu-active"><a href="?exchange"><img src="images/menu-icons/br.png">Биржа долей</a></li>';
			  }else{
                echo '<li><a href="?exchange"><img src="images/menu-icons/br.png">Биржа долей</a></li>';
			  }	
			  
			  
              if($_SERVER['QUERY_STRING'] == "transactions"){
                echo '<li class="menu-active"><a href="?transactions"><img src="images/menu-icons/history.png">История транзакций</a></li>';
			  }else{
                echo '<li><a href="?transactions"><img src="images/menu-icons/history.png">История транзакций</a></li>';
			  }	
			  
			  
              if($_SERVER['QUERY_STRING'] == "lots"){
                echo '<li class="menu-active"><a href="?lots"><img src="images/menu-icons/lots.png">Лоты <span class="t-notify">[Beta]</span></a></li>';
			  }else{
                echo '<li><a href="?lots"><img src="images/menu-icons/lots.png">Лоты <span class="t-notify">[Beta]</span></a></li>';
			  }	
			  
			  
              if($_SERVER['QUERY_STRING'] == "idea"){
                echo '<li class="menu-active"><a href="?idea"><img src="images/menu-icons/idea.png">Идея ONECLI.</a></li>';
			  }else{
                echo '<li><a href="?idea"><img src="images/menu-icons/idea.png">Идея ONECLI.</a></li>';
			  }	
			  
			  
              if($_SERVER['QUERY_STRING'] == "bounty"){
                echo '<li class="menu-active"><a href="?bounty"><img src="images/menu-icons/btn.png">Bounty кампания</a></li>';
			  }else{
                echo '<li><a href="?bounty"><img src="images/menu-icons/btn.png">Bounty кампания</a></li>';
			  }	
			  
              if($_SERVER['QUERY_STRING'] == "promo"){
                echo '<li class="menu-active"><a href="?promo"><img src="images/menu-icons/promo.png">Промоматериалы</a></li>';
			  }else{
                echo '<li><a href="?promo"><img src="images/menu-icons/promo.png">Промоматериалы</a></li>';
			  }		
			  
              if($_SERVER['QUERY_STRING'] == "tickets"){
                echo '<li class="menu-active"><a href="?tickets"><img src="images/menu-icons/tickets.png">Тикеты ONECLI.</a></li>';
			  }else{
                echo '<li><a href="?tickets"><img src="images/menu-icons/tickets.png">Тикеты ONECLI.</a></li>';
			  }	
			  
			  
              if($_SERVER['QUERY_STRING'] == "faq"){
                echo '<li class="menu-active"><a href="?faq"><img src="images/menu-icons/faq.png">FAQ | Вопрос - ответ</a></li>';
			  }else{
                echo '<li><a href="?faq"><img src="images/menu-icons/faq.png">FAQ | Вопрос - ответ</a></li>';
			  }	
			  
			  
              if($_SERVER['QUERY_STRING'] == "game"){
                echo '<li class="menu-active"><a href="?game"><img src="images/menu-icons/game.png">Большая игра ONECLI.</a></li>';
			  }else{
                echo '<li><a href="?game"><img src="images/menu-icons/game.png">Большая игра ONECLI.</a></li>';
			  }	
			  
			  
              if($_SERVER['QUERY_STRING'] == "news"){
                echo '<li class="menu-active"><a href="?news"><img src="images/menu-icons/news.png">Новости</a></li>';
			  }else{
                echo '<li><a href="?news"><img src="images/menu-icons/news.png">Новости</a></li>';
			  }	
				
			?>
			</ul>
			
			<!-- SOCIALS -->
			<div class="socials" style="overflow:hidden">
				<span class="t-gray t-size-12" id="socials-h1" onClick="onClickSocials()">СОЦИАЛЬНЫЕ СЕТИ</span>
				<img src="images/str_left.png" alt="socials" onClick="onClickSocials()">
			  <div  id="socials-list" style="position:absolute; right:-190px;">
				<ul class="socials-list" >
					<li><a href="https://www.youtube.com/channel/UClxixUM9qzOjoFtUd5RNBzQ" target="_blank"><img id="soc_yt" src="img/yt0.png" style="cursor:pointer" onmouseover="chg('yt');" onmouseout="chg_('yt');" ></a></li>
					<li><a href="https://www.facebook.com/oneclicom/" target="_blank"><img id="soc_f" src="img/f0.png" style="cursor:pointer" onmouseover="chg('f');" onmouseout="chg_('f');" ></a></li>
					<li><a href="https://www.instagram.com/oneclicom/" target="_blank"><img id="soc_i" src="img/i0.png" style="cursor:pointer" onmouseover="chg('i');" onmouseout="chg_('i');" ></a></li>
					<li><a href="https://twitter.com/oneclicom" target="_blank"><img id="soc_tw" src="img/tw0.png" style="cursor:pointer" onmouseover="chg('tw');" onmouseout="chg_('tw');" ></a></li>
					<li><a href="https://teleg.one/onecli" target="_blank"><img id="soc_t" src="img/t0.png" style="cursor:pointer" onmouseover="chg('t');" onmouseout="chg_('t');" ></a></li>
					<li><a href="https://vk.com/onecli" target="_blank"><img id="soc_vk" src="img/vk0.png" style="cursor:pointer" onmouseover="chg('vk');" onmouseout="chg_('vk');" ></a></li>
				</ul>
			  </div>
			</div>
			
			<!-- CRYPTO SECTION -->
			<div class="crypto-rate-wrapper" id="cursecr">
				<div class="crypto-header div-flex-two" onclick="moveFC();">
					<span class="t-white">Курсы криптовалют</span>
					<img src="images/bitcoin.png" alt="crypt">
				</div>
				<ul class="crypto-list">				
				<?php
                  $rl = json_decode(file_get_contents("https://min-api.cryptocompare.com/data/pricemulti?fsyms=BTC,ETH,XRP,BCH,LTC,ADA,EOS,XLM,NEO,MIOTA,XMR,DASH,TRX,XEM,ETC&tsyms=USD&api_key=5b4333bc6a4085b006dffcfc88e38364bd361674a8e2a3ef5b67d3bdc6dbb011"), true);
		          echo '<li>BITCOIN (BTC)<br>'.$rl['BTC']["USD"].' USD</li>';
		          echo '<li>ETHEREUM (ETH)<br>'.$rl['ETH']["USD"].' USD</li>';
		          echo '<li>RIPPLE (XRP)<br>'.$rl['XRP']["USD"].' USD</li>';
		          echo '<li>BITCOIN CASH (BCH)<br>'.$rl['BCH']["USDH"].' USD</li>';
		          echo '<li>LITECOIN (LTC)<br>'.$rl['LTC']["USD"].' USD</li>';
		          echo '<li>CARDANO (ADA)<br>'.$rl['ADA']["USD"].' USD</li>';
		          echo '<li>EOS (EOS)<br>'.$rl['EOS']["USD"].' USD</li>';
		          echo '<li>STELLAR (XLM)<br>'.$rl['XLM']["USD"].' USD</li>';
		          echo '<li>NEO (NEO)<br>'.$rl['NEO']["USD"].' USD</li>';
		          echo '<li>IOTA (MIOTA)<br>'.$rl['MIOTA']["USD"].' USD</li>';
				  
				  
		  
		  /*
          echo '<font color="#232733" style="position:absolute; left:30px; top:720px; font-size:13px;font-family: Roboto;">MONERO (XMR) </font>';
          echo '<font color="#232733" style="position:absolute; left:30px; top:740px; font-size:13px;font-family: Roboto;">'.$rl['XMR']["USD"].' USD</font>';
		  
          echo '<font color="#232733" style="position:absolute; left:30px; top:780px; font-size:13px;font-family: Roboto;">DASH (DASH) </font>';
          echo '<font color="#232733" style="position:absolute; left:30px; top:800px; font-size:13px;font-family: Roboto;">'.$rl['DASH']["USD"].' USD</font>';
		  
          echo '<font color="#232733" style="position:absolute; left:30px; top:840px; font-size:13px;font-family: Roboto;">TRON (TRX) </font>';
          echo '<font color="#232733" style="position:absolute; left:30px; top:860px; font-size:13px;font-family: Roboto;">'.$rl['TRX']["USD"].' USD</font>';
		  
          echo '<font color="#232733" style="position:absolute; left:30px; top:900px; font-size:13px;font-family: Roboto;">NEM (XEM)</font>';
          echo '<font color="#232733" style="position:absolute; left:30px; top:920px; font-size:13px;font-family: Roboto;">'.$rl['XEM']["USD"].' USD</font>';
		  
          echo '<font color="#232733" style="position:absolute; left:30px; top:960px; font-size:13px;font-family: Roboto;">ETHEREUM CLASSIC (ETC)</font>';
          echo '<font color="#232733" style="position:absolute; left:30px; top:980px; font-size:13px;font-family: Roboto;">'.$rl['ETC']["USD"].' USD</font>';
		  */
                ?>
		
		

				</ul>
			</div>
		</div>
	</nav>	
	
	<script>
    var st = $("#cursecr").position().top;
	</script>
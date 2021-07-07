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
?>

<!-- MODALS NOTIFIES -->
	<div id="modal_dp" style="display: none;" class="modals-notify">
		<!-- OPERATION SUCCESSFUL -->
		<div style="display: none;" class="modal-notify-success">
			<span class="t-white">Операция прошла успешно</span>
			<button class="btn t-uppercase">Ок</button>
		</div>
		
		<!-- OPERATION FAILURE -->
		<div style="display: none;" class="modal-notify-failure">
			<p class="t-white">
				<span class="t-white">Операция не удалась,</span><br>
				<span class="t-white">текст причины по которой операция не прошла</span></p>
			<button class="btn t-uppercase">Ок</button>
		</div>
		
		<!--MAIL FULL-->
		<div id="modal_dp_full" style="display: none;" class="mail-full-notify">
		  <div class="modal-close-button" onclick="team_inbox_off()">
            <svg xmlns="http://www.w3.org/2000/svg" width="14.798" height="14.798" viewBox="0 0 14.798 14.798">
              <g transform="translate(0.707 0.707)">
                <line x2="13.384" y2="13.384" fill="none" stroke="#fff" stroke-width="2"></line>
                <line x1="13.384" y2="13.384" fill="none" stroke="#fff" stroke-width="2"></line>
              </g>
          </svg>
          </div>
			<div class="mail-header">
				<div id="modal_ava" style="background: url() 100% no-repeat; background-position: center; background-size: cover;" class="photo" width="50px" height="50px" alt="mess"></div>
				<div class="mail-info">
					<span class="t-size-25 t-main" id="modal_author">Загрузка...</span>
					<span class="t-size-16 t-black" id="modal_email"></span>
				</div>
				<span class="date" id="modal_time"></span>
			</div>
			<span class="t-uppercase t-size-16" id="modal_theme"></span>
			<hr width="97%">
			<div class="text">
				<textarea class='text-message' id="modal_mes">
				</textarea>
			</div>
		</div>
		
	</div>
	
	<!-- MODALS -->
	<div id="team_modals_back" style="display: none;" class="modals">
		<!--SEND MESSAGE MODAL-->
		<div id="team_modals_send" style="display: none;" class="send-message-modal">
		  <div class="modal-close-button" onclick="team_send_off()">
            <svg xmlns="http://www.w3.org/2000/svg" width="14.798" height="14.798" viewBox="0 0 14.798 14.798">
              <g transform="translate(0.707 0.707)">
                <line x2="13.384" y2="13.384" fill="none" stroke="#fff" stroke-width="2"></line>
                <line x1="13.384" y2="13.384" fill="none" stroke="#fff" stroke-width="2"></line>
              </g>
          </svg>
          </div>
		
			<h2 class="t-main t-size-20 t-bold-400 t-uppercase">Рассылка команде</h2>
			<input type="text" placeholder="Тема письма" id="message_title">
			<textarea class="text-area" placeholder="Текст письма / максимум 1500 символов" id="message_mes"></textarea>
			<button class="btn" onclick='sendMesTeam();'>Отправить</button>
		</div>
		
		<!--INBOX MODAL-->
		<div id="team_modals_inbox" style="display: none;" class="inbox-modal">
		</div>
		
		<!--TEAM MORE-->
		<div style="display: none;" class="team-more">
			<div class="info">
				<div class="info-header">
					<span class="t-main t-uppercase t-size-20">Hideo Kodjima</span>
					<span class="t-black t-size-14">hideo_kojima66@gmail.com</span>
				</div>
				<div class="div-flex-two">
					<span class="t-uppercase">Команда:</span>
					<span>52 чел.</span>
				</div>
				<hr width="100%">
				<div class="div-flex-two">
					<span class="t-uppercase">Бонус:</span>
					<span>543$</span>
				</div>
				<hr width="100%">
				<div class="socials">
					<ul class="socials-list">
						<li><a href="#"><img src="../images/socials/yt0.png" alt="YT"></a></li>
						<li><a href="#"><img src="../images/socials/f0.png" alt="FB"></a></li>
						<li><a href="#"><img src="../images/socials/i0.png" alt="IN"></a></li>
						<li><a href="#"><img src="../images/socials/tw0.png" alt="TW"></a></li>
						<li><a href="#"><img src="../images/socials/t0.png" alt="TG"></a></li>
						<li><a href="#"><img src="../images/socials/vk0.png" alt="VK"></a></li>
					</ul>
				</div>
			</div>
			<div class="date">
				<span class="t-white t-uppercase t-size-14">Дата регистрации</span>
				<span class="t-white t-uppercase t-size-14">22.08.2019</span>
			</div>
		</div>
		
		<!--AFFILIATE LINK INFO-->
		<div style="display: none;" class="aff-link-info-modal">
			<p>Используйте свою партнерскую ссылку, чтобы набрать новых участников</p>
		</div>
		
		<!--AFFILIATE INCOME INFO-->
		<div style="display: none;" class="aff-income-modal">
			<span class="t-white t-uppercase t-bold-400">Реферальные начисления</span>
			<div class="div-flex df-center">
				<span class="t-white">5%|3%|2%|1%|1%|1%|0.5%|0.5%|0.5%|0.5%</span>
			</div>
		</div>
		
	</div>
	
	<!--MAIN CONTENT-->
	<main class="main-content">
		
		<!--AFFILIATE BLOCK-->
		<div class="affiliate-link container" style="display:flex">
			<button class="btn" onclick="copyLink('<?php echo "https://onecli.biz/?ref=$login"; ?>')">Копировать вашу партнёрскую ссылку</button>
			<span class="t-size-12" id="refLink">https://onecli.biz/?ref=<?php echo $login; ?></span>
			<div class="div-flex df-center" onclick="copyLink('<?php echo "https://onecli.biz/?ref=$login"; ?>')">
				<svg xmlns="http://www.w3.org/2000/svg" width="23.7" height="25.442" viewBox="0 0 23.7 25.442">
  					<path d="M19.463,1H4.495A2.416,2.416,0,0,0,2,3.313V19.5H4.495V3.313H19.463Zm3.742,4.626H9.484A2.416,2.416,0,0,0,6.99,7.939V24.129a2.416,2.416,0,0,0,2.495,2.313H23.205A2.416,2.416,0,0,0,25.7,24.129V7.939A2.416,2.416,0,0,0,23.205,5.626Zm0,18.5H9.484V7.939H23.205Z" transform="translate(-2 -1)" fill="#fff"/>
				</svg>
			</div>
			<p class="t-size-12">Используйте свою партнерскую ссылку, чтобы набрать новых участников</p>
			<img src="images/info.png" alt="info">
		</div>
		
		<!--PERSONAL LANDING PAGE-->
		<div class="personal-landing container">
			<div class="personal-landing-link">
				<h2 class="t-bold-400 t-size-16 t-main t-uppercase">Ссылка на ваш личный лендинг:</h2>
				<div class="div-flex-two link">
					<a id="webLink" href="https://onecli.biz/lp?id=<?php echo $login; ?>">https://onecli.biz/lp?id=<?php echo $login; ?></a>
					<div class="div-flex df-center" onclick="copyLink('<?php echo "https://onecli.biz/lp?id=$login"; ?>')">
						<svg xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 23.7 25.442">
  							<path d="M19.463,1H4.495A2.416,2.416,0,0,0,2,3.313V19.5H4.495V3.313H19.463Zm3.742,4.626H9.484A2.416,2.416,0,0,0,6.99,7.939V24.129a2.416,2.416,0,0,0,2.495,2.313H23.205A2.416,2.416,0,0,0,25.7,24.129V7.939A2.416,2.416,0,0,0,23.205,5.626Zm0,18.5H9.484V7.939H23.205Z" transform="translate(-2 -1)" fill="#fff"/>
						</svg>
					</div>
				</div>
			</div>
			<div class="landing-email-section div-flex-two">
				<div class="div-flex df-center" onclick="team_send()">
					<span >Рассылка</span>
				</div>
				<div class="div-flex df-center" onclick="team_inbox()">
					<span >Входящие</span>
				</div>
			</div>
			<div class="landing-email-short-section div-flex df-center">
				<span class="t-main">Создать рассылку по команде</span>
			</div>
		</div>
		
		<!--MY TEAM-->
		<div class="team-table-wrapper container">
			<table class="team-table">
				<tr>
					<th colspan="2">Имя</th>
					<th class="team-email">E-mail</th>
					<th class="team-reg-date">Дата регистрации</th>
					<th class="team-mem-team">Команда</th>
					<th>Бонус</th>
					<th></th>
  				</tr>
<!--
				<tr>
					
				</tr>
				<tr>
					
				</tr>
				<tr>
					
				</tr>
				<tr>
					
				</tr>
				<tr>
					
				</tr>
-->
				
				<?php
	

    $prov = "SELECT * FROM $userstable where ref = '$id'";
    $res = mysqli_query($connection,$prov);
    $numberkk = mysqli_num_rows($res);
    if($numberkk != 0){ 
	  $b = 0;
	  while ($row=mysqli_fetch_array($res)) { 
	    $id_us = $row['id'];
	    $prov1 = "SELECT * FROM user_info where uid = '$id_us'";
        $res1 = mysqli_query($connection,$prov1);
        $numberkk1 = mysqli_num_rows($res1);
        if($numberkk1 == 0){ 
	      $ava = "oneclickimgava.jpg";
		  $name = "Не указано";
	    }else{
          while ($row1=mysqli_fetch_array($res1)) { 
		    $uid = $row1['uid'];
		    $name = $row1['name'];
	        if($row1['ava'] == "0"){
	          $ava = "oneclickimgava.jpg";
		    }else{
              $ava = $login.".jpg";
		    }
	      }
		}
	    $provs = "SELECT * FROM users where id = '$id_us'";
        $ress = mysqli_query($connection,$provs);
          while ($rows=mysqli_fetch_array($ress)) { 
	        $email = $rows['email'];
			$dts = $rows['dates'];
			$login_us = $rows['login'];
	      }
		  
		echo '<tr onclick="getInfo(\"'.$login_us.'\")">';
		echo '<td><div style="background: url(avatars/'.$ava.'); background-position: center; background-size: cover;" class="team-member-image"></div></td>';
		echo '<td>'.$name.'</td>';
		echo '<td class="team-email">'.$email.'</td>';
		echo '<td class="team-reg-date">'.$dts.'</td>';
		echo '<td class="team-mem-team">0</td>';
		echo '<td>0$</td>';
		echo '<td class="t-main">Подробнее</td>';
		echo '</tr>';
      }	
	}
	
	
    mysqli_close($connection);
	
	
	
	?>
	
			</table>
			<div class="team-table-pager div-flex df-spaceb t-gray">
				<button>
					<svg class="svg-pager" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25">
						<g fill="none" stroke="#4f5a7b" stroke-width="1">
							<circle cx="12.5" cy="12.5" r="12.5" stroke="none"/>
							<circle cx="12.5" cy="12.5" r="12" fill="none"/>
						</g>
						<path d="M6.1,11.079h0L0,5.477,6.1,0l.818,1.267L2.334,5.477,7,9.766v.1l-.9,1.213Z" transform="translate(8.3 6.563)" fill="#4f5a7b"/>
					</svg>
				</button>
				<p>
					<span class="current-page">1</span>|<span class="total-pages">15</span>
				</p>
				<button>
					<svg class="svg-pager" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25">
						<g fill="none" stroke="#4f5a7b" stroke-width="1">
							<circle cx="12.5" cy="12.5" r="12.5" stroke="none"/>
							<circle cx="12.5" cy="12.5" r="12" fill="none"/>
						</g>
						<path d="M6.1,0h0L0,5.6l6.1,5.477.818-1.267L2.334,5.6,7,1.313v-.1L6.1,0Z" transform="translate(16.7 17.642)rotate(180)" fill="#4f5a7b"/>
					</svg>
				</button>
			</div>
		</div>
		
		<!--AFFILATE INFO-->
		<div class="affiliate-info container">
			<div class="personal-info div-flex df-spacea">
				<span class="t-size-14 t-white">Ваш уровень: <span>0</span> lvl</span>
				<span class="t-size-14 t-white">Наличие долей: <span>0</span></span>
				<span class="t-size-14 t-white">Оборот 1 lvl: <span>0</span></span>
				<span class="t-size-14 t-white">Общ. оборот: <span>0</span></span>
			</div>
			<div class="affiliate-header div-flex-two">
				<span class="t-main t-uppercase t-size-14">Уровень</span>
				<span class="t-main t-uppercase t-size-14">Условия</span>
				<span class="t-main t-uppercase t-size-14">Вознаграждения</span>
			</div>
			<table class="affiliate-table">
				<tr>
					<th></th>
					<th>Наличие долей</th>
					<th>Оборот 1 lvl</th>
					<th>Общ. оборот</th>
					<th>Реферальная программа</th>
					<th>Реф. программа</th>
					<th>Подарок</th>
  				</tr>
				<tr>
					<td>1 Lvl</td>
					<td>1k</td>
					<td>1.5k</td>
					<td>15k</td>
					<td>5%|3%|2%</td>
					<td>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
							<g>
								<path d="M0,0H24V24H0Z" fill="none"/>
							</g>
							<g>
								<g>
									<path d="M12,6.5A9.77,9.77,0,0,1,20.82,12,9.822,9.822,0,0,1,3.18,12,9.77,9.77,0,0,1,12,6.5m0-2A11.827,11.827,0,0,0,1,12a11.817,11.817,0,0,0,22,0A11.827,11.827,0,0,0,12,4.5Z" fill="#34c28d"/>
									<path d="M12,9.5A2.5,2.5,0,1,1,9.5,12,2.5,2.5,0,0,1,12,9.5m0-2A4.5,4.5,0,1,0,16.5,12,4.507,4.507,0,0,0,12,7.5Z" fill="#34c28d"/>
								</g>
							</g>
						</svg>
					</td>
					<td>150 долей</td>
				</tr>
				<tr>
					<td>2 Lvl</td>
					<td>2.5k</td>
					<td>2.5k</td>
					<td>25k</td>
					<td>5%|3%|2%</td>
					<td>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
							<g>
								<path d="M0,0H24V24H0Z" fill="none"/>
							</g>
							<g>
								<g>
									<path d="M12,6.5A9.77,9.77,0,0,1,20.82,12,9.822,9.822,0,0,1,3.18,12,9.77,9.77,0,0,1,12,6.5m0-2A11.827,11.827,0,0,0,1,12a11.817,11.817,0,0,0,22,0A11.827,11.827,0,0,0,12,4.5Z" fill="#34c28d"/>
									<path d="M12,9.5A2.5,2.5,0,1,1,9.5,12,2.5,2.5,0,0,1,12,9.5m0-2A4.5,4.5,0,1,0,16.5,12,4.507,4.507,0,0,0,12,7.5Z" fill="#34c28d"/>
								</g>
							</g>
						</svg>
					</td>
					<td>250 долей</td>
				</tr>
				<tr>
					<td>3 Lvl</td>
					<td>5k</td>
					<td>5k</td>
					<td>50k</td>
					<td>5%|3%|2%</td>
					<td>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
							<g>
								<path d="M0,0H24V24H0Z" fill="none"/>
							</g>
							<g>
								<g>
									<path d="M12,6.5A9.77,9.77,0,0,1,20.82,12,9.822,9.822,0,0,1,3.18,12,9.77,9.77,0,0,1,12,6.5m0-2A11.827,11.827,0,0,0,1,12a11.817,11.817,0,0,0,22,0A11.827,11.827,0,0,0,12,4.5Z" fill="#34c28d"/>
									<path d="M12,9.5A2.5,2.5,0,1,1,9.5,12,2.5,2.5,0,0,1,12,9.5m0-2A4.5,4.5,0,1,0,16.5,12,4.507,4.507,0,0,0,12,7.5Z" fill="#34c28d"/>
								</g>
							</g>
						</svg>
					</td>
					<td>500 долей</td>
				</tr>
				<tr>
					<td>4 Lvl</td>
					<td>10k</td>
					<td>10k</td>
					<td>100k</td>
					<td>5%|3%|2%|1%</td>
					<td>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
							<g>
								<path d="M0,0H24V24H0Z" fill="none"/>
							</g>
							<g>
								<g>
									<path d="M12,6.5A9.77,9.77,0,0,1,20.82,12,9.822,9.822,0,0,1,3.18,12,9.77,9.77,0,0,1,12,6.5m0-2A11.827,11.827,0,0,0,1,12a11.817,11.817,0,0,0,22,0A11.827,11.827,0,0,0,12,4.5Z" fill="#34c28d"/>
									<path d="M12,9.5A2.5,2.5,0,1,1,9.5,12,2.5,2.5,0,0,1,12,9.5m0-2A4.5,4.5,0,1,0,16.5,12,4.507,4.507,0,0,0,12,7.5Z" fill="#34c28d"/>
								</g>
							</g>
						</svg>
					</td>
					<td>1k долей</td>
				</tr>
				<tr>
					<td>5 Lvl</td>
					<td>15k</td>
					<td>15k</td>
					<td>150k</td>
					<td >5%|3%|2%|1%|1%</td>
					<td>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
							<g>
								<path d="M0,0H24V24H0Z" fill="none"/>
							</g>
							<g>
								<g>
									<path d="M12,6.5A9.77,9.77,0,0,1,20.82,12,9.822,9.822,0,0,1,3.18,12,9.77,9.77,0,0,1,12,6.5m0-2A11.827,11.827,0,0,0,1,12a11.817,11.817,0,0,0,22,0A11.827,11.827,0,0,0,12,4.5Z" fill="#34c28d"/>
									<path d="M12,9.5A2.5,2.5,0,1,1,9.5,12,2.5,2.5,0,0,1,12,9.5m0-2A4.5,4.5,0,1,0,16.5,12,4.507,4.507,0,0,0,12,7.5Z" fill="#34c28d"/>
								</g>
							</g>
						</svg>
					</td>
					<td>1.5k долей</td>
				</tr>
				<tr>
					<td>6 Lvl</td>
					<td>30k</td>
					<td>30k</td>
					<td>250k</td>
					<td>5%|3%|2%|1%|1%|1%</td>
					<td>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
							<g>
								<path d="M0,0H24V24H0Z" fill="none"/>
							</g>
							<g>
								<g>
									<path d="M12,6.5A9.77,9.77,0,0,1,20.82,12,9.822,9.822,0,0,1,3.18,12,9.77,9.77,0,0,1,12,6.5m0-2A11.827,11.827,0,0,0,1,12a11.817,11.817,0,0,0,22,0A11.827,11.827,0,0,0,12,4.5Z" fill="#34c28d"/>
									<path d="M12,9.5A2.5,2.5,0,1,1,9.5,12,2.5,2.5,0,0,1,12,9.5m0-2A4.5,4.5,0,1,0,16.5,12,4.507,4.507,0,0,0,12,7.5Z" fill="#34c28d"/>
								</g>
							</g>
						</svg>
					</td>
					<td>2.5k долей</td>
				</tr>
				<tr>
					<td>7 Lvl</td>
					<td>60k</td>
					<td>60k</td>
					<td>500k</td>
					<td>5%|3%|2%|1%|1%|1%|0.5%</td>
					<td>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
							<g>
								<path d="M0,0H24V24H0Z" fill="none"/>
							</g>
							<g>
								<g>
									<path d="M12,6.5A9.77,9.77,0,0,1,20.82,12,9.822,9.822,0,0,1,3.18,12,9.77,9.77,0,0,1,12,6.5m0-2A11.827,11.827,0,0,0,1,12a11.817,11.817,0,0,0,22,0A11.827,11.827,0,0,0,12,4.5Z" fill="#34c28d"/>
									<path d="M12,9.5A2.5,2.5,0,1,1,9.5,12,2.5,2.5,0,0,1,12,9.5m0-2A4.5,4.5,0,1,0,16.5,12,4.507,4.507,0,0,0,12,7.5Z" fill="#34c28d"/>
								</g>
							</g>
						</svg>
					</td>
					<td>5k долей</td>
				</tr>
				<tr>
					<td>8 Lvl</td>
					<td>150k</td>
					<td>150k</td>
					<td>1m</td>
					<td>5%|3%|2%|1%|1%|1%|0.5%|0.5%</td>
					<td>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
							<g>
								<path d="M0,0H24V24H0Z" fill="none"/>
							</g>
							<g>
								<g>
									<path d="M12,6.5A9.77,9.77,0,0,1,20.82,12,9.822,9.822,0,0,1,3.18,12,9.77,9.77,0,0,1,12,6.5m0-2A11.827,11.827,0,0,0,1,12a11.817,11.817,0,0,0,22,0A11.827,11.827,0,0,0,12,4.5Z" fill="#34c28d"/>
									<path d="M12,9.5A2.5,2.5,0,1,1,9.5,12,2.5,2.5,0,0,1,12,9.5m0-2A4.5,4.5,0,1,0,16.5,12,4.507,4.507,0,0,0,12,7.5Z" fill="#34c28d"/>
								</g>
							</g>
						</svg>
					</td>
					<td>10k долей</td>
				</tr>
				<tr>
					<td>9 Lvl</td>
					<td>300k</td>
					<td>300k</td>
					<td>1.5m</td>
					<td>5%|3%|2%|1%|1%|1%|0.5%|0.5%|0.5%</td>
					<td>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
							<g>
								<path d="M0,0H24V24H0Z" fill="none"/>
							</g>
							<g>
								<g>
									<path d="M12,6.5A9.77,9.77,0,0,1,20.82,12,9.822,9.822,0,0,1,3.18,12,9.77,9.77,0,0,1,12,6.5m0-2A11.827,11.827,0,0,0,1,12a11.817,11.817,0,0,0,22,0A11.827,11.827,0,0,0,12,4.5Z" fill="#34c28d"/>
									<path d="M12,9.5A2.5,2.5,0,1,1,9.5,12,2.5,2.5,0,0,1,12,9.5m0-2A4.5,4.5,0,1,0,16.5,12,4.507,4.507,0,0,0,12,7.5Z" fill="#34c28d"/>
								</g>
							</g>
						</svg>
					</td>
					<td>15k долей</td>
				</tr>
				<tr>
					<td>10 Lvl</td>
					<td>500k</td>
					<td>500k</td>
					<td>2.5m</td>
					<td>5%|3%|2%|1%|1%|1%|0.5%|0.5%|0.5%|0.5%</td>
					<td>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
							<g>
								<path d="M0,0H24V24H0Z" fill="none"/>
							</g>
							<g>
								<g>
									<path d="M12,6.5A9.77,9.77,0,0,1,20.82,12,9.822,9.822,0,0,1,3.18,12,9.77,9.77,0,0,1,12,6.5m0-2A11.827,11.827,0,0,0,1,12a11.817,11.817,0,0,0,22,0A11.827,11.827,0,0,0,12,4.5Z" fill="#34c28d"/>
									<path d="M12,9.5A2.5,2.5,0,1,1,9.5,12,2.5,2.5,0,0,1,12,9.5m0-2A4.5,4.5,0,1,0,16.5,12,4.507,4.507,0,0,0,12,7.5Z" fill="#34c28d"/>
								</g>
							</g>
						</svg>
					</td>
					<td>25k долей</td>
				</tr>
			</table>
		</div>
		
	</main>
	
	
	<script src="js/team.js?8"></script>
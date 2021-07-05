<?php
  session_start();
?>
<!doctype html>
<html lang="ru">
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache">
	  
	<link href="css/main.css?8" rel="stylesheet">
	<link href="css/header.css?1" rel="stylesheet">
	<link href="images/logo.png" rel="icon">
	<link href="https://fonts.gstatic.com" rel="preconnect">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
	 
	<!-- подгружаем нужный нам класс стилей -->
	<?php
	  if($_SERVER['QUERY_STRING'] == "room"){
	    echo '<link href="css/invest.css?4" rel="stylesheet">';
        echo '<title>ONECLI. - Тестовая версия / Инвестиции в ONECLI</title>';
	  }else if($_SERVER['QUERY_STRING'] == "faq"){
	    echo '<link href="css/faq3.css" rel="stylesheet">';
        echo '<title>ONECLI. - Тестовая версия / FAQ | Вопрос - ответ</title>';
	  }else if($_SERVER['QUERY_STRING'] == "idea"){
	    echo '<link href="css/idea.css?2" rel="stylesheet">';
        echo '<title>ONECLI. - Тестовая версия / Идея ONECLI.</title>';
	  }else if($_SERVER['QUERY_STRING'] == "bounty"){
	    echo '<link href="css/bounty.css?3" rel="stylesheet">';
        echo '<title>ONECLI. - Тестовая версия / Bounty кампания</title>';
	  }else if($_SERVER['QUERY_STRING'] == "promo"){
	    echo '<link href="css/promo.css?1" rel="stylesheet">';
        echo '<title>ONECLI. - Тестовая версия / Промоматериалы</title>';
	  }else if($_SERVER['QUERY_STRING'] == "account"){
	    echo '<link href="css/settings.css?4" rel="stylesheet">';
        echo '<title>ONECLI. - Тестовая версия / Настройки</title>';
	  }else if($_SERVER['QUERY_STRING'] == "lots"){
	    echo '<link href="css/lots.css?5" rel="stylesheet">';
	    echo '<link href="css/history.css" rel="stylesheet">';
        echo '<title>ONECLI. - Тестовая версия / Лоты</title>';
	  }else if($_SERVER['QUERY_STRING'] == "team"){
	    echo '<link href="css/team.css?5" rel="stylesheet">';
        echo '<title>ONECLI. - Тестовая версия / Моя команда</title>';
	  }else if($_SERVER['QUERY_STRING'] == "authorization"){
	    echo '<link href="css/login.css?4" rel="stylesheet">';
        echo '<title>ONECLI. - Тестовая версия / Авторизация</title>';
	  }else if($_SERVER['QUERY_STRING'] == "registration"){
	    echo '<link href="css/signin.css?1" rel="stylesheet">';
        echo '<title>ONECLI. - Тестовая версия / Регистрация</title>';
	  }else if($_SERVER['QUERY_STRING'] == "game"){
	    echo '<link href="css/game.css?1" rel="stylesheet">';
        echo '<title>ONECLI. - Тестовая версия / Большая игра</title>';
	  }else if($_SERVER['QUERY_STRING'] == "tickets"){
	    echo '<link href="css/tickets.css" rel="stylesheet">';
        echo '<title>ONECLI. - Тестовая версия / Тикеты</title>';
	  }else if($_SERVER['QUERY_STRING'] == "news"){
	    echo '<link href="css/news.css" rel="stylesheet">';
        echo '<title>ONECLI. - Тестовая версия / Новости</title>';
	  }else if($_SERVER['QUERY_STRING'] == "statistics"){
	    echo '<link href="css/stats.css?1" rel="stylesheet">';
        echo '<title>ONECLI. - Тестовая версия / Статистика</title>';
	  }else if($_SERVER['QUERY_STRING'] == "transactions"){
	    echo '<link href="css/history.css" rel="stylesheet">';
        echo '<title>ONECLI. - Тестовая версия / История транзакций</title>';
	  }else if($_SERVER['QUERY_STRING'] == "exchange"){
	    echo '<link href="css/exchange.css" rel="stylesheet">';
        echo '<title>ONECLI. - Тестовая версия / Биржа долей</title>';
	  }else{
	    echo '<link href="css/login.css?3" rel="stylesheet">';
        echo '<title>ONECLI. - Тестовая версия / Авторизация</title>';
	  }
	  
	  
	?>
	<script src="https://code.jquery.com/jquery-latest.js"></script>
	<script src="https://code.jquery.com/color/jquery.color-2.2.0.js" integrity="sha256-gvMJWDHjgDrVSiN6eBI9h7dRfQmsTTsGU/eTT8vpzNg=" crossorigin="anonymous"></script>

  </head>
  
  <body>
  
  
  
  
    <!--ALERT MODAL-->
	<div id="global_alert" style="display: none; z-index: 110;" class="modals">
      <div class="modal-share-exchange div-flex-two df-col">
        <div class="modal-share-exchange-wrapper">
          <div class="modal-header"><span class="t-uppercase t-bold-400" id="global_alert_title">345345</span></div>
				<p class="t-bold-300" id="global_alert_message">345</p>
				<hr width="200px">
		  </div>
        <button class="btn obj-w-100p t-uppercase" onclick="alertClose()">Закрыть</button>
      </div>
    </div>
	
	
	
  <?php
    $link = $_SERVER['QUERY_STRING'];
    echo "<script> var ref=''; </script>";
    if($link == "" || $link == "authorization"){
	  include('pages/auth.php');
	}else if($link == "registration"){
	  include('pages/reg.php');
	}else if(strpos($link, 'ref') !== false){
	  $arr = explode("ref=", $link);
      echo "<script>ref='".$arr[1]."'; </script>";
	  include('pages/main.php');
	}else{
	  include('pages/'.$link.'.php');
	  include('pages/menu.php');
	}
  ?>
	<!-- скрипты -->
	<script src="js/main.js?14"></script>
  </body>
</html>
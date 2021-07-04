///доли
function send_shares(){
  document.getElementById("modals_backgorund").style.display=null;
  document.getElementById("send_shares").style.display=null;
}
function off_send_shares(){
  document.getElementById("modals_backgorund").style.display="none";
  document.getElementById("send_shares").style.display="none";
}



///баланс
function send_balance(){
  document.getElementById("modals_backgorund").style.display=null;
  document.getElementById("send_balance").style.display=null;
}
function off_send_balance(){
  document.getElementById("modals_backgorund").style.display="none";
  document.getElementById("send_balance").style.display="none";
}
function send_reinvest(){
  document.getElementById("modal_send_balance").style.display="none";
  document.getElementById("modal_reinvest").style.display=null;
}
function send_friend(){
  document.getElementById("modal_send_balance").style.display=null;
  document.getElementById("modal_reinvest").style.display="none";
}

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
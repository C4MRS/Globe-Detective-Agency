src = "https://smtpjs.com/v3/smtp.js";
function emailCheck() {
  var nome = document.getElementById("nome").value;
  var cognome = document.getElementById("cognome").value;
  var email = document.getElementById("email").value;
  var psw = document.getElementById("password").value;
  var tel = document.getElementById("tel").value;

  var OTP = Math.floor(Math.random() * (9999 - 1000) + 1000);
  document.getElementById('codiceNascosto').value = OTP;

  if (nome === "" || cognome === "" || psw === "" || tel.length < 10) {
      alert("Uno o più campi sono vuoti o errati, per favore compilali tutti!");
  } else {

      document.getElementById("codice").className = "showALL";
      document.getElementById("buttonCheck").className = "showALLB";
      Email.send({
          Host: "smtp.gmail.com",
          Username: "mannaggamarinrammachiav@gmail.com",
          Password: "ihjP0NrM9lol",
          To: email,
          From: "mannaggamarinrammachiav@gmail.com",
          Subject: "OTP di conferma",
          Body: "Il codice OTP è: " + OTP
      })
          .then(function (message) {
              alert("Controlla la tua casella di posta elettronica per il codice OTP!")
          });
  }
}
src = "https://smtpjs.com/v3/smtp.js";
function emailCheckD(subject, message) {
    alert(subject);
    alert(message);
    Email.send({
        Host: "smtp.gmail.com",
        Username: "mannaggamarinrammachiav@gmail.com",
        Password: "ihjP0NrM9lol",
        To: "difendiamolanoia@gmail.com",
        From: "mannaggamarinrammachiav@gmail.com",
        Subject: subject,
        Body: message,
    })
    .then(function (message) {
        alert("Email inviata!")
    });
}
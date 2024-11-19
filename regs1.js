function sendMail(event){
    let parms ={
    name: document.getElementById("name").value,
    email: document.getElementById("email").value,
    contact: document.getElementById("contact").value,
    subject: document.getElementById("subject").value,
    message: document.getElementById("message").value,

}
emailjs.send("service_tsy3nvk", "template_fta5hjb", parms)
.then(function(response) {
    console.log('SUCCESS!', response.status, response.text);
    showNotification("Successfully sent", "success");
}, function(error) {
    console.log('FAILED...', error);
    showNotification("An error occurred", "error");
});

}
function validateForm() {
    let password = document.getElementById("password").value;
    let email = document.getElementById("email").value;
    let phone = document.getElementById("phone").value; 

    if (password.length < 8) {
        alert("Password must be at least 8 characters long.");
        return false;
    }

    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email.match(emailPattern)) {
        alert("Please enter a valid email address.");
        return false;
    }
    if(phone.length != 10 && phone.length != 13){
        return false;
    }
    
}
$(document).ready(function(){
    if(!($(".success").hasClass("d-none")))
    {
        $(".container").toggleClass("op");
    }
})
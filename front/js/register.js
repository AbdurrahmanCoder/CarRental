const myForm = document.getElementById("myForm"); 
const FormTOFill = document.getElementById("FormTOFill"); 
const registerSuccess = document.getElementById("registerSuccess"); 


myForm.addEventListener('submit', function (e) {
    e.preventDefault();
    const formData = new FormData(this);
 
    fetch("/public_html/models/register.php", {
        method: "post",
        body: formData
    })
   .then(function (response) {
      return response.text();
  })
  .then(function (text) {
      console.log(text);

      if (text.includes("true"))  {
             myForm.style.display = 'none';
             FormTOFill.style.display = 'none';
             registerSuccess.style.display = 'block';
             registerSuccess.style.display = 'flex';
             registerSuccess.style.justifyContent = 'center';
             
     const buttonToRegsiter = document.getElementById("buttonToRegsiter");
            buttonToRegister.textContent = "Login";
            buttonToRegister.addEventListener("click", function() {
            window.location.href = "https://carrentalapplication.000webhostapp.com/login";

     const buttonToLogin = document.getElementById("buttonToLogin"); 
      const button = document.createElement("button");
                    button.textContent = "Click me";
                    button.classList.add("btn", "btn-primary");
                    buttonToLogin.appendChild(button);
});
         
        } else { 
            console.log(data.message);
        }
    })
    .catch(error => {
        console.log("Error:", error);
    });
});
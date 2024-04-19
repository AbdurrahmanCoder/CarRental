const myForm = document.getElementById("myForm"); 
myForm.addEventListener('submit', function (e) {
  e.preventDefault();
  const formData = new FormData(this);.
  formData.append("action", "insert");
  console.log(formData);
  fetch("../models/AdminMod.php", {
    method: "post",
    body: formData 
  })
    .then(function (response) {
      return response.text();
    })
    .then(function (text) {
      console.log(text);
      console.log("deekljkledlekdj");

      if (text.includes("data inserted")) {
        myForm.reset();
        console.log("Form cleared");
        let success = document.querySelector('#success')
        success.style.opacity ="1"; 
        setTimeout(function () {
          success.style.opacity = "0";  
      }, 3000); 
      }
    });
});







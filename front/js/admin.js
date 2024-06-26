const myForm = document.getElementById("myForm"); 
myForm.addEventListener('submit', function (e) {
  e.preventDefault();
  const formData = new FormData(this);
  console.log(formData);
  formData.append('action', 'insert');

  fetch("../models/AdminMod.php", {
    method: "post",
    body: formData
  })
    .then(function (response) {
      return response.text();
    })
    .then(function (text) {
      console.log(text); 
      if (text.includes("data inserted")) {
        console.log(text);
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

 
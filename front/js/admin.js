 
 const myForm = document.getElementById("myForm"); 

myForm.addEventListener('submit', function (e) {
    e.preventDefault();
    const formData = new FormData(this); 
    console.log(formData); 
    fetch("views/admin/insertdata.php", {
        method: "post",
        body: formData
    })
   .then(function (response) {
      return response.text();
  })
  .then(function (text) {
      console.log(text); 
      if (text.includes("data inserted")) { 
        myForm.reset();
        console.log("Form cleared");
    }
  });
});


let delBtn = document.querySelectorAll('.DelButtonClicked'); 


delBtn.forEach(element => {
     

    element.addEventListener("click",DeleteTestinonial)

});


function DeleteTestinonial(e){
  
e.preventDefault()

 const id = this.getAttribute('data-id') 
    fetch('../models/AdminMod.php', {
        method: 'POST',
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
    },
 body: `id=${encodeURIComponent(id)}&action=TestimonialDelete`,
}) 
  
.then(response => response.text())
.then(data => {
    console.log(data); 
    this.parentNode.parentNode.remove();
    console.log(this); 
})
.catch(error => {
    console.error('Error:', error);
}); 
}
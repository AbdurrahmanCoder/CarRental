   let buttonClicked = document.querySelectorAll('.buttonClicked');  

console.log(buttonClicked)
buttonClicked.forEach((item) => { 
    item.addEventListener("click", deleted);
} )
 
function deleted() {
    const id = this.getAttribute('data-id');
    
    console.log("Clicked ID:", id);
    
    fetch('views/admin/insertdata.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `id=${encodeURIComponent(id)}`,
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

    
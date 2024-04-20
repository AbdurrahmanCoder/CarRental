let button = document.getElementById('button');

button.addEventListener('click', functionRun)

function functionRun() {


    const SelectedId = this.getAttribute('data-SelectedId');

    fetch('../models/AdminMod.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `SelectedId=${encodeURIComponent(SelectedId)}&action=confirmed`,
          
    
    })
        .then(response => response.text())
        .then(data => {
            console.log(data);
            console.log(this); 
            this.classList.remove("pending")
            this.classList.add("confirmed")  
        })
        .catch(error => {
            console.error('Error:', error);
        });



    console.log("clickedme", SelectedId);
}



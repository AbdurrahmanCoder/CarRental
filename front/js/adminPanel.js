 

let button = document.getElementById('button');

button.addEventListener('click', functionRun);

function functionRun() {
    const SelectedId = this.getAttribute('data-SelectedId');
    const buttonElement = this; // Store a reference to the button element

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
        console.log("eeddededededed");
        console.log(buttonElement); // Use buttonElement instead of this
        buttonElement.classList.remove("pending");
        buttonElement.classList.add("confirmed");
        buttonElement.innerHTML = "confirmed";
    })
    .catch(error => {
        console.error('Error:', error);
    });

    console.log("clickedme", SelectedId);
}
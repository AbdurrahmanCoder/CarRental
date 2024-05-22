 


// document.querySelectorAll('.buttonClicked').forEach(button => {
//     button.addEventListener('click', function() {
//         const modal = document.getElementById("myModal");
//         modal.style.display = "block";
//         const id = document.querySelector('#id').innerText;
//         const tarif = document.querySelector('#tarif').innerText;
//         const kilometrage = document.querySelector('#kilometrage').innerText;
//         const imageSrc = document.querySelector('#image').src;
        


//         // Populate modal fields with data
//     document.getElementById('carIdmodel').textContent = id;
//       document.getElementById('tarifModel').textContent = tarif;
//         document.getElementById('kilometragemodel').value = kilometrage;
//      document.getElementById('carImagemodel').src = imageSrc;

   
//     });
// });
 
// // Close modal when close button is clicked
// document.querySelector('.close').addEventListener('click', function() {
//     const modal = document.getElementById("myModal");
//     modal.style.display = "none";
// });

// document.getElementById('updateBtn').addEventListener('click', function() {
//     const carId = document.getElementById('carIdmodel').value;


//     const tarif = document.getElementById('tarifModel').value;
//     const kilometrage = document.getElementById('kilometragemodel').value;
    

//     console.log(carId,tarif,kilometrage)
//     console.log(carId)



//     const formData = new FormData();
//     formData.append('carId', carId);
//     formData.append('tarif', tarif);
//     formData.append('kilometrage', kilometrage);
//     formData.append('action', 'update');
    
//     console.log(carId)
//     console.log("dededdeddedededededeed")


//     // Fetch POST request
//     fetch('../models/AdminMod.php', {
//         method: 'POST',
//         body: formData
//     })
//     .then(response => {
//         if (!response.ok) {
//             throw new Error('Network response was not ok');
//         }
//         return response.text();
//     })
//     .then(data => {
//         // Handle response from server if needed
//         console.log(data);
//     })
//     .catch(error => {
//         console.error('There was a problem with your fetch operation:', error);
//     }); 

// });



document.querySelectorAll('.buttonClicked').forEach(button => {
    button.addEventListener('click', function() {
        const row = this.closest('tr');
        const id = row.querySelector('.carId').innerText;
        const tarif = row.querySelector('.tarif').innerText;
        const kilometrage = row.querySelector('.kilometrage').innerText;
        const imageSrc = row.querySelector('.carImage').src;

        const modal = document.getElementById("myModal");
        modal.style.display = "block";

        document.getElementById('carIdmodel').textContent = id;
        document.getElementById('tarifModel').value = tarif;
        document.getElementById('kilometragemodel').value = kilometrage;
        document.getElementById('carImagemodel').src = imageSrc;
    });
});

document.querySelector('.close').addEventListener('click', function() {
    const modal = document.getElementById("myModal");
    modal.style.display = "none";
});

document.getElementById('updateBtn').addEventListener('click', function() {
    const carId = document.getElementById('carIdmodel').textContent;
    const tarif = document.getElementById('tarifModel').value;
    const kilometrage = document.getElementById('kilometragemodel').value;

    // console.log(carId, tarif, kilometrage);

    const formData = new FormData();
    formData.append('carId', carId);
    formData.append('tarif', tarif);
    formData.append('kilometrage', kilometrage);
    formData.append('action', 'update');

    fetch('../models/AdminMod.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.text();  
    })
    .then(data => {
        console.log(data);  
        
        
        window.location.reload();  
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
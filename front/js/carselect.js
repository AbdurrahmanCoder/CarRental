var carId, carMarque, carTarif, carImg;   
document.querySelectorAll('.bookButtonSelect').forEach(function(button) {
    button.addEventListener('click', function(e) {
        e.preventDefault();

        carId = this.dataset.carId;
        carMarque = this.dataset.carMarque;
        carTarif = this.dataset.carTarif;
        carImg = this.dataset.carImg; 
        // console.log(carId, carMarque, carTarif, carImg);
        SelectedCar(carId, carMarque, carTarif, carImg); 
  
    });
});

function SelectedCar(carId, carMarque, carTarif, carImg) {
    document.querySelector('.carSelected').innerHTML = `
    <p> <b> Selected Car :</b>${carMarque}<p/>
    <p><b>  Per day Tarif:</b> ${carTarif}<p/>
    <b> Car selected :</b> 
    <img style="width:120px " src=" ../front/imgRental/${carImg}" >` ;
    
    document.querySelector('.checkout').style.opacity = 1; 
    console.log(carId)
    
  let dfez =  document.querySelector('.SelectedCarID');
    
  dfez.value = `${carId}`;

    console.log(dfez)
  
    //sendData();



    


    
}
// document.querySelector('.check').innerHTML = carTarif;
  





// function sendData() {
//     var data = {
//         carids: carId,
//         marque:  carMarque,
//         tarif: carTarif,
//         img:carImg
//     }; 
//     var xhr = new XMLHttpRequest();
//     xhr.open("POST", "models/checkout.php", true);
//     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
//     xhr.onreadystatechange = function () {
//         if (xhr.readyState == XMLHttpRequest.DONE) {
//             // Redirect to the PHP page after sending data
//             window.location.href = `/checkout`;     
//            }
//     }; 
//     var formData = Object.keys(data).map(function (key) {
//         return encodeURIComponent(key) + '=' + encodeURIComponent(data[key]);
//     }).join('&');

//     xhr.send(formData);
// }
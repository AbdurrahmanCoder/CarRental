
let questions = document.querySelectorAll(".questions"); 
let answer = document.querySelectorAll(".answer");
questions.forEach((q, index) => {
  q.addEventListener("click", () => { 
      answer.forEach((answers, i) => {
        if(index === i) 
        { 
          console.log(answer[i])
          answer[i].classList.toggle("displ");
          questions[i].classList.toggle("colorChange");
          
        }
        else{
  answer[i].classList.remove("displ"); 
  questions[i].classList.remove("colorChange");
 
} 
    });
  });
});



document.getElementById('PickUp').addEventListener('input', function() {
        var pickUpDate = new Date(this.value); 
        var dropOffDateInput = document.getElementById('DropOf');
        
        // Enable the drop-off date input
        dropOffDateInput.disabled = false;

        // Set the minimum date for drop-off to the selected pick-up date
        dropOffDateInput.min = formatDate(pickUpDate);
    });

    function formatDate(date) {
        var yyyy = date.getFullYear();
        var mm = String(date.getMonth() + 1).padStart(2, '0');
        var dd = String(date.getDate()).padStart(2, '0');
        return yyyy + '-' + mm + '-' + dd;
    }
 


 
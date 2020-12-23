// Capturar los elementos
let form = document.querySelector("#form");
const email = document.querySelector("#customerEmail");
const name = document.querySelector("#customerName");
const message = document.querySelector("#customerMessage");
// const errorMessages = document.querySelectorAll(".errorMessage");

const errorEmail = document.querySelector("#errorEmail");
const errorName = document.querySelector("#errorName");
const errorText = document.querySelector("#errorText");

//const messageSendAlert = document.querySelector("#messageSendAlert");

// console.log(form);

function validEmail(email)
{
  var re = /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;

  return re.test(email);
}

form.addEventListener('submit', function(e) {
  e.preventDefault();
  let errors = [];
  // Poner los elementos con error en el array errors
  if (email.value=='') errors.push(errorEmail);
  if (!validEmail(email.value)) errors.push("invalid email");
  if (name.value=='') errors.push(errorName);

  if (message.value=='') errors.push(errorText);

  if (errors.length > 0) {
    let allErrors = ""
    for(let i =0; i< errors.length; i++) {
      allErrors += errors[i] + "\n ";
    }
    // mostrar los errores en los campos que los posean
    errors.forEach(error=>{ console.log(error.style="inline")}); 
    return false;
  }
  else {
  	// enviar el formulario
    this.submit();
    return true;
  }

});

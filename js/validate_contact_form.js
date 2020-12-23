console.log("is loading");
// const submit = document.querySelector("#submit");
const submit = document.querySelector("#form");
const email = document.querySelector("#customerEmail");
const name = document.querySelector("#customerName");
const message = document.querySelector("#customerMessage");
console.log(submit);

function validEmail(email)
{
  var re = /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;

  return re.test(email);
}
submit.addEventListener('click', function(e) {
  // e.preventDefault();
  console.log('no se envia pa');
  let errors = [];
  if (email.value=='') errors.push("email can't be empty");
  if (!validEmail(email.value)) errors.push("provide a valid email");
  if (name.value=='') errors.push("name can't be empty");
  if (message.value=='') errors.push("Messge can't be empty");

  if (errors.length > 0) {
    let allErrors = ""
    for(let i =0; i< errors.length; i++) {
      allErrors += errors[i] + "\n ";
    }
    alert( allErrors);
    e.preventDefault();
    return false;
  }
  else {
    // e.currentTarget.submit();
    alert("Your message was successfuly sent");
    console.log( 'deberia enviarlo');
    // this.submit();
    return true;
  }

});

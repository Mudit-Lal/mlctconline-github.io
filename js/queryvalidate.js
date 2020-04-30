


var submitted=false;
function clientvalidateForm() {
    var fullname = document.forms["client_registration"]["entry.2005620554"].value;
    var phno = document.forms["client_registration"]["entry.1166974658"].value;
    var email = document.forms["client_registration"]["entry.1045781291"].value;
    var emailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

    if (fullname == "") {
        alert("Full name must be filled out");
        return false;
      }
      if (phno == "") {
        alert("Phone Number must be filled out");
        return false;
      }

      if (emailformat.test(email) == false)
      {
            alert('Invalid Email Address');
            return false;
      }
      if(!client_registration.terms.checked) {
      alert("Please accept the Terms and Conditions");
      return false;
    }
}

function finalvalidate(){
  if(clientvalidateForm() == false)
  {
    submitted=false;
  }
  else{
        submitted=true;
      }
    }

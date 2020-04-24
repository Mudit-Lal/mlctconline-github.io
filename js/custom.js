


var submitted=false;
function clientvalidateForm() {
    var fullname = document.forms["client_registration"]["entry.2005620554"].value;
    var fathername = document.forms["client_registration"]["entry.1034887896"].value;
    var phno = document.forms["client_registration"]["entry.1166974658"].value;
    var email = document.forms["client_registration"]["entry.1045781291"].value;
    var locaddress = document.forms["client_registration"]["entry.1065046570"].value;
    var locpin = document.forms["client_registration"]["entry.963508831"].value;
    var loccity = document.forms["client_registration"]["entry.107521294"].value;
    var locstate = document.forms["client_registration"]["entry.540786343"].value;
    var permaddress = document.forms["client_registration"]["entry.2024033881"].value;
    var permpin = document.forms["client_registration"]["entry.1832075964"].value;
    var permcity = document.forms["client_registration"]["entry.769857850"].value;
    var permstate = document.forms["client_registration"]["entry.494308257"].value;
    var firmtype = document.forms["client_registration"]["entry.2138931607"].value;
    var firmname = document.forms["client_registration"]["entry.974901662"].value;
    var business = document.forms["client_registration"]["entry.2076835508"].value;
    var accnumber = document.forms["client_registration"]["entry.243576081"].value;
    var bankname = document.forms["client_registration"]["entry.585037455"].value;
    var ifsc = document.forms["client_registration"]["entry.50622459"].value;
    var pan = document.forms["client_registration"]["entry.839337160"].value;
    var adhaar = document.forms["client_registration"]["entry.1688532346"].value;
    var emailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    var ifscformat = /[A-Z|a-z]{4}[0][a-zA-Z0-9]{6}$/;
    var accnumberformat = /^[0-9]+$/;
    var panformat = /([A-Z]){5}([0-9]){4}([A-Z]){1}$/;
    var adharcardTwelveDigit = /^\d{12}$/;
    var adharSixteenDigit = /^\d{16}$/;

    if (fullname == "") {
        alert("Full name must be filled out");
        return false;
      }
      if (fathername == "") {
        alert("Father's name must be filled out");
        return false;
      }
      if (phno == "") {
        alert("Phone Number must be filled out");
        return false;
      }
      if (locaddress == "") {
        alert("Local Address must be filled out");
        return false;
      }
      if (locpin == "") {
        alert("Local PIN Code must be filled out");
        return false;
      }
      if (loccity == "") {
        alert("Local City name must be filled out");
        return false;
      }
      if (locstate == "") {
        alert("Local State must be selected");
        return false;
      }
      if (permaddress == "") {
        alert("Permanent Address name must be filled out");
        return false;
      }
      if (permpin == "") {
        alert("Permanent PIN Code must be filled out");
        return false;
      }
      if (permcity == "") {
        alert("Permanent City name must be filled out");
        return false;
      }
      if (permstate == "") {
        alert("Permanent State must be selected");
        return false;
      }
      if (firmtype == "") {
        alert("Firm Type must be selected");
        return false;
      }
      if (firmname == "") {
        alert("Firm Name / Company Name must be filled out");
        return false;
      }
      if (business == "") {
        alert("Business / Profession / Service must be filled out");
        return false;
      }
      if (accnumber == "") {
        alert("Account number must be filled out");
        return false;
      }
      if (bankname == "") {
        alert("Bank Name must be filled out");
        return false;
      }
      if (pan == "") {
        alert("PAN Card Number must be filled out");
        return false;
      }
      if (adhaar == "") {
        alert("Adhaar Card Number must be filled out");
        return false;
      }
      if (ifsc == "") {
        alert("IFSC Code must be filled out");
        return false;
      }
      if (isNaN(phno) || phno < 1 || phno > 999999999999) {
        alert("Phone Number is invalid");
        return false;
      }
      if (isNaN(locpin) || locpin < 1 || locpin > 999999) {
        alert("Local PIN Code is invalid");
        return false;
      }
      if (isNaN(permpin) || permpin < 1 || permpin > 999999) {
        alert("Permanent PIN Code is invalid");
        return false;
      }

      if (panformat.test(pan) == false)
      {
            alert('Invalid PAN Card Number');
            return false;
      }
      if (accnumberformat.test(accnumber) == false)
      {
            alert('Invalid Account Number');
            return false;
      }
      if (emailformat.test(email) == false)
      {
            alert('Invalid Email Address');
            return false;
      }
      if (ifscformat.test(ifsc) == false)
      {
        alert("You entered invalid IFSC code");
        return false;
      }
      if (adharcardTwelveDigit.test(adhaar) == false)
      {
          alert("Enter valid Aadhar Number");
          return false;
      }
      else if (adharSixteenDigit.test(adhaar))
      {
        alert("Enter valid Aadhar Number");
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

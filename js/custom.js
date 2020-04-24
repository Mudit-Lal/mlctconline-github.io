/*

1. Add your custom JavaScript code below
2. Place the this code in your template:



*/
    document.getElementById("register").onclick = function () {
        location.href = "client_registration.html";
    };
    document.getElementById("GST").onclick = function () {
        location.href = "gst_begin.html";
    };
    document.getElementById("IT").onclick = function () {
        location.href = "page-under-construction.html";
    };
    document.getElementById("EPF").onclick = function () {
        location.href = "page-under-construction.html";
    };
    document.getElementById("CG").onclick = function () {
        location.href = "page-under-construction.html";
    };
    document.getElementById("LA").onclick = function () {
        location.href = "page-under-construction.html";
    };
    document.getElementById("FSA").onclick = function () {
        location.href = "page-under-construction.html";
    };
    document.getElementById("ISO").onclick = function () {
        location.href = "page-under-construction.html";
    };
    document.getElementById("CA").onclick = function () {
        location.href = "page-under-construction.html";
    };

    function clientvalidateForm() {
      var x = document.forms["client_registration"]["name"].value;
      if (x == "") {
        alert("Name must be filled out");
        return false;
      }
    }

    function recaptcha() {
      var onloadCallback = function() {
    alert("grecaptcha is ready!");
  };
    }

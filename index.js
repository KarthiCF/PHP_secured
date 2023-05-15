
(function() {   //This function executed the validation of the sign up page
    'use strict';
    window.addEventListener('load', function() {
      var forms = document.getElementsByClassName('needs-validation');
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();

  
  //verify whether password and confirm passwords are same
  function passCheck() {
    if (document.getElementById('passwordSignin').value ==
      document.getElementById('confirmPasswordSignin').value)  {
      document.getElementById('e1').style.display="none";
      }
    else{
      document.getElementById('e1').style.display="block";
    };
  };
  
  //function to make sure the password length not less than 8 characters
  function passLength() {
    if(document.getElementById('passwordSignin').value.length >= Number(8)) {
      document.getElementById('e2').style.display="none";
    }
    else{
      document.getElementById('e2').style.display="block";
    };
  };
  
  
  
 
  
  
  
  
  
  
  
 
// Slideshow
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demodots");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}




// Register Form SUbmit
    $('#registerForm').on('submit', (function(e) {
      e.preventDefault();
      var form = $('#registerForm')[0];
      var formData = new FormData(form);
      url='/add-user';
      toastr.options = {
        "closeButton": true,
        "newestOnTop": true,
        "positionClass": "toast-top-right"
      };
      var validation = 1;
      if (validation == 1) {
          $.ajax({
              url:  url,
              type: 'POST',
              data: formData,
              contentType: false,
              cache: false,
              Z_index:2000,
              processData: false,
              success: function(response) {
                if(response.status==true)
                {
                  toastr.success(response.message);
                  // location.reload();
                }
                else if(response.status==false)
                {
                  toastr.error(response.message);
                }
              }
          });
      }
  }));

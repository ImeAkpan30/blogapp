function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

  function myFunction() {
    $(".toggle-myInput").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
    })
    
    var passe = document.getElementById("myInput");
    if (passe.type === "password") {
        passe.type = "text";
    } else {
        passe.type = "password";
    }

}

$('.delete-confirm').on('click', function (index) {
   
  swal({
      title: 'Are you sure?',
      text: 'This record and it`s details will be permanantly deleted!',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
  })
  .then((willDelete) => {
      if (willDelete) {
          swal("Poof! Your imaginary file has been deleted!", {
              icon: "success",
          });
      } else {
          swal("Your imaginary file is safe!");
      }
  });

});


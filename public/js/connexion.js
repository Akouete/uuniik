function AnimeBackGround() {
  $('#background').animate({bottom: "+0px",
                            top: "-=200px" }, 19000);
}
AnimeBackGround();

$(function() {
  /*$("#registrationform").validate({
    errorPlacement: function(error, element) {
      if (element.attr("name") == "user_mail" )
          error.insertBefore(".error");
      if  (element.attr("name") == "user_password" )
          error.insertBefore(".error");
    },
    rules: {
      user_mail : {
        required: true,
        email: true
      },
      user_password: {
        required: true,
        minlenght: 5
      }
    },
    messages: {
      user_mail: "Invalid E-mail",
      user_password: "Invalid Password"
    }
  });*/
});

/*if ('serviceWorker' in navigator) {
    window.addEventListener('load', function() {
        navigator.serviceWorker.register(url.SwjsUrl).then(function(registration) {
            // Registration was successful
            console.log('ServiceWorker registration successful with scope: ', registration.scope);
        }, function(err) {
            // registration failed :(
            console.log('ServiceWorker registration failed: ', err);
        });
    });
}*/
/*$('#googlelink').click(function(e) {
  e.preventDefault();
  $('#loader').fadeIn('fast');
  //history.pushState({key: 'value'}, 'titre', this.href);
  LoadPage(this.href);
  window.parent.document.title = "Uuniik | Google Auth";
});*/
/*if ('serviceWorker' in navigator) {
  console.log("success");
  navigator.serviceWorker.register(url.SwjsUrl);
}*/

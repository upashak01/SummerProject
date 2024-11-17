let food = [];
let totalAmount = 0;

$(document).ready(function() {

  if ($(document).width() <= 992) {
    $('.navbar-nav').removeClass("ml-auto");
    $('.navbar-nav').addClass("mr-auto");
  } else {
    $('.navbar-nav').removeClass("mr-auto");
    $('.navbar-nav').addClass("ml-auto");
  }

  var scrollToTopBtn = $('#scrollToTop');

  $(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
      scrollToTopBtn.addClass('show');
    } else {
      scrollToTopBtn.removeClass('show');
    }
  });

  scrollToTopBtn.on('click', function(event) {
    event.preventDefault();
    $('html, body').animate({
      scrollTop: 0
    }, '500');
  });

  $(".navbar a").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // console.log(this);
      // console.log(this.hash);
      // Prevent default anchor click behavior
      event.preventDefault();
      // Store hash
      var hash = this.hash;
      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function() {
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });

    } // End if
  });

  $('.homeBtn').click(function(event) {
    if (this.hash !== "") {
      event.preventDefault();
      let hash = this.hash;

      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function() {
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    }
  });

  $('.product-box-layout4').click(function() {
    $(this).toggleClass("productClicked").parent().siblings('div').children().removeClass("productClicked");
    if ($(this)[0].className.search('momos productClicked') > -1) {
      $('#momos').show().siblings('div').hide();

      $('html, body').animate({
        scrollTop: $('#momos').offset().top
      }, 800, function() {});

    } else if ($(this)[0].className.search('chinese productClicked') > -1) {
      $('#chinese').show().siblings('div').hide();

      $('html, body').animate({
        scrollTop: $('#chinese').offset().top
      }, 800, function() {});

    } else if ($(this)[0].className.search('beverages productClicked') > -1) {
      $('#beverages').show().siblings('div').hide();

      $('html, body').animate({
        scrollTop: $('#beverages').offset().top
      }, 800, function() {});
    }
  });


  $(".menuBtn").click(function() {
    let quantity = $(this).siblings(".quantity");
    let foodNameClicked = quantity.parent().siblings('div').children().first().text().trim();
    let singleFoodAmount = Number(quantity.parent().siblings('div').children().last().text());

    let count = Number(quantity.text());
    if ($(this)[0].className.search('plus') > -1) {
      count = count + 1;
      quantity.text(count);
      ToCart(foodNameClicked, count, singleFoodAmount);

    } else if ($(this)[0].className.search('minus') > -1) {
      if (count <= 0) {
        quantity.text(0);
      } else {
        count = count - 1;
        quantity.text(count);
        ToCart(foodNameClicked, count, singleFoodAmount);
      }
    }
  });

  function ToCart(foodNameClicked, foodQuantity, singleFoodAmount) {
    let foodAlreadyThere = false;
    let foodPos;

    for (var i = 0; i < food.length; i++) {
      if (food[i][0] === foodNameClicked) {
        foodAlreadyThere = true;
        foodPos = i;
        break;
      } else {
        foodAlreadyThere = false;
      }
    }

    if (foodAlreadyThere) {

      food.splice(foodPos, 1);
      food.push([foodNameClicked, foodQuantity, singleFoodAmount]);
    } else {
      food.push([foodNameClicked, foodQuantity, singleFoodAmount]);
    }

    // Remove Food items with quantity = 0
    for (var i = 0; i < food.length; i++) {
      if (food[i][1] === 0) {
        food.splice(i, 1);
      }
    }

    if (food.length !== 0) {
      $('.shoppingCart').addClass('shoppingCartWithItems');

      $('.cartContentDiv').empty();
      for (var i = 0; i < food.length; i++) {
        let cartTxt = '<div class="row cartContentRow"><div class="col-10"> <p>' + food[i][0] + ' </p> <p class="text-muted-small"><i class="fas fa-rupee-sign"></i>' + food[i][2] + '</p>  </div>  <div class="col-2">  <span class="cartQuantity">' + food[i][1] + '</span> <p class="text-muted-small"><i class="fas fa-rupee-sign"></i>' + food[i][1] * food[i][2] + '</p>   </div>  </div> <hr class="cartHr">';
        $('.cartContentDiv').append(cartTxt);
      }

    } else {
      $('.shoppingCart').removeClass('shoppingCartWithItems');

      $('.cartContentDiv').empty();
      $('.cartContentDiv').append('<h1 class="text-muted">Your Cart is Empty</h1>');
    }

    $('.shoppingCartAfter').text(food.length);

    if (food.length === 0) {
      totalAmount = 0;
    } else {
      totalAmount = totalAmount + singleFoodAmount;
    }

    $('.totalAmountDiv').empty();
    $('.totalAmountDiv').append('Total Amount: ' + totalAmount);

  }


});


  /* login regsiter*/
  function openDialog() {
    document.getElementById('dialogOverlay').style.display = 'flex';
  }

  function closeDialog() {
    document.getElementById('dialogOverlay').style.display = 'none';
  }

  function switchForm() {
    var loginForm = document.getElementById('loginForm');
    var registerForm = document.getElementById('registerForm');

    if (loginForm.style.display === 'block') {
      loginForm.style.display = 'none';
      registerForm.style.display = 'block';
    } else {
      loginForm.style.display = 'block';
      registerForm.style.display = 'none';
    }
  }
  


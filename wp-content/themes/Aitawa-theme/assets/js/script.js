jQuery(document).ready(function ($) {
  //Aquí ocurre la magia del resposive de los blogs
  var elem = document.querySelector(".blogs-area");
  if (elem) {
    var iso = new Isotope(elem, {
      // options
      originLeft: false,
      itemSelector: ".blogs-wrapper",
      layoutMode: "masonry",      
      masonry: {
        gutter: 10,
        horizontalOrder: true,
        fitWidth: true
      },
    });
  }

  //Se inicializa el menú lateral
  $(".sidenav").sidenav();

  $(".carousel.carousel-slider").carousel({
    fullWidth: true,
    indicators: true,
  });

  //Preparacion para el acordeon del side-bar
  $li_acordeon = $("#main-sidebar .menu-item-has-children");
  $li_acordeon.addClass("acordeon-header");
  $li_acordeon.attr("data-target", "sub_menu_mobile_1");
  $a_acordeon = $("#main-sidebar .menu-item-has-children a:first");
  $a_acordeon.addClass("acordeon-trigger");
  $ul_acordeon = $("#main-sidebar ul");
  $ul_acordeon.attr("id", "sub_menu_mobile_1");
  if ($ul_acordeon.css("display") == "block") {
    $ul_acordeon.css("display", "none");
  }

  //preparacion para el dropdown
  $(".menu-item-has-children:first a:first").addClass("dropdown-trigger"); // ubico el elemento del "a" y le agrego la clase dropdown-trigger
  $(".dropdown-trigger").attr("data-target", "dropdown-mobile"); // agrego el atributo "data-target"
  $(".dropdown-trigger").attr("showing", "false"); // agrego el atributo "showing"
  $(".menu-item-has-children:first ul").attr("id", "dropdown-mobile"); // ubico el elemento del "ul" y le agrego el id "dropdown-mobile" para que coincida con el data-target
  $("#dropdown-mobile").addClass("dropdown-content"); // le agrego la clase "dropdown-content" al "#dropdown-mobile"

  $(".dropdown-trigger").click(function () {
    event.stopPropagation(); // SUPER IMPORTANTE PARA QUE NO SE CIERRE INMEDIATAMENTE

    $this = $(this);
    target = $this.attr("data-target");
    showing = $this.attr("showing");
    console.log("Está corriendo el trigger");

    if (showing == "false") {
      console.log("false");
      $this.attr("showing", "true");

      $ul = $("#" + target);
      $ul.addClass("dropdownIn-anim");
      $ul.removeClass("dropdownOut-anim");
      console.log($this);
      console.log($ul);
    } else if (showing == "true") {
      $this.attr("showing", "false");

      $ul = $("#" + target);
      $ul.removeClass("dropdownIn-anim");
      $ul.addClass("dropdownOut-anim");
      console.log("true");
    }
  });

  //FUNCIÓN PARA MOSTRAR Y OCULTAR LOS DROPDOWNS DEL SIDENAV

  $(".acordeon-header").click(function () {
    $this = $(this);
    target = $this.attr("data-target");

    $target_acordeon = $("#" + target);
    $target_acordeon.slideToggle(500);
  });

  // FUNCION PARA MOSTRAR Y OCULTAR EL SIDE NAVBAR
  $(".sidenav-trigger").click(function () {
    event.stopPropagation(); // SUPER IMPORTANTE PARA QUE NO SE CIERRE INMEDIATAMENTE

    $this = $(this);
    target = $this.attr("data-target");
    showing = $this.attr("showing");

    if (showing == "false") {
      $this.attr("showing", "true");

      $ul = $("#" + target);
      $ul.addClass("sidenavIn-anim");
      $ul.removeClass("sidenavOut-anim");

      $("body").append('<div id="sidenav-overlay-back"></div>');
      setTimeout(function () {
        $("#sidenav-overlay-back").addClass("opacityIn-anim");
      }, 50);
    } else if (showing == "true") {
      $this.attr("showing", "false");

      $ul = $("#" + target);
      $ul.removeClass("sidenavIn-anim");
      $ul.addClass("sidenavOut-anim");

      $("#sidenav-overlay-back").removeClass("opacityIn-anim");
      $("#sidenav-overlay-back").addClass("opacityOut-anim");

      setTimeout(function () {
        $("#sidenav-overlay-back").remove();
      }, 500);
    }
  });

  $("#main-sidebar").click(function () {
    event.stopPropagation(); // SUPER IMPORTANTE PARA QUE NO SE CIERRE INMEDIATAMENTE
  });

  // Cerrar dropdows y otros al hacer click por fuera
  $(window).click(function () {
    // PARA CERRAR LOS DROPDOWNS
    $(".dropdown-trigger[showing=true]").each(function () {
      $this = $(this);
      target = $this.attr("data-target");

      $this.attr("showing", "false");

      $ul = $("#" + target);
      $ul.removeClass("dropdownIn-anim");
      $ul.addClass("dropdownOut-anim");
    });

    $(".sidenav-trigger[showing=true]").each(function () {
      $this = $(this);
      target = $this.attr("data-target");

      $this.attr("showing", "false");

      $ul = $("#" + target);
      $ul.removeClass("sidenavIn-anim");
      $ul.addClass("sidenavOut-anim");

      $("#sidenav-overlay-back").removeClass("opacityIn-anim");
      $("#sidenav-overlay-back").addClass("opacityOut-anim");

      setTimeout(function () {
        $("#sidenav-overlay-back").remove();
      }, 500);
    });
  });

  /////////////////////////////////// Resize img ///////////////////////////////////
  /////////////////////////////////// Resize img ///////////////////////////////////
  /////////////////////////////////// Resize img ///////////////////////////////////
  /////////////////////////////////// Resize img ///////////////////////////////////
  /////////////////////////////////// Resize img ///////////////////////////////////
  /////////////////////////////////// Resize img ///////////////////////////////////
  // Imagenes
  crop_imgs_pro();
  $(window).on("resize", function () {
    crop_imgs_pro();

    /* SE COMENTO PORQUE CAUSABA QUE LA PAGINA REGRESARA AL INCIO
    //Para que el sidenav no moleste cuando se haga resize del navegador
    var body = document.getElementsByTagName('body')[0];
    body.style.display='none';
    body.offsetHeight;
    body.style.display='';
    body.style.width='100%';
    */
  });

  $(".run_crop_imgs_pro, .tab").click(function () {
    setTimeout(function () {
      crop_imgs_pro();
    }, 1);
  });

  function crop_imgs_pro() {
    //Materialize.toast("Esta mierda se demoro",5000);
    $(".crop-padre img")
      .one("load", function () {
        width = parseInt($(this).width());
        height = parseInt($(this).height());
        if (width > height) {
          $(this).removeClass("image-crop-vertical");
          $(this).removeClass("image-crop-horizontal");
          $(this).addClass("image-crop-horizontal");
        } else {
          $(this).removeClass("image-crop-vertical");
          $(this).removeClass("image-crop-horizontal");
          $(this).addClass("image-crop-vertical");
        }
      })
      .each(function () {
        if (this.complete) $(this).load();
      });

    $(".crop-padre img")
      .one("load", function () {
        width_son = parseInt($(this).width());
        height_son = parseInt($(this).height());

        width_father = parseInt($(this).parent().width());
        height_father = parseInt($(this).parent().height());

        if (width_son < width_father) {
          $(this).removeClass("image-crop-vertical");
          $(this).removeClass("image-crop-horizontal");
          $(this).addClass("image-crop-vertical");
        } else if (height_son < height_father) {
          $(this).removeClass("image-crop-vertical");
          $(this).removeClass("image-crop-horizontal");
          $(this).addClass("image-crop-horizontal");
        } else if (height_son == width_son) {
          if (width_father > height_father) {
            $(this).removeClass("image-crop-vertical");
            $(this).removeClass("image-crop-horizontal");
            $(this).addClass("image-crop-vertical");
          } else if (width_father < height_father) {
            $(this).removeClass("image-crop-vertical");
            $(this).removeClass("image-crop-horizontal");
            $(this).addClass("image-crop-horizontal");
          }
        }
      })
      .each(function () {
        if (this.complete) $(this).load();
      });
  }

  // Add smooth scrolling to all links
  $("a").on("click", function (event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $("html, body").animate(
        {
          scrollTop: $(hash).offset().top,
        },
        800,
        function () {
          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        }
      );
    } // End if
  });

  //Sliders
  $(".home-slider").slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow: '<i class="fas fa-chevron-left arrow-left"></i>',
    nextArrow: '<i class="fas fa-chevron-right arrow-right"></i>',
  });

  $(".product-slider").slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow: $(".prev"),
    nextArrow: $(".next"),
  });

  //Acá se resolverán el tema del menú lateral izquierdo

  let moves = {
    y_initial: null,
    y_actual: null
  };

  
  function sleep(ms) {
    return new Promise((resolve) => setTimeout(resolve, ms));
  }

  let header = $("#message-bar");
  let header_height;
  let navbar = $("#nav-bar_desktop");
  let navbar_mobile = $("#nav-bar_mobile");

  if (header.height()) {
    let padd_height =
      parseInt($("#message-bar").css("padding-top")) +
      parseInt($("#message-bar").css("padding-bottom"));
    header_height = parseInt(header.height()) + padd_height;
    navbar.css("margin-top", header_height);
    // navbar_mobile.css("margin-top", header_height);
  } else {
    header_height = 0;
  }

  $(window).scroll(async function () {
    if (window.innerWidth > 1000) { // El tamaño de las medias
      if ($(this).scrollTop() >= header_height) {
        navbar.css("margin-top", "0");
        navbar.css("position", "fixed");
  
        if ($(window).scrollTop() > 300) {
          if (navbar.hasClass("max-menu")) {
            // Animación de volver pequeño el menú
            navbar.removeClass("max-menu");
            navbar.outerWidth();
            navbar.addClass("min-menu");
          }
        }
      } else {
        navbar.css("margin-top", header_height);
        navbar.css("position", "absolute");
      }
  
      if ($(window).scrollTop() == 0) {
        if (navbar.hasClass("min-menu")) {
          // Animación de volver grande el menú
          navbar.removeClass("min-menu");
          navbar.outerWidth();
          navbar.addClass("max-menu");
        }
      }
    }else{
      if ($(this).scrollTop() > 0) { // Siempre va iniciar desde arriba
        navbar_mobile.css("margin-top", "0");
        navbar_mobile.css("position", "fixed");
        if ($(this).scrollTop() > 155) { // Altura total del menu mobile
          moves.y_actual = $(this).scrollTop();
          if (moves.y_actual > moves.y_initial && !navbar_mobile.hasClass("hide-menu")) {
            navbar_mobile.outerWidth();
            navbar_mobile.toggleClass("hide-menu");
          }else{
            if (moves.y_actual < moves.y_initial && navbar_mobile.hasClass("hide-menu")) {
              navbar_mobile.outerWidth();
              navbar_mobile.toggleClass("hide-menu");
            }
          }
        }
      } else {
        // navbar_mobile.css("margin-top", header_height);
        navbar_mobile.css("position", "absolute");
      }
    }
    moves.y_initial = $(this).scrollTop(); // Lo usuamos para comparar con el próximo movimiento a realizar
  });

  $("#menu_min").click(async function () {
    if (navbar.hasClass("min-menu")) {
      // Animación de volver grande el menú
      navbar.removeClass("min-menu");
      navbar.outerWidth();
      navbar.addClass("max-menu");
    }
  });

  $("#menu_mobile").click(async function () {
    navbar_mobile.outerWidth();
    navbar_mobile.toggleClass("is-active");
  });
}); // End document ready

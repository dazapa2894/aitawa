jQuery(document).ready(function ($) {
  //Aquí ocurre la magia del resposive de los blogs
  var elem = document.querySelector(".blogs-area");
  console.log(elem);
  var iso = new Isotope(elem, {
    // options
    originLeft: false,
    itemSelector: ".blogs-wrapper",
    layoutMode: "masonry",
    masonry: {
      gutter: 15,
    },
  });

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

  moves = {
    initial: {
      x: null,
      y: null,
    },
    actual: {
      x: null,
      y: null,
    },
  };

  function sleep(ms) {
    return new Promise((resolve) => setTimeout(resolve, ms));
  }

  let menuBig = true;
  //let menuToSmall = false;
  let header = $("#top-bar");
  let padd_top = parseInt($("#top-bar").css("padding-top"));
  let padd_bot = parseInt($("#top-bar").css("padding-bottom"));
  let header_height = parseInt(header.height()) + padd_top + padd_bot;
  let navbar = $("#nav-bar");
  let navbar_1 = $("#nav-bar .content_max");
  let navbar_2 = $("#nav-bar .content_min");

  $(window).scroll(async function () {
    if ($(this).scrollTop() >= header_height) {
      navbar.css("margin-top", "0");
      navbar.css("position", "fixed");

      if ($(window).scrollTop() > 300) {
        if (menuBig) {
          // Animación volver chiquito el menu
          navbar_1.css("opacity", "0");
          navbar_1.css("display", "none");
          navbar.css("width", "150px");
          navbar.css("height", "200px");
          setTimeout(() => {
            navbar_2.css("opacity", "1");
            navbar_2.css("display", "grid");
          }, 500);
          menuBig = false;
        }
      }
    } else {
      navbar.css("margin-top", header_height);
      navbar.css("position", "absolute");
    }

    if ($(window).scrollTop() == 0) {
      if (!menuBig) {
        // Animación de volver grande el menú
        navbar_2.css("opacity", "0");
        navbar_2.css("display", "none");
        navbar.css("width", "270px");
        navbar.css("height", "500px");
        setTimeout(() => {
          navbar_1.css("opacity", "1");
          navbar_1.css("display", "grid");
        }, 500);
        menuBig = true;
      }
    }
  });

  $("#menu").click(function () {
    if (!menuBig) {
      // Animación de volver grande el menú
      navbar_2.css("opacity", "0");
      navbar_2.css("display", "none");
      navbar.css("width", "270px");
      navbar.css("height", "500px");
      setTimeout(() => {
        navbar_1.css("opacity", "1");
        navbar_1.css("display", "grid");
      }, 500);
      menuBig = true;
    }
  });
}); // End document ready

<?php
session_start();
/* Load external routes file */
// require('router/routes.php');
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <!-- title -->
    <title>Whiskers - Cat Social Network</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <meta name="author" content="ThemeZaa">
    <!-- description -->
    <meta name="description" content="Whiskers es la red social para dueños y amantes de gatos. Nuestro universo gatuno en un solo lugar. Le damos voz a tus gatos. Encuentra todo sobre gatos.">
    <!-- keywords -->
    <meta name="keywords" content="gato, gatuno, felino, cat lover, persa, siames, bigotes, patas, garfield, kitty">
    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon-32x32.png">
    <link rel="apple-touch-icon" href="images/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
    <!-- animation -->
    <link rel="stylesheet" href="css/animate.css" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- et line icon -->
    <link rel="stylesheet" href="css/et-line-icons.css" />
    <!-- font-awesome icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <!-- themify icon -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- swiper carousel -->
    <link rel="stylesheet" href="css/swiper.min.css">
    <!-- justified gallery  -->
    <link rel="stylesheet" href="css/justified-gallery.min.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="css/magnific-popup.css" />
    <!-- revolution slider -->
    <link rel="stylesheet" type="text/css" href="revolution/css/settings.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="revolution/css/navigation.css">
    <!-- bootsnav -->
    <link rel="stylesheet" href="css/bootsnav.css">
    <!-- style -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- responsive css -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!--[if IE]>
        <script src="js/html5shiv.js"></script>
    <![endif]-->
    <!-- Hotjar Tracking Code for https://thewhiskers.club/ -->
    <script>
        (function (h, o, t, j, a, r) {
            h.hj = h.hj || function () { (h.hj.q = h.hj.q || []).push(arguments) };
            h._hjSettings = { hjid: 2320264, hjsv: 6 };
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
    </script>

    <!-- Google Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;600&display=swap" rel="stylesheet">

    <!-- Animations -->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />


</head>
<body>
    <!-- start countdown section -->
    <section class="p-0 bg-extra-light-gray">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6 full-screen p-0 cover-background d-none d-lg-block" style="background-image:url('images/bg_cat_1.jpg');"></div>
                <div class="col-12 col-lg-6 bg-w-1 full-screen p-0">
                    <div class="position-relative full-screen">
                        <div class="slider-typography text-center sm-overflow-auto">
                            <div class="slider-text-middle-main bg-white ">
                                <div class="slider-text-middle padding-three-all sm-padding-15px-all">
                                    <div class="margin-nine-bottom md-margin-50px-bottom sm-margin-15px-bottom"><img src="images/logo-2x.png" data-rjs="images/logo-2x.png" alt="Whisker" /></div>
                                    <!-- <h6 class="font-weight-300 margin-40px-bottom sm-margin-35px-bottom" style="color:#af9898;">We love cats, do you? </h6> -->
                                    <!-- <h6 class="font-weight-400 margin-40px-bottom sm-margin-35px-bottom" style="color:#af9898;">¿Sueñas que tu gatijo tenga un perfil social para darle una voz y a su vez como dueño quieres conocer más gatos y cat lovers? </h6> -->
                                    <p class="text-extra-large width-70 custom-font font-weight-700 mx-auto margin-40px-bottom sm-width-100 sm-margin-15px-bottom" style="color:#5B7070;">¿Sueñas que tu gatijo tenga un perfil social para darle una voz y a su vez como dueño quieres conocer más gatos y cat lovers?</p>

                                    <!-- <p class="text-large width-70 mx-auto margin-40px-bottom sm-width-100 sm-margin-15px-bottom" style="color:#444038;">La primer red social que le da voz a tus gatijos</p> -->

                                    <div class="bg-white padding-eight-all border-radius-6 width-70 lg-width-80 sm-width-100 mx-auto sm-padding-30px-all">
                                        <!-- <h6 class="font-weight-300 text-white-2 margin-20px-bottom sm-margin-15px-bottom" style="color:#d9d9d9;" >¡Únete a nuestro club! </h6>
                                        <p class="text-medium width-70 mx-auto margin-40px-bottom sm-width-100 sm-margin-15px-bottom" style="color:#af9898;">Mantente conectado</p> -->


                                        <span class="text-extra-dark-gray alt-font font-weight-300 margin-25px-bottom d-block">¡Déjanos tus datos y sé de los primeros en unirte a este nuevo club!</span>
                                        <form id="contact-form" action="javascript:void(0)" method="post">
                                            <div>
                                                <div id="success-contact-form" class="mx-0"></div>
                                                <input type="text" name="name" id="name" onkeyup="" placeholder="Tú nombre de esclavo es" class="border-radius-4 bg-white medium-input">
                                                <input type="text" name="email" id="email" onkeyup="" placeholder="Correo" class="border-radius-4 bg-white medium-input">

                                                <select name="michis" id="michis" class="border-radius-4 bg-white medium-input">
                                                    <option value="" selected disabled hidden>¿Cuántos michis tienes?</option>
                                                    <option value="1">&#128008;</option>
                                                    <option value="2">&#128008; &#128008;</option>
                                                    <option value="3">&#128008; &#128008; &#128008;</option>
                                                    <option value="Hartos michis">Crazy cat lover</option>
                                                </select>

                                                <!-- <input type="text" name="subject" id="subject" placeholder="Subject" class="border-radius-4 bg-white medium-input"> -->
                                                <!-- <textarea name="comment" id="comment" placeholder="Your Message" rows="5" class="border-radius-4 bg-white medium-textarea"></textarea> -->
                                                <button id="contact-us-button" disabled type="submit" class="btn btn-small border-radius-4 btn-c-2">Enviar</button>
                                            </div>
                                        </form>


                                        <!-- <form id="subscribenewsletterform" action="javascript:void(0)" method="post" class="search-box2">
                                            <div id="success-subscribe-newsletter" class="mx-0"></div>
                                            <div class="input-group add-on width-75 mx-auto md-width-100">

                                                <input name="email" id="email" class="form-control" placeholder="Ingresa tu correo" type="text">
                                                <div class="input-group-append">
                                                    <button id="button-subscribe-newsletter" type="submit" class="btn btn-default"><i class="ti-angle-right text-small m-0" aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                        </form> -->
                                    </div>
                                    <!-- <div class="text-center social-icon-style-10 margin-eight-top sm-margin-30px-top">
                                        <ul class="large-icon mobile-small mb-0">
                                            <li><a class="facebook text-white-2" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i><span></span></a></li>
                                            <li><a class="twitter text-white-2" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i><span></span></a></li>
                                            <li><a class="linkedin text-white-2" href="https://linkedin.com/" target="_blank"><i class="fab fa-linkedin-in" aria-hidden="true"></i><span></span></a></li>
                                        </ul>
                                    </div>   -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end countdown section -->
    <!-- start scroll to top -->
    <a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>
    <!-- end scroll to top  -->
    <!-- javascript libraries -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/modernizr.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/skrollr.min.js"></script>
    <script type="text/javascript" src="js/smooth-scroll.js"></script>
    <script type="text/javascript" src="js/jquery.appear.js"></script>
    <!-- menu navigation -->
    <script type="text/javascript" src="js/bootsnav.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
    <!-- animation -->
    <script type="text/javascript" src="js/wow.min.js"></script>
    <!-- page scroll -->
    <script type="text/javascript" src="js/page-scroll.js"></script>
    <!-- swiper carousel -->
    <script type="text/javascript" src="js/swiper.min.js"></script>
    <!-- counter -->
    <script type="text/javascript" src="js/jquery.count-to.js"></script>
    <!-- parallax -->
    <script type="text/javascript" src="js/jquery.stellar.js"></script>
    <!-- magnific popup -->
    <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
    <!-- portfolio with shorting tab -->
    <script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
    <!-- images loaded -->
    <script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script>
    <!-- pull menu -->
    <script type="text/javascript" src="js/classie.js"></script>
    <script type="text/javascript" src="js/hamburger-menu.js"></script>
    <!-- counter  -->
    <script type="text/javascript" src="js/counter.js"></script>
    <!-- fit video  -->
    <script type="text/javascript" src="js/jquery.fitvids.js"></script>
    <!-- skill bars  -->
    <script type="text/javascript" src="js/skill.bars.jquery.js"></script>
    <!-- justified gallery  -->
    <script type="text/javascript" src="js/justified-gallery.min.js"></script>
    <!--pie chart-->
    <script type="text/javascript" src="js/jquery.easypiechart.min.js"></script>
    <!-- instagram -->
    <script type="text/javascript" src="js/instafeed.min.js"></script>
    <!-- retina -->
    <script type="text/javascript" src="js/retina.min.js"></script>
    <!-- revolution -->
    <script type="text/javascript" src="revolution/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="revolution/js/jquery.themepunch.revolution.min.js"></script>



    <!-- revolution slider extensions (load below extensions JS files only on local file systems to make the slider work! The following part can be removed on server for on demand loading) -->
    <!--<script type="text/javascript" src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.video.min.js"></script>-->
    <!-- setting -->
    <script type="text/javascript" src="js/main.js"></script>

    <!-- Popup successfull registered -->
    <div id="mensaje-correcto" class="modal">
        <div class="popup-modal-content" id="popup-success" style="border: 3px solid  rgba(173, 182, 151, 0.50);">
            <div id="cerrar" style="text-align: end;">
                <a style="color: #ADB697; font-size: 15px; margin-right: 10px;" href="javascript:close_popup_success()">X</a>
            </div>
            <img src="./assets/michis/Correcto.png" width="128">
            <div style="margin-left: 15px; margin-right: 15px; font-family: 'Source Sans Pro', sans-serif;">
                <h3 style="color:#ADB697;">¡Purrrrfecto!</h3>
                <b>Te tenemos en la mira esclav@. Registramos a la purrrrfección tu información</b>
                <p>Espera pronto más noticias.</p>
            </div>
        </div>
    </div>

    <!-- Popup duplicated email address -->
    <div id="correo-duplicado" class="modal">
        <div class="popup-modal-content" id="popup-duplicated" style="border: 3px solid  rgba(191, 126, 61, 0.50);">
            <div id="cerrar" style="text-align: end;">
                <a style="color: #BF7E3D; font-size: 15px; margin-right: 10px;" href="javascript:close_popup_duplicated()">X</a>
            </div>
            <img src="./assets/michis/Revisar.png" width="128">
            <div style="margin-left: 15px; margin-right: 15px; font-family: 'Source Sans Pro', sans-serif;">
                <h3 style="color: #BF7E3D;">¡Ps, ps!</h3>
                <b>El esclavo o la Karen que quieres registrar ya existe en nuestra gatera.</b>
                <p><b>Intenta con un nuevo correo.</b></p>
            </div>
        </div>
    </div>
    <!-- Popup fail user register -->
    <div id="mensaje-incorrecto" class="modal">
        <div class="popup-modal-content" id="popup-fail" style="border: 3px solid  rgba(213, 117, 117, 0.50);">
            <div id="cerrar" style="text-align: end;">
                <a style="color: #D57575; font-size: 15px; margin-right: 10px;" href="javascript:close_popup_fail()">X</a>
            </div>
            <img src="./assets/michis/Incorrecto.png" width="128">
            <div style="margin-left: 15px; margin-right: 15px; font-family: 'Source Sans Pro', sans-serif;">
                <h3 style="color: #D57575;">¡Meeow!</h3>
                <b>Estamos mordiendo los cables en este preciso momento.</b>
                <p><b>Intenta registrarte mas tarde.</b></p>
            </div>
        </div>
    </div>
    <script>
        // Close each Popup and remove animations class
        function close_popup_success()
        {
            let popup_success = document.querySelector("#popup-success");
            popup_success.classList.remove("animate__animated", "animate__rollIn");
            popup_success.classList.add("animate__animated", "animate__rollOut");
            popup_success.addEventListener('animationend', () =>
            {
                document.getElementById("mensaje-correcto").style.display = "none";
                popup_success.classList.remove("animate__animated", "animate__rollOut");
            }, {once: true});
        }
        function close_popup_duplicated()
        {
            let popup_duplicated = document.querySelector("#popup-duplicated");
            popup_duplicated.classList.remove("animate__animated", "animate__rollIn");
            popup_duplicated.classList.add("animate__animated", "animate__rollOut");
            popup_duplicated.addEventListener('animationend', () =>
            {
                document.getElementById("correo-duplicado").style.display = "none";
                popup_duplicated.classList.remove("animate__animated", "animate__rollOut");
            }, {once: true});
        }
        function close_popup_fail()
        {
            let popup_fail = document.querySelector("#popup-fail");
            popup_fail.classList.remove("animate__animated", "animate__rollIn");
            popup_fail.classList.add("animate__animated", "animate__rollOut");
            popup_fail.addEventListener('animationend', () =>
            {
                document.getElementById("mensaje-incorrecto").style.display = "none";
                popup_fail.classList.remove("animate__animated", "animate__rollOut");
            }, {once: true});
        }
    </script>
</body>
</html>
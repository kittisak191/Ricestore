<html>

<head>
    <link rel="stylesheet" href="css/swiper.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <div class="slide-container swiper">
        <div class="slide-content">
            <div class="card-wrapper swiper-wrapper">
                <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <img class="img26" src="images/05.jpg">
                    </div>
                    <div class="card-content">
                        <p class="p44">ข้าวเหนียวเขียวงู</p>
                        <p class="p45">แพ๊ค 1 กิโล</p>
                    </div>
                </div>
                <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <img class="img26" src="images/05.jpg">
                    </div>
                    <div class="card-content">
                        <p class="p44">ข้าวเหนียวเขียวงู</p>
                        <p class="p45">แพ๊ค 1 กิโล</p>
                    </div>
                </div>
                <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <img class="img26" src="images/05.jpg">
                    </div>
                    <div class="card-content">
                        <p class="p44">ข้าวเหนียวเขียวงู</p>
                        <p class="p45">แพ๊ค 1 กิโล</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-button-next swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-navBtn"></div>
    </div>
    <!-- <div class="swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">Slide 1</div>
            <div class="swiper-slide">Slide 2</div>
            <div class="swiper-slide">Slide 3</div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div> -->

</body>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script type="module">
    import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.esm.browser.min.js'

    const swiper = new Swiper(...)
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="js/swiper.js"></script>
<script src="js/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>
<script src="js/slick.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
<script type="text/javascript">
    $('.slider').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        slider: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.your-class').slick({
            setting - name: setting - value
        });
    });
</script>

</html>
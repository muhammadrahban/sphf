<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- JQuery  --}}
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>SPHF</title>
  </head>
  <body>
    @include('web.partials.header')
     @yield('webcontain')
    @include('web.partials.footer')

    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{asset('js/slick.min.js')}}"></script>
    <script src="{{asset('js/stepper.js')}}"></script>
    <script>
        if ($('.home-slider > .slide').length > 0) {
            $('.home-slider').slick({
                fade: true,
                cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                nextArrow: '<i class="slick-next fas fa-chevron-right"></i>',
                prevArrow: '<i class="slick-prev fas fa-chevron-left"></i>',

                dots: false,
                infinite: true,
                autoplay: true,
                pauseOnFocus: false,
                swipe: true,
                swipeToSlide: true,
                touchMove: true,
                autoplaySpeed: 2500,
                speed: 800,
            });
        }
        if ($('.box-slider > .slide').length > 0) {
            $('.box-slider').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                arrows: true,
                nextArrow: '<i class="slick-next fas fa-chevron-right"></i>',
                prevArrow: '<i class="slick-prev fas fa-chevron-left"></i>',

                dots: false,
                infinite: true,
                autoplay: true,
                pauseOnFocus: false,
                swipe: true,
                swipeToSlide: true,
                touchMove: true,
                autoplaySpeed: 2500,
                speed: 800,
                responsive: [
                    {
                        breakpoint: 820,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });
        }
        if ($('.box-slider-2 > .slide').length > 0) {
            $('.box-slider-2').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                arrows: true,
                nextArrow: '<i class="slick-next fas fa-chevron-right"></i>',
                prevArrow: '<i class="slick-prev fas fa-chevron-left"></i>',

                dots: false,
                infinite: true,
                autoplay: false,
                pauseOnFocus: false,
                swipe: true,
                swipeToSlide: true,
                touchMove: true,
                autoplaySpeed: 2500,
                speed: 800,
                responsive: [
                    {
                        breakpoint: 820,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });
        }
        if ($('.logo-slider > .slide').length > 0) {
            $('.logo-slider').slick({
                slidesToShow: 2,
                slidesToScroll: 1,
                arrows: false,

                dots: false,
                infinite: false,
                autoplay: false,
                pauseOnFocus: false,
                swipe: true,
                swipeToSlide: true,
                touchMove: true,
                autoplaySpeed: 2500,
                speed: 800,
                responsive: [
                    {
                        breakpoint: 820,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });
        }
    </script>
     <script>
        $(document).ready(function () {
            $(".step").hide();
            $(".step:first").show();

            $(".next-step").click(function () {
                var currentStep = $(this).closest(".step");

                var requiredPass = true;
                $(currentStep).find('input,select,textarea').each(function(){
                    if($(this).prop("required") && $(this).val()==''){
                        requiredPass = false;
                    }
                });
                if(requiredPass){
                    var nextStep = $(this).closest(".step").next(".step");
                    currentStep.hide();
                    nextStep.show();
                }

                document.querySelector('main').scrollIntoView({ behavior: "smooth", block: "start", inline: "start" });
            });

            $(".prev-step").click(function () {
                var currentStep = $(this).closest(".step");
                var prevStep = $(this).closest(".step").prev(".step");
                currentStep.hide();
                prevStep.show();
                document.querySelector('main').scrollIntoView({ behavior: "smooth", block: "start", inline: "start" });
            });

            $('#currency').on('change',function(){
                var symbol = $(this).find('option[value="'+$(this).val()+'"]').data('symbol');
                $('.input_symbol').html(symbol);
            });
        });

        function selectAmount(obj,amount){
            $('.amount-btn').removeClass('btn-outline-success');
            $('.amount-btn').addClass('btn-success');
            $(obj).removeClass('btn-success');
            $(obj).addClass('btn-outline-success');

            if(amount=='custom'){
                $('#amount').val("");
                $('#amount').focus();
            }else{
                $('#amount').val(amount);
                $('.input_amount').html(amount);
            }
        }
        $('#amount').on('change',function(){
            $('.input_amount').html($(this).val());
        });
    </script>
  </body>
</html>

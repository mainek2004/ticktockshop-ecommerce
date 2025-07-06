<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TickTock_Shop</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- <link rel="stylesheet" href="css/index.css"> -->
    <link rel="stylesheet" href="{{ asset('css/client/home.css') }}">


</head>
<body>
    @include ('layouts.header')

    <section id="slide">
        <div class="aspect-ratio-169">
            <img src="{{ asset('storage/slide1.jpg')}}" alt="">
            <img src="{{ asset('storage/slide2.jpg')}}" alt="">
            <img src="{{ asset('storage/slide3.png')}}" alt="">
            <img src="{{ asset('storage/slide4.png')}}" alt="">
            <img src="{{ asset('storage/slide5.jpg')}}" alt="">

        </div>
        <div class="dot-slide">
            <div class="dot active"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>


        </div>
    </section>

    @include ('layouts.footer')
</body>
<script src="{{ asset('js/layouts/header.js') }}"></script>
<script src="{{ asset('js/layouts/auth.js') }}"></script>
<script src="{{ asset('js/client/home.js') }}"></script>


</html>
@extends('adminlte::page')



@section('content_header')
    <h1>AUTOVEX "Autos y Vehiculos de Excelencia"</h1>
@stop

@section('content')
    <p>BIENVENIDO A "AUTOVEX"</p>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="max-width: 500px; margin: 0 auto;">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/img/carrusel/toyotasupra.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/img/carrusel/toyotayaris.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/img/carrusel/toyotahilux.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/img/carrusel/toyotavanza.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/img/carrusel/hondacivic.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/img/carrusel/hondaodyssey.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/img/carrusel/hondaaccord.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/img/carrusel/hondaridgeline.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/img/carrusel/bmwM3.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/img/carrusel/bmwi8.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/img/carrusel/bmwfamiliar.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/img/carrusel/bmwxm.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    
    <script>
        const carousel = document.querySelector("#carouselExampleControls");
    
        const nextButton = carousel.querySelector(".carousel-control-next");
        const prevButton = carousel.querySelector(".carousel-control-prev");
    
        function nextSlide() {
            const nextButton = carousel.querySelector(".carousel-control-next");
            nextButton.click();
        }
    
        let intervalId;
    
        function startCarousel() {
            intervalId = setInterval(nextSlide, 3000); // Cambia automáticamente cada 3 segundos
        }
    
        function stopCarousel() {
            clearInterval(intervalId);
        }
    
        carousel.addEventListener("mouseenter", stopCarousel);
        carousel.addEventListener("mouseleave", startCarousel);
    
        startCarousel();
    </script>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
<div style="max-width: 95%; padding-bottom: 7rem;" class="container">
    <div class="text-center" style="padding-bottom: 4rem;">
        <h2 class="fw-semibold text-muted">
            Contenido
        </h2>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card bg-light" style="border: 0;" style="width: 18rem;">
                <a class="btn text-primary fw-semibold"
                style="font-style: italic;" href="{{ route('menu') }}">
                <img style="max-height: 300px; background-size: cover;background-position: center;" src="{{ asset('img/menu2 (1).jpeg') }}" class="card-img-top rounded img-fluid"
                alt="imagenDeMenu">
            </a>
                <div class="card-body mt-3 text-center">
                    <h5 class="fw-semibold">Menú en línea</h5>
                    <p class="fw-semibold text-muted">Disfruta de nuestros deliciosos platillos .</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card bg-light" style="border: 0;" style="width: 18rem;">
                <a class="btn text-primary fw-semibold"
                style="font-style: italic;" href="{{ route('home') }}">
                <img style="max-height: 300px; background-size: cover;background-position: center;" src="{{ asset('img/notify.jpg') }}" class="card-img-top rounded img-fluid"
                alt="imagenDeNotificación">
            </a>
                <div class="card-body mt-3 text-center">
                    <h5 class="fw-semibold">Timbre en línea</h5>
                    <p class="fw-semibold text-muted">Solicita atención desde tu dispositivo movil y te atenderemos en seguida.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card bg-light" style="border: 0;" style="width: 18rem;">
                <a class="btn text-primary fw-semibold"
                style="font-style:italic;" href="{{ route('menu') }}">
                <img style="max-height: 300px; background-size: cover;background-position: center;" src="{{ asset('img/services.jpeg') }}" class="card-img-top rounded img-fluid"
                alt="imagenDeServicioss">
            </a>
                <div class="card-body mt-3 text-center">
                    <h5 class="fw-semibold">Servicios</h5>
                    <p class="fw-semibold text-muted">Disfruta de la comodidad de nuestros servicios en compañia de tu familia y amigos.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrap">
    <div class="wrap-texto fw-bold">
        <h1>Disfruta de una mejor experiencia</h1>
    </div>
</div>

<style>

    .wrap {
        width: 100%;
        height: 300px;
        ;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(to bottom, rgb(0 0 0 / .0), rgb(0 0 0 / .5)), url({{ asset('img/cabana2.jpeg') }});
        background-size: cover;
        background-position: center;
        margin-bottom: 7rem;
    }

    .wrap-texto {
        color: #fff;
        text-align: center;
        width: 50%;
    }
</style>


@extends('layouts.app')

@section('content')
    <div class="wrap">
        <div class="wrap-texto">
            <h1>Acerca de nosotros</h1>
            <p>Conoce quienes somos y sobre nuestros servicios.</p>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-6 col-md-5 mt-5">
                <div class="card bg-light mb-3" style="border: 0px;">
                    <div class="card-body">
                        <div class="text-center text-muted">
                            <p class="fs-3 fw-semibold text-muted">¿Quiénes somos?</p>

                            <p style="text-align: justify;" class="fs-5">Somos una empresa agro turística que diversifica
                                la finca
                                introduciendo nuevas técnicas
                                agronómicas y cultivos. Además, brinda espacios de recreación para la familia asi como para
                                la
                                enseñanza a campesinos, estudiantes de primaria y secundaria sobre el manejo integral de la
                                finca con enfoque de sostenibilidad ambiental.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-7 col-sm-12 mb-5">
                <div class="text-center" style="">
                    <figure>
                        <img src="{{ asset('img/buho.jpeg') }}" class="img-fluid"
                            style="border-radius: 50%; width: 350px; height:350px;" alt="">
                    </figure>
                </div>
            </div>
        </div>

        <div class="row mt-5 mb-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="text-center">
                    <img class="img-fluid" src="{{ asset('img/cabana.jpeg') }}"
                        style="border-radius: 50%; width: 450px; height:450px;" alt="">
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card bg-light mb-3" style="border: 0px;">
                    <div class="card-body">
                        <div class="text-center text-muted">
                            <p class="fs-3 fw-semibold text-muted">¿Qué queremos?</p>

                            <p style="text-align: justify;" class="fs-5">
                                Queremos ser una empresa agro turística referente en la costa Caribe. Que sirva de recurso
                                práctico
                                en el aprendizaje de nuevas práctica agrícolas, en construcción sostenible de
                                infraestructura para
                                uso de los diferentes rubros de la finca, manejo forestal de finca, de protección de fauna y
                                flora,
                                de cuido del agua y de cosecha de agua. Además en la búsqueda de generación de Energía
                                autosostenible para alimentar la pequeña industria de agregación de valor que desarrolla la
                                finca.
                                <br><br>
                                Los planes de crecimiento son amplios y diversos. Por lo tanto pueden tomar un buen tiempo.
                                Pero de
                                algo estamos seguros, “SE CUMPLIRÁN”. Haremos de la finca con la ayuda de ustedes,nuestros
                                amigos y
                                clientes, una finca diversificada, que todo lo que produzca en sus campos de cultivo, vaya a
                                tu
                                plato que degustas. Y en eso estamos trabajando.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 d-md-none d-lg-none">
                <div class="">
                    <div class="text-center">
                        <img class="img-fluid" src="{{ asset('img/cabana.jpeg') }}"
                            style="border-radius: 50%; width: 350px; height:350px;" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="card bg-light" style="border:0px;">
                    <div class="card-body">
                        <div class="card-text text-center fs-3 fw-semibold text-muted">
                            Nuestros servicios
                        </div>
                        <p class="fs-5 text-muted mt-5">Como ya les comentábamos, qué es lo que soñamos para el futuro de la
                            finca. Iremos creando más
                            espacios, para tengas nuevos espacios de recreación. Actualmente ofrecemos el servicio de
                            restaurante el fin de semana, área de descanso, y juegos para niños. Además podés realizar las
                            siguientes actividades</p>
                    </div>
                    <div class="container">

                        <div class="row">
                            <div id="camping" class="col-lg-6 mb-2">
                                <div class="card shadow" style="border:0px;">
                                    <img src="{{ asset('img/camping.jpg') }}" class="card-img-top"
                                        style="width: 100%px; height: 300px;" alt="...">
                                    <div class="card-body text-center text-muted">
                                        <h3 class="fw-semibold">Camping</h3>
                                        <p class="card-text">Podés llevar tu casa de campaña y pernoctar a ras del
                                            césped.</p>
                                    </div>
                                </div>
                            </div>

                            <div id="eventos" class="col-lg-6 mb-2">
                                <div class="card shadow" style="border: 0px;">
                                    <img src="{{ asset('img/festejos.jpg') }}" class="card-img-top"
                                        style="width: 100%px; height: 300px;" alt="...">
                                    <div class="card-body text-center text-muted">
                                        <h3 class="fw-semibold">Eventos</h3>
                                        <p class="card-text">Podés realizar tu actividad ya sea cumpleaños, casamientos, y
                                            otros como retiros espirituales</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .wrap {
        width: 100%;
        height: 500px;
        ;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(to bottom, rgb(0 0 0 / .0), rgb(0 0 0 / .5)), url({{ asset('img/cabana.jpeg') }});
        background-size: cover;
        background-position: center;
    }

    .wrap-texto {
        color: #fff;
        text-align: center;
        width: 50%;
    }
</style>

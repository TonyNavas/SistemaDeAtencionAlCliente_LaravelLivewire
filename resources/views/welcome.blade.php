@extends('layouts.app')

@section('content')
    <figure class="mb-5">
<div>
    @include('carousel')
</div>
    </figure>

    <div>
        @include('secciones.contenido-section')
    </div>
    <div>
        @include('secciones.products-section')
    </div>
@endsection

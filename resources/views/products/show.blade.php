@extends('layouts.app')

@section('content')

    <section style="max-width: 64rem;" class="container py-5">
        <div class="mb-2">
            <h1 class="fw-semibold">{{ $product->name }}</h1>
            <hr>

            <p class="fw-semibold text-success">{{ $product->created_at->format('d M Y') }} - Categoria: {{ $product->category->name }}</p>
        </div>
        <figure class="mb-5">
            <img style="width: 100%; max-height: 500px;" class="img-fluid text-center rounded" src="{{ asset('storage/products/' . $product->image) }}" alt="">
        </figure>

        <div>
           <p> {{ $product->description }}</p>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('content')

    <section class="container py-5">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mb-2">
                    <h1 class="fw-semibold text-muted">{{ $product->name }}</h1>
                    <p> {{ $product->description }}</p>
                    <hr>

                    <p class="fw-semibold text-success">{{ $product->created_at->format('d M Y') }} - Categoria: {{ $product->category->name }}</p>
                </div>
                <figure class="mb-5">
                    <img style="width: 100%; max-height: 500px;" class="img-fluid text-center rounded" src="{{ asset('storage/products/' . $product->image) }}" alt="">
                </figure>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                @livewire('products-reviews', ['product' => $product])
            </div>
        </div>

    </section>



@endsection

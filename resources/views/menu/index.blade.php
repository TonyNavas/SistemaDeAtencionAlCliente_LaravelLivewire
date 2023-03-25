@extends('layouts.app')

@section('content')

<section style=" max-width: 95%; padding-top: 5rem; padding-bottom:10rem;" class="container">
<h1 class="text-center mb-5 fw-semibold">
    Menú <i class="fa-solid fa-utensils"></i>
</h1>

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-12">
        <div style="position: sticky; top: 20%;" class="mb-4">
            <form action="{{ route('menu') }}" class="shadow p-4 rounded">

                <div class="mb-4">
                    <p class="fs-4 fw-normal">
                        <span>
                            <i class="fa-solid fa-grip-vertical text-"></i>
                            Categorias:
                        </span>
                    </p>
                    @foreach ($categories as $category)
                        <div class="form-check">
                            <input class="form-check-input shadow-sm" name="category[]" type="checkbox"
                                value="{{ $category->id }}" @checked(is_array(request('category')) && in_array($category->id, request('category')))>
                            <label class="form-check-label">
                                {{ $category->name }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <button class="btn btn-primary mb-5" type="submit">APLICAR FILTROS</button>
            </form>
        </div>
    </div>

    <div class="col-lg-9 col-md-9 col-sm-12">
        <div class="mb-2">
            @foreach ($products as $product)
                <article class="row">
                    <div class="col-lg-4">
                        <figure>
                            <img style="width: 100%; max-height: 16rem;" class="img-fluid rounded"
                                src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}">
                        </figure>
                    </div>
                    <div class="col-lg-7">
                        <h3 class="fw-semibold" style="color: #1b2a4e">
                            {{ $product->name }}
                        </h3>

                        <div class="mb-2">
                            <p class=" fw-semibold">
                                <span class="badge bg-primary">{{ $product->category->name }}</span>
                            </p>

                            <div class="d-flex">
                                <ul class="d-flex flex-row bd-highlight list-group">
                                    <li
                                        class="list-group me-1 text-{{ $product->rating >= 1 ? 'warning' : 'secondary' }}">
                                        <i class="fas fa-star"></i>
                                    </li>
                                    <li
                                        class="list-group me-1 text-{{ $product->rating >= 2 ? 'warning' : 'secondary' }}">
                                        <i class="fas fa-star"></i>
                                    </li>
                                    <li
                                        class="list-group me-1 text-{{ $product->rating >= 3 ? 'warning' : 'secondary' }}">
                                        <i class="fas fa-star"></i>
                                    </li>
                                    <li
                                        class="list-group me-1 text-{{ $product->rating >= 4 ? 'warning' : 'secondary' }}">
                                        <i class="fas fa-star"></i>
                                    </li>
                                    <li
                                        class="list-group me-1 text-{{ $product->rating == 5 ? 'warning' : 'secondary' }}">
                                        <i class="fas fa-star"></i>
                                    </li>
                                    <li class="list-group me-1 fw-semibold text-muted">
                                        <p>({{ $product->rating }})</p>
                                    </li>
                                </ul>
                            </div>

                            <p>{{ Str::limit($product->description, 100, '...') }}</p>
                            <span class="badge text-dark p-2 shadow float-end bg-warning">
                                <b>C$:{{ number_format($product->price, 2) }}</b>
                                <i class="fa-solid fa-tag"></i>
                            </span>
                        </div>

                        <div class="mb-4">
                            <a href="{{ route('products.show', $product) }}"
                                class="btn bg-primary shadow fw-semibold text-white">
                                <span>
                                    <i class="fa-solid fa-eye"></i>
                                    Ver detalles
                                </span>
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

    </div>
</div>

<div class="float-end mt-5">
    {{ $products->links() }}
</div>
</section>
@endsection

@extends('layouts.app')

@section('content')
    <figure class="mb-5">
        @include('carousel')
    </figure>

    <section style=" max-width: 95%; padding-bottom:10rem;" class="container">
        <h1 class="text-center mb-5 fw-semibold">
            Menú <i class="fa-solid fa-utensils"></i>
        </h1>

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <form action="{{ route('menu') }}">
                    <div class="mb-4">
                        <p class="fs-4 fw-normal">Ordenar por:</p>

                        <select style="max-width: 170px;" class="form-select form-select-lg shadow-sm py-2" name="order">
                            <option value="new">Más nuevos</option>
                            <option value="old" @selected(request('order') == 'old')>Más viejos</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <p class="fs-4 fw-normal">
                            <span>
                                <i class="fa-solid fa-grip-vertical"></i>
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

                    <button class="btn btn-dark mb-5" type="submit">APLICAR FILTROS</button>
                </form>
            </div>

            <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="mb-2">
                    @foreach ($products as $product)
                        <article class="row">
                            <div class="col-lg-4">
                                <figure>
                                    <img  style="width: 100%; max-height: 16rem;" class="img-fluid rounded" src="{{ asset('storage/products/' . $product->image) }}"
                                        alt="{{ $product->name }}">
                                </figure>
                            </div>
                            <div class="col-lg-7">
                                <h3 class="fw-semibold" style="color: #1b2a4e">
                                    {{ $product->name }}
                                </h3>

                                <div class="mb-2">
                                    <p class=" fw-semibold">
                                        <span style="background-image: linear-gradient(to right, #6a11cb 0%, #2575fc 100%);" class="badge">{{ $product->category->name }}</span>
                                    </p>
                                    <p>{{ Str::limit($product->description, 100, '...') }}</p>

                                    <span class="badge text-dark p-2 shadow float-end"
                                            style="background-image: linear-gradient(to top, #0fd850 0%, #f9f047 100%);">
                                        <b>C$:{{ number_format($product->price, 2) }}</b>
                                        <i class="fa-solid fa-tag"></i>
                                    </span>
                                </div>

                                <div class="mb-4">
                                    <a href="{{ route('products.show', $product) }}"
                                        style="background-image: linear-gradient(-20deg, #b721ff 0%, #21d4fd 100%); border: 0"
                                        class="btn shadow fw-semibold text-white">
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

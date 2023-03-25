<section style="max-width: 95%; padding-bottom: 1rem;" class="container">
    <div class="text-center" style="padding-bottom: 4rem;">
        <h2 class="fw-semibold text-muted">
            Productos más recientes
        </h2>
    </div>

    <div class="row">

        @foreach ($products as $product)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card shadow-lg mb-2 bg-light" style="border:0px;">
                    <div class="card-body">
                        <div class="rounded">
                    <figure>
                        <img style="width: 100%; max-height: 300px; height: 250px;" class="img-fluid rounded"
                            src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}">
                    </figure>
                    <h5 class="fw-semibold" style="color: #1b2a4e">
                        {{ $product->name }}
                    </h5>
                    <div class="mb-2">

                        <p>{{ Str::limit($product->description, 30, '...') }}</p>
                    </div>
                    <div class="d-flex">
                        <ul class="d-flex flex-row bd-highlight mb-3 list-group">
                            <p>({{ $product->rating }})</p>
                            <li class="list-group me-1 text-{{ $product->rating >= 1 ? 'warning' : 'secondary' }}">
                                <i class="fas fa-star"></i>
                            </li>
                            <li class="list-group me-1 text-{{ $product->rating >= 2 ? 'warning' : 'secondary' }}">
                                <i class="fas fa-star"></i>
                            </li>
                            <li class="list-group me-1 text-{{ $product->rating >= 3 ? 'warning' : 'secondary' }}">
                                <i class="fas fa-star"></i>
                            </li>
                            <li class="list-group me-1 text-{{ $product->rating >= 4 ? 'warning' : 'secondary' }}">
                                <i class="fas fa-star"></i>
                            </li>
                            <li class="list-group me-1 text-{{ $product->rating == 5 ? 'warning' : 'secondary' }}">
                                <i class="fas fa-star"></i>
                            </li>

                        </ul>
                        <p class="fw-semibold ms-auto">
                            <span class="badge bg-primary">{{ $product->category->name }}</span>
                        </p>
                    </div>
                </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <div class="card bg-light"  style="margin-top:5rem; border:0px;">
        <div class="card-body">
            <div class="row">
                <div class="d-lg-block col-lg-6 col-md-6 d-none">
                    <img style="height: 400px; width:100%;" class="img-fluid rounded" src="{{ asset('img/contenido.jpg') }}"
                        alt="">
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 rounded"
                    style="background-image: linear-gradient(to top, #30cfd0 0%, #330867 100%);">
                    <div style="margin: 7rem auto;">
                        <h3 class="text-center text-white fw-bold">
                            RESUMEN DE LA WEB
                        </h3>

                        <div class="row">
                            <div class="col">
                                <div class="card mb-2 text-white" style="border: 0px;
                                background-image: linear-gradient(to right, #b8cbb8 0%, #b8cbb8 0%, #b465da 0%, #cf6cc9 33%, #ee609c 66%, #ee609c 100%);">
                                    <div class="card-body">
                                        @php
                                            use App\Models\Category;
                                            $categoryCount = Category::count();
                                        @endphp

                                        <p class="fs-3 fw-semibold text-center">{{ $categoryCount }}</p>
                                        <h4 class="text-center">Categorias</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card mb-2 text-white" style="border: 0px;
                                background-image: linear-gradient(to top, #c471f5 0%, #fa71cd 100%);">
                                    <div class="card-body">
                                        @php
                                            use App\Models\Product;
                                            $productCount = Product::count();
                                        @endphp

                                        <p class="fs-3 fw-semibold text-center">{{ $productCount }}</p>
                                        <h4 class="text-center">Productos</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section style="max-width: 95%; padding-bottom: 1rem;" class="container">
    <div class="text-center mb-4">
        <h2 class="fw-semibold">
            NUESTROS PRODUCTOS
        </h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto necessitatibus iste odit, sint dolore
            saepe. Quo perferendis recusandae</p>
    </div>

    <div class="row">
        @foreach ($products as $product)
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="p-3 rounded mb-3 shadow">
                    <figure>
                        <img style="width: 100%; max-height: 200px; height: 180px;" class="img-fluid rounded"
                            src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}">
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
                                <li class="list-group me-1 text-{{ $product->rating >=1 ? 'warning' : 'secondary'}}">
                                    <i class="fas fa-star"></i>
                                </li>
                                <li class="list-group me-1 text-{{ $product->rating >=2 ? 'warning' : 'secondary'}}">
                                    <i class="fas fa-star"></i>
                                </li>
                                <li class="list-group me-1 text-{{ $product->rating >=3 ? 'warning' : 'secondary'}}">
                                    <i class="fas fa-star"></i>
                                </li>
                                <li class="list-group me-1 text-{{ $product->rating >=4 ? 'warning' : 'secondary'}}">
                                    <i class="fas fa-star"></i>
                                </li>
                                <li class="list-group me-1 text-{{ $product->rating ==5 ? 'warning' : 'secondary'}}">
                                    <i class="fas fa-star"></i>
                                </li>

                            </ul>
                            <p class="fw-semibold ms-auto">
                                <span class="badge bg-primary">{{ $product->category->name }}</span>
                            </p>
                        </div>
                    {{-- <div class="d-grid gap-2 col-12 mx-auto">
                        <a class="btn btn-primary" href="{{ route('products.show', $product) }}">
                            Valorar <i class="fas fa-star"></i>
                        </a>
                      </div> --}}
                </div>
            </div>
        @endforeach
    </div>
    </div>
</section>

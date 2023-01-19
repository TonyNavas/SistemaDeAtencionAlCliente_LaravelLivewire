<section style="max-width: 95%; padding-bottom: 1rem;" class="container">
    <div class="text-center mb-4">
        <h2 class="fw-semibold">
            NUESTROS PRODUCTOS
        </h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto necessitatibus iste odit, sint dolore saepe. Quo perferendis recusandae</p>
    </div>

    <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="p-3 rounded mb-3">
                            <figure>
                                <img style="width: 100%; max-height: 200px;" class="img-fluid rounded" src="{{ asset('storage/products/' . $product->image) }}"
                                    alt="{{ $product->name }}">
                            </figure>
                            <h5 class="fw-semibold" style="color: #1b2a4e">
                                {{ $product->name }}
                            </h5>
                            <div class="mb-2">
                                <p class=" fw-semibold">
                                    <span class="badge bg-primary">{{ $product->category->name }}</span>
                                    <span class="badge p-2 bg-warning shadow float-end"

                                <b>C$:{{ number_format($product->price, 2) }}</b>
                                <i class="fa-solid fa-tag"></i>
                            </span>
                                </p>

                                <p>{{ Str::limit($product->description, 100, '...') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>

    <div class="container">
        {{ $products->links() }}
    </div>
</section>

<section class="mt-4">
    <h1 class="text-muted mb-2">Valoración</h1>

        @auth
            <article class="mb-2">
                <textarea wire:model="comment" class="form-control w-100 shadow-sm" name="" rows="3" placeholder="Ingrese una reseña del platillo"></textarea>
            </article>
            <div class="d-flex mb-3">
                <button class="btn btn-primary me-3" wire:click="store">Guardar</button>

                <ul class="d-flex flex-row bd-highlight mb-3 list-group text-muted">
                    <li wire:click="$set('rating', 1)" style="cursor: pointer;" class="list-group me-1 text-{{$rating >=1 ? 'warning' : 'secondary'}}">
                        <i class="fas fa-star fs-4"></i>
                    </li>
                    <li wire:click="$set('rating', 2)" style="cursor: pointer;" class="list-group me-1 text-{{$rating >=2 ? 'warning' : 'secondary'}}">
                        <i class="fas fa-star fs-4"></i>
                    </li>
                    <li wire:click="$set('rating', 3)" style="cursor: pointer;" class="list-group me-1 text-{{$rating >=3 ? 'warning' : 'secondary'}}">
                        <i class="fas fa-star fs-4"></i>
                    </li>
                    <li wire:click="$set('rating', 4)" style="cursor: pointer;" class="list-group me-1 text-{{$rating >=4 ? 'warning' : 'secondary'}}">
                        <i class="fas fa-star fs-4"></i>
                    </li>
                    <li wire:click="$set('rating', 5)" style="cursor: pointer;" class="list-group me-1 text-{{$rating ==5 ? 'warning' : 'secondary'}}">
                        <i class="fas fa-star fs-4"></i>
                    </li>
                </ul>
            </div>

        @endauth
  <div class="card bg-light border-0 shadow">
    <div class="card-body">
        <p class="fs-5 text-secondary fw-semibold">{{ $product->reviews->count() }} valoraciones</p>

        @foreach ($product->reviews as $review)
            <article class="d-flex mb-4 text-muted">
                <figure class="me-4">
                    <img style="width: 60px; height: 60px;" class="object-fit-cover shadow rounded-circle" src="https://cdn-icons-png.flaticon.com/512/4135/4135873.png" alt="">
                </figure>

            <div class="card w-100 border-0 rounded">
                <div style="background: #f3f0f0;" class="card-body shadow">
                    <p><b>{{ $review->user->name }}</b> <i class="fas fa-star text-warning"></i>({{ $review->rating }})</p>

                    {{ $review->comments }}
                </div>
            </div>
        </article>
        @endforeach
    </div>
  </div>
</section>

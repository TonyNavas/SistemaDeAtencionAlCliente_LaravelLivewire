@auth
<div class="dropdown py-2 d-lg-none d-md-block">
    <button class="btn btn-primary btn position-relative" id="dLabel" data-bs-toggle="dropdown"
        class="position-relative text-decoration-none text-dark">
        <span>
            Notificaciones
            <i class="fa-regular fa-bell"></i>
        </span>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            {{ auth()->user()->notification }}
        </span>
    </button>

    <div wire:ignore.self class="dropdown-menu" role="menu">
        <div class="card" style="width: 20rem; border:0px;">
            <div class="card-body">
                <h5 class="card-title">Notificaciones</h5>
                @foreach ($notifications as $notify)
                    <a wire:click="read('{{ $notify->id }}')" class="nav-link mb-1 p-3 rounded {{ !$notify->read_at ? 'bg-primary' : 'bg-light' }}"
                        href="{{ $notify->data['url'] }}">
                        <span class=" {{ !$notify->read_at ? 'text-white' : 'text-muted' }}">
                            <i class="fa-solid fa-envelope"></i>
                            {{ $notify->data['message'] }}
                            <i class="fa-solid fa-clock"></i>
                            <small>{{ $notify->created_at->diffForHumans() }}</small>
                        </span>
                    </a>
                @endforeach
            </div>
        </div>


    </div>
</div>

@endauth

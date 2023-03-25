@auth
<div class="dropdown py-2 me-3 mt-1 mb-2 d-md-block">
    <button wire:click="resetNotificationCount" class="btn btn-primary text-white btn position-relative" id="dLabel" data-bs-toggle="dropdown"
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
        <div class="card" style="width: 20rem; border:0px; max-height:300px; overflow-y:auto;">
            <div class="card-body">
                <div class=" justify-content-between mb-5">
                <h5 class="card-title text-muted" style="float:left">Notificaciones</h5>
                <button wire:click="deleteNotifications()" class="btn btn-sm btn-danger" style="float:right;">
                    <small>Borrar todo</small>
                    <i class="fa-solid fa-trash-can"></i>
                </button>

                </div>
                <hr>
                @foreach ($notifications as $notify)
                <a wire:click="read('{{ $notify->id }}')" class="nav-link mb-1 p-3 rounded {{ !$notify->read_at ? 'bg-danger' : 'bg-light' }}"
                    href="{{ $notify->data['url'] }}">
                    <span class=" {{ !$notify->read_at ? 'text-white' : 'text-muted' }}">
                        <i class="fa-solid fa-envelope"></i>
                        {{ $notify->data['message'] }}
                        <i class="fa-solid fa-clock"></i>
                        <small>{{ $notify->created_at->locale('es_ES')->diffForHumans() }}</small>
                    </span>
                </a>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endauth

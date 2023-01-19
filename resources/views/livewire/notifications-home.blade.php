<div class="dropdown dropstart">

    <a href="javascript:void(0)" id="dLabel" data-bs-toggle="dropdown"
        class="position-relative text-decoration-none text-dark">
        Notificaciones
        <i style="font-size: 20px;" class="fa-regular fa-bell text-dark"></i>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
            {{ auth()->user()->notification }}
        </span>
    </a>

    <ul class="dropdown-menu notifications" role="menu" aria-labelledby="dLabel">
        <div class="notification-heading text-muted">
            <p style="font-size: 12px;">Notificaciones</p>
        </div>
        <hr style="margin-top: 0; margin-bottom:0;" class="mb-3">
        @if (auth()->user()->notification)
        <div class="notifications-wrapper">
            @foreach ($notifications as $notification)
               <li>
                 <a class="content" href="{{ $notification->data['url'] }}">
                    <div class="notification-item">
                        <p class="text-dark mb-0">{{ $notification->data['message'] }}</p>
                        <p style="font-size: 12px;" class="text-dark mb-0">Mensaje: "{{ Str::limit($notification->data['body'], 20, '...') }}"</p>
                        <small style="font-size: 11px; font-weight:600;" class="text-dark">{{ $notification->created_at->diffForHumans() }}</small>
                    </div>
                </a>
               </li><hr style="margin-bottom: 0; margin-top:0;">
            @endforeach
        </div>
            @else
            <div class="px-2 py-10 pb-3 text-center fw-semibold text-muted">
                No tienes notificaciones.
            </div>
        @endif


    </ul>
</div>

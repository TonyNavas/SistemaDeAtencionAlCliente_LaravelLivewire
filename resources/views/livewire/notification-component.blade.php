@can('ver-notificaciones')
<li class="nav-item dropdown notification-dropdown">
    <a href="javascript:void(0);"
     class="nav-link dropdown-toggle" id="notificationDropdown" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-bell">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
        </svg><span class="badge badge-success"></span>

        <span style="font-size: 12px;"
            class="fondoAzul position-absolute top-5 translate-middle px-1 py-0 rounded-circle">
            {{ auth()->user()->notification }}
        </span>

    </a>

    <div style="width: 270px; max-width: 270px;" class="dropdown-menu position-absolute" aria-labelledby="notificationDropdown">
        <div class="drodpown-title message">
            <h6 class="d-flex justify-content-between">
                <span class="align-self-center">Notificaciones</span>
                <a href="javascript:void(0)" wire:click="markAsReadAll()" title="Marcar todo como leído">

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                </a>
                <a href="javascript:void(0)" wire:click="deleteAllNotifications()" title="Vaciar todo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                </a>

            </h6>

        </div>
        <div class="notification-scroll">
            @foreach ($notifications as $notification)
                <div class="{{ !$notification->read_at ? 'bg-info px-2 py-1 rounded' : '' }}">
                    <div class="dropdown-item">
                        <div class="media server-log">
                            <div class="media-body">
                                <div class="data-info">
                                    <ul class="list-group list-group-flush">
                                        <li style="list-style: none;" wire:click="read('{{ $notification->id }}')">
                                            <a href="{{ $notification->data['url'] }}">
                                                <h6 class="{{ !$notification->read_at ? 'text-white' : '' }}">
                                                    <span>
                                                        <i class="fa-regular fa-message"></i>
                                                    {{ $notification->data['message'] }}
                                                    </span>
                                                    </h6>
                                                <p class="{{ !$notification->read_at ? 'text-white' : '' }}">
                                                    <span>
                                                        <i class="fa-solid fa-clock"></i>
                                                    {{ $notification->created_at->diffForHumans() }},
                                                    {{ $notification->created_at->formatLocalized('%A') }}
                                                    </span>
                                                    </p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div wire:click="deleteNotify('{{ $notification->id }}')" class="icon-status">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr style="margin-bottom: 0px; margin-top:0px; height: 2px;">
            @endforeach
        </div>
    </div>

</li>

@endcan

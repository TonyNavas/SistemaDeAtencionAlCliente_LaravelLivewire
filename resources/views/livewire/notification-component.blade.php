<li class="nav-item dropdown notification-dropdown">
    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg><span class="badge badge-success"></span>

        <span style="font-size: 12px;" class="fondoAzul position-absolute top-5 translate-middle px-1 py-0 rounded-circle">
            {{ auth()->user()->notification }}
        </span>

    </a>

    <div style="width: 300px" class="dropdown-menu position-absolute" aria-labelledby="notificationDropdown">
        <div class="drodpown-title message">
            <h6 class="d-flex justify-content-between mb-1">
                <span class="align-self-center">Solicitudes</span>
                <span wire:click="resetNotificationCount()" class="btn btn-sm badge-primary">{{ auth()->user()->notification }} Marcar como leídas</span>

            </h6>
        </div>
        <div class="notification-scroll">

            @foreach ($notifications as $notification)
            <div wire:click="read('{{ $notification->id }}')" class="{{ ! $notification->read_at ? 'bg-primary' : '' }}">
                <div class="dropdown-item">
                    <div class="media server-log">
                        <div class="media-body">
                            <div class="data-info">
                                <a href="{{ $notification->data['url'] }}">
                                    <span class="{{ ! $notification->read_at ? 'text-white' : '' }}">{{ $notification->data['message'] }}</span>
                                <span class="{{ ! $notification->read_at ? 'text-white' : '' }}" style="font-size: 11px; font-weight: bold;">{{ $notification->created_at->diffForHumans() }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr style="height: 2px; margin-bottom: 0px; margin-top:0px;">
            </div>
            @endforeach
        </div>
    </div>

</li>




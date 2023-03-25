<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotificationsHome extends Component
{
    public $notifications;
    public $count;

    protected $listeners = ['notification'];

    public function mount(){
        $this->notification();
    }

    public function read($notification_id){

        $notification = auth()->user()->notifications()->findOrFail($notification_id);
        $notification->markAsRead();
    }

    public function notification(){
        $this->notifications = auth()->user()->notifications;
        $this->count = auth()->user()->unreadNotifications->count();

        $this->emit('notification-received');
    }

    public function deleteNotifications(){

        $notify = auth()->user()->notifications();
        $notify->delete();

                $this->notifications = auth()->user()->notifications;
    }
    public function resetNotificationCount(){
        auth()->user()->notification = 0;
        auth()->user()->save();
    }

    public function notificationCount(){
        $this->notifications = auth()->user()->notifications;
        $this->count = auth()->user()->unreadNotifications->count();
    }

    public function render()
    {

        return view('livewire.notifications-home');
    }
}

<?php

namespace App\Http\Livewire;

use Illuminate\Notifications\Notification;
use Livewire\Component;

class NotificationComponent extends Component
{

    public $notifications;
    public $count;

    // protected $listeners = ['notification'];

    // Oyentes

    public function getListeners()
    {

        $user_id = auth()->user()->id;
        return [
            "echo-notification:App.Models.User.{$user_id},notification" => 'notification',
        ];
    }

    public function mount(){
        $this->notification();
    }

    public function resetNotificationCount(){

        auth()->user()->notification = 0;
        auth()->user()->save();
    }

    public function read($notification_id){

        $notification = auth()->user()->notifications()->findOrFail($notification_id);
        $notification->markAsRead();

        $this->resetNotificationCount();
        $this->notificationCount();
    }
    public function markAsReadAll(){

        $notification = auth()->user()->notifications()->get();
        $notification->markAsRead();

        $this->resetNotificationCount();
        $this->notificationCount();

    }

    public function notification(){
        $this->notifications = auth()->user()->notifications;
        $this->count = auth()->user()->unreadNotifications->count();

        $this->emit('notification-received');
    }

    public function notificationCount(){
        $this->notifications = auth()->user()->notifications;
        $this->count = auth()->user()->unreadNotifications->count();
    }

    public function deleteNotify($notification_id){
        $notification = auth()->user()->notifications()->findOrFail($notification_id);
        $notification->delete();

        $this->resetNotificationCount();
        $this->notificationCount();
    }

    public function deleteAllNotifications(){
        $notification = auth()->user()->notifications();
        $notification->delete();

        $this->resetNotificationCount();
        $this->notificationCount();
    }

    public function render()
    {
        return view('livewire.notification-component');
    }
}

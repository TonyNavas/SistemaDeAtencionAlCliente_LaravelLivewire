@extends('layouts.template.main')

@section('content')
   <div class="card shadow">
    <div class="card-body">
        De: {{ $messages->users->name }}
        <h5>{{ $messages->subject }}</h5>
        <p>{{ $messages->body }}</p>
    </div>
   </div>
@endsection

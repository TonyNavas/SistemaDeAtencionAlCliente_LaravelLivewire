@extends('layouts.template.main')

@section('content')
   <div class="card shadow-sm">
    <div class="card-body">
        <p class="mb-2 fw-semibold">De: {{ $messages->users->name }}</p>
        <h5>{{ $messages->subject }}</h5>
        <p><span class="badge bg-primary">{{ $messages->created_at->diffForHumans() }}</span></p>
        <p class="fs-6">{{ $messages->body }}</p>
    </div>
   </div>
@endsection

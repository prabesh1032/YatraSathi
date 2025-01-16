@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $guide->name }}</h1>
    <div>
        <img src="{{ asset('storage/' . $guide->photopath) }}" alt="{{ $guide->name }}" class="img-fluid">
    </div>
    <p><strong>Description:</strong> {{ $guide->description }}</p>
    <p><strong>Package:</strong> {{ $guide->package->name }}</p>

    <a href="{{ route('guides.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection

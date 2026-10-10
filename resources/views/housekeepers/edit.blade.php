@extends('layouts.app')
@section('title', 'Edit Housekeeper')

@section('content')
<h4 class="mb-3">Edit Housekeeper</h4>

<form action="{{ route('housekeepers.update', $housekeeper) }}" method="POST" class="card card-body">
    @csrf
    @method('PUT')
    @include('housekeepers._form')
    <div>
        <button class="btn btn-primary">Perbarui</button>
        <a href="{{ route('housekeepers.index') }}" class="btn btn-secondary">Batal</a>
    </div>
</form>
@endsection
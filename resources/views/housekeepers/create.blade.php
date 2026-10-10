@extends('layouts.app')
@section('title', 'Tambah Housekeeper')

@section('content')
<h4 class="mb-3">Tambah Housekeeper</h4>

<form action="{{ route('housekeepers.store') }}" method="POST" class="card card-body">
    @csrf
    @include('housekeepers._form')
    <div>
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('housekeepers.index') }}" class="btn btn-secondary">Batal</a>
    </div>
</form>
@endsection
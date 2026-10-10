@extends('layouts.app')
@section('title', 'Data Housekeeper')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Data Housekeeper / Staff</h4>
    <a href="{{ route('housekeepers.create') }}" class="btn btn-primary">+ Tambah</a>
</div>

<form method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" value="{{ request('search') }}"
               class="form-control" placeholder="Cari nama atau area penanganan...">
        <button class="btn btn-outline-secondary">Cari</button>
    </div>
</form>

<div class="card">
    <div class="table-responsive">
        <table class="table table-striped align-middle mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No. HP</th>
                    <th>Shift</th>
                    <th>Tugas Harian</th>
                    <th>Area</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($housekeepers as $h)
                    <tr>
                        <td>{{ $housekeepers->firstItem() + $loop->index }}</td>
                        <td>{{ $h->nama }}</td>
                        <td>{{ $h->no_hp }}</td>
                        <td>{{ ucfirst($h->shift) }}</td>
                        <td>{{ $h->tugas_harian }}</td>
                        <td>{{ $h->area_penanganan }}</td>
                        <td>
                            <span class="badge {{ $h->status === 'aktif' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($h->status) }}
                            </span>
                        </td>
                        <td class="text-nowrap">
                            <a href="{{ route('housekeepers.edit', $h) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('housekeepers.destroy', $h) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">Belum ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">{{ $housekeepers->links() }}</div>
@endsection
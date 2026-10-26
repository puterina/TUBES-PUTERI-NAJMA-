@extends('layouts.app')
@section('title', 'Data Housekeeper')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
    <div>
        <h3 class="fw-bold mb-1">Housekeeper</h3>
        <div class="text-secondary">Kelola data staf kebersihan dan jadwal tugasnya.</div>
    </div>
    <a href="{{ route('housekeepers.create') }}" class="btn btn-brand">
        <i class="bi bi-plus-lg me-1"></i> Tambah Housekeeper
    </a>
</div>

{{-- Kartu ringkasan --}}
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card-clean stat">
            <div class="stat-icon" style="background:#ccfbf1;color:#0f766e"><i class="bi bi-people-fill"></i></div>
            <div><div class="stat-num">{{ $stats['total'] }}</div><div class="stat-label">Total staf</div></div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card-clean stat">
            <div class="stat-icon" style="background:#dcfce7;color:#166534"><i class="bi bi-person-check-fill"></i></div>
            <div><div class="stat-num">{{ $stats['aktif'] }}</div><div class="stat-label">Aktif</div></div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card-clean stat">
            <div class="stat-icon" style="background:#f1f5f9;color:#64748b"><i class="bi bi-person-dash-fill"></i></div>
            <div><div class="stat-num">{{ $stats['nonaktif'] }}</div><div class="stat-label">Nonaktif</div></div>
        </div>
    </div>
</div>

<div class="card-clean">
    {{-- Pencarian dan filter --}}
    <form method="GET" class="p-3 border-bottom">
        <div class="row g-2">
            <div class="col-md">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0" style="border-radius:10px 0 0 10px"><i class="bi bi-search text-secondary"></i></span>
                    <input type="text" name="search" value="{{ request('search') }}"
                           class="form-control border-start-0" style="border-radius:0 10px 10px 0"
                           placeholder="Cari nama atau area penanganan...">
                </div>
            </div>
            <div class="col-md-3">
                <select name="shift" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua shift</option>
                    @foreach (['pagi', 'siang', 'malam'] as $s)
                        <option value="{{ $s }}" @selected(request('shift') === $s)>Shift {{ ucfirst($s) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-auto">
                <button class="btn btn-brand w-100">Cari</button>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th>Staf</th>
                    <th>Shift</th>
                    <th>Tugas Harian</th>
                    <th>Area</th>
                    <th>Status</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($housekeepers as $h)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="avatar">{{ strtoupper(substr($h->nama, 0, 1)) }}</div>
                                <div>
                                    <div class="fw-semibold">{{ $h->nama }}</div>
                                    <div class="small text-secondary"><i class="bi bi-telephone me-1"></i>{{ $h->no_hp }}</div>
                                </div>
                            </div>
                        </td>
                        <td><span class="pill pill-{{ $h->shift }}">{{ ucfirst($h->shift) }}</span></td>
                        <td style="max-width:260px">{{ \Illuminate\Support\Str::limit($h->tugas_harian, 60) }}</td>
                        <td><i class="bi bi-geo-alt text-secondary me-1"></i>{{ $h->area_penanganan }}</td>
                        <td><span class="pill pill-{{ $h->status }}">{{ ucfirst($h->status) }}</span></td>
                        <td class="text-end text-nowrap">
                            <a href="{{ route('housekeepers.edit', $h) }}" class="icon-btn" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('housekeepers.destroy', $h) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin hapus {{ $h->nama }}?')">
                                @csrf @method('DELETE')
                                <button class="icon-btn danger" title="Hapus"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <i class="bi bi-inbox fs-1 text-secondary d-block mb-2"></i>
                            <div class="fw-semibold">Belum ada data</div>
                            <div class="text-secondary small">Klik "Tambah Housekeeper" untuk memulai.</div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($housekeepers->hasPages())
        <div class="p-3 border-top">{{ $housekeepers->links() }}</div>
    @endif
</div>
@endsection
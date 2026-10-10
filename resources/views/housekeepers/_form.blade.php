@php $h = $housekeeper ?? null; @endphp

<div class="mb-3">
    <label class="form-label">Nama</label>
    <input type="text" name="nama" value="{{ old('nama', $h->nama ?? '') }}"
           class="form-control @error('nama') is-invalid @enderror">
    @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">No. HP</label>
    <input type="text" name="no_hp" value="{{ old('no_hp', $h->no_hp ?? '') }}"
           class="form-control @error('no_hp') is-invalid @enderror" placeholder="08123456789">
    @error('no_hp') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Alamat</label>
    <textarea name="alamat" rows="2"
              class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $h->alamat ?? '') }}</textarea>
    @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Shift</label>
    <select name="shift" class="form-select @error('shift') is-invalid @enderror">
        <option value="">-- Pilih shift --</option>
        @foreach (['pagi', 'siang', 'malam'] as $s)
            <option value="{{ $s }}" @selected(old('shift', $h->shift ?? '') === $s)>{{ ucfirst($s) }}</option>
        @endforeach
    </select>
    @error('shift') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Tugas Harian</label>
    <textarea name="tugas_harian" rows="3"
              class="form-control @error('tugas_harian') is-invalid @enderror">{{ old('tugas_harian', $h->tugas_harian ?? '') }}</textarea>
    @error('tugas_harian') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Area Penanganan</label>
    <input type="text" name="area_penanganan" value="{{ old('area_penanganan', $h->area_penanganan ?? '') }}"
           class="form-control @error('area_penanganan') is-invalid @enderror" placeholder="Lantai 1, Dapur, Halaman">
    @error('area_penanganan') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Status</label>
    <select name="status" class="form-select @error('status') is-invalid @enderror">
        @foreach (['aktif', 'nonaktif'] as $s)
            <option value="{{ $s }}" @selected(old('status', $h->status ?? 'aktif') === $s)>{{ ucfirst($s) }}</option>
        @endforeach
    </select>
    @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
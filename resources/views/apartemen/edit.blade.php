@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Apartemen</h1>
    <form action="{{ route('apartemen.update', $apartemen->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Method spoofing untuk PUT -->
        <div class="form-group">
            <label for="nomor_apartemen">Nomor Apartemen</label>
            <input type="text" name="nomor_apartemen" class="form-control" value="{{ $apartemen->nomor_apartemen }}" required>
        </div>
        <div class="form-group">
            <label for="lantai">Lantai</label>
            <input type="number" name="lantai" class="form-control" value="{{ $apartemen->lantai }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="tersedia" {{ $apartemen->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="terisi" {{ $apartemen->status == 'terisi' ? 'selected' : '' }}>Terisi</option>
                <option value="maintenance" {{ $apartemen->status == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection

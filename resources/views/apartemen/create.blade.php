@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Apartemen</h1>
    <form action="{{ route('apartemen.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nomor_apartemen">Nomor Apartemen</label>
            <input type="text" name="nomor_apartemen" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="lantai">Lantai</label>
            <input type="number" name="lantai" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="tersedia">Tersedia</option>
                <option value="terisi">Terisi</option>
                <option value="maintenance">Maintenance</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
    <h1>Tambah Penghuni</h1>
    <form action="{{ route('penghuni.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="apart_id">Apartemen</label>
            <select name="apart_id" class="form-control" required>
                @foreach($apartemens as $apartemen)
                    <option value="{{ $apartemen->id }}">{{ $apartemen->nomor_apartemen }} - Lantai {{ $apartemen->lantai }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="pria">Laki-laki</option>
                <option value="wanita">Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="umur">Umur</label>
            <input type="text" name="umur" class="form-control" id="umur" readonly>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="aktif">Aktif</option>
                <option value="non-aktif">Non-Aktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <script>
        // Menghitung umur berdasarkan tanggal lahir
        document.querySelector('[name="tanggal_lahir"]').addEventListener('change', function() {
            var dob = new Date(this.value);
            var today = new Date();
            var age = today.getFullYear() - dob.getFullYear();
            var m = today.getMonth() - dob.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
                age--;
            }
            document.querySelector('[name="umur"]').value = age;
        });
    </script>
@endsection

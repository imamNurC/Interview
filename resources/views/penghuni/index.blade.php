@extends('layouts.app')

@section('content')
    <h1>Daftar Penghuni</h1>
    <a href="{{ route('penghuni.create') }}" class="btn btn-primary mb-3">Tambah Penghuni</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Penghuni</th>
                <th>Apartemen</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Umur</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penghunis as $penghuni)
                <tr>
                    <td>{{ $penghuni->nama }}</td>
                    <td>{{ $penghuni->apartemen->nomor_apartemen }}</td>
                    <td>{{ ucfirst($penghuni->jenis_kelamin) }}</td>
                    <td>{{ \Carbon\Carbon::parse($penghuni->tanggal_lahir)->format('d-m-Y') }}</td>
                    <td>{{ $penghuni->umur }}</td>
                    <td>{{ ucfirst($penghuni->status) }}</td>
                    <td>
                        <!-- Tombol Edit -->
                        <a href="{{ route('penghuni.edit', $penghuni->id) }}" class="btn btn-warning">Edit</a>
                        
                        <!-- Form Hapus -->
                        <form action="{{ route('penghuni.destroy', $penghuni->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

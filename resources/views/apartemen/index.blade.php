@extends('layouts.app')

@section('content')
    <h1>Daftar Apartemen</h1>
    <a href="{{ route('apartemen.create') }}" class="btn btn-primary mb-3">Tambah Apartemen</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nomor Apartemen</th>
                <th>Lantai</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($apartemens as $apartemen)
                <tr>
                    <td>{{ $apartemen->nomor_apartemen }}</td>
                    <td>{{ $apartemen->lantai }}</td>
                    <td>{{ $apartemen->status }}</td>
                    <td>
                        <!-- Tombol Edit -->
                        <a href="{{ route('apartemen.edit', $apartemen->id) }}" class="btn btn-warning">Edit</a>
                        
                        <!-- Form Hapus -->
                        <form action="{{ route('apartemen.destroy', $apartemen->id) }}" method="POST" class="d-inline">
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

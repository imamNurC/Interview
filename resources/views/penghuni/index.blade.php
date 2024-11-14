@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Penghuni</h1>
    <a href="{{ route('penghuni.create') }}" class="btn btn-primary mb-3">Tambah Penghuni</a>
    {{-- <table id="example"   class="table table-bordered"> --}}
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
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
</div>

    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
    
    
            });
        });
    </script>
@endsection

@push('scripts')
    
@endpush

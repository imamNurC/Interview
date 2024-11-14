@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Apartemen</h1>
    <a href="{{ route('apartemen.create') }}" class="btn btn-primary mb-3">Tambah Apartemen</a>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead class="table-light">
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

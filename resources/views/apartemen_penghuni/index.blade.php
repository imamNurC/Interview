@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Daftar Apartemen dan Penghuninya</h1>
        
        @foreach ($apartemens as $apartemen)
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">Apartemen {{ $apartemen->nomor_apartemen }} - Lantai {{ $apartemen->lantai }}</h5>
                    <p class="card-text">
                        Status: 
                        <strong>{{ ucfirst($apartemen->status) }}</strong>
                    </p>
                </div>

                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Penghuni:</h6>

                    @if ($apartemen->penghuni->isEmpty())
                        <p>Tidak ada penghuni di apartemen ini.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nama Penghuni</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Umur</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($apartemen->penghuni as $penghuni)
                                        <tr>
                                            <td>{{ $penghuni->nama }}</td>
                                            <td>{{ ucfirst($penghuni->jenis_kelamin) }}</td>
                                            <td>{{ $penghuni->umur }}</td>
                                            <td>{{ ucfirst($penghuni->status) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection

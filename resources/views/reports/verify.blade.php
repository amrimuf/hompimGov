@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header"><h3>Verifikasi Laporan🤔</h3></div>
        <div class="card-body">
            <div class="row">      
                <div class="col-md-6">
                    <h4>Bukti</h4>
                    @if($report->getMedia('report_proof')->isNotEmpty())
                        <div class="row">
                            @foreach($report->getMedia('report_proof') as $media)
                                <div class="col-md-10 mb-3">
                                    <img src="{{ $media->getUrl() }}" alt="Report Image" class="img-fluid">
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>No images available for this report.</p>
                    @endif
                </div>
                <div class="col-md-6">
                    <h4>Detail</h4>
                    <ul>
                        <li><strong>Ticket ID:</strong> {{ $report->ticket_id }}</li>
                        <li><strong>Judul:</strong> {{ $report->title }}</li>
                        <li><strong>Deskripsi:</strong> {{ $report->description }}</li>
                        <li><strong>Status:</strong> {{ $report->status }}</li>
                        {{-- <li><strong>Kategori:</strong> {{ $report->category->name }}</li> --}}
                    </ul>
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Form Verifikasi</h4>
                            <form method="POST" action="{{ route('reports.update', $report->id) }}">
                                @csrf
                                @method('PUT')
                
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="Pending" @if($report->status === 'Pending') selected @endif>Pending</option>
                                        <option value="Proses Administratif" @if($report->status === 'Proses Administratif') selected @endif>Proses Administratif</option>
                                        <option value="Proses Penanganan" @if($report->status === 'Proses Penanganan') selected @endif>Proses Penanganan</option>
                                        <option value="Selesai Ditangani" @if($report->status === 'Selesai Ditangani') selected @endif>Selesai Ditangani</option>
                                        <option value="Laporan Ditolak" @if($report->status === 'Laporan Ditolak') selected @endif>Laporan Ditolak</option>
                                    </select>
                                </div>
                
                                <div class="form-group">
                                    <label for="category">Kategori</label>
                                    <select class="form-control" id="category" name="category">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @if($report->category_id === $category->id) selected @endif>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                
                                <div class="form-group">
                                    <label for="note">Catatan</label>
                                    <textarea class="form-control" id="note" name="note" rows="4"></textarea>
                                </div>
                
                                <button type="submit" class="btn btn-danger mt-3">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

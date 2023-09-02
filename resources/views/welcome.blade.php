@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Selamat datang di LaporCak!👋</h3></div>

                <div class="card-body">
                    <p>LaporCak! adalah platform pengaduan yang memudahkan Anda untuk melaporkan keluhan, masukan, dan pengaduan terkait layanan dan kondisi di wilayah Anda.</p>
                    </p>Tujuan kami adalah meningkatkan transparansi, akuntabilitas, dan respons pemerintah dalam menangani isu-isu warga.</p>
                    <p>Dengan LaporCak!, Anda dapat dengan mudah mengajukan pengaduan secara online, memungkinkan partisipasi yang lebih luas tanpa harus datang ke kantor pemerintah.</p>
                    <div class="text-center">
                        <a href="{{ route('reports.create') }}" class="btn btn-danger">Lapor Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

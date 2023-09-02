@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h3 class="text-center">Form Laporan🦜</h3></div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('reports.submit') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone_number">Nomor HP</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}">
                            @error('phone_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="identity_type">Tipe Identitas</label>
                            <select class="form-control" id="identity_type" name="identity_type" >
                                <option value="KTP"{{ old('identity_type') === 'KTP' ? 'selected' : '' }}>KTP</option>
                                <option value="SIM" {{ old('identity_type') === 'SIM' ? 'selected' : '' }}>SIM</option>
                            </select>
                            @error('identity_type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="identity_number">Nomor Identitas</label>
                            <input type="text" class="form-control" id="identity_number" name="identity_number" value="{{ old('identity_number') }}">
                            @error('identity_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="pob">Tempat Lahir</label>
                            <input type="text" class="form-control" id="pob" name="pob" value="{{ old('pob') }}">
                            @error('pob')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="dob">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob') }}">
                            @error('dob')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="title">Judul Laporan</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi Laporan</label>
                            <textarea class="form-control" id="description" name="description" rows="5">{{ old('description') }}</textarea>

                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="report_proof">Bukti Laporan</label>
                            <input type="file" class="form-control-file" id="report_proof" name="report_proof" value="{{ old('report_proof') }}">
                            @error('report_proof')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-danger mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

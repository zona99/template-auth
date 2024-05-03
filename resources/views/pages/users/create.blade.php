@extends('layouts.app')

@section('title', 'Form Tambah Sekolah')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>@yield('title')</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Users</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Users</h2>

                <div class="row">
                    <div class="col-xl-4">
                        Petunjuk Pengisian
                    </div>
                    <div class="col-xl-8">
                        <div class="card">
                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf
                                <div class="card-header">
                                    <h4>@yield('title')</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nomor Pokok Sekolah Nasional</label>
                                        <input type="number" class="form-control @error('npsn') is-invalid @enderror" name="npsn" value="{{ old('npsn') }}">
                                        @error('npsn')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Sekolah</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Email Sekolah</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Jenjang Sekolah</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="jenjang" value="2" class="selectgroup-input" {{ old("jenjang") == '2' ? 'checked' : '' }} checked="">
                                                <span class="selectgroup-button">TK/KB/PAUD</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="jenjang" value="3" class="selectgroup-input" {{ old("jenjang") == '3' ? 'checked' : '' }}>
                                                <span class="selectgroup-button">SD/MI</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="jenjang" value="4" class="selectgroup-input" {{ old("jenjang") == '4' ? 'checked' : '' }}>
                                                <span class="selectgroup-button">SMP/MTs</span>
                                            </label>
                                        </div>
                                    </div>

                                    <input type="hidden" name="role" value="sekolah">

                                </div>
                                <hr>
                                <div class="card-footer">
                                    <button class="btn btn-primary btn-lg btn-block">Proses</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush

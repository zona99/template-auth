@extends('layouts.app')

@section('title', 'Users')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Users</h1>
                <div class="section-header-button">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Add New</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Posts</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-left">
                                    <div class="form-group">

                                            <div class="selectgroup selectgroup-pills">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="jenjang" value="" class="selectgroup-input" onClick="window.location.href='{{ route('users.index') }}';" {{ Request::is('users') ? 'checked' : '' }}>
                                                    <span class="selectgroup-button">All</span>
                                                </label>

                                                <label class="selectgroup-item">
                                                    <input type="radio" name="jenjang" value="2" class="selectgroup-input" onClick="window.location.href='{{ route('users.show', 2) }}';" {{ Request::is('users/2') ? 'checked' : '' }}>
                                                    <span class="selectgroup-button">TK/KB/PAUD</span>
                                                </label>

                                                <label class="selectgroup-item">
                                                    <input type="radio" name="jenjang" value="3" class="selectgroup-input" onClick="window.location.href='{{ route('users.show', 3) }}';" {{ Request::is('users/3') ? 'checked' : '' }}>
                                                    <span class="selectgroup-button">SD/MI</span>
                                                </label>

                                                <label class="selectgroup-item">
                                                    <input type="radio" name="jenjang" value="4" class="selectgroup-input" onClick="window.location.href='{{ route('users.show', 4) }}';" {{ Request::is('users/4') ? 'checked' : '' }}>
                                                    <span class="selectgroup-button">SMP/MTs</span>
                                                </label>
                                            </div>

                                    </div>
                                </div>
                                <div class="float-right">
                                    <form method="GET" action="{{ route('users.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Cari..." name="name">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>

                                            <th>NPSN</th>
                                            <th>Nama Sekolah</th>
                                            <th>Email Sekolah</th>
                                            <th class="text-center">Jenjang Sekolah</th>
                                            <th></th>
                                        </tr>
                                        @foreach ($users as $user)
                                            <tr>

                                                <td>
                                                    {{ $user->npsn }}
                                                </td>
                                                <td>
                                                    {{ $user->name }}
                                                </td>
                                                <td>
                                                    {{ $user->email }}
                                                </td>
                                                <td class="text-center">
                                                    @if ($user->jenjang == 2)
                                                        TK/KB/PAUD
                                                    @elseif ($user->jenjang == 3)
                                                        SD/MI
                                                    @elseif ($user->jenjang == 4)
                                                        SMP/MTs
                                                    @endif


                                                </td>
                                                <td>
                                                    <div class="d-flex float-right">
                                                        <a href='{{ route('users.edit', $user->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>

                                                        <form action="{{ route('users.destroy', $user->id) }}"
                                                            method="POST" class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE" />
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}" />
                                                            <button type="submit" class="btn btn-sm btn-danger btn-icon confirm-delete" data-name="{{ $user->name }}">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $users->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">

        $('.confirm-delete').click(function(event) {
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            text: `Hapus Data ${name} ?`,
            icon: "warning",
            buttons: ["Batal", "Hapus"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            form.submit();
            }
        });
    });

    </script>
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush

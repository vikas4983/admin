@extends('layouts.auth')
@section('title', 'Logo & Favicons | Admin')
@section('styles')
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
    <script src="http://datatables.net/release-datatables/media/js/jquery.js"></script>
    <script src="http://datatables.net/release-datatables/media/js/jquery.dataTables.js"></script>
    <script src="http://datatables.net/release-datatables/extensions/Scroller/js/dataTables.scroller.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="{{ asset('assets/auth/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}"
        rel="stylesheet" />
@endsection
@section('content')

    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Home</li>
                        </ol>
                    </nav>
                    <span> <x-create-button-component
                                                createRoute="{{ url('admin/logos/create') }}"
                                               >
                                            </x-create-button-component></span>
                </div>
            </div>

            <div class="card card-default">
                <div class="card-header">
                    {{-- @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif (session('danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('danger') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif --}}



                    @if (count($logos) > 0)
                        <table class="table table-striped" id="employees" class="display nowrap" width="100%">

                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Logo</th>
                                    
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @php
                                    $count = ($logos->currentPage() - 1) * $logos->perPage() + 1;
                                @endphp
                                @foreach ($logos as $logo)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>
                                            <x-status-component :status="$logo->status" /><img
                                                src="{{ asset('storage/admin/logo-favicon/logos/' . ($logo ? $logo->name : '')) }}"
                                                class="user-image square" alt="image"
                                                style="width: 200px;" />
                                        </td>
                                        </td>
                                       
                                        <td>
                                            <x-action-button destroyRoute="{{ route('logos.destroy', $logo->id) }}"
                                                editRoute="{{ route('logos.edit', $logo->id) }}" id="$logo->id"
                                                entityType="'logos'">
                                            </x-action-button>

                                        </td>
                                    </tr>
                                    @php
                                        $count++;
                                    @endphp
                                @endforeach

                            </tbody>

                        </table>
                        <div class="d-flex justify-content-center">
                            <span>{{ $logos->links() }}</span>
                        </div>
                    @else()
                        <h3 class="text-center text-danger">No Logo & Favicons Type found</h3>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
@endsection
{{-- @section('scripts')
    <script src="{{ asset('assets/auth/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#employees').DataTable();
            $(".dataTables_wrapper").css("width", "100%");
        });
    </script>

@endsection --}}

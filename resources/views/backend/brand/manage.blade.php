@extends('backend.components.layout')

@section('title')
    Dashboard
@endsection

@section('css')
<link href="{{asset('/')}}assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
@endsection

@section('content')


<!--breadcrumb-->
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="breadcrumb-title pr-3">Tables</div>
    <div class="pl-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">DataTable</li>
            </ol>
        </nav>
    </div>
    <div class="ml-auto">
        <div class="btn-group">
        <a href="{{ route('staff.brand.create') }}" class="btn btn-primary m-1 px-4">
            <i class="bx bx-plus-circle mr-1"></i>Add Brands
        </a>
        </div>
    </div>
</div>
<div>
    @if (session()->has('type') && session()->has('message'))
    <div class="alert alert-{{ session('type') }} text-white alert-dismissible fade show" role="alert">{{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span aria-hidden="true">×</span>
        </button>
    </div>

    @endif
</div>
<!--end breadcrumb-->
<div class="card">
    <div class="card-body">
        <div class="card-title">
            <h4 class="mb-0">DataTable Example</h4>
        </div>
        <hr>
        <div class="table-responsive">
            <table id="myDataTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Create By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $brand)
                    <tr>
                        <td>{{ ++$loop->index }}</td>
                        <td>{{ $brand->name }}</td>
                        <td>{{ $brand->slug }}</td>
                        <td>{{ $brand->status }}</td>
                        <td>{{ $brand->user->name }}</td>
                        <td>

                            <a href="{{ route('staff.brand.edit', $brand->id) }}" class="btn btn-sm btn-info">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit text-primary"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                            </a>

                                <a style="padding: 6px 10px 6px 10px;" href="{{ route('staff.brand.destroy', $brand->id) }}" class="btn btn-sm btn-danger"
                                    onclick="event.preventDefault();
                                    document.getElementById('delete').submit();">
                                    <i class="lni lni-trash"></i>
                                </a>

                                <form id="delete" action="{{ route('staff.brand.destroy', $brand->id) }}" method="post" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>

                            {{--  <form action="{{ route('staff.brand.destroy', $brand->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="lni lni-trash"></i></button>
                            </form>  --}}



                        </td>

                    </tr>
                    @endforeach

                </tbody>

            </table>
        </div>
    </div>
</div>

@endsection

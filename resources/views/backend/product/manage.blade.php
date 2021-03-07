@extends('backend.components.layout')

@section('title')
   Product manage
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
        <a href="{{ route('staff.product.create') }}" class="btn btn-primary m-1 px-4">
            <i class="bx bx-plus-circle mr-1"></i>Add Product
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
                        <th>SL.</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Create By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>

            </table>
        </div>
    </div>
</div>

@endsection

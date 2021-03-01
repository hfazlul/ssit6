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
        <a href="{{ route('staff.brand.index') }}" class="btn btn-primary m-1 px-4">
            <i class="bx bx-plus-circle mr-1"></i>Manage Brands
        </a>
        </div>
    </div>
</div>
<!--end breadcrumb-->

<div class="row">
    <div class="col-12 col-lg-9 mx-auto">
        @if (session()->has('type') && session()->has('message'))
        <div class="alert alert-{{ session('type') }} text-white alert-dismissible fade show" role="alert">{{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span aria-hidden="true">×</span>
            </button>
        </div>

        @endif

        <div class="card radius-15">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="mb-0">Brand Add</h4>
                </div>
                <hr/>
                <form action="{{ route('staff.brand.store') }}" method="post">
                    @csrf
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="name">Brand Name</label>
                            <div class="col-sm-10">
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter brand name">
                                @error('name')

                                <span class="text-danger font-weight-bold" >{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 text-center">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="active" checked name="status" value="active" class="custom-control-input">
                                        <label class="custom-control-label" for="active">Active</label>
                                     </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="inactive" name="status" value="inactive" class="custom-control-input">
                                        <label class="custom-control-label" for="inactive">Inactive</label>
                                     </div>
                        </div>
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 text-right" >
                                <button type="submit" class="btn btn-primary px-4">Add Brands</button>
                            </div>
                        </div>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

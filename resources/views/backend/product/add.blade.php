@extends('backend.components.layout')

@section('title')
   Add Product
@endsection

@section('css')
<link href="{{asset('/')}}assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
@endsection

@section('content')


<!--breadcrumb-->
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="breadcrumb-title pr-3">Form</div>
    <div class="pl-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Data Form</li>
            </ol>
        </nav>
    </div>
    <div class="ml-auto">
        <div class="btn-group">
        <a href="{{ route('staff.product.index') }}" class="btn btn-primary m-1 px-4">
            <i class="bx bx-plus-circle mr-1"></i>Manage Product
        </a>
        </div>
    </div>
</div>
<!--end breadcrumb-->

<div class="row">
    <div class="col-12 col-lg-12 mx-auto">
        @if (session()->has('type') && session()->has('message'))
        <div class="alert alert-{{ session('type') }} text-white alert-dismissible fade show" role="alert">{{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span aria-hidden="true">×</span>
            </button>
        </div>

        @endif

        <div class="card radius-15">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="mb-0">Product Add</h4>
                </div>
                <hr/>
                <form action="{{ route('staff.product.store') }}" method="post">
                    @csrf

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="name">Category Name</label>
                        <div class="col-sm-9">
                            <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Category name">
                            @error('name')

                            <span class="text-danger font-weight-bold" >{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="category">Category</label>
                            <div class="col-sm-9">
                               <select class="form-control" name="category" id="category">
                                   <option value="0">Select Category</option>
                                   {!! categories_select_data($categories , 3) !!}
                               </select>
                            </div>
                        </div>
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="brand">Brand</label>
                            <div class="col-sm-9">
                               <select class="form-control" name="brand" id="brand">
                                   <option value="">Select Brand</option>
                                   <option value="0">No Brand</option>
                                   @foreach ($brands as $brand )
                                   <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                   @endforeach
                               </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="model">Model</label>
                            <div class="col-sm-9">
                                <input type="text" id="model" name="model" value="{{ old('model') }}" class="form-control" placeholder="Enter Model">
                                @error('model')

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
                                <button type="submit" class="btn btn-primary px-4">Add Product</button>
                            </div>
                        </div>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

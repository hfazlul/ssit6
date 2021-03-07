@extends('backend.components.layout')

@section('title')
   Category manage
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
        <a href="{{ route('staff.category.create') }}" class="btn btn-primary m-1 px-4">
            <i class="bx bx-plus-circle mr-1"></i>Add Categories
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
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ ++$loop->index }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->status }}</td>
                        <td>{{ $category->user->name}}</td>
                        <td>

                            <a href="{{ route('staff.category.edit', $category->id) }}" class="btn btn-sm btn-info">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit text-primary"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                            </a>

                                <a style="padding: 6px 10px 6px 10px;" href="{{ route('staff.category.destroy', $category->id) }}" class="btn btn-sm btn-danger"
                                    onclick="event.preventDefault();
                                    document.getElementById('delete').submit();">
                                    <i class="lni lni-trash"></i>
                                </a>

                                <form id="delete" action="{{ route('staff.category.destroy', $category->id) }}" method="post" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>

                        </td>

                    </tr>
                        @if (count($category->sub_category))

                            @foreach ( $category->sub_category as $sub)
                            <tr>
                                <td>{{ ++$loop->index }}</td>
                                <td>{{ $category->name }} > {{ $sub->name }}</td>
                                <td>{{ $sub->slug }}</td>
                                <td>{{ $sub->status }}</td>
                                <td>{{ $sub->user->name}}</td>
                                <td>

                                    <a href="{{ route('staff.category.edit', $sub->id) }}" class="btn btn-sm btn-info">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit text-primary">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                    </a>

                                        <a style="padding: 6px 10px 6px 10px;" href="{{ route('staff.category.destroy', $sub->id) }}" class="btn btn-sm btn-danger"
                                            onclick="event.preventDefault();
                                            document.getElementById('delete').submit();">
                                            <i class="lni lni-trash"></i>
                                        </a>

                                        <form id="delete" action="{{ route('staff.category.destroy', $sub->id) }}" method="post" class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                </td>

                            </tr>

                                    @if (count($sub->sub_category))

                                    @foreach ( $sub->sub_category as $sub1)
                                    <tr>
                                        <td>{{ ++$loop->index }}</td>
                                        <td>{{ $category->name }} > {{ $sub->name }} > {{ $sub1->name }}</td>
                                        <td>{{ $sub1->slug }}</td>
                                        <td>{{ $sub1->status }}</td>
                                        <td>{{ $sub1->user->name}}</td>
                                        <td>

                                            <a href="{{ route('staff.category.edit', $sub1->id) }}" class="btn btn-sm btn-info">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit text-primary">
                                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                            </a>

                                                <a style="padding: 6px 10px 6px 10px;" href="{{ route('staff.category.destroy', $sub1->id) }}" class="btn btn-sm btn-danger"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('delete').submit();">
                                                    <i class="lni lni-trash"></i>
                                                </a>

                                                <form id="delete" action="{{ route('staff.category.destroy', $sub1->id) }}" method="post" class="d-none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                        </td>

                                    </tr>
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                </tbody>

            </table>
        </div>
    </div>
</div>

@endsection

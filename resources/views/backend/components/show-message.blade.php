@if (session()->has('type') && session()->has('message'))
    <div class="alert alert-{{ session('type') }} text-white alert-dismissible fade show" role="alert">{{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span aria-hidden="true">×</span>
        </button>
    </div>

    @endif

@extends('admin.layouts.template')

@section('title', 'Edit Parent Category')

@section('content')
    <div class="templatemo-content-container">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="top:-31px;right:-26px;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="templatemo-content-widget white-bg">
            <h2 class="margin-bottom-10">Edit Parent Category</h2>
            <form action="{{ route('parent_category.edit',['id' => $parent_category['id']]) }}" class="templatemo-login-form" method="post" enctype="multipart/form-data">

                @csrf

                <div class="row form-group">
                    <div class="col-lg-12 form-group">                  
                        <label class="control-label" for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ !is_null(old('name')) ? old('name') : $parent_category['name'] }}">
                    </div>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="templatemo-blue-button">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection

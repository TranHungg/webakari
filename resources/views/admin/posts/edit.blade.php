@extends('admin.layouts.template')

@section('title', 'Edit Post')

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
            <h2 class="margin-bottom-10">Edit Post</h2>
            <form action="{{ route('post.edit',['id' => $post['id']]) }}" class="templatemo-login-form" method="post" enctype="multipart/form-data">

                @csrf

                <div class="row form-group">
                    <div class="col-lg-12 col-md-12 form-group">
                        <label class="control-label templatemo-block">Category</label>
                        <select class="form-control" name="category">
                            @foreach ($categories as $item)
                                <option value="{{ $item['id'] }}" {{ $post['category_id'] == $item['id'] ? 'selected' : '' }}>{{ $item['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-12 form-group">                  
                        <label class="control-label" for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ !is_null(old('name')) ? old('name') : $post['name'] }}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-12 form-group">                  
                        <label class="control-label" for="content">Content <span class="text-danger">*</span></label>
                        <textarea class="form-control" type="text" id="editor1"
                                    name="content" rows="3">{{ !is_null(old('content')) ? old('content') : $post['content'] }}</textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-12 form-group">                  
                        <label class="control-label" for="location">Location</label>
                        <input type="text" class="form-control" name="location" id="location" value="{{ !is_null(old('location')) ? old('location') : $post['location'] }}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-12 form-group">                  
                        <label class="control-label" for="type">Type <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="type" id="type" value="{{ !is_null(old('type')) ? old('type') : $post['type'] }}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-12 form-group">                  
                        <label class="control-label" for="like">Like</label>
                        <input type="number" class="form-control" name="like" id="like" value="{{ !is_null(old('like')) ? old('like') : $post['count_like'] }}" min=0>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-12 form-group">                  
                        <label class="control-label" for="view">View</label>
                        <input type="number" class="form-control" name="view" id="view" value="{{ !is_null(old('view')) ? old('view') : $post['view'] }}" min=0>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-12 form-group">                  
                        <label class="control-label" for="price">Price</label>
                        <input type="number" class="form-control" name="price" id="price" value="{{ !is_null(old('price')) ? old('price') : $post['price'] }}" min=0>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-12 form-group">                  
                        <label class="control-label" for="favorite">Favorite</label>
                        <input type="number" class="form-control" name="favorite" id="favorite" value="{{ !is_null(old('favorite')) ? old('favorite') : $post['count_favorite'] }}" min=0>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-12 form-group">
                        <label for="image">Image <span class="text-danger">*</span></label>
                        <div class="custom-file">
                            <input type="file" id="image" name="image"
                                accept=".png,.gif,.jpg,.jpeg" required>
                        </div>
                        <div class="image-preview mb-4" id="imagePreview">
                            <img src="{{ asset('storage/images/posts/'.$post['image']) }}" alt="Image Preview" class="image-preview__image" style="display:block;"/>
                            <span class="image-preview__default-text" style="display:none">Image</span>
                        </div>
                    </div>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="templatemo-blue-button">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/admin/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/admin/ckfinder/ckfinder.js') }}"></script>
    <script>
        var editor = CKEDITOR.replace('content');
        CKFinder.setupCKEditor(editor);
    </script>
@endsection

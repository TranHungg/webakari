@extends('admin.layouts.template')

@section('title', 'Categories List')

@section('content')
<div class="templatemo-content-container">
    @if(Session::has('invalid'))
    <div class="alert alert-danger alert-dismissible">
            <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{Session::get('invalid')}}
    </div>
    @endif
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible">
                <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{Session::get('success')}}
        </div>
    @endif
    <a href="{{ route('category.create.form') }}" style="margin:1rem 0 0 1rem"><button class="btn btn-primary">Add</button></a>
    <div class="templatemo-content-widget no-padding">
        <div class="panel panel-default table-responsive table-padding">
            <table class="table table-striped table-bordered templatemo-user-table" id="data-table">
                <thead>
                    <tr>
                        <td align="center"><span class="white-text">#</span></td>
                        <td align="center"><span class="white-text">Parent Category</td>
                        <td align="center"><span class="white-text">Name</td>
                        <td align="center">Edit</td>
                        <td align="center">Delete</td>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach ($categories as $category)
                        <tr>
                            <td align="center">{{ $count }}</td>
                            <td align="center">{{ $category['parent_category_name'] }}</td>
                            <td align="center">{{ $category['name'] }}</td>
                            <td align="center"><a href="{{ route('category.edit',['id' => $category['id']]) }}" class="templatemo-edit-btn">Edit</a></td>
                            <td align="center"><a href="{{ route('category.delete',['id' => $category['id']]) }}" class="templatemo-edit-btn" onclick="return confirm('Do you want to delete this selected ?');">Delete</a></td>
                        </tr>
                        @php $count++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@extends('admin.layouts.template')

@section('title', 'Posts List')

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
    <a href="{{ route('post.create') }}" style="margin:1rem 0 0 1rem"><button class="btn btn-primary">Add</button></a>
    <div class="templatemo-content-widget no-padding">
        <div class="panel panel-default table-responsive table-padding">
            <table class="table table-striped table-bordered templatemo-user-table" id="data-table">
                <thead>
                    <tr>
                        <td align="center"><span class="white-text">#</span></td>
                        <td align="center"><span class="white-text">Type</td>
                        <td align="center"><span class="white-text">Name</td>
                        <td align="center"><span class="white-text">Status</td>  
                        <td align="center">Accept</td>
                        <td align="center">Edit</td>
                        <td align="center">Delete</td>
                    </tr>
                </thead>
                <?php $ctvposts = App\Models\CtvPost::all()->toArray(); ?>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach ($ctvposts as $post)
                    <tr>
                            <td align="center">{{ $count }}</td>
                            <td align="center">{{ $post['type'] }}</td>
                            <td align="center"><a href="{{ route('ctvpost.show',['id' => $post['id']]) }}" target="_blank">{{ $post['name'] }}</a></td>
                            <td align="center">{{ $post['status'] == 0 ? 'Waiting' : 'Approved' }}</td>
                            @if ($post['status'] == 0)
                                <td align="center"><a href="{{ route('baiviet.accept',['id' => $post['id']]) }}" class="templatemo-edit-btn" onclick="return confirm('Do you want to approve this selected ?');">Accept</a></td>
                            @else
                                <td align="center"><i class="fa fa-check-circle-o" aria-hidden="true"></i></td>
                            @endif
                            <td align="center"><a href="" class="templatemo-edit-btn" onclick="return confirm('Đừng sửa :V');">Edit</a></td>
                            <td align="center"><a href="{{ route('baiviet.destroy',['id' => $post['id']]) }}" class="templatemo-edit-btn" onclick="return confirm('Do you want to delete this selected ?');">Delete</a></td>
                        </tr>
                        @php $count++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

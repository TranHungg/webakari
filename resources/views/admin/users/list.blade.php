@extends('admin.layouts.template')

@section('title', 'Users List')

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
    <div class="templatemo-content-widget no-padding">
        <div class="panel panel-default table-responsive table-padding">
            <table class="table table-striped table-bordered templatemo-user-table" id="data-table">
                <thead>
                    <tr>
                        <td align="center"><span class="white-text">#</span></td>
                        <td align="center"><span class="white-text">Email</td>
                        <td align="center"><span class="white-text">Name</td>
                        <td align="center"><span class="white-text">Real_name</td>
                        <td align="center"><span class="white-text">Role</td>
                        <td align="center"><span class="white-text">birth</td>
                        <td align="center"><span class="white-text">gender</td>
                        <td align="center">Edit</td>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach ($users as $user)
                        <tr>
                            <td align="center">{{ $count }}</td>
                            <td align="center"><a href="{{ route('user.show',['id' => $user['id']]) }}" target="_blank">{{ $user['email'] }}</a></td>
                            <td align="center">{{ $user['name'] }}</td>
                            <td align="center">{{ $user['real_name'] }}</td>
                            <td align="center">{{ $user['role'] == 0 ? 'User' : 'Cộng tác viên' }}</td>
                            <td align="center">{{ $user['birth'] }}</td>
                            <td align="center">{{ $user['gender'] == 1 ? '男性' : '女性' }}</td>
                            <td align="center"><a href="{{ route('user.edit.form',['id' => $user['id']]) }}" class="templatemo-edit-btn">Edit</a></td>
                        </tr>
                        @php $count++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

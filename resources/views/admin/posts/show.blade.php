@extends('admin.layouts.template')

@section('title')
    {{ $post['name'] }}
@endsection

@section('content')
    <div class="templatemo-content-container">
        <p><img src="{{ asset('storage/images/posts/'.$post['image']) }}" width="300" /></p>
        <p>Name: {{ $post['name'] }}</p>
        <p>Content: {!! $post['content'] !!}</p>
        <p>Location: {{ $post['location'] }}</p>
        <p>Price: {{ $post['price'] }}</p>
        <p>Like: {{ $post['count_like'] }}</p>
        <p>View: {{ $post['view'] }}</p>
        <p>Favorite: {{ $post['count_favorite'] }}</p>
        <p>Type: {{ $post['type'] }}</p>
        <p>Status: {{ $post['status'] == 0 ? 'Waiting' : 'Approved' }}</p>
        <p>Date: {{ date('d-m-Y H:i:s',strtotime($post['created_at'])) }}</p>
    </div>
@endsection

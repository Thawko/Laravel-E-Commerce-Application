@extends("layouts.site")

@section('title', $data['setting']->title)
@section('keywords', $data['setting']->keywords)
@section('description', $data['setting']->description)
@section('author', $data['setting']->company)

@section('content')
    @include('home._content')
@endsection

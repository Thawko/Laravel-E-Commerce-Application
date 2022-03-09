@extends("layouts.home")

@section("title", "Page başlığı")

@section("sidebar")
    @parent
    <p>Üste bağlanan yer</p>
@endsection

@section("content")
    <p>Content içi</p>
@endsection

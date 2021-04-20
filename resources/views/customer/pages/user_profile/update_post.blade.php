@extends('customer.pages.user_profile.index')

@section('form')
<form action="{{route('customer.realty_post.update', $realty_post->id)}}" method="POST" class="info-credibility form-news p-3">
    @csrf
    @include('customer.pages.realty_post.form')
</form>
@endsection


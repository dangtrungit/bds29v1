@extends('customer.pages.user_profile.index')

@section('form')
<form action="{{route('customer.realty_post.store')}}" method="POST" id="realty-post-form" class="p-3 bg-white info-credibility form-news">
    @csrf
    @include('customer.pages.realty_post.form')
</form>
@endsection


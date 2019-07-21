@extends('layouts.siteLayout.site')

@section('content')

<div class="container">
<div class="tg-sectionhead" style="margin-bottom: 5px; padding-top: 15px;">
    @if(Session::has('flash-message-s'))
    <div class="alert alert-success">
        <button type="button" class="close" aria-label="Close">x</button>
        {!!session::get('flash-message-s')!!}
    </div>
    @endif
    @if(Session::has('flash-message-e'))
    <div class="alert alert-danger">
        <button type="button" class="close" aria-label="Close">x</button>
        {!!session::get('flash-message-e')!!}
    </div>
    @endif
</div>
</div>
<cart-component></cart-component>

@endsection
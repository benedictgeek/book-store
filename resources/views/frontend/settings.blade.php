@extends('layouts.siteLayout.site')

@section('content')
<account-component :userid= {{$user->id}}></account-component>
@endsection
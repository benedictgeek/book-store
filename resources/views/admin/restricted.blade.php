@extends('layouts.adminLayout.admin_design')

@section('content')

<!--main-container-part-->
<div id="content">

    <!--Action boxes-->
    <div class="container-fluid">
        <hr/> 
        <div style="text-align: center; margin-top: 100px;">
            <h1 >Hey! You should not be here.</h1>
            <br>
            <button class="btn btn-success"><a href="{{url('/author/dashboard')}}" style="color: white;">Go to Dashboard</a></button>
        </div> 
  </div>
</div>

<!--end-main-container-part-->


@endsection
@extends('layouts.siteLayout.site')

@section('content')

<main id="tg-main" class="tg-main tg-haslayout">

<div class="tg-sectionspace tg-haslayout">
<div class="container">
<p> Your payment has been made and recipt sent to your email, thank you!</p>
</div>
</div>

</main>

@endsection

<?php
Session::forget('orderId');
?>
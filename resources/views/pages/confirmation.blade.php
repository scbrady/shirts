@extends('template')

@section('title')
    Thank you for your order
@endsection

@section('content')
    <div class="row confirm">
        <h1>Thank you for your order!</h1>
        <h2>We really appreciate doing business with you</h2>
        <hr />
        <p>You will receive a confirmation email shortly</p>
        <p>Order #{{$id}}</p>
    </div>
@endsection

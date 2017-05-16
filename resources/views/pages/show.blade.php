@extends('template')

@section('title'){{ $page->title }}@endsection

@section('content')
<div class="single-info">
    <div class="col-md-6 single-top">
        <div class="flexslider">
            <ul class="slides">
                @foreach($page->pictures as $image)
                <li data-thumb="{{$image->path}}">
                    <div class="thumb-image"> <img src="{{$image->path}}" data-imagezoom="true" class="img-responsive" alt=""> </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-md-6 single-top-left simpleCart_shelfItem">
        <h3>{{$page->title}}</h3>
        <h6 class="item_price">${{number_format($page->amount / 100, 2)}}</h6>
        <div class="desc">{!!$page->description!!}</div>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{url()->current()}}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @foreach($page->products as $product)
                <h4>{{$product->title}}</h4>
                @foreach($product->extra as $select => $options)
                    <select name="extra[{{$product->id}}][{{$select}}]">
                        <option>Choose {{$select}}:</option>
                        @foreach($options as $key => $val)
                            <option value="{{$key}}">{{$val[1]}}</option>
                        @endforeach
                    </select>
                @endforeach
            @endforeach
            <div class="clearfix"> </div>
            <div class="quantity">
                <p class="qty"> Qty :  </p><input min="1" type="number" value="1" name="quantity" class="item_quantity">
            </div>
            <script
                    src="https://checkout.stripe.com/checkout.js"
                    class="stripe-button add-cart item_add"
                    data-key="pk_test_aQm9tZo8EN88bVtjp2zMcuz3"
                    data-amount="{{$page->amount}}"
                    data-name="Modern Shoppe"
                    data-description="Clothes"
                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                    data-locale="auto"
                    data-zip-code="true"
                    data-billing-address="true"
                    data-shipping-address="true">
            </script>
        </form>
    </div>
    <div class="clearfix"> </div>
</div>
@endsection

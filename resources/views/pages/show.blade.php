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
    <div class="col-md-5 col-md-offset-1 single-top-left simpleCart_shelfItem">
        <h1>{{$page->title}}</h1>
        <hr />
        <h6 class="item_price">${{number_format($page->amount / 100, 2)}}</h6>

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

            <div class="form-group">
                @foreach($page->products as $product)
                    <div class="col-sm-4">
                        <label>{{$product->title}}</label>
                        @foreach($product->extra as $select => $options)
                            <select class="form-control" name="extra[{{$product->id}}][{{$select}}]">
                                <option>Select {{$select}}</option>
                                @foreach($options as $key => $val)
                                    <option value="{{$key}}">{{$val[1]}}</option>
                                @endforeach
                            </select>
                        @endforeach
                    </div>
                @endforeach
            </div>

            <div class="clearfix"></div>

            <div class="form-group">
                <div class="col-sm-2">
                    <label>Qty</label>
                    <input min="1" type="number" value="1" name="quantity" class="form-control">
                </div>
                <div class="col-sm-10">
                    <button id="buyBtn" class="btn btn-lg btn-success">Buy Now</button>
                </div>
            </div>

            <div class="clearfix"></div>

            <hr />

            <div class="desc">{!!$page->description!!}</div>
        </form>
    </div>
    <div class="clearfix"> </div>
</div>
@endsection

@section('scripts')
    <script src="https://checkout.stripe.com/checkout.js"></script>

    <!--flex slider-->
    <script>
      // Can also be used with $(document).ready()
      $(window).load(function() {
        $('.flexslider').flexslider({
          animation: "slide",
          controlNav: "thumbnails"
        });
      });
    </script>

    <!--stripe-->
    <script>
      var handler = StripeCheckout.configure({
        name: 'Modern Shoppe',
        description: '{{ $page->title }}',
        key: '{{env('STRIPE_PUBLISHABLE')}}',
        image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
        locale: 'auto',
        zipCode: true,
        billingAddress: true,
        shippingAddress: true,
        token: function(token) {
          // You can access the token ID with `token.id`.
          // Get the token ID to your server-side code for use.
        }
      });

      document.getElementById('buyBtn').addEventListener('click', function(e) {
        // Open Checkout with further options:
        handler.open({
          amount: 2000
        });
        e.preventDefault();
      });

      // Close Checkout on page navigation:
      window.addEventListener('popstate', function() {
        handler.close();
      });
    </script>
@endsection

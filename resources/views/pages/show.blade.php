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

        <form id="purchaseForm" action="{{url()->current()}}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <input type="hidden" name="stripeToken">
            <input type="hidden" name="stripeEmail">
            <input type="hidden" name="stripeShippingName">
            <input type="hidden" name="stripeShippingAddressLine1">
            <input type="hidden" name="stripeShippingAddressCity">
            <input type="hidden" name="stripeShippingAddressState">
            <input type="hidden" name="stripeShippingAddressZip">
            <input type="hidden" name="stripeShippingAddressCountryCode">

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
                <div class="col-sm-12">
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
        token: function(token, args) {
          $('[name="stripeToken"]').val(token.id);
          $('[name="stripeEmail"]').val(token.email);
          $('[name="stripeShippingName"]').val(args.shipping_name);
          $('[name="stripeShippingAddressLine1"]').val(args.shipping_address_line1);
          $('[name="stripeShippingAddressCity"]').val(args.shipping_address_city);
          $('[name="stripeShippingAddressState"]').val(args.shipping_address_state);
          $('[name="stripeShippingAddressZip"]').val(args.shipping_address_zip);
          $('[name="stripeShippingAddressCountryCode"]').val(args.shipping_address_country_code);

          $("#purchaseForm").submit();
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

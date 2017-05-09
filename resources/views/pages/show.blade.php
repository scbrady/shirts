@extends('template')

@section('title'){{ $page->title }}@endsection

@section('content')
<div class="row">
    <div class="col-md-6 col-sm-12 col-xs-12 product-viewer clearfix">
        <div id="product-image-carousel-container">
            <div class="elastislide-wrapper elastislide-vertical" style="max-width: 84px; height: 512px;">
                <div class="elastislide-carousel">
                    <ul id="product-carousel" class="celastislide-list" style="height: 512px;">
                        <li class="active-slide" style="width: 100%; max-width: 84px; max-height: 128px;">
                            <a data-rel="prettyPhoto[product]" href="images/products/big-item1.jpg" data-image="images/products/big-item1.jpg" data-zoom-image="images/products/big-item1.jpg" class="product-gallery-item"><img src="images/products/thumbnails/item10.jpg" alt="Phone photo 1">
                            </a>
                        </li>
                        <li style="width: 100%; max-width: 84px; max-height: 128px;">
                            <a data-rel="prettyPhoto[product]" href="images/products/big-item2.jpg" data-image="images/products/big-item2.jpg" data-zoom-image="images/products/big-item2.jpg" class="product-gallery-item"><img src="images/products/thumbnails/item11.jpg" alt="Phone photo 2">
                            </a>
                        </li>
                        <li style="width: 100%; max-width: 84px; max-height: 128px;">
                            <a data-rel="prettyPhoto[product]" href="images/products/big-item3.jpg" data-image="images/products/big-item3.jpg" data-zoom-image="images/products/big-item3.jpg" class="product-gallery-item"><img src="images/products/thumbnails/item12.jpg" alt="Phone photo 3">
                            </a>
                        </li>
                        <li style="width: 100%; max-width: 84px; max-height: 128px;">
                            <a data-rel="prettyPhoto[product]" href="images/products/big-item4.jpg" data-image="images/products/big-item4.jpg" data-zoom-image="images/products/big-item4.jpg" class="product-gallery-item"><img src="images/products/thumbnails/item13.jpg" alt="Phone photo 4">
                            </a>
                        </li>
                        <li style="width: 100%; max-width: 84px; max-height: 128px;">
                            <a data-rel="prettyPhoto[product]" href="images/products/big-item5.jpg" data-image="images/products/big-item5.jpg" data-zoom-image="images/products/big-item5.jpg" class="product-gallery-item"><img src="images/products/thumbnails/item14.jpg" alt="Phone photo 4">
                            </a>
                        </li>
                    </ul>
                </div>
                <nav><span class="elastislide-prev" style="display: none;">Previous</span><span class="elastislide-next">Next</span>
                </nav>
            </div>
        </div>
        <div id="product-image-container">
            <figure><img src="images/products/big-item1.jpg" data-zoom-image="images/products/big-item1.jpg" alt="Product Big image" id="product-image">
                <figcaption class="item-price-container"><span class="old-price">$160</span> <span class="item-price">$120</span>
                </figcaption>
            </figure>
        </div>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12 product">
        <div class="lg-margin visible-sm visible-xs"></div>
        <h1 class="product-name">Samsun Galaxy Ace</h1>
        <div class="ratings-container">
            <div class="ratings separator">
                <div class="ratings-result" data-result="70" style="width: 65.8px;"></div>
            </div><span class="ratings-amount separator">3 Review(s)</span> <span class="separator">|</span> <a href="#review" class="rate-this">Add Your Review</a>
        </div>
        <ul class="product-list">
            <li><span>Availability:</span>In Stock</li>
            <li><span>Product Code:</span>483512569</li>
            <li><span>Brand:</span>Apple</li>
        </ul>
        <hr>
        <div class="product-color-filter-container"><span>Select Color:</span>
            <div class="xs-margin"></div>
            <ul class="filter-color-list clearfix">
                <li>
                    <a href="#" data-bgcolor="#fff" class="filter-color-box" style="background-color: rgb(255, 255, 255);"></a>
                </li>
                <li>
                    <a href="#" data-bgcolor="#d1d2d4" class="filter-color-box" style="background-color: rgb(209, 210, 212);"></a>
                </li>
                <li>
                    <a href="#" data-bgcolor="#666467" class="filter-color-box" style="background-color: rgb(102, 100, 103);"></a>
                </li>
                <li>
                    <a href="#" data-bgcolor="#515151" class="filter-color-box" style="background-color: rgb(81, 81, 81);"></a>
                </li>
                <li>
                    <a href="#" data-bgcolor="#bcdae6" class="filter-color-box" style="background-color: rgb(188, 218, 230);"></a>
                </li>
                <li>
                    <a href="#" data-bgcolor="#5272b3" class="filter-color-box" style="background-color: rgb(82, 114, 179);"></a>
                </li>
                <li>
                    <a href="#" data-bgcolor="#acbf0b" class="filter-color-box" style="background-color: rgb(172, 191, 11);"></a>
                </li>
            </ul>
        </div>
        <div class="product-size-filter-container"><span>Select Size:</span>
            <div class="xs-margin"></div>
            <ul class="filter-size-list clearfix">
                <li><a href="#">XS</a>
                </li>
                <li><a href="#">S</a>
                </li>
                <li><a href="#">M</a>
                </li>
                <li><a href="#">L</a>
                </li>
                <li><a href="#">XL</a>
                </li>
            </ul>
        </div>
        <hr>
        <div class="product-add clearfix">
            <div class="custom-quantity-input">
                <input type="text" name="quantity" value="1"> <a href="#" onclick="return!1" class="quantity-btn quantity-input-up"><i class="fa fa-angle-up"></i></a> <a href="#" onclick="return!1" class="quantity-btn quantity-input-down"><i class="fa fa-angle-down"></i></a>
            </div>
            <button class="btn btn-custom-2">ADD TO CART</button>
        </div>
        <div class="md-margin"></div>
    </div>
</div>
@endsection

@section('scripts')

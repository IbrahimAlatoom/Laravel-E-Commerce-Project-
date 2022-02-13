@extends('layouts.layout')

@section('content')

<div class="container custome-product">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    
    <div class="carousel-inner">
    @foreach($products as $product) 
      <div class="item {{$product['id'] == 1? 'active':''}}">
        <a href="/details/{{$product->id}}">
        <img class="slider-img" src="{{$product->gallery}}">
        <div class="carousel-caption d-none d-md-block">
          <h5>{{$product->name}}</h5>
          <p>{{$product->description}}</p>
        </div>
        </a>
      </div>
    @endforeach
    </div>

    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<div class="trending-wrapper">
    <h3>Trending Products</h3>
    @foreach($products as $product)
    <div class="trending-item">
    <a href="/details/{{$product->id}}">
    <img class="trending-image" src="{{$product->gallery}}">
    <div class="">
        <h5>{{$product->name}}</h5>
    </div>
    </a>
    </div>
    @endforeach
</div>
@endsection
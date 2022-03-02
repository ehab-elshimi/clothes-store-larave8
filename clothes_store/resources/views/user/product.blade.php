<div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
              <form action="{{url('search')}}" method="GET" class="form-inline" style="float: right; padding: 10px;">
              @csrf
                <input type="search" class="form-control" name="search" placeholder="search">
                <input type="submit" value="search" class="btn btn-success bg-success">
              </form>
            </div>
          </div>
          
          @foreach($data as $product)
          <div class="col-md-4">
            <div class="product-item">
              <a href="#"><img src="productimage/{{$product->image}}" alt=""></a>
              <div class="down-content">
                <a href="#"><h4>{{$product->title}}</h4></a>
                <h6>${{$product->price}}</h6>
                <p>{{$product->description}}</p>

                </form>
                <ul class="stars">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
                <span>Reviews (21)</span>
              </div>
              <form action="{{url('addcart',$product->id)}}" method="POST">
                  @csrf
                  <input type="number" value="1" min="1" name="quantity" class="form-control">
                  <br>
                  <div style="text-align: center;">
                  <input type="submit" value="Add Cart" class="btn btn-primary bg-primary">
                  </div>
            </div>
          </div>
          @endforeach
          @if(method_exists($data,'links'))
          <div class="d-flex justify-content-center">
            {!! $data->links() !!}
          </div>
          @endif
          
            </div>
          </div>
        </div>
      </div>
    </div>
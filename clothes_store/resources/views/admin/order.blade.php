<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('admin.partials._css')
</head>
<body>
@if(session()->has('message'))
      <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">x <br>{{session()->get('message')}}</button>
      </div>
      @endif

    
<form action="{{url('makeorder')}}" method="POST">
    @csrf
    <div class="form-group">
    <br>
    <label>Customer Name</label>
    <input type="text" name="name" class="form-control bg-light" placeholder="enter customer name">
  </div>  
  <div class="form-group">
    <label>Customer Phone</label>
    <input type="text" name="phone" class="form-control bg-light" placeholder="enter phone number">
  </div>  
  <div class="form-group">
    <label>Order Address</label>
    <input type="text" name="address" class="form-control bg-light" placeholder="enter address clear as u can">
  </div>  
  <div class="form-group">
  Select Product <br>
  <select class="form-control form-control-lg bg-light">
  @foreach($selectproduct as $product)
    <option name="product" value="{{$product->title}}">{{$product->title}}</option>
    <span value="{{$product->price}}" class="d-none" id="#price">{{$product->price}}</span>
      @endforeach
    </select>
    Price of Product <br>
    <input type="number" id="#" name="price" value="" class="form-control bg-light">

    </div>

  <div class="form-group">
    <label>Quantity</label>
    <input type="number" name="quantity" class="form-control bg-light" placeholder="enter quantity wanted">
  </div>
  </div>  

</div>
  <button type="submit" class="btn btn-primary">Make Order</button>
</form>
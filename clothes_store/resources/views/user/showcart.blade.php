

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@if(session()->has('message'))
      <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">x <br>{{session()->get('message')}}</button>
      </div>
      @endif
<form action="{{url('')}}" method="POST">
<div style="padding:100px" align="center">
<table>
    <tr>
        <td>Product Name</td>
        <td>Quantity</td>
        <td>Price</td>
    </tr>
    @foreach($cartproducts as $product)
    <tr>
        <td>{{$product->product_title}}</td>
        <td>{{$product->quantity}}</td>
        <td>{{$product->price}}</td>
        <td><a class="btn btn-danger" href="{{url('delete',$product->id)}}">Delete</a></td>
        <td>{{$product->price}}</td>
    </tr>
    @endforeach
    <tr>
        <td>Total :</td>
        <td colspan="2">{{$product->quantity*$product->price}} $</td>
    </tr>
</table>
</div>
<button type="submit" class="btn btn-success">Confirm Order</button>
</form>
</body>
</html>
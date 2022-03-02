<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.partials._css')
        <style>
      .title{
        color:white;
        padding-top: 25px;
        font-size: 25px;
      }
      .prod-title{
        padding:15px;
        
      }
      .prod-input{
        color:#000;
      }
    </style>
  </head>
  <body>
  @include('admin.partials._sidebar')
  @include('admin.partials._navbar')
    <div class="container-fluid page-body-wrapper">
      <div class="container" align="center">
      <h1 class="title">Add Product</h1>  

      <form action="{{url('uploadproductupdated',$product->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('post')
      <div class="prod-title">
          <label for="">Product title</label>    
          <input type="text" name="title" value="{{$product->title}}" placeholder="Give a Product title" class="prod-input" required>    
      </div>
      <div class="prod-title">
          <label for="">Price</label>    
          <input type="number" name="price" value="{{$product->price}}" placeholder="Give a Price" class="prod-input" required>    
      </div>
      <div class="prod-title">
          <label for="">Description</label>   
          <textarea name="desc" class="prod-input">{{$product->description}}</textarea> 
      </div>
      <div class="prod-title">
          <label for="">Quantity</label>    
          <input type="number" name="quantity" value="{{$product->quantity}}" placeholder="product quantity" class="prod-input" required>    
      </div>
      <div class="prod-title">
          <label for="">Product image</label>    
          <img src="productimage/{{$product->image}}" alt="">
      </div>
      <div class="prod-title">
          <input type="submit" name="submit" value="Update" class="btn btn-primary bg-primary prod-input" >    
      </div>
      </form>
      </div>
    </div>
  @include('admin.partials._script')
  </body>
</html>
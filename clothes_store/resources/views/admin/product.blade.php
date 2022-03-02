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
      @if(session()->has('message'))
      <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">x <br>{{session()->get('message')}}</button>
      </div>
      @endif
      <form action="{{url('uploadproduct')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('post')
      <div class="prod-title">
          <label for="">Product title</label>    
          <input type="text" name="title" placeholder="Give a Product title" class="prod-input" required>    
      </div>
      <div class="prod-title">
          <label for="">Price</label>    
          <input type="number" name="price" placeholder="Give a Price" class="prod-input" required>    
      </div>
      <div class="prod-title">
          <label for="">Description</label>   
          <textarea name="desc" class="prod-input"></textarea> 
      </div>
      <div class="prod-title">
          <label for="">Quantity</label>    
          <input type="number" name="quantity" placeholder="product quantity" class="prod-input" required>    
      </div>
      <div class="prod-title">
          <label for="">Product image</label>    
          <input type="file" name="file" class="prod-input">    
      </div>
      <div class="prod-title">
          <input type="submit" name="submit" value="Add" class="btn btn-primary bg-primary prod-input" >    
      </div>
      </form>
      </div>
    </div>
  @include('admin.partials._script')
  </body>
</html>
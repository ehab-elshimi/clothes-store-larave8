<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
      <style>
          .tbl-cell{
              padding:20px;
          }
          .tbl-trcell{
              background-color: #000;
              align-items: center;
              color:#fff;
          }
          .tbl-trcell_one{
              align-items: center;
              color:#fff;
          }
      </style>
    @include('admin.partials._css')
  </head>
  <body>
  @include('admin.partials._sidebar')
  @include('admin.partials._navbar')
  <div class="container-fluid page-body-wrapper">
    <div class="container" align="center">
        <table class="table table-borderd ">
            <tr class="tbl-trcell">
                <td class="tbl-cell">Title</td>
                <td class="tbl-cell">Description</td>
                <td class="tbl-cell">Quantity</td>
                <td class="tbl-cell">Price</td>
                <td class="tbl-cell">Image</td>
                <td class="tbl-cell">Update</td>
                <td class="tbl-cell">Delete</td>
            </tr>
            @foreach($products as $product)
            <tr class="tbl-trcell_one">
                <td>{{$product->title}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->price}}</td>
                <td><img src="productimage/{{$product->image}}" alt="{{$product->title}} image"></td>
                <td><a href="{{url('updateproduct',$product->id)}}" class="btn btn-primary bg-primary">Update</a></td>
                <td><a href="{{url('deleteproduct',$product->id)}}" class="btn btn-danger bg-danger">Delete</a></td>
            </tr>
            @endforeach
        </table>
      </div>
    </div>
      
  @include('admin.partials._script')
  </body>
</html>
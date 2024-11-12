<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')

   <style>
    .div_deg{
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 60px;
    }
    .table_deg{
        border: 2px solid yellowgreen;
    }
    th{
        background-color: skyblue;
        color: white;
        padding: 15px;
        font-size: 18px;
        font-weight: bold;

    }
    td{
        text-align: center;
        border: 1px solid skyblue;
    }
    input[type='search']{
      width: 500px;
      height: 50px;
      margin-left: 50px;
      
    }

   </style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <form action="{{url('product_search')}}" method="GET">
              @csrf
              <input type="search" name="search" id="">
              <input type="submit" value="Search">
            </form>
            <div class="div_deg">
              <table class="table_deg">
                <th>Product Title</th>
                <th>Product description</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Product Category</th>
                <th>Product Qunatity</th>
                <th>Edit</th>
                <th>Delete</th>
                
                @foreach($product as $products)
                
                <tr>
                  <td>{{$products->title}}</td>
                  <td>{!! Str::limit($products->description),5!!}</td>
                  <td>
                    <img src="products/{{$products->image}}" height="120" width="120">
                  </td>
                  <td>{{$products->price}}</td>
                  <td>{{$products->category}}</td>
                  <td>{{$products->quantity}}</td>
                  <td><a class="btn btn-success" href="{{url('update_product',$products->slug)}}">Edit</a></td>
                  <td><a  class="btn btn-danger" href="{{url('delete_product',$products->id)}}">Delete</a></td>

                </tr>
                @endforeach
              </table>
            </div>
            <div class="div_deg">
              {{$product->links()}}
            </div>
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>
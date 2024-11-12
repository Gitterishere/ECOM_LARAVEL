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
        label{
            display: inline-block;
            font-size: 18px!important;
            color: white!important;
            width: 200px;   
        }
        input[type = 'text']{
            width: 350px;
            height: 50px;
        }
        textarea{
            width: 450px;
            height: 80px;
        }
        .input_deg{
            padding: 15px;
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
            <h1 style="color: white;">Add Product</h1>
            <div class="div_deg">
                <form action="{{url('upload_product')}}" method="POST" enctype="multipart/form-data">
                @csrf    
                    <div class = 'input_deg'>
                        <label >Product Title</label>
                        <input type="text" name="title" required >
                    </div>
                    <div class = 'input_deg'>
                        <label >Description</label>
                        <input type="text" name="description" required >
                    </div>
                    <div class = 'input_deg'>
                        <label >Image</label>
                        <input type="file" name="image" >
                    </div>
                    <div class = 'input_deg'>
                        <label >Price</label>
                        <input type="text" name="price" >
                    </div>
                    <div class = 'input_deg'>
                        <label >Category</label>
                        <select required name="category">
                            <option >Select An Option</option>

                            @foreach ($category as $category)
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                
                            @endforeach


                        </select>
                    </div>
                    <div class = 'input_deg'>
                        <label >Quantity</label>
                        <input type="text" name="qty" >
                    </div>
                    <div class = 'input_deg'>
                        <input type="submit" class="btn btn-success" value="Add Product">
                    </div>
                </form>
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
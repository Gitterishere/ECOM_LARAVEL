<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style>
        .div_center{
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 60px;
        }
        table{
            border: 2px solid skyblue;
            text-align: center;
            width: 800px;
        }
        th{
            text-align: center;
            background: black;
            color: white;
            font-size: 19px;
            font-weight: bold;

        }
        td{
            border: 1px solid skyblue;
            padding: 10px;
        }
    </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
        @include('home.header')
    
    <!-- end header section -->
    <div class="div_center">
        <table>
            <tr>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Delivery Status</th>
                <th>Product Image</th>
            </tr>
            @foreach($order as $order)
                
            
            <tr>
                <td>{{$order->product->title}}</td>
                <td>{{$order->product->price}}</td>
                <td>{{$order->status}}</td>
                <td>
                    <img width="300" height="200" src="products/{{$order->product->image}}" alt="">
                </td>
            </tr>
            @endforeach
        </table>
    </div>
  </div>
  <!-- end hero area -->











   

  <!-- info section -->
@include('home.footer')
</body>

</html>
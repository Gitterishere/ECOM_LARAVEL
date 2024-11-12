<!DOCTYPE html>
<html>

<head>
    @include('home.css')

    <style>
        .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }
        table{
            border: 2px solid black;
            text-align: center;
            width: 800px;
        }
        th{
            border: 2px solid black;
            text-align: center;
            font: 20px;
            font-weight: bold;
            color: white;
            background-color: black;
        }
        td{
            border: 1px solid skyblue;
        }
        .cart_value{
            text-align: center;
            padding: 18px;
            margin-bottom: 70px;
            font: bold;
            font-size: large;
        }
        .order_deg{
            padding-right: 100px;
            margin-top: -50px;
        }
        label{
            display: inline-block;
            width: 150px;
        }
        .div_gap{
            padding: 20px;
        }
    </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
        @include('home.header')
    
    <!-- end header section -->

  </div>
  <h2 style="color: white;">Your Cart</h2>
  <!-- end hero area -->
  <div class="div_deg">







    <table>
        <tr>
            <th>Product Title</th>
            <th>Product Image </th>
            <th>Product Price</th>
            <th>Remove Product</th>
        </tr>
        <?php
            $value = 0;
        ?>
        @foreach ($cart as $cart)
            <tr>
                <td>{{$cart->product->title}}</td>
                <td>
                    <img src="/products/{{$cart->product->image}}" alt="">
                </td>
                <td>{{$cart->product->price}}</td>
                <td><a  class="btn btn-danger" href="{{url('remove_product',$cart->id)}}">Remove</a></td>
            </tr>
            <?php
                $value = $value + $cart->product->price;
            ?>
            
        @endforeach
        

    </table>
  </div>
  <div class="cart_value">
    Total Value of Your Cart is : {{$value}}
  </div>
  <div class="order_deg" style="display: flex; justify-content:center; align-items:center;">

    <form action="{{url('confirm_order')}}" method="POST">
        @csrf
        <div class="div_gap">
            <label for="">Receiver's Name</label>
            <input type="text" name="name" value="{{Auth::user()->name}}">
        </div>
        <div class="div_gap">
            <label for="">Receiver's Address</label>
            <textarea name="address" id="" >{{Auth::user()->address}}</textarea>
        </div>
        <div class="div_gap">
            <label for="">Receiver's Phone</label>
            <input type="text" name="phone" value="{{Auth::user()->phone}}">
        </div>
        <div class="div_gap">
            <input class="btn btn-primary" type="submit" value="Place Order">
            <a class="btn btn-success" href="{{url('stripe',$value)}}">Pay Using Card</a>

        </div>
    </form>



</div>











   

  <!-- info section -->
@include('home.footer')
</body>

</html>
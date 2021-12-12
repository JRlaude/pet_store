 {{$order->user->getName()}}
<br>
@foreach($order->products as $product)
    {{$product->name}}
@endforeach
<h1>Here is index of products</h1>

@foreach($products as $product)
    {{ @$product->name  }} <span> -> </span> {{ @$product->description }}<br>
@endforeach
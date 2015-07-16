<h1>Here is index of categories</h1>


@foreach($categories as $category)
    {{@$category->name}}<span> -> </span> {{ @$category->description }}<br>
@endforeach
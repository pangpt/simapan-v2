<?php $dash.='-- '; ?>
@foreach($childrens as $children)
    <tr>
        <td>{{$dash}}{{$children->name}}</td>
        <td>{{$children->slug}}</td>
        <td>{{$children->parent->name}}</td>
    </tr>
    @if(count($children->children))
        @include('sub-category-list',['subcategories' => $children->children])
    @endif
@endforeach

<div class="position-sticky" style="top: 2rem;">
<div class="p-4 mb-3 bg-light rounded">
    <h4 class="fst-italic">About</h4>
    <p class="mb-0">{!! config('i.about_us') !!}</p>
</div>

 <h4 class="fst-italic mt-2">Top Article</h4>
 <ul>
    @foreach ($data['articles'] as $item)
        <li><a href="{{url('article/'.$item?->slug)}}">{{$item?->name}}</a></li>
    @endforeach
 </ul>

<!-- Bunu categorywidgetde vermekde meqsed,buradan istediyimiz yere cagira bilmekdi-->



@isset($KeyCategory) <!-- Eyer $KeyCategory varsa gostersiz bunu eks halda gostermesin-->
<div class="col-md-3">
    <ul class="list-group"><!-- Homepagede ekranin sag yuxarisindaki kategori cedveli ucundur-->
        <li class="list-group-item active" aria-current="true">An active item</li>
        @foreach($KeyCategory as $category)
            <li class="list-group-item @if(Request::segment(2)==$category->slug) active @endif">
                <a href="{{route('kategoryy', $category->slug)}}">{{$category->name}} <span class="badge bg-primary">{{$category->ArticleCount()}}</span>
            </li>
        @endforeach
    </ul>
</div>
@endif

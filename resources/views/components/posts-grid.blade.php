@include('components.post-featured-card')

@if ($posts->count() > 1)
    <div class="lg:grid lg:grid-cols-6">
        @foreach($posts->skip(1) as $post)
            @include('components.post-card')
        @endforeach
    </div>
@endif
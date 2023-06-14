@props(['post'])

<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    {{--  img del post  SI existe imagen del post Imprime dicha imagen SINO una por defecto--}}
    @if ($post->image)
        <img src="{{Storage::url($post->image->url)}}" alt="" class="w-full object-cover object-center"/>
    @else
    <img src="https://cdn.pixabay.com/photo/2016/11/18/18/39/beach-1836335_1280.jpg" alt="" class="w-full object-cover object-center"/>
    @endif
    
    
    {{--  nomb del post  --}}
    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{route('posts.show', $post)}}">{{$post->name}}</a>
        </h1>

        {{--  extracto del post  --}}
        <div class="text-gray-700 text-base">
            <p>{{$post->extractor}}</p>
        </div>
    </div>

    {{--  mapeo las etiquetas del post  --}}
    <div class="px-6 pt-4 pb-2">
        @foreach($post->tags as $tag)
            <a href="{{route('posts.tag', $tag)}}" class="inlene-block bg-gray-200 rounded-full px-3 py-1 text-sm text-gray-700 mr-2">{{$tag->name}}</a>
        @endforeach
    </div>
    
</article>
@props(['post'])

<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    {{--  img del post  --}}
    <img src="{{Storage::url($post->image->url)}}" alt="" class="w-full object-cover object-center"/>
    
    {{--  nomb del post  --}}
    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{route('posts.show', $post)}}">{{$post->name}}</a>
        </h1>

        {{--  extracto del post  --}}
        <div class="text-gray-700 text-base">
            {{$post->extractor}}
        </div>
    </div>

    {{--  mapeo las etiquetas del post  --}}
    <div class="px-6 pt-4 pb-2">
        @foreach($post->tags as $tag)
            <a href="{{route('posts.tag', $tag)}}" class="inlene-block bg-gray-200 rounded-full px-3 py-1 text-sm text-gray-700 mr-2">{{$tag->name}}</a>
        @endforeach
    </div>
    
</article>
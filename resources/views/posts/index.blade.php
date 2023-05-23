<x-app-layout>

    <div class="container ml-auto mr-auto py-8">
        
        {{--  grilla  --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <article 
                    class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 lg:col-span-2 @endif" 
                    style="background-image: url({{Storage::url($post->image->url)}})"
                >
                    <div class="w-full h-full px-8 flex flex-col justify-center">

                        {{--  muestro los Tags d c/post --> para ello debo acceder a la relacion creado  --}}
                        <div>
                            @foreach($post->tags as $tag)
                                <a href="{{route('posts.tag', $tag)}}" class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full">
                                    {{$tag->name}}
                                </a>
                            @endforeach                            
                        </div>

                        {{--  nombre del post y link al post(debo crear SU VISTA/Pantalla q quiero mostrar)  --}}
                        <h1 class="text-4xl text-white leading-8 font-bold mt-2">
                            <a href="{{route('posts.show', $post)}}"> {{--  la vista q creo está en resorce-->views-->post->>show.blade.php  --}}
                                {{$post->name}}
                            </a>
                        </h1>
                    </div>
                </article>
            @endforeach
        </div>

        {{--  paginación  --}}
        <div class="mt-4">
            {{$posts->links()}}
        </div>

    </div>

</x-app-layout>
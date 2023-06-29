<x-app-layout> {{--  al poner así Muestra la pagina en blanco  --}}
    <div class="container py-8">
        {{--  titulo del post  --}}
        <h1 class="text-4xl text-gray-600">{{$post->name}}</h1>

        {{--  Muestro del objeto post --> el extracto  --}}
        <div class="text-lg text-gray-500 mb-2">
            {{$post->extractor}}
        </div>

        {{--  genero una grilla de 3cols Y en responsive en 1col  --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{--  imagen y cont principal  --}}
            <div class="lg:col-span-2">
                {{--  img  --}}
                <figure>
                    @if ($post->image)
                        <img src="{{Storage::url($post->image->url)}}" alt="" class="w-36 h-20 object-cover object-center"/>
                    @else
                        <img src="https://cdn.pixabay.com/photo/2016/11/18/18/39/beach-1836335_1280.jpg" alt="" class="w-36 h-20 object-cover object-center"/>
                    @endif
                </figure>
                {{--  cont principal  --}}
                <div class="text-base text-gray-500 mt-4">
                    {{$post->body}}
                </div>
            </div>

            <aside>
                {{--  nombre de la categoría  --}}
                <h1 class="text-2xl font-bold text-gray-600 mb-4">
                    Categorías: {{$post->category->name}}
                </h1>

                {{--  muetro post relacionados  --}}
                <ul>
                    @foreach($similares as $similar)
                        <li>
                            <a href="{{route('posts.show', $similar)}}" class="flex">
                                @if ($similar->image)
                                    <img src="{{Storage::url($similar->image->url)}}" alt="" class="w-36 h-20 object-cover object-center"/>
                                @else
                                    <img src="https://cdn.pixabay.com/photo/2016/11/18/18/39/beach-1836335_1280.jpg" alt="" class="w-36 h-20 object-cover object-center"/>
                                @endif
                            </a>
                            {{--  muestro titulo del post relacionado CON el principal  --}}
                            <span>{{$similar->name}}</span>
                        </li>
                    @endforeach
                </ul>
            </aside>

        </div>
    </div>
</x-app-layout>
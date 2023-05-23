<x-app-layout>
    
    {{--  nombre d la categ  --}}
    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-3xl font-bold">Categoría: {{$category->name}}</h1>

        {{--  mapeo los post para dicha categoría  --}}
        @foreach($posts as $post)
            <x-card-post :post="$post"/>
        @endforeach

        {{--  muestro paginación --}}
        <div class="mt-4">
            {{$posts->links()}}
        </div>
    </div>    
    
</x-app-layout>
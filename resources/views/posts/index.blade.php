<x-app-layout>

    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 bg-gray-300">
        
        <div class="grid grid-cols-3 gap-6">

            @foreach ($posts as $post)
                <article>
                    <img src="{{Storage::url($post->image->url)}}" alt="Imagen post">
                </article>
            @endforeach

            <!-- @foreach ($images as $image)
                <article>
                    <img src="{{Storage::url($image->url)}}" alt="una imagen">    
                </article>
            @endforeach -->
                
        </div>
        
        
    </div>

</x-app-layout>
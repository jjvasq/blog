<div>
    <div class="card">
        <div class="card-header">
            <div class="input-group input-group-sm flex items-center" style="width: full;">
                <input wire:model="search" type="text" class="form-control float-right" placeholder="Buscar">
                <div class="input-group-append mr-2">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                @can('admin.posts.create')
                    <a class="ml-3 btn btn-primary btn-sm" href="{{route('admin.posts.create')}}">
                        Crear Nuevo Post
                        <i class="ml-1 fas fa-star"></i>
                    </a>
                @endcan
                
                {{-- <button type="button" class="ml-3 btn btn-primary btn-sm" >
                    Crear Nuevo Post
                    <i class="ml-1 fas fa-star"></i>
                </button> --}}
                {{-- @livewire('admin.create-post') --}}
            </div>
        </div>

        @if ($posts->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 60px" wire:click="order('id')">
                                ID
                                @if ($sort == 'id')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt mt-1 float-right"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt mt-1 float-right"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort mt-1 float-right"></i>    
                                @endif
                                
                            </th>
                            <th wire:click="order('name')">
                                Nombre
                                @if ($sort == 'name')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt mt-1 float-right"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt mt-1 float-right"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort mt-1 float-right"></i>    
                                @endif
                            </th>
                            <th wire:click="order('extract')">
                                Extracto
                                @if ($sort == 'extract')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt mt-1 float-right"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt mt-1 float-right"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort mt-1 float-right"></i>    
                                @endif
                            </th>
                            <th>Estado</th>
                            <th style="width: 110px">Detalle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->name }}</td>
                                <td>{!! $post->extract !!}</td>
                                <td>
                                    @if ($post->status == 1)
                                        <span class="badge bg-danger">Borrador</span>
                                    @else
                                        <span class="badge bg-success">Publicado</span>
                                    @endif
                                </td>
                                <td>
                                    {{-- <span class="btn btn-info btn-sm">
                                        Detalle                                        
                                    </span> --}}
                                    <button wire.click="$emit('alert','uh')" {{-- wire.click="show({{$post}})" --}} class="btn btn-info btn-sm flex items-center">
                                        Detalle
                                        <i class="ml-1 fas fa-list"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        @else
            <div class="card-body">
                <span>No hay registros coincidentes</span>
            </div>
        @endif


        <div class="card-footer flex">
            <div class="float-right">
                {{ $posts->links() }}
            </div>
        </div>

    </div>

    {{-- <button type="button" class="ml-3 btn btn-primary btn-sm" data-toggle="modal" data-target="#addPostModal">
        Crear Nuevo Post
        <i class="ml-1 fas fa-star"></i>
    </button> --}}

    <div class="modal fade" id="detallePost" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detalle del Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form wire:submit.prevent="storePost">
                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <input wire:model="name" type="text" id="name" class="form-control"
                                    placeholder="Ingrese el nombre del Post..">
                                
                            </div>

                            <div class="form-group">
                                <label for="slug">Slug:</label>
                                <input wire:model="slug" type="text" id="slug" class="form-control" readonly>
                               
                            </div>

                            <div class="form-group">
                                <label for="body">Cuerpo:</label>
                                <textarea wire.model="body" class="form-control" name="body" id="body" rows="6"
                                    placeholder="Cuerpo del Post"></textarea>
                                
                            </div>

                            <div class="form-group flex float-right">
                                <button wire.click="cerrarModalShow" type="button" class="btn btn-secondary">Cerrar</button>
                                {{-- <button type="submit" class="btn btn-success ml-2">Crear Post</button> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- @push('scripts')
    Modales
    <script>
        window.addEventListener('close-modal-show', event =>{
            $('#detallePost').modal('hide');
        });
        
        window.addEventListener('open-modal-show', event =>{
            $('#detallePost').modal('show');
        });
    </script>
@endpush --}}

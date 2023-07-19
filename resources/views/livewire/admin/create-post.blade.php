<div>
    <button type="button" class="ml-3 btn btn-primary btn-sm" data-toggle="modal" data-target="#addPostModal">
        Crear Nuevo Post
        <i class="ml-1 fas fa-star"></i>
    </button>


    <!-- Button trigger modal -->
    {{--  <button type="button" class="btn btn-primary btn-lg" >
      Launch
    </button> --}}

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="addPostModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nuevo Post</h5>
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
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="slug">Slug:</label>
                                <input wire:model="slug" type="text" id="slug" class="form-control" readonly>
                                @error('slug')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category">Categoría:</label>
                                <select name="category" id="category">
                                    @foreach ($categories as $category)
                                        <option wire:model="category_id" value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="status">Estado:</label>
                                <div class="form-check">
                                    <input wire:model="status" class="form-check-input" type="radio" name="status" id="borrador" checked
                                        value="1">
                                    <label class="form-check-label" for="borrador">
                                        Borrador
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input wire:model="status" class="form-check-input" type="radio" name="status" id="publicado"
                                        value="2">
                                    <label class="form-check-label" for="publicado">
                                        Publicado
                                    </label>
                                </div>
                            </div> 

                            <div class="form-group">
                                <label for="extract">Extracto:</label>
                                <textarea class="form-control" name="extract" id="extract" cols="12" rows="6"
                                    placeholder="Extracto del Post"></textarea>
                                @error('extract')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="body">Cuerpo:</label>
                                <textarea class="form-control" name="body" id="body" rows="6"
                                    placeholder="Cuerpo del Post"></textarea>
                                @error('body')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group flex float-right">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-success ml-2">Crear Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

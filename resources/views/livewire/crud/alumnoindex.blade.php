<!-- Agrega las clases de Bootstrap para estilizar tu tarjeta (card) principal -->
<div class="card">
    <div class="card-body">
        <!-- Agrega las clases de Bootstrap para estilizar la fila (row) -->
        <div class="row mb-3">
            <div class="col-12 col-md-6">
                <!-- Agrega las clases de Bootstrap para estilizar el input -->
                <input class="form-control" wire:model.live="search" placeholder="Buscar">
            </div>
            <div class="col-6 col-md-3">
                <!-- Agrega las clases de Bootstrap para estilizar el select -->
                <select class="form-select" wire:model.live="pagination">
                    <option value="all">-- Seleccione --</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="all">Todo</option>
                </select>
            </div>
            <div class="col-6 col-md-3">
                <!-- Agrega las clases de Bootstrap para estilizar el botón -->
                <x-button wire:click="add">
                    Crear
                </x-button>
            </div>
        </div>
    </div>

    <!-- Agrega una clase para estilizar el contenido debajo de la tarjeta -->
    <div class="card-content">
        <div class="table-responsive">
            <!-- Agrega las clases de Bootstrap para estilizar la tabla -->
            <table class="table table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <!-- Agrega las clases de Bootstrap para estilizar las celdas de encabezado -->
                        <th>Id</th>
                        <th>Grado Alumno</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Celular</th>
                        <th>Dirección</th>
                        <th>Email</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Observaciones</th>
                        {{-- <th>Creado En</th> --}}
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->grado->alumno_grado }}</td>
                            <td>{{ $item->primer_nombre }} {{ $item->segundo_nombre }}</td>
                            <td>{{ $item->primer_apellido }} {{ $item->segundo_apellido }}</td>
                            <td>{{ $item->telefono }}</td>
                            <td>{{ $item->celular }}</td>
                            <td>{{ $item->direccion }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->fecha_nacimiento }}</td>
                            <td>{{ $item->observaciones }}</td>
                            {{-- <td>{{ $item->created_at }}</td> --}}
                            <td>
                                <!-- Agrega las clases de Bootstrap para estilizar los botones -->
                                <x-danger-button class="btn btn-info" wire:click="edit({{ $item->id }})" wire:loading.attr="disabled">
                                    Editar
                                </x-danger-button>
                                <x-danger-button wire:click="delete({{ $item->id }})" wire:loading.attr="disabled">
                                    Eliminar
                                </x-danger-button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11">No hay datos</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        {{ $data->links() }}
    </div>

    <x-dialog-modal wire:model.live="confirmar">
        <x-slot name="title">
            {{ __('Eliminar Alumno') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Esta Seguro') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmar', false)" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="eliminar({{ $confirmar }})" wire:loading.attr="disabled">
                {{ __('Eliminar ') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model.live="confirmarcrear">
        <x-slot name="title">
            {{ __('Añadir Alumno') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Completa los campos') }}
            {{-- nombre  --}}
            <div class="col-span-6 sm:col-span-4">
                <x-label for="primer_nombre" value="{{ __('Primer Nombre') }}" />
                <x-input id="primer_nombre" type="text" class="mt-1 block w-full" wire:model="primer_nombre"
                    autocomplete="" />
                <x-input-error for="primer_nombre" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="segundo_nombre" value="{{ __('Segundo Nombre') }}" />
                <x-input id="segundo_nombre" type="text" class="mt-1 block w-full" wire:model="segundo_nombre"
                    autocomplete="" />
                <x-input-error for="segundo_nombre" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="primer_apellido" value="{{ __('Primer Apellido') }}" />
                <x-input id="primer_apellido" type="text" class="mt-1 block w-full" wire:model="primer_apellido"
                    autocomplete="" />
                <x-input-error for="primer_apellido" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="segundo_apellido" value="{{ __('Segundo Apellido') }}" />
                <x-input id="segundo_apellido" type="text" class="mt-1 block w-full" wire:model="segundo_apellido"
                    autocomplete="" />
                <x-input-error for="segundo_apellido" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="telefono" value="{{ __('Telefono') }}" />
                <x-input id="telefono" type="text" class="mt-1 block w-full" wire:model="telefono"
                    autocomplete="" />
                <x-input-error for="telefono" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="celular" value="{{ __('celular') }}" />
                <x-input id="celular" type="text" class="mt-1 block w-full" wire:model="celular" autocomplete="" />
                <x-input-error for="celular" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="direccion" value="{{ __('Direccion') }}" />
                <x-input id="direccion" type="text" class="mt-1 block w-full" wire:model="direccion"
                    autocomplete="" />
                <x-input-error for="direccion" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="email" value="{{ __('email') }}" />
                <x-input id="email" type="text" class="mt-1 block w-full" wire:model="email"
                    autocomplete="" />
                <x-input-error for="email" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 form-control">
                <x-label for="fecha_nacimiento" value="{{ __('fecha_nacimiento') }}" />
                <x-input id="fecha_nacimiento" type="date" class="mt-1 block w-full"
                    wire:model="fecha_nacimiento" autocomplete="" />
                <x-input-error for="fecha_nacimiento" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="observaciones" value="{{ __('observaciones') }}" />
                <x-input id="observaciones" type="text" class="mt-1 block w-full" wire:model="observaciones"
                    autocomplete="" />
                <x-input-error for="observaciones" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="grado_id" value="{{ __('Grado') }}" />
                <x-input id="grado_id" type="text" class="mt-1 block w-full" wire:model="grado_id"
                    autocomplete="" />
                <x-input-error for="grado_id" class="mt-2" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmarcrear', false)" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="crear()" wire:loading.attr="disabled">
                {{ __('Guardar ') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>

<div class="card">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-12 col-md-9">
                <input wire:model.live="search">

            </div>
            <div class="col-12 col-md-3">
                <select name="" id="" class="form-select" wire:model.live ="pagination">
                    <option value="all">-- Seleccione --</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="all">Todo</option>
                </select>
            </div>
        </div>
    </div>
    <div>Valor de búsqueda en tiempo real: {{ $search }}</div>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead class="table-dark">
                <tr>
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
                    <th>Creado En</th>
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
                        <td>{{ $item->created_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11">No hay datos</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-body">
        {{ $data->links() }}
    </div>
</div>



    <div class="card">
        <div>
            <div class="card">
                <input type="search" placeholder="busque por nombre" wire:model ="search">
            </div>
        </div>

        <div class="card-body m-auto">
            <table class="table table-hover table-responsive small">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Grado Alumno</th>
                        <th>Primer Nombre</th>
                        <th>Segundo Nombre</th>
                        <th>Primer Apellido,</th>
                        <th>Segundo Apellido</th>
                        <th>Teléfono</th>
                        <th>Celular</th>
                        <th>Dirección</th>
                        <th>Email</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Öbservaciones</th>
                        <th>Creado En</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($data as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{ $item->grado->alumno_grado }}</td>
                        <td>{{$item->primer_nombre}}</td>
                        <td>{{$item->segundo_nombre}}</td>
                        <td>{{$item->primer_apellido}}</td>
                        <td>{{$item->segundo_apellido}}</td>
                        <td>{{$item->telefono}}</td>
                        <td>{{$item->celular}}</td>
                        <td>{{$item->direccion}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->fecha_nacimiento}}</td>
                        <td>{{$item->observaciones}}</td>
                        <td>{{$item->created_at}}</td>


                    </tr>
                    @empty
                    <h2>not data</h2>
                @endforelse

                </tbody>
            </table>
            <button>{{ $data->links() }}</button>
        </div>
    </div>


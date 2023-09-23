<div>
    <form wire:submit.prevent="crearAlumno">
        <!-- Campo para el primer nombre del alumno -->
        <div class="mb-3">
            <label for="primer_nombre" class="form-label">Primer Nombre</label>
            <input type="text" class="form-control" wire:model="primerNombre" id="primer_nombre" required>
        </div>

        <!-- Campo para el segundo nombre del alumno -->
        <div class="mb-3">
            <label for="segundo_nombre" class="form-label">Segundo Nombre</label>
            <input type="text" class="form-control" wire:model="segundoNombre" id="segundo_nombre">
        </div>

        <!-- Campo para el primer apellido del alumno -->
        <div class="mb-3">
            <label for="primer_apellido" class="form-label">Primer Apellido</label>
            <input type="text" class="form-control" wire:model="primerApellido" id="primer_apellido" required>
        </div>

        <!-- Campo para el segundo apellido del alumno -->
        <div class="mb-3">
            <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
            <input type="text" class="form-control" wire:model="segundoApellido" id="segundo_apellido">
        </div>

        <!-- Campo para el grado del alumno -->
        <div class="mb-3">
            <label for="grado" class="form-label">Grado del Alumno</label>
            <select class="form-select" wire:model="grado" id="grado" required>
                <option value="">-- Seleccione --</option>
                <option value="Primero">Primero</option>
                <option value="Segundo">Segundo</option>
                <option value="Tercero">Tercero</option>
                <!-- Agrega más opciones según tus necesidades -->
            </select>
        </div>

        <!-- Campo para el teléfono del alumno -->
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="tel" class="form-control" wire:model="telefono" id="telefono">
        </div>

        <!-- Campo para el correo electrónico del alumno -->
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" wire:model="email" id="email">
        </div>

        <!-- Botón para enviar el formulario -->
        <button type="submit" class="btn btn-primary">Crear Alumno</button>
    </form>
</div>

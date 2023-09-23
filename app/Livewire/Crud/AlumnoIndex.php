<?php

namespace App\Livewire\Crud;

use App\Models\Alumno;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class AlumnoIndex extends Component
{
    protected $paginationTheme = 'bootstrap';
    use WithPagination;

    //paginacion y busquedas;
    public $search;
    public $pagination = 5;
    public $user ;
    public $confirmar =false; //eliminar
    public $confirmarcrear =false; //eliminar


    //crear
    public $primer_nombre;
    public $segundo_nombre;
    public $primer_apellido;
    public $segundo_apellido;
    public $telefono;
    public $celular;
    public $direccion;
    public $email;
    public $fecha_nacimiento;
    public $observaciones;
    public $grado_id;



    public function render()
    {
        $this->user = Alumno::all();

        if($this->pagination == 'all'){
        $numero = Alumno::all()->count();
        }else{
            $numero = $this->pagination;
        }

        $data = Alumno::where(function($query) {
            $query->where('primer_nombre', 'like', '%' . $this->search . '%')
                ->orWhere('segundo_nombre', 'like', '%' . $this->search . '%')
                ->orWhere('primer_apellido', 'like', '%' . $this->search . '%')
                ->orWhere('segundo_apellido', 'like', '%' . $this->search . '%');
                })->paginate($numero);

        return view('livewire.crud.AlumnoIndex', ['data' => $data]);
    }

    public function delete($id){

        // $alumno->delete();
        $this->confirmar = $id;
    }
    public function eliminar(Alumno $alumno){

        $alumno->delete();
        $this->confirmar = false;

    }

    public function add(){

        // $alumno->delete();
        $this->confirmarcrear = true;
    }

    public function crear(){
       $data = $this->validate([
            'primer_nombre' => 'required|string|max:255',
            'segundo_nombre' => 'required|string|max:255',
            'primer_apellido' => 'required|string|max:255',
            'segundo_apellido' => 'required|string|max:255',
            'telefono' => 'required|digits:9', // Suponiendo que los números de teléfono tienen 10 dígitos.
            'celular' => 'required|digits:9', // Suponiendo que los números de celular tienen 10 dígitos.
            'direccion' => 'required|string|max:255',
            'email' => 'required|email|unique:alumnos,email|max:255',
            'fecha_nacimiento' => 'required|date',
            'observaciones' => 'required|string',
            'grado_id' => 'required|exists:grados,id', // Verifica que el grado_id exista en la tabla 'grados'.
        ]);

        // dd($data);
        Alumno::create($data);

        // Limpiar los campos después de crear el alumno
        $this->reset();

        // Emite un mensaje de éxito
        session()->flash('message', 'Alumno creado exitosamente.');
    }

    public function edit(Alumno $alumno)
{
    // Asignar los valores del alumno a las propiedades de edición
    $this->primer_nombre = $alumno->primer_nombre;
    $this->segundo_nombre = $alumno->segundo_nombre;
    $this->primer_apellido = $alumno->primer_apellido;
    $this->segundo_apellido = $alumno->segundo_apellido;
    $this->telefono = $alumno->telefono;
    $this->celular = $alumno->celular;
    $this->direccion = $alumno->direccion;
    $this->email = $alumno->email;
    $this->fecha_nacimiento = $alumno->fecha_nacimiento;
    $this->observaciones = $alumno->observaciones;
    $this->grado_id = $alumno->grado_id;

    // Mostrar el modal de edición
    $this->confirmarcrear = true;
}


}

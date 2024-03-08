<!--
    Creamos una vista a partir del layout
    Vista principal Alumnos
-->
@extends('layout.layout');

@section('titulo', 'Home Alumnos');
@section('subtitulo', 'Panel de Control de Alumnos');

@section('contenido');
    @include('students.partials.menu');
    {{-- Lista de artículos --}}

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Apellidos</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Ciudad</th>
                <th>Email</th>
                <th>Curso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($alumnos as $alumno)
                <tr>
                    <td scope="row">{{ $alumno->id }}</td>
                    <td>{{ $alumno->apellidos }}</td>
                    <td>{{ $alumno->nombre }}</td>
                    <td>{{ $alumno->telefono }}</td>
                    <td>{{ $alumno->ciudad }}</td>
                    <td>{{ $alumno->email }}</td>
                    <td>{{ $alumno->id_curso }}</td>
                    <td>
                        {{-- <a href={{route('clientes.edit', $alumno->id)}} title="Editar"><i class="bi bi-pencil-square"></i></a>
                <a href={{route('clientes.show', $alumno->id)}} title="Mostrar" ><i class="bi-eye"></i></a>
                <a href={{route('clientes.destroy', $alumno->id)}} title="Eliminar" onclick="return confirm('Confimar elimación del corredor')"><i class="bi-trash"></i></a> --}}


                        <a href="clientes/edit/{{ $alumno->id }}" title="Editar"><i class="bi bi-pencil-fill"></i></a>
                        <a href="clientes/show/{{ $alumno->id }}" title="Mostrar"><i class="bi bi-eye-fill"></i></a>
                        <a href="clientes/destroy/{{ $alumno->id }}" title="Eliminar"><i class="bi bi-trash-fill"
                                onclick="return confirm('Confimar elimación del alumno')"></i></a>

                    </td>
                </tr>
            @empty
                <li>No hay clientes registrados.</li>
            @endforelse
        </tbody>
    </table>
    {{-- Fin lista --}}
    <br><br><br>

@endsection

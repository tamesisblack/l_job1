@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Postes</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-poste')
                                <a class="btn btn-warning" href="{{ route('postes.create') }}">Nuevo</a>
                            @endcan

                            <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Nombre Poste</th>
                                    <th style="color:#fff;">Latitud</th>
                                    <th style="color:#fff;">Longitud</th>
                                    <th style="color:#fff;">Altura</th>
                                    <th style="color:#fff;">Material</th>
                                    <th style="color:#fff;">Estado</th>
                                    <th style="color:#fff;">Comuna</th>
                                    <th style="color:#fff;">Dirección</th>
                                    <th style="color:#fff;">Nivel Tensión</th>
                                    <th style="color:#fff;">Observación</th>
                                    <th style="color:#fff;">Acciones</th>                                                                   
                                </thead>
                                <tbody>
                                    @foreach ($postes as $poste)
                                        <tr>
                                            <td style="display: none;">{{ $poste->id }}</td>
                                            <td>{{ $poste->nombre_poste }}</td>
                                            <td>{{ $poste->latitud }}</td>
                                            <td>{{ $poste->longitud }}</td>
                                            <td>{{ $poste->altura }}</td>
                                            <td>{{ $poste->material }}</td>
                                            <td>{{ $poste->estado }}</td>
                                            <td>{{ $poste->comuna }}</td>
                                            <td>{{ $poste->direccion }}</td>
                                            <td>{{ $poste->nivel_tension }}</td>
                                            <td>{{ $poste->observacion }}</td>
                                            <td>
                                                <form action="{{ route('postes.destroy', $poste->id) }}" method="POST">
                                                    @can('editar-poste')
                                                        <a class="btn btn-info" href="{{ route('postes.edit', $poste->id) }}">Editar</a>
                                                    @endcan

                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-poste')
                                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Ubicamos la paginación a la derecha -->
                            <div class="pagination justify-content-end">
                                {!! $postes->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('adminlte::page')

@section('title', 'Registrar Empregado')

@section('content_header')
    <h1>Histórico de Pontos dos Empregados</h1>
@stop

@section('content')    
    <div class="box">
        <div class="box-header">
           <form action="{{ route('pontos.filtro') }}" method="POST" class="form form-inline">
                {!! csrf_field() !!}
                
                <select name="tempo" class="form-control">
                    <option value="">Selecione o período</option>
                    <option value="Diario">Diário</option>
                    <option value="Semanal">Semanal</option>
                    <option value="Mensal">Mensal</option>
                    <option value="Anual">Anual</option>
                </select>
                <button type="submit" class="btn btn-primary">Pesquisar</button>
           </form>
        </div>
        <div class="box-body">
           <table class="table table-bordered table-hover">
                <thread>
                    <th>Empregado</th>                   
                    <th>Ponto batido</th>
                    <th>Data</th>
                </thread>
                <tbody>
                    @forelse($pontos as $ponto)
                    <tr>
                        <td>{{ $ponto->user_id }}</td>                        
                        <td>{{ $ponto->type($ponto->type) }}</td>
                        <td>{{ $ponto->data }}</td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
           </table>
            @if (isset($dataForm))
                {!! $pontos->appends($dataForm)->links() !!}
            @else
                {!! $pontos->links() !!}
            @endif
           
        </div>
    </div>
@stop
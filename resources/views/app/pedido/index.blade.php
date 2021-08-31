@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <p>Listagem de Pedidos</p>
        </div>

        <div class="menu">
            <ul>
                
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
                  
            </ul>
        </div> 

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto">
                <table border="1px" width="100%">
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>Cliente</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->cliente_id }}</td>
                                
                                <td><a href="{{ route('pedido.show', ['pedido' => $pedido->id ]) }}">Visualizar</a></td>
                                <td>
                                    <form id="form_{{$pedido->id}}" method="post" action="{{ route('pedido.destroy', ['pedido' => $pedido->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        {{-- <button type="submit">Excluir</button> --}}
                                        <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{ route('pedido.edit', ['pedido' => $pedido->id ]) }}">Editar</a></td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            {{ $pedidos->appends($request)->links() }}
            <br>
{{-- 
            {{ $pedidos->count() }} - conta total de registros por página
            <br>
            {{ $pedidos->total() }} - total de registros
            <br>
            {{ $pedidos->firstItem() }} - primeiro item na página
            <br>
            {{ $pedidos->lastItem() }}  - último item --}}

                <div width="100%" height="20px">
                        Exibindo {{ $pedidos->count() }} pedidos de {{ $pedidos->total() }} de ( {{ $pedidos->firstItem() }} a {{ $pedidos->lastItem() }})
                </div>
            </div>
        </div>

    </div>

@endsection
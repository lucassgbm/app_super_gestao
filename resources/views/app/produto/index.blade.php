@extends('app.layouts.basico')

@section('titulo', 'Produtos')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <p>Listagem de Produtos</p>
        </div>

        <div class="menu">
            <ul>
                
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
                  
            </ul>
        </div> 

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto">
                <table border="1px" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Unidade ID</th>
                            <th>Visualizar</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->peso }}</td>
                                <td>{{ $produto->unidade_id }}</td>
                                <td><a href="{{ route('produto.show', ['produto' => $produto->id ]) }}">Visualizar</a></td>
                                <td><a href="">Editar</a></td>
                                <td><a href="">Excluir</a></td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            {{ $produtos->appends($request)->links() }}
            <br>
{{-- 
            {{ $produtos->count() }} - conta total de registros por página
            <br>
            {{ $produtos->total() }} - total de registros
            <br>
            {{ $produtos->firstItem() }} - primeiro item na página
            <br>
            {{ $produtos->lastItem() }}  - último item --}}

                <div width="100%" height="20px">
                        Exibindo {{ $produtos->count() }} produtos de {{ $produtos->total() }} de ( {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }})
                </div>
            </div>
        </div>

    </div>

@endsection
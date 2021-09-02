@extends('app.layouts.basico')

@section('titulo', 'Pedido Produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <p>Adicionar Produtos ao Pedido</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
                  
            </ul>
        </div> 

        <div class="informacao-pagina">
            <h4>Detalhes do pedido</h4>
            <p>ID do pedido: {{ $pedido->id }}</p>
            <p>Cliente: {{ $pedido->cliente_id }}</p>

            <div style="width: 80%; margin-left: auto; margin-right: auto">
                <h4>Itens do pedido</h4>

                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nome do produto</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido->produtos as $produto)
                            <tr>
                                <td> {{ $produto->id }} </td>
                                <td> {{ $produto->nome }} </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
                @endcomponent
            </div>
        </div>

    </div>

@endsection
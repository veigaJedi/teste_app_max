@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">{{ __('Produtos App Max') }}</div>
            <div class="card-body">
               @if (session('status'))
               <div class="alert alert-success" role="alert">
                  {{ session('status') }}
               </div>
               @endif
            </div>
            <div class="card-body">
               <a class="btn btn-primary" href="{{ url('produtos/create') }}">
               <i class="">Novo Produto</i>
               </a>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-hover">
                     <thead class="">
                        <th>Codigo</th>
                        <th>SKU</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Valor</th>
                        <th>Status</th>
                        <th>Dt. Criação</th>
                        <th>Dt. Atualização</th>
                        <th></th>
                        <th></th>
                     </thead>
                     <tbody>
                        @foreach($produtos as $value)
                        <tr>
                           <td>{{ $value->id }}</td>
                           <td>{{ $value->sku }}</td>
                           <td>{{ $value->nome }}</td>
                           <td>{{ $value->status }}</td>
                           <td>{{ $value->nome }}</td>
                           <td>{{ $value->status }}</td>
                           <td>{{ $value->created_at->format('d/m/Y') }}</td>
                           <td>{{ $value->updated_at->format('d/m/Y') }}</td>
                           <td>
                              <a class="btn btn-primary" href="{{ route('produtos.edit',$value->id) }}">
                              <i class="">Editar</i>
                              </a>
                           </td>
                           <td>
                              <form action="{{ route('produtos.destroy',$value->id) }}" method="post">
                                 @csrf
                                 @method('DELETE')
                                 <button class="btn btn-danger" type="submit" title="Deletar">
                                 <i class="">Deletar</i>
                                 </button>
                              </form>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

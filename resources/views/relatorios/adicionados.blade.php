@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">{{ __('Relatório de produtos movimentados por dia - Entrada ') }}{{ date('d/m/Y') }}</div>
            <div class="card-body">
               @if (session('status'))
               <div class="alert alert-success" role="alert">
                  {{ session('status') }}
               </div>
               @endif
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('rel-busca-adicionados') }}">
                 @csrf
                 <div class="form-group row">
                    <label for="dt_busca" class="col-md-4 col-form-label text-md-right">{{ __('Filtrar por data') }}</label>
                    <div class="col-md-2">
                       <input id="dt_busca" type="text" class="form-control{{ $errors->has('dt_busca') ? ' is-invalid' : '' }}" name="dt_busca" value="{{ old('dt_busca') }}" required autofocus>
                       @if ($errors->has('dt_busca'))
                       <span class="invalid-feedback" role="alert">
                       <strong>{{ $errors->first('dt_busca') }}</strong>
                       </span>
                       @endif
                    </div>
                    <div class="col-md-2">
                       <button type="submit" class="btn btn-primary">
                       {{ __('Filtrar') }}
                       </button>
                    </div>
                 </div>
               </form>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-hover">
                     <thead class="">
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Tipo</th>
                        <th>Inserido</th>
                     </thead>
                     <tbody>
                        @foreach($relatorio as $value)
                        <tr>
                           <td>{{ $value->nome }}</td>
                           <td>{{ $value->quantidade_total }}</td>
                           <td>{{ $value->tipo }}</td>
                           <td>{{ date('d/m/Y') }}</td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
                  {{ $relatorio->links() }}
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Produtos com menos de 100 unidades no estoque. ') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="card-body">
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="table table-hover">
                           <thead class="">
                              <th>Nome</th>
                              <th>Quantidade</th>
                           </thead>
                           <tbody>
                             @if($result)
                                @foreach($result as $value)
                                  @if($value['quant_total'] < 100)
                                    <tr>
                                       <td>{{ $value['nome_prod'] }}</td>
                                       <td>{{ $value['quant_total'] }}</td>
                                    </tr>
                                  @endif
                                @endforeach
                              @endif
                           </tbody>
                        </table>
                     </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

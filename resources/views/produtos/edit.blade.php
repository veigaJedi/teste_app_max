@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">{{ __('Editar Produto') }}</div>
            <div class="card-body">
               @if (session('status'))
               <div class="alert alert-danger" role="alert">
                  {{ session('status') }}
               </div>
               @endif
            </div>
            <div class="card-body">
               <form method="post" action="{{ route('produtos.update', $produto->id) }}">
                  @csrf
                  <div class="form-group row">
                     <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                     <div class="col-md-6">
                        <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ old('nome', $produto->nome) }}" required autofocus>
                        @if ($errors->has('nome'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nome') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="sku" class="col-md-4 col-form-label text-md-right">{{ __('SKU') }}</label>
                     <div class="col-md-6">
                        <input id="sku" type="text" class="form-control{{ $errors->has('sku') ? ' is-invalid' : '' }}" name="sku" value="{{ old('sku', $produto->sku) }}" required autofocus>
                        @if ($errors->has('sku'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('sku') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>
                     <div class="col-md-6">
                        <textarea required autofocus name="descricao">
                        {{ $produto->descricao }}
                        </textarea>
                        @if ($errors->has('descricao'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('descricao') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
                     <div class="col-md-6">
                        <select  name="status" class="form-control{{ $errors->has('texto') ? ' is-invalid' : '' }}" value="{{ old('texto') }}" required>
                        <option value="A" {{ ($produto->status == 'A' ? "selected":"") }}>Ativo</option>
                        <option value="D" {{ ($produto->status == 'D' ? "selected":"") }}>Desativado</option>
                        </select>
                        @if ($errors->has('status'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('status') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row mb-0">
                     <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                        {{ __('Cadastrar') }}
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

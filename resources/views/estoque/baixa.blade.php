@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">{{ __('Baixar Produto no Estoque') }}</div>
            <div class="card-body">
               @if (session('status'))
               <div class="alert alert-success" role="alert">
                  {{ session('status') }}
               </div>
               @endif
            </div>
            <div class="card-body">
               <form method="POST" action="{{ route('baixar-produtos') }}">
                  @csrf
                  <div class="form-group row">
                     <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Produto') }}</label>
                     <div class="col-md-6">
                       <select  name="produto" class="form-control{{ $errors->has('produto') ? ' is-invalid' : '' }}" required>
                         <option value="">Selecione o produto</option>
                         @foreach($produtos as $value)
                            <option value="{{ $value->id }}">{{ $value->nome }}</option>
                          @endforeach
                       </select>
                        @if ($errors->has('nome'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nome') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="cliente" class="col-md-4 col-form-label text-md-right">{{ __('Cliente') }}</label>
                     <div class="col-md-6">
                        <input id="cliente" type="text" class="form-control{{ $errors->has('cliente') ? ' is-invalid' : '' }}" name="cliente" value="{{ old('cliente') }}" required autofocus>
                        @if ($errors->has('cliente'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('cliente') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="quantidade" class="col-md-4 col-form-label text-md-right">{{ __('Quantidade') }}</label>
                     <div class="col-md-6">
                        <input id="quantidade" type="text" class="form-control{{ $errors->has('quantidade') ? ' is-invalid' : '' }}" name="quantidade" value="{{ old('quantidade') }}" required autofocus>
                        @if ($errors->has('quantidade'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('quantidade') }}</strong>
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

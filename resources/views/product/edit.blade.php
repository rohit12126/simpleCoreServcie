@extends('layouts.app')

@section('content')
<div class="container">
   <div class="col-md-12">
      <h4 class="page-header">Edit Product </h4>
      @foreach ($errors->all() as $error)
      <p class="alert alert-danger">{{ $error }}</p>
      @endforeach 
      @if (session('status'))
      <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" aria-label="close" data-dismiss="alert">&times;</button>
         {{ session('status')}}
      </div>
      @endif

      {{ Form::open(array('route' => ['product.update', $product->id], 'method' => 'PUT', 'class'=> 'form-vertical','enctype'=>'multipart/form-data', 'files'=>true)) }}
      {{csrf_field()}}
         <div class="form-group">
            {!! Form::text('name',$product->name,array(
                  'id'=>'name',
                  'class'=> $errors->has('name') ? 'form-control is-invalid state-invalid' : 'form-control', 
                  'placeholder'=>'Name', 'required'=>'required')) !!}               
         </div>

         <div class="form-group">
            {!! Form::number('price',$product->price,array(
                  'id'=>'price',
                  'class'=> $errors->has('price') ? 'form-control is-invalid state-invalid' : 'form-control', 
                  'placeholder'=>'Price', 'step'=>'any', 'autocomplete'=>'off','required'=>'required')) !!} 
         </div>
         
         <div class="form-group">
            {!! Form::number('quanty',$product->quanty,array(
                  'id'=>'quanty',
                  'class'=> $errors->has('quanty') ? 'form-control is-invalid state-invalid' : 'form-control', 
                  'placeholder'=>'Quanty', 'step'=>'any', 'autocomplete'=>'off','required'=>'required')) !!} 
         </div>

         <div class="form-group">
            {!! Form::textarea('description',$product->description,['class'=>'form-control', 'rows' => 3, 'cols' => 40, 'required']) !!}
         </div>

         <div class="form-group">
            {!! Form::select('in_stock',['0'=>'InStock', '1' =>'OutStock'], $product->in_stock,
               ['class' => 'form-control','required']) !!}
         </div>

         <div class="form-group">
            {!! Form::submit('Save', array('class'=>'btn btn-info')) !!}
         </div>
      {{ Form::close() }}         
      
   </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
   <div class="col-md-12">
      <h4 class="page-header">Add New Product </h4>
      @foreach ($errors->all() as $error)
      <p class="alert alert-danger">{{ $error }}</p>
      @endforeach 
      @if (session('status'))
      <div class="alert alert-success alert-dismissable">
         <button type="button" class="close" aria-label="close" data-dismiss="alert">&times;</button>
         {{ session('status')}}
      </div>
      @endif

      {{ Form::open(array('route' => 'product.create', 'class'=> 'form-vertical','enctype'=>'multipart/form-data', 'files'=>true)) }}
      {{csrf_field()}}
      <div class="form-group">
            {!! Form::text('name', '',array(
                  'id'=>'name',
                  'class'=> $errors->has('name') ? 'form-control is-invalid state-invalid' : 'form-control', 
                  'placeholder'=>'Name', 'required'=>'required')) !!}               
         </div>

         <div class="form-group">
            {!! Form::number('price', '',array(
                  'id'=>'price',
                  'class'=> $errors->has('price') ? 'form-control is-invalid state-invalid' : 'form-control', 
                  'placeholder'=>'Price', 'step'=>'any', 'autocomplete'=>'off','required'=>'required')) !!} 
         </div>
         
         <div class="form-group">
            {!! Form::number('quanty', '',array(
                  'id'=>'quanty',
                  'class'=> $errors->has('quanty') ? 'form-control is-invalid state-invalid' : 'form-control', 
                  'placeholder'=>'Quanty', 'step'=>'any', 'autocomplete'=>'off','required'=>'required')) !!} 
         </div>

         <div class="form-group">
            {!! Form::textarea('description', '',['class'=>'form-control', 'rows' => 3, 'cols' => 40, 'required']) !!}
         </div>

         <div class="form-group">
            {!! Form::select('in_stock',['0'=>'InStock', '1' =>'OutStock'], '',
               ['class' => 'form-control','required']) !!}
         </div>


         <div class="form-group">
            {!! Form::submit('Save', array('class'=>'btn btn-info')) !!}
         </div>
      {{ Form::close() }}

      <table class="table table-bordered">
         <thead>
            <tr>
               <th>Name</th>
               <th>Price </th>
               <th>Quanty</th>
               <th>Description</th>
               <th>Stock</th>
               <th>Edit</th>
               <th>Delete</th>
            </tr>
         </thead>
         @foreach($products as $product)
         <tbody>
            <tr>
               <td>{{$product->name}}</td>
               <td>{{$product->price}}</td>
               <td>{{$product->quanty}}</td>
               <td>{{$product->description}}</td>
               <td>  @if($product->in_stock =='0') 
                        <span class="text-success">In Stock</span>
                     @else 
                        <span class="text-danger">Out Stock</span>
                     @endif
               </td>
               <form action="{{route('product.edit', $product->id)}}" method="GET">
                  <td>
                     <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-success btn-xs" ><span class="fa fa-pencil fa-fw"></span></button></p>
                  </td>
               </form>
               <form action="{{route('product.destroy', $product->id)}}" method="POST">
                  {{csrf_field()}}
                  {{method_field('DELETE')}}
                  <td>
                     <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" ><span class="fa fa-fw fa-trash"></span></button></p>
                  </td>
               </form>
            </tr>
         </tbody>
         @endforeach
      </table>
   </div>
</div>
@endsection

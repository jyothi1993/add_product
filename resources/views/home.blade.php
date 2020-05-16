@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Product</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ URL::route("cartDataStore") }}" method="post">
                  <input name="_token" id="token" type="hidden" value="{{ csrf_token() }}"/>
                    <div class="row">
                        <div class="col-md-8">
                            <label>Category</label>
                            <div class="form-group">
                                <select class="form-control category1" id="category1" name='category'>
                                    <option value='0'>Select Category</option>
                                    @foreach($category as $cat)
                                        <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <label>Subcategory</label>
                            <div class="form-group">
                                <select class="form-control subcat" id="subcategory">
                                    <option>Select subcategory</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <label>Product</label>
                            <div class="form-group">
                                <select class="form-control products" name="product_name">
                                    <option>Select product</option>
                                </select>
                            </div>
                        </div>
                         <div class="col-md-8">
                            
                            <div class="form-group">
                                <button class="btn btn-sm btn-primary">Add to cart</button>
                            </div>
                        </div>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
     $("#category1").change(function(){
        var cat = $("#category1").val();
            $.ajax({
            url: 'getSubcategory',
            type: 'post',
            data: { "_token": $('#token').val(),"cat": cat},
            success: function(response) { 
                 $(".subcat").empty();
                $(".subcat").append(response);
             }
            });
    });
     $("#subcategory").change(function(){
        
        var subcat = $(this).val();
        var cat = $("#category1").val();
         $.ajax({
            url: 'getProducts',
            type: 'post',
            data: { "_token": $('#token').val(),"cat": cat,'subcat':subcat},
            success: function(response) { 
                 $(".products").empty();
                $(".products").append(response);
             }
            });
           
    });
   })
</script>
@endsection

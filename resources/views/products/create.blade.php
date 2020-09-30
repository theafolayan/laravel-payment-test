@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="card">
            <div class= "card-header"> Add a New Product to Inventory</div>
            <div class= "card-body">
                <div class="container">
                    <form action="{{ route('products.store') }}" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" placeholder ="Product Name here...">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price" placeholder ="Product price">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" class="form-control" placeholder ="ex 40...">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control" placeholder ="Product description here..."> </textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Product Image</label>
                            <input type="file" class="form-control" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Upload Product"/>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


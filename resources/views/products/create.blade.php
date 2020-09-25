@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class ="card">
    <div class= "card-header"> Add a New Product to Inventory
    </div>
    <div class= "card-body">
        <div class="container">
            <form action="{{ route('products.store') }}" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" placeholder ="Product Name here...">
            </div>
            </form>
        </div>
    </div>
</div>
    </div>
</div>
@endsection


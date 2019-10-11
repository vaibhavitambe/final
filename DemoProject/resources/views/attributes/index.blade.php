@extends('admin.admin')

@section('content')
<section class="content-header">
        <h1>
          Product Attribute Managment
        </h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Product Attribute Managment</a></li>
          <li class="active">New Attribute</li>
        </ol>
      </section>
      <br>
      <!-- Button trigger modal -->
<button type="button" class="btn btn-success " data-toggle="modal" data-target="#myModal" style="margin-left: 20px;">
  Add New Attribute
</button>

<br><br><br>
  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p> 
    </div>
  @endif
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Attribute</h4>
      </div>
      <form action="{{ route('attributes.store') }}" method="post" name="add_image" enctype="multipart/form-data" id="attributeForm">
        <div class="modal-body">
          
            {{ csrf_field() }}

             @include('attributes.form')
           
        </div>
        
      </form>

    </div>
  </div>
</div>

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Products-Attribute Table</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
<div class="box-body table-responsive no-padding">
              <table class="table table-hover">
  <tr>
      <th>Name</th>
      <th>Actions</th>
    </tr>
    @foreach ($pro as $attribute)
      <tr>
        <td>{{ $attribute->name }}</td>
        <td>
           @foreach($attribute->childs as $value)
             {{ $value->attribute_value }}<br>
           @endforeach
        </td>
        <td>
          {!! Form::open(['method' => 'DELETE','route' => ['attributes.destroy', $attribute->id],'id' => 'FormDeleteTime','style'=>'display:inline']) !!}

          {!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger']) !!}

          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach
</table>
  </div>
</div>

</div>
</div>
@endsection




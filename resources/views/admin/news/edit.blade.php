@extends('admin.master.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<div class="content-header">
	  <h1>Update News</h1>
	</div>
    <!-- Main content -->
    <section class="content container-fluid">
      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <form class="form-horizontal" action="{{ route('news.update', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            @if(count($errors) > 0)
            <div class="alert alert-danger" style="margin: 20px;">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Data News</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama" class="control-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $data->name }}">
                        </div>
                        <div class="form-group">
                            <label for="nama" class="control-label">Description</label>
                            <input type="text" class="form-control" name="desc" placeholder="Description" value="{{ $data->desc }}">
                        </div>
                        <div class="form-group">
                            <label for="nama" class="control-label">Image</label>
                            <input type="file" class="form-control image" name="image" accept="image/*" id="image">
                            <img id="preview" src="{{ url('assets/images/news/' . $data->image) }}" alt="Image Preview" width="200" />
                        </div>
                    </div>
                </div>  
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ route('news') }}" class="btn btn-default"><i class="fa fa-close"></i> Back</a>
                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> &nbsp;Submit</button>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- MANAGE CONTENT 4 -->
        </form>
    </section>
    <!-- /.content -->
</div>
@endsection
@section('script')
@include('admin.news.script')
@endsection


@extends('admin.master.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CMS Gallery
        <small>Content Managament System - Gallery</small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Anchoring Content 1</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Gallery List</h3>
              <a href="{{ route('gallery.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> &nbsp;Create </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatables" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5%">No</th>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Description</th>
                  <th width="25%">Action</th>
                </tr>
                </thead>
                <tbody>
                  @php
                    $i = 1;
                  @endphp
                  @foreach ($datas as $data)
                  <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $data->name }}</td>
                  <td><img id="preview" src="{{ url('assets/images/gallery/' . $data->image) }}" alt="Image Preview" width="200" /></td>
                  <td>{{ $data->desc }}</td>
                  <td>
                    <a href="{{ route('gallery.edit', ['id' => $data->id]) }}" type="button" class="btn-sm btn-primary"><i class="fa fa-edit"></i>&nbsp;Edit</a> &nbsp;
                    <a href="{{ route('gallery.delete', ['id' => $data->id]) }}" type="button" class="btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</a> &nbsp;
                  </td>
                  </tr>
                  @php
                    $i++;
                  @endphp
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th width="5%">No</th>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Description</th>
                  <th width="25%">Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('script')
@include('admin.gallery.script')
@endsection

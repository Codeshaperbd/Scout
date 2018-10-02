@extends('layouts.app-admin')


@section('content')


                <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Update Category</h1>
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Dashboard</li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Category</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content">
                    
                    @if(Session::has('CategoryUpdated'))
                        <div class="alert alert-danger alert-size">
                          <strong>{{Session('CategoryUpdated')}}</strong>
                        </div>
                    @endif
                    <!-- Dynamic Table with Export Buttons -->
                    <div class="block block-rounded block-bordered">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Update Category</h3>
                        </div>
                        <div class="block-content block-content-full">

                            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality initialized in js/pages/be_tables_datatables.js -->
                           {!! Form::model($category ,['method'=>'PATCH','action'=>['Admin\AdminCreateCategory@update', $category->id]]) !!}

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name','Name') !!}
                                            {!! Form::text('name',null,['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::submit('Update Category',['class' => 'btn btn-primary']) !!}
                                </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                    <!-- END Dynamic Table with Export Buttons -->

                </div>
                <!-- END Page Content -->



@endsection

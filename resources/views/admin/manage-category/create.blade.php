@extends('layouts.app-admin')


@section('content')


                <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Add New Category</h1>
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Dashboard</li>
                                    <li class="breadcrumb-item active" aria-current="page">Add New Category</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content">
                    

                    <!-- Dynamic Table with Export Buttons -->
                    <div class="block block-rounded block-bordered">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Add New Category</h3>
                        </div>
                        <div class="block-content block-content-full">

                            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality initialized in js/pages/be_tables_datatables.js -->
                            {!! Form::open(['method'=>'POST','action'=>'Admin\AdminCreateCategory@store']) !!}
                            @csrf
                                <div class="careerfy-employer-box-section">
                                    <div class="row careerfy-employer-profile-form">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label>Category Name *</label>
                                                <input placeholder="Category Name" type="text" class="form-control" name="catname">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>.</label> 
                                                <button type="submit" class="btn btn-hero-md btn-square btn-outline-warning mr-1 mb-3 form-control">
                                                  <i class="fa fa-fw fa-pencil-alt"></i> Add New
                                                </button>
                                                
                                            </div>
                                        </div>
                                        
                                                            
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <!-- END Dynamic Table with Export Buttons -->

                </div>
                <!-- END Page Content -->



@endsection

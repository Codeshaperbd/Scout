@extends('layouts.app-admin')


@section('content')


                <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Resumes</h1>
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Dashboard</li>
                                    <li class="breadcrumb-item active" aria-current="page">Resumes</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content">
                    

                    @if(Session::has('resume_updated'))
                      <div class="alert alert-danger alert-size">
                        <strong>{{Session('resume_updated')}}</strong>
                      </div>
                    @endif
                    <!-- Dynamic Table with Export Buttons -->
                    <div class="block block-rounded block-bordered">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">All Resumes</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality initialized in js/pages/be_tables_datatables.js -->
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Title</th>
                                        <th class="d-none d-sm-table-cell">Name</th>
                                        <th class="d-none d-sm-table-cell">Posted</th>
                                        <th class="d-none d-sm-table-cell">Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @if(!empty($resumes))
                                  @php $i=0; @endphp
                                  @foreach($resumes as $resume)
                                  @php $i++; @endphp
                                    <tr>
                                        <td class="text-center">{{$i}}</td>
                                        <td class="font-w600">
                                            <a>{{$resume->job_title}}</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                           <a href="{{ route('manage-users.show',$resume->user->id) }}">{{$resume->user->name}}</a>
                                        </td>
                                        <td>
                                            <em class="text-muted">{{ Carbon\Carbon::parse($resume->created_at)->format('jS M Y') }}</em>
                                        </td>
                                        
                                        <td>
                                            <span class="badge badge badge-primary">
                                              Active
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                              <a href="{{ route('manage-users.show',$resume->user->id) }}">
                                                <button type="button" class="btn btn-sm btn-warning btn-square" data-toggle="tooltip" title="" data-original-title="View">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                              </a>
                                              
                                              <a href="{{ route('manage-resumes.edit',$resume->id) }}">
                                                <button type="button" class="btn btn-sm btn-primary btn-square" data-toggle="tooltip" title="" data-original-title="Edit">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </button>
                                              </a>

                                              <!-- delete button -->
                                              <form id="delete-form-{{ $resume->id }}" method="post" action="{{ route('manage-resumes.destroy',$resume->id) }}" style="display: none">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                              </form>
                                              <a href="" onclick="
                                                if(confirm('Are you sure, You Want to delete this?'))
                                                  {
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $resume->id }}').submit();
                                                  }
                                                  else{
                                                    event.preventDefault();
                                                  }" >
                                                  <button type="button" class="btn btn-sm btn-danger btn-square" data-toggle="tooltip" title="" data-original-title="Delete" aria-describedby="tooltip95923">
                                                  <i class="fa fa-times"></i>
                                                  </button>
                                              </a>

                                            </div>
                                        </td>
                                    </tr>
                                  @endforeach
                                  @endif
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END Dynamic Table with Export Buttons -->
                </div>
                <!-- END Page Content -->



@endsection

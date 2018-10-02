@extends('layouts.app-admin')


@section('content')


                <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">All Employe</h1>
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Dashboard</li>
                                    <li class="breadcrumb-item active" aria-current="page">All Employe</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content">
                    


                      @if(Session::has('broker_updated'))
                        <div class="alert alert-danger alert-size">
                          <strong>{{Session('broker_updated')}}</strong>
                        </div>
                      @endif
                    <!-- Dynamic Table with Export Buttons -->
                    <div class="block block-rounded block-bordered">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">All Employe</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality initialized in js/pages/be_tables_datatables.js -->
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="d-none d-sm-table-cell">Company Name</th>
                                        <th class="d-none d-sm-table-cell">Email</th>
                                        <th class="d-none d-sm-table-cell">Location</th>
                                        <th class="d-none d-sm-table-cell">Registation Date</th>
                                        <th class="d-none d-sm-table-cell">Status</th> 
                                        <th class="d-none d-sm-table-cell">Job Post</th> 
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @if(!empty($allemploye))
                                  @php $i = 0 @endphp
                                  @foreach($allemploye as $employe)
                                  @php $i++ @endphp
                                    <tr>
                                        <td class="text-center">{{$i}}</td>
                                        <td class="font-w600">
                                            <a href="{{ route('manage-users.show',$employe->user->id) }}">{{ $employe->name }}</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                           <a href="{{ route('manage-users.edit',$employe->user->id) }}">{{ $employe->user->email }}</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            {{ $employe->user->UserLocation->geo_tagging }}
                                            
                                        </td>
                                        <td>
                                            <em class="text-muted">{{ Carbon\Carbon::parse($employe->created_at)->format('jS M Y') }}</em>
                                        </td>
                                        
                                        <td>
                                            @if($employe->user->is_active == 1)
                                            <span class="badge badge badge-primary">
                                              Active
                                            </span>
                                            @else 
                                            <span class="badge badge badge-danger">
                                              Inactive
                                            </span>
                                            @endif
                                        </td>
                                        <td>
                                          @php
                                            $totalJob = \App\JobPost::where('broker_info_id',$employe->id)->get();
                                          @endphp
                                            <a href="{{route('company-job-post',$employe->id)}}">{{count($totalJob)}} job(s)</a>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                              <a href="{{ route('manage-users.show',$employe->user->id) }}">
                                                <button type="button" class="btn btn-sm btn-warning btn-square" data-toggle="tooltip" title="" data-original-title="View">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                              </a>
                                              
                                              <a href="{{ route('manage-employe.edit',$employe->id) }}">
                                                <button type="button" class="btn btn-sm btn-primary btn-square" data-toggle="tooltip" title="" data-original-title="Edit">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </button>
                                              </a>
                                              
                                              <!-- delete button -->
                                              <form id="delete-form-{{ $employe->id }}" method="post" action="{{ route('manage-employe.destroy',$employe->id) }}" style="display: none">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                              </form>
                                              <a href="" onclick="
                                                if(confirm('Are you sure, You Want to delete this?'))
                                                  {
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $employe->id }}').submit();
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

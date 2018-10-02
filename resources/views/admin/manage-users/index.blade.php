@extends('layouts.app-admin')


@section('content')


                <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Users</h1>
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Dashboard</li>
                                    <li class="breadcrumb-item active" aria-current="page">Users</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content">
                    


                    @if(Session::has('deleteUser'))
                      <div class="alert alert-danger alert-size">
                        <strong>{{Session('deleteUser')}}</strong>
                      </div>
                    @endif
                    
                    <!-- Dynamic Table with Export Buttons -->
                    <div class="block block-rounded block-bordered">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">All User</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality initialized in js/pages/be_tables_datatables.js -->
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="d-none d-sm-table-cell">Name</th>
                                        <th class="d-none d-sm-table-cell">Email</th>
                                        <th class="d-none d-sm-table-cell">Phone</th>
                                        <th class="d-none d-sm-table-cell">Registration Date</th>
                                        <th class="d-none d-sm-table-cell">Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @if(!empty($users))
                                  @php $i=0; @endphp
                                  @foreach($users as $user)
                                  @php $i++ @endphp
                                    <tr>
                                        <td class="text-center">{{$i}}</td>
                                        <td class="font-w600">
                                            <a href="be_pages_generic_blank.html">{{$user->name}}</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                           <a href="mailto:{{$user->email}}">{{$user->email}}</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                           <a href="tel:{{$user->number}}">{{$user->number}}</a>
                                        </td>
                                        <td>
                                            <em class="text-muted">{{ Carbon\Carbon::parse($user->created_at)->format('jS M Y') }}</em>
                                        </td>
                                        
                                        <td>
                                            @if($user->role_id == 1)
                                            <span class="badge badge badge-danger">
                                              Agent
                                            </span>
                                            @endif 

                                            @if($user->role_id == 2)
                                            <span class="badge badge badge-danger">
                                              Broker
                                            </span>
                                            @endif

                                            @if($user->is_active == 1)
                                            <span class="badge badge badge-primary">
                                              Active
                                            </span>
                                            @else 
                                            <span class="badge badge badge-danger">
                                              Inactive
                                            </span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                              <a href="{{ route('manage-users.show',$user->id) }}">
                                                <button type="button" class="btn btn-sm btn-warning btn-square" data-toggle="tooltip" title="" data-original-title="View User Details">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                              </a>
                                              
                                              <a href="{{ route('manage-users.edit',$user->id) }}">
                                                <button type="button" class="btn btn-sm btn-primary btn-square" data-toggle="tooltip" title="" data-original-title="Edit">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </button>
                                              </a>

                                              <!-- delete button -->
                                              <form id="delete-form-{{ $user->id }}" method="post" action="{{ route('manage-users.destroy',$user->id) }}" style="display: none">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                              </form>
                                              <a href="" onclick="
                                                if(confirm('Are you sure, You Want to delete this?'))
                                                  {
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $user->id }}').submit();
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

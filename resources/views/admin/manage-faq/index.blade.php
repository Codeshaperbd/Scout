@extends('layouts.app-admin')


@section('content')


                <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">All FAQ</h1>
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Dashboard</li>
                                    <li class="breadcrumb-item active" aria-current="page">All FAQ</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content">
                    
                      
                      
                      @if(Session::has('deletepost'))
                        <div class="alert alert-danger alert-size">
                          <strong>{{Session('deletepost')}}</strong>
                        </div>
                      @endif
                    
                      @if(Session::has('create_faq'))
                        <div class="alert alert-danger alert-size">
                          <strong>{{Session('create_faq')}}</strong>
                        </div>
                      @endif

                    <!-- Dynamic Table with Export Buttons -->
                    <div class="block block-rounded block-bordered">
                        <div class="block-header block-header-default">
                            <h3 class="block-title"> FAQ</h3>
                        </div>
                        <div class="block-content block-content-full">

                            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality initialized in js/pages/be_tables_datatables.js -->
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="d-none d-sm-table-cell">Question</th>
                                        <th class="d-none d-sm-table-cell">Answer</th>
                                        <th class="d-none d-sm-table-cell">FAQ For</th> 
                                        <th class="d-none d-sm-table-cell">Status</th> 
                                        <th class="d-none d-sm-table-cell">Created At</th> 
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @if(!empty($faqs))
                                  @php $i = 0 @endphp
                                  @foreach($faqs as $faq)
                                  @php $i++ @endphp
                                    <tr>
                                        <td class="text-center">{{$i}}</td>
                                        <td class="font-w600">
                                           {{ $faq->question }}
                                        </td>
                                        <td class="font-w600">
                                           {{str_limit(strip_tags($faq->answer),100)}}
                                        </td>
                                        <td class="font-w600">
                                          @if($faq->faq_for == 'agent')
                                            <span class="badge badge badge-success">
                                              {{$faq->faq_for}}
                                            </span>
                                          @else 
                                            <span class="badge badge badge-warning">
                                              {{$faq->faq_for}}
                                            </span>
                                          @endif
                                        </td>
                                        <td class="font-w600">
                                          @if($faq->status == 1)
                                            <span class="badge badge badge-primary">
                                              Active
                                            </span>
                                          @else 
                                            <span class="badge badge badge-danger">
                                              Inactive
                                            </span>
                                          @endif
                                        </td>
                                        <td class="font-w600">
                                           {{ Carbon\Carbon::parse($faq->created_at)->format('jS M Y') }}
                                        </td>
                                        <td class="font-w600">
                                              <a href="{{ route('faq.edit',$faq->id) }}">
                                                <button type="button" class="btn btn-sm btn-primary btn-square" data-toggle="tooltip" title="" data-original-title="Edit FAQ">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </button>
                                              </a>
                                              <!-- delete button -->
                                              <form id="delete-form-{{ $faq->id }}" method="post" action="{{ route('faq.destroy',$faq->id) }}" style="display: none">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                              </form>
                                              <a href="" onclick="
                                                if(confirm('Are you sure, You Want to delete this?'))
                                                  {
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $faq->id }}').submit();
                                                  }
                                                  else{
                                                    event.preventDefault();
                                                  }" >
                                                  <button type="button" class="btn btn-sm btn-danger btn-square" data-toggle="tooltip" title="" data-original-title="Delete FAQ" aria-describedby="tooltip95923">
                                                  <i class="fa fa-times"></i>
                                                  </button>
                                              </a>
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

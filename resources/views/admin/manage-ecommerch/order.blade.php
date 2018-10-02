@extends('layouts.app-admin')


@section('content')


                <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">All Order</h1>
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Dashboard</li>
                                    <li class="breadcrumb-item active" aria-current="page">All Order</li>
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
                            <h3 class="block-title">All Order</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality initialized in js/pages/be_tables_datatables.js -->
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                                <thead>
                                    <tr>
                                        <th class="text-center">Invoice#</th>
                                        <th class="d-none d-sm-table-cell">Customer Name</th>
                                        <th class="d-none d-sm-table-cell">Job Title</th>
                                        <th class="d-none d-sm-table-cell">Date</th>
                                        <th class="d-none d-sm-table-cell">Payment Method</th>
                                        <th class="d-none d-sm-table-cell">Total</th> 
                                        <th class="d-none d-sm-table-cell">Status</th> 
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @if(!empty($subscriptions))
                                  @php $i = 0 @endphp
                                  @foreach($subscriptions as $subscription)
                                  @php $i++ @endphp
                                    <tr>
                                        <td class="text-center">{{$i}}</td>
                                        <td class="font-w600">
                                          @if(!empty($subscription->PaymantDetails->JobPost))
                                                <a href="{{ route('manage-users.edit',$subscription->PaymantDetails->JobPost->BrokerInfo->user->id ) }}">{{ $subscription->PaymantDetails->JobPost->BrokerInfo->user->name }}</a>
                                            @else
                                           This User Is No Longer With Us
                                          @endif
                                        </td>
                                        <td class="font-w600">

                                          @if(!empty($subscription->PaymantDetails->JobPost))
                                            <a href="{{ route('manage-jobs.edit',$subscription->PaymantDetails->JobPost->id) }}">{{ $subscription->PaymantDetails->JobPost->title }}</a>
                                          @else
                                           This Post Is No Longer
                                          @endif
                                        </td>
                                        <td class="font-w600">
                                           {{ Carbon\Carbon::parse($subscription->created_at)->format('jS M Y') }}
                                        </td>
                                        <td class="font-w600">
                                          @if(!empty($subscription->PaymantDetails->card_brand))
                                           {{ $subscription->PaymantDetails->card_brand }}
                                          @else
                                            Undefine
                                          @endif
                                        </td>
                                        <td class="font-w600">
                                          @if($subscription->name == 'Sprout')
                                           <span>$100</span>
                                          @elseif($subscription->name == 'Grow')
                                           <span>$200</span>
                                          @elseif($subscription->name == 'Flourish')
                                           <span>$200</span>
                                          @else
                                           <span>$0.00</span>
                                          @endif

                                        </td>
                                        <td class="font-w600">
                                          @if(!empty($subscription->PaymantDetails))
                                           <span class="badge badge badge-primary">
                                              Paid
                                            </span>
                                          @else
                                           <span class="badge badge badge-primary">
                                              Pending
                                            </span>
                                          @endif
                                        </td>
                                        <td class="font-w600">
                                              <a href="">
                                                <button type="button" class="btn btn-sm btn-primary btn-square" data-toggle="tooltip" title="" data-original-title="View Invoice">
                                                    <i class="fa fa-eye"></i>
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

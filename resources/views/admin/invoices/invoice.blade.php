@extends('layouts.admin')
@section('content')

    <div class="card ">
        <div class="card-header">
            Order Invoice
        </div>

        <div class="card-body">
            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

            <div id="print_content" class="page-content container">
                <div class="page-header text-blue-d2">
                    <h1 class="page-title text-secondary-d1">
                        Invoice
                        <small class="page-info">
                            NO -
                            {{--                <i class="fa fa-file text-80"></i> --}}
                            <strong>{{ $invoice->order_no }}</strong>
                        </small>
                    </h1>

                    <div class="page-tools">
                        <div class="action-buttons">
                            {{--                            @if (Auth::user()->id == 1) --}}
                            {{--                                @if ($invoice->is_approved == 0) --}}
                            {{--                                    <a class="btn bg-white btn-light mx-1px text-95 btn-print" href="{{url('admin/orders/'. $invoice->id .'/approve')}}" data-title="Print"> --}}
                            {{--                                        <i class="mr-1 fa fa-check-circle text-success text-120 w-2"></i> --}}
                            {{--                                        Approve Order --}}
                            {{--                                    </a> --}}
                            {{--                                @endif --}}
                            {{--                            @endif --}}
                            {{--                <a class="btn bg-white btn-light mx-1px text-95 btn-print" href="{{url('orders/'. $invoice->id .'/approve')}}" data-title="Print"> --}}
                            {{--                    <i class="mr-1 fa fa-times-circle text-danger-m1  text-120 w-2"></i> --}}
                            {{--                    Reject --}}
                            {{--                </a> --}}
                            <a class="btn bg-white btn-light mx-1px text-95 btn-print" href="#" data-title="Print">
                                <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                                Print
                            </a>
                        </div>
                    </div>
                </div>

                <div class="container px-0">
                    <div class="row mt-4">
                        <div class="col-12 col-lg-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="c-sidebar-brand ">
                                        {{--                                        <img  style="padding: 10px; width: 150px;" src="{{asset('/assets/hubco_dark_text.png')}}"/> --}}
                                        <h1>Extreme Residential</h1>
                                    </div>
                                </div>
                            </div>

                            <!-- .row -->

                            <hr class="row brc-default-l1 mx-n1 mb-4" />

                            <div class="row">
                                <div class="col-sm-6">
                                    <div>
                                        <span class="text-sm text-grey-m2 align-middle">To:</span>
                                        <span
                                            class="text-600 text-110 text-blue align-middle">{{ $invoice->account }}</span>
                                    </div>

                                    <div class="text-grey-m2">
                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                                class="text-600 text-90">Order No:</span> {{ $invoice->order_no }}</div>

                                        {{--                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Distributor:</span> {{$invoice->vendor->distributor}}</div> --}}
                                        {{--                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Payment:</span> {{ strtoupper($invoice->order_type) ?? '' }}</div> --}}

                                        {{--                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Delivery:</span> <span class="badge badge-warning badge-pill px-25">{{ $invoice->expected_delivery ?? '' }}</span></div> --}}
                                        {{--                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Category:</span> {{ $invoice->category ?? '' }}</div> --}}
                                        {{--                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> --}}
                                        {{--                                            <span class="text-600 text-90">Approval Status:</span> --}}
                                        {{--                                            <span class="badge {{ $invoice->is_approved == 1 ? 'badge-success' : 'badge-warning' }} badge-pill px-25">{{ $invoice->is_approved == 1 ? 'Approved' : 'Pending' }}</span> --}}
                                        {{--                                            </span> --}}
                                        {{--                                        </div> --}}
                                        {{--                                        @if ($invoice->is_approved == 1) --}}
                                        {{--                                            <span class="d-none">{{$approved_by = \App\Models\User::find($invoice->approved_by_id)}}</span> --}}

                                        {{--                                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> --}}
                                        {{--                                                <span class="text-600 text-90">Approved By:</span> --}}
                                        {{--                                                <span class="badge badge-info badge-pill px-25">{{ $approved_by->name ?? '' }}</span> --}}
                                        {{--                                                </span> --}}
                                        {{--                                            </div> --}}
                                        {{--                                        @endif --}}

                                    </div>
                                </div>
                                <!-- /.col -->

                            </div>

                            <div class="mt-4">

                                <div class="row border-b-2 brc-default-l2"></div>

                                <!-- or use a table instead -->

                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm" id="productTable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Product Description</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Unit Price ($)</th>
                                                <th scope="col">Total Price</th>
                                            </tr>
                                        </thead>

                                        <tbody id="productTableBody">
                                            @foreach ($invoice->products as $key => $product)
                                                <tr>
                                                    <td>{{ $product->product_name }} - {{ $product->code }}</td>
                                                    <td>{{ $product->quantity }}</td>
                                                    <td>{{ $product->product_price }}</td>
                                                    <td>{{ $product->total_price }}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr class="text-right">
                                                <td colspan="3">
                                                    <h4>Subtotal</h4>
                                                </td>
                                                <td>
                                                    <h4 id="total_subtotal_price">{{ $invoice->subtotal }}</h4>
                                                </td>
                                            </tr>
                                            <tr class="text-right">
                                                <td colspan="3">
                                                    <h4>Shipping</h4>
                                                </td>
                                                <td>
                                                    <h4 id="total_shipping_price">{{ $invoice->delivery_charges }}</h4>
                                                </td>
                                            </tr>
                                            <tr class="text-right">
                                                <td colspan="3">
                                                    <h4>Tax</h4>
                                                </td>
                                                <td>
                                                    <h4 id="total_tax">{{ $invoice->tax }}</h4>
                                                </td>
                                            </tr>

                                            <tr class="text-right">
                                                <td colspan="3">
                                                    <h4>Total</h4>
                                                </td>
                                                <td>
                                                    <h1 id="total_price">{{ $invoice->total }}</h1>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    body {
                        margin-top: 20px;
                        color: #484b51;
                    }

                    .text-secondary-d1 {
                        color: #728299 !important;
                    }

                    .page-header {
                        margin: 0 0 1rem;
                        padding-bottom: 1rem;
                        padding-top: .5rem;
                        border-bottom: 1px dotted #e2e2e2;
                        display: -ms-flexbox;
                        display: flex;
                        -ms-flex-pack: justify;
                        justify-content: space-between;
                        -ms-flex-align: center;
                        align-items: center;
                    }

                    .page-title {
                        padding: 0;
                        margin: 0;
                        font-size: 1.75rem;
                        font-weight: 300;
                    }

                    .brc-default-l1 {
                        border-color: #dce9f0 !important;
                    }

                    .ml-n1,
                    .mx-n1 {
                        margin-left: -.25rem !important;
                    }

                    .mr-n1,
                    .mx-n1 {
                        margin-right: -.25rem !important;
                    }

                    .mb-4,
                    .my-4 {
                        margin-bottom: 1.5rem !important;
                    }

                    hr {
                        margin-top: 1rem;
                        margin-bottom: 1rem;
                        border: 0;
                        border-top: 1px solid rgba(0, 0, 0, .1);
                    }

                    .text-grey-m2 {
                        color: #888a8d !important;
                    }

                    .text-success-m2 {
                        color: #86bd68 !important;
                    }

                    .font-bolder,
                    .text-600 {
                        font-weight: 600 !important;
                    }

                    .text-110 {
                        font-size: 110% !important;
                    }

                    .text-blue {
                        color: #478fcc !important;
                    }

                    .pb-25,
                    .py-25 {
                        padding-bottom: .75rem !important;
                    }

                    .pt-25,
                    .py-25 {
                        padding-top: .75rem !important;
                    }

                    .bgc-default-tp1 {
                        background-color: rgba(121, 169, 197, .92) !important;
                    }

                    .bgc-default-l4,
                    .bgc-h-default-l4:hover {
                        background-color: #f3f8fa !important;
                    }

                    .page-header .page-tools {
                        -ms-flex-item-align: end;
                        align-self: flex-end;
                    }

                    .btn-light {
                        color: #757984;
                        background-color: #f5f6f9;
                        border-color: #dddfe4;
                    }

                    .w-2 {
                        width: 1rem;
                    }

                    .text-120 {
                        font-size: 120% !important;
                    }

                    .text-primary-m1 {
                        color: #4087d4 !important;
                    }

                    .text-danger-m1 {
                        color: #dd4949 !important;
                    }

                    .text-blue-m2 {
                        color: #68a3d5 !important;
                    }

                    .text-150 {
                        font-size: 150% !important;
                    }

                    .text-60 {
                        font-size: 60% !important;
                    }

                    .text-grey-m1 {
                        color: #7b7d81 !important;
                    }

                    .align-bottom {
                        vertical-align: bottom !important;
                    }


                    @media print {
                        .action-buttons {
                            display: none;
                        }
                    }
                </style>
            </div>
        </div>
    </div>

@section('scripts')
    <script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"></script>
    <script>
        $(document).ready(function() {
            $('.btn-print').click(function() {
                var divToPrint = document.getElementById('print_content');
                var htmlToPrint = divToPrint.outerHTML;
                $("#print_content").print();

            })
        })
    </script>
@endsection
@endsection

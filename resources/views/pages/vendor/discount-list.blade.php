@extends('layouts.master')

@section('styles')
    <style>
        .right-0 {
            right:0 !important;
            height:100% !important;
            left:initial !important;
            top: 64px !important;
            width: 320px !important;
        }
        .right {
            float: right !important;
            margin: -73px 0 0 0;
        }
        #chart-dashboard {

            padding-bottom: 60px;
        }
        ul.category_button{
            list-style-type:none;
            white-space:nowrap;
            overflow-x:auto;
            padding:20px 0
        }
        .rightside-navigation {
            overflow: auto !important;
        }
        ul.category_button li{
            display:inline;
        }
        .chat-out-list {
            padding:10px 0 !important;
        }
        footer.page-footer {
            padding-top: 0px;
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 9;
        }
        #main, footer {
            padding: 0 !important;
        }
        .side-nav{
            top: 65px !important;
        }
        .rightside-navigation {
            overflow: hidden !important;
        }
        .bordered th {

            width: 14.33% !important;
        }
        .item_qty a, .item_qty span {
            float: left;
            padding: 0 8px !important;
            cursor: pointer;
        }
        .sidebar-collapse {
            background-color: #ff4081 !important;
        }
        .card {
            position: relative;
            overflow: hidden;
            margin: 10px 0 !important;
            background-color: #fff;
            border-radius: 2px;
            box-shadow: none !important;
        }

        table.dataTable tbody th, table.dataTable tbody td {
            padding: 0 !important;
            background: none !important;
        }
    </style>
@endsection

@section('content')
    @include('vendors.left-sidebar')
    <section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper" class=" grey lighten-3">
            <div class="container">
                <div class="row">
                    <div class="col s12 m12 l12">
                        <h5 class="breadcrumbs-title">Basic Tables</h5>
                        <ol class="breadcrumb">
                            <li><a href="index.html">Dashboard</a></li>
                            <li><a href="#">Tables</a></li>
                            <li class="active">Basic Tables</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
            <div class="section">

                <p class="caption">Tables are a nice way to organize a lot of data. We provide a few utility classes to help you style your table as easily as possible. In addition, to improve mobile experience, all tables on mobile-screen widths are centered automatically.</p>
                <div class="divider"></div>

                <!--DataTables example-->
                <div id="table-datatables">
                    <h4 class="header">DataTables example</h4>
                    <div class="row">

                        <div class="col s12 m12 32">
                            <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Discount Percent</th>
                                    <th>Discount Amount</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($discounts as $discount)
                                    <tr>
                                        <td>{{ $discount->start_date }}</td>
                                        <td>{{ $discount->end_date }}</td>
                                        <td>{{ $discount->percentage }}</td>
                                        <td>{{ $discount->amount }}</td>
                                        <td><a href="{{ route('discounts.edit', ['id' => $discount->id ]) }}">Edit</a></td>
                                        <td><a href="{{ route('discounts.destroy',['id' => $discount->id ] ) }}"> Delete</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                <div class="divider"></div>
                <!--DataTables example Row grouping-->



            </div>

        </div>
        <!--end container-->

    </section>
@endsection

@section('scripts')
@endsection
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
        <div class="container">
            <div class="section">
                <div class="row">
                    <div class="col s12 m12 l6">
                        <div class="card-panel">
                            <h4 class="header2">Add/Edit Discount</h4>
                            <div class="row">
                                <form class="col s12" method="post" action="{{ route('postDiscount') }}">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="input-field col s12">
                                            <i class="mdi-action-account-circle prefix"></i>
                                            <input id="min_bal" value="{{ $discount->min_bal or '' }}" name="min_bal" type="text" class="validate">
                                            <label for="min_bal">Min Bal</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="mdi-action-account-circle prefix"></i>
                                            <input id="max_bal" value="{{ $discount->max_bal or '' }}" name="max_bal" type="text" class="validate">
                                            <label for="max_bal">Max Bal</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="mdi-communication-email prefix"></i>
                                            <input id="start_date" name="start_date" value="{{ $discount->start_date or '' }}" type="date" class="validate">
                                            <label for="start_date">Start Date</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="mdi-action-question-answer prefix"></i>
                                            <input id="end_date" name="end_date" value="{{ $discount->end_date or '' }}" type="date" class="validate">
                                            <label for="end_date">End Date</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>
                                            <input id="percentage" name="percentage" value="{{ $discount->percentage or '' }}" type="number" class="validate">
                                            <label for="percentage">Percentage</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>
                                            <input id="amount" name="amount" value="{{ $discount->amount or '' }}" type="number" class="validate">
                                            <label for="email">Amount</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>
                                            <input id="min_trans" name="min_trans" value="{{ $discount->min_trans or '' }}" type="number" class="validate">
                                            <label for="min_trans">Minimum Transactions</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>
                                            <input id="max_trans" name="max_trans" value="{{ $discount->max_trans or '' }}" type="number" class="validate">
                                            <label for="max_trans">Maximum Transactions</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>
                                            <input id="usage" name="usage" value="{{ $discount->usage or '' }}" type="number" class="validate">
                                            <label for="usage">Usage</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>
                                            @foreach($items as $item)
                                            <input id="{{ $item->id }}" name="items[]" value="{{ $item->id }}" type="checkbox" class="validate">{{ $item->name }}
                                            <label for="{{ $item->id }}"></label>
                                            <br>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>
                                            <textarea id="users" name="users[]" class="materialize-textarea validate" length="120"></textarea>
                                            <label for="users">Users</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                                                <i class="mdi-content-send right"></i>
                                            </button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
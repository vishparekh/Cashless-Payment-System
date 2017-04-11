<?php
    if(isset($discount))
    {
        $action = route('discounts.update',['discount' => $discount->id]);
        $ad = method_field('PUT');
    }
    else
    {
        $ad="";
        $action = route('discounts.store');
    }
?>

@extends('layouts.master')

@section('styles')
    
@endsection

@section('content')
    @include('sidebars.vendor')
    <section id="content">
        <div class="container">
            <div class="section">
                <div class="row">
                    <div class="col s12 m12 l6">
                        <div class="card-panel">
                            <h4 class="header2">Add/Edit Discount</h4>
                            <div class="row">
                                <form class="col s12" method="post" action="{{ $action }}">
                                    {{ csrf_field() }}
                                    {{ $ad }}
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
                                            <input id="min_bal" value="{{ $discount->min_bal or '' }}" name="min_bal" type="text" class="validate">
                                            <label for="min_bal">Min Bal</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="max_bal" value="{{ $discount->max_bal or '' }}" name="max_bal" type="text" class="validate">
                                            <label for="max_bal">Max Bal</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="start_date" name="start_date" value="{{ $discount->start_date or '' }}" type="text" class="validate">
                                            <label for="start_date">Start Date</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="end_date" name="end_date" value="{{ $discount->end_date or '' }}" type="text" class="validate">
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
                                            <textarea id="users" name="users" class="materialize-textarea validate" length="120"></textarea>
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
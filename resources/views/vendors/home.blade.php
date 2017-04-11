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
                <div id="table-datatables">
                    <div class="row">
                        <div class="col s12 m9 l9">
                            <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                                <thead>
                                <tr>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($items as $item)
                                        <tr class="col s12 m2 l2">
                                            <td>
                                                <div class="card blue" id="action-{{ $item->id }}" item-name="{{ $item->name }}" item-amount="{{ $item->amount }}" style="color:#fff;">
                                                    <div class="card-content">
                                                        <p>{{ $item->name }}</p>
                                                    </div>
                                                    <div class="card-action ">
                                                        <a onclick="addItem('{{ $item->id }}', '{{ $item->name }}', '{{ $item->amount }}')" class="waves-effect waves-light  btn white"> Rs.{{ $item->amount }}</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <ul id="chat-out" class="side-nav rightside-navigation right-0">
                            <li class="li-hover">
                                <ul class="chat-collapsible" data-collapsible="expandable">
                                    <li>
                                        <div class="collapsible-header light-blue white-text active"><i class="mdi-action-account-circle"></i>Customer Details</div>
                                        <div class="collapsible-body sales-repoart">
                                            <div class="sales-repoart-list  chat-out-list row">
                                                <div class="col s3" style="text-transform:uppercase;font-weight:bold;">RFID</div>
                                                <input type="text" id="rfid" class="col s9">
                                            </div>
                                            <div class="sales-repoart-list chat-out-list row">
                                                <div class="col s3" style="text-transform:uppercase;font-weight:bold;">Name</div>
                                                <div id="buyer-name" class="col s9">
                                                </div>
                                            </div>
                                            <div class="sales-repoart-list chat-out-list row">
                                                <div class="col s3" style="text-transform:uppercase;font-weight:bold;">Bal.</div>
                                                <div id="buyer-amount" class="col s9">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="collapsible-header teal white-text active"><i class="mdi-social-whatshot"></i>Order Details</div>
                                        <div class="collapsible-body recent-activity" style="padding:9px 5px">
                                            <form  action="{{ route('confirm') }}" name="sampleForm" method="post">
                                            <table class="bordered" id="myTable">

                                                <thead>
                                                    <tr>
                                                        <th data-field="name">Name</th>
                                                        <th data-field="price">Rate</th>
                                                        <th data-field="price">Qty</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td>Total</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td><button type="button" onclick="confirm()" style="margin-bottom: 50px;"  class="btn waves-effect waves-light indigo" >Confirm</button></td>
                                                    </tr>
                                                    <tr>
                                                        <input type="hidden" id="items-array" name="items[]" value="">
                                                        {{ csrf_field() }}                                                    </tr>
                                                </tfoot>
                                            </table>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="application/javascript">
        var cart = {};
        jQuery(document).ready(function() {
            jQuery("div[id^='action-']").click(function () {
                var item_name = jQuery(this).attr('item-name');
                var item_amount = jQuery(this).attr('item-amount');
                //jQuery('#myTable').append('<tr><td>'+item_name+'</td><td>'+item_amount+'</td><td><i class="fa fa-minus"></i> 1 <i class="fa fa-plus"></i> &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-trash-o"></i>  </td></tr>');
            });
            $(document).on("keypress", "#rfid", function(e) {
                if (e.which == 13) {
                    var rfid = jQuery(this).val();
                    $.ajax({
                        type:'POST',
                        url:'getUser',
                        data:{'_token': '<?php echo csrf_token() ?>',
                            'rfid': rfid
                        },
                        success:function(data){
                            //console.log(data);
                            //alert(data.name);
                            console.log(data);
                            jQuery("#buyer-name").append(data.user['name']);
                            jQuery("#buyer-amount").append(data.user['balance']);
                           // jQuery("#buyer-amount").append("Rs."+data.balance);
                        }
                    });
                }
            });
        });
        function addItem(item_id, item_name, item_amount)
        {
            if(cart[item_id] != null)
            {
                cart[item_id]['item_qty']++;
                jQuery("#qty-"+item_id).text(cart[item_id]['item_qty']);

            }
            else
            {
                cart[item_id] = {"item_id":item_id, "item_name":item_name, "item_amount":item_amount, "item_qty":1};
                jQuery('#myTable').append('<tr id="item-'+item_id+'"><td>'+item_name+'</td><td>'+item_amount+'</td><td class="item_qty"><a onclick="minusItem('+item_id+')"><i class="fa fa-minus"></i></a><span id="qty-'+item_id+'"> 1 </span><a onclick="plusItem('+item_id+')"><i class="fa fa-plus" ></i></a> &nbsp;&nbsp;&nbsp;&nbsp; <a onclick="deleteItem('+item_id+')"><i class="fa fa-trash-o"></i></a></td></tr>');
            }
            //var item = [{"item_id":item_id},{"item_name":item_name},{"item_amount":item_amount},{"item_qty":1}];
            //console.log(item);
            //cart.push(item);
            console.log(cart);

            //alert('addItem called');
            /*$.ajax({
                type:'POST',
                url:'addItem',
                data:{'_token': '<?php echo csrf_token() ?>',
                      'item_id': item_id,
                },
                success:function(data){
                        //alert("hi");
                   // $("#msg").html(data.msg);
                }
            });*/


        }

        function minusItem(item_id)
        {
            if(cart[item_id]['item_qty'] == 1)
            {
                deleteItem(item_id);
            }
            else
            {
                cart[item_id]['item_qty']--;
                jQuery("#qty-"+item_id).text(cart[item_id]['item_qty']);
            }

            //console.log(cart);


        }

        function plusItem(item_id)
        {
            cart[item_id]['item_qty']++;
            jQuery("#qty-"+item_id).text(cart[item_id]['item_qty']);

            //console.log(cart);

        }

        function deleteItem(item_id)
        {
            //delete cart['+item_id+'];
//            var i = cart.indexOf(item_id);
//            if(i != -1) {
//                array.splice(i, 1);
//            }
            cart[item_id]['item_qty'] = 0;
            jQuery("#qty-"+item_id).text(cart[item_id]['item_qty']);
            jQuery("#item-"+item_id).remove();
            cart[item_id] = null;


            console.log(cart);
        }
        
        function confirm()
        {
            console.log(cart);
            //alert("confirm");
            jQuery("#items-array").val(JSON.stringify(cart));
            //document.sampleForm.items[].value = cart;
            document.forms["sampleForm"].submit();
        }




        $('#data-table-simple').dataTable( {
            "pageLength": 12
        } );
        @if(session('status'))
        setTimeout(function() {
            Materialize.toast('<span>{{ session('status') }}</span>', 1500);
        }, 3000);
        @endif
    </script>
@endsection
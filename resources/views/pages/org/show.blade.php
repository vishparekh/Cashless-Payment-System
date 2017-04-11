@extends('layouts.userlayout')


@section('right-sidebar')
<section id="content">
        
        <!--breadcrumbs start-->
       
        <!--breadcrumbs end-->
        

        <!--start container-->
        <div class="container">
          <div class="section">

            
            <div class="divider"></div>
            
            <!--DataTables example-->
            <div id="table-datatables">
              <h4 class="header">Organization&nbsp;&nbsp;&nbsp;
              @can('update', $org) 
                EDIT
                <button>
                <a class="btn-floating btn-small red" href="{{ route('orgs.edit',['org'=>$org->id]) }}">
                  <i class="small mdi-editor-mode-edit"></i>
                </a>
                </button>&nbsp;&nbsp;&nbsp;
              @endcan
               @can('delete', $org)
                <form method="post" action="{{ route('orgs.destroy',['org'=>$org->id]) }}">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;DELETE
                    {{ csrf_field() }}
                     {{ method_field('DELETE') }}
                    <button type="submit">
                      <a class="btn-floating waves-effect waves-light ">
                        <i class="mdi-content-clear">
                        </i>
                      </a>
                    </button>
                 </form>
                @endcan
              </h4>
              <div class="row">
                
                <div class="col s12 m8 l9">
                  <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                  
                 
                    <tbody>

                        <tr>
                            <td>Name</td>
                            <td>{{ $org->user->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $org->user->email }}</td>
                        </tr>
                        <tr>
                            <td>Mobile</td>
                            <td>{{ $org->user->mobile }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $org->address }}</td>
                        </tr>
                        <tr>
                            <td>Plan</td>
                            <td>{{ $org->plan->name }}</td>
                        </tr>
                        <tr>
                            <td>Maximum Vendor</td>
                            <td>{{ $org->max_vendors }}</td>
                        </tr>
                        <tr>
                            <td>Maximum Buyer</td>
                            <td>{{ $org->max_buyers }}</td>
                        </tr>
                        <tr>
                            <td>Amount</td>
                            <td>{{ $org->amount }} &nbsp;&nbsp;Rs. Per Month</td>
                        </tr>

                        <tr>
                            <td>UI OR API</td>
                            <td>
                              @if( $org->ui_required==true)
                                UI
                              @else
                                API
                              @endif
                            </td>
                        </tr>
                        
                        
                        
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
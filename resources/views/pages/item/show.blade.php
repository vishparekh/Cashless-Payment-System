@extends('layouts.userlayout')

@section('left-sidebar')
    @include('sidebars.superadmin')
@endsection

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
              <h4 class="header">item&nbsp;&nbsp;&nbsp;
              @can('update', $item)  
                EDIT
                <button>
                <a class="btn-floating btn-small red" href="{{ route('items.edit',['item'=>$item->id]) }}">
                  <i class="small mdi-editor-mode-edit"></i>
                </a>
                </button>&nbsp;&nbsp;&nbsp;
               @endcan   
               @can('delete', $item)
                <form method="post" action="{{ route('items.destroy',['item'=>$item->id]) }}">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DELETE
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
                      @if(\Auth::user()->isSuperAdmin())
                        <tr>
                         
                            <td>Organization</td>
                            <td>{{ $item->vendor->org->user->name }}</td>
                        </tr>
                      @endif
                      @if(\Auth::user()->isSuperAdmin() || \Auth::user()->isOrg())
                         <tr>
                            <td>Vendor</td>
                            <td>{{ $item->vendor->user->name }}</td>
                        </tr>
                      @endif

                        <tr>
                            <td>Name</td>
                            <td>{{ $item->name }}</td>
                        </tr>
                        <tr>
                            <td>Amount</td>
                            <td>{{ $item->amount }}</td>
                        </tr>

                        <tr>
                            <td>show to Users</td>
                            <td>
                              @if( $item->show==true)
                                YES
                              @else
                                NO
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
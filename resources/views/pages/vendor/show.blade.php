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
              <h4 class="header">Vendor&nbsp;&nbsp;&nbsp;
              @can('update', $vendor)
              EDIT
                <button>
                <a class="btn-floating btn-small red" href="{{ route('vendors.edit',['vendor'=>$vendor->id]) }}">
                  <i class="small mdi-editor-mode-edit"></i>
                </a>
                </button>
              &nbsp;&nbsp;&nbsp;
              @endcan
              @can('delete', $vendor)
                <form method="post" action="{{ route('vendors.destroy',['vendor'=>$vendor->id]) }}">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DELETE
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
                            <td>{{ $vendor->org->user->name }}</td>
                        </tr>
                      @endif

                        <tr>
                            <td>Name</td>
                            <td>{{ $vendor->user->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $vendor->user->email }}</td>
                        </tr>
                        <tr>
                            <td>Mobile</td>
                            <td>{{ $vendor->user->mobile }}</td>
                        </tr>
                        
                        
                        <tr>
                            <td>Balance</td>
                            <td>{{ $vendor->balance }} &nbsp;&nbsp;Rs.</td>
                        </tr>

                        <tr>
                            <td>show to Users</td>
                            <td>
                              @if( $vendor->show==true)
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
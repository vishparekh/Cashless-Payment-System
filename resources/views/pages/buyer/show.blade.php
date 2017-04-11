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
              <h4 class="header">buyer&nbsp;&nbsp;&nbsp;
              <br /><br />
              @if($buyer->blocked)
                <a href="{{ route('buyers.block',['buyer'=>$buyer->id]) }}" class="btn waves-effect waves-light  deep-purple">UnBlock Card</a>
              @else
                <a href="{{ route('buyers.block',['buyer'=>$buyer->id]) }}" class="btn waves-effect waves-light  deep-purple">Block Card</a>
              @endif
              <br /><br />
              @can('update', $buyer)
              EDIT
                <button>
                <a class="btn-floating btn-small red" href="{{ route('buyers.edit',['buyer'=>$buyer->id]) }}">
                  <i class="small mdi-editor-mode-edit"></i>
                </a>
                </button>&nbsp;&nbsp;&nbsp;
              @endcan
              @can('delete', $buyer) 
                <form method="post" action="{{ route('buyers.destroy',['buyer'=>$buyer->id]) }}">
                    DELETE
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
                            <td>{{ $buyer->user->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $buyer->user->email }}</td>
                        </tr>
                        <tr>
                            <td>Mobile</td>
                            <td>{{ $buyer->user->mobile }}</td>
                        </tr>
                        
                        
                        <tr>
                            <td>Balance</td>
                            <td>{{ $buyer->balance }} &nbsp;&nbsp;Rs.</td>
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
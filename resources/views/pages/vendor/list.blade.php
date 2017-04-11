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
              <h4 class="header">List of Vendors&nbsp;&nbsp;&nbsp;
                 @can('create', App\Models\Vendor::class)
                      <a class="btn-floating btn-small waves-effect waves-light orange darken-4" href="{{ route('vendors.create') }}">
                          <i class="mdi-content-add">
                          </i>
                      </a>
                    @endcan
              </h4>
              <div class="row">
                
                <div class="col s12 m8 l9">
                  <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            @if(\Auth::user()->isSuperAdmin())
                                <th>ORG</th>
                            @endif
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                 
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            @if(\Auth::user()->isSuperAdmin())
                                <th>ORG</th>
                            @endif
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                           
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                 
                    <tbody>
                    <?php $i=1; ?>
                    @foreach($vendors as $vendor)

                        <tr>
                            <td>{{ $i }}</td>
                            @if(\Auth::user()->isSuperAdmin())
                                <td>{{ $vendor->org->user->name }}</td>
                            @endif
                            <td><a href="{{ route('vendors.show',['vendor'=>$vendor->id]) }}">{{ $vendor->user->name }}</a></td>
                            <td>{{ $vendor->user->email }}</td>
                            <td>{{ $vendor->user->mobile }}</td>
                            
                            <td>
                                @can('update', $vendor)  
                                    <a class="btn-floating btn-small red" href="{{ route('vendors.edit',['vendor'=>$vendor->id]) }}">
                                        <i class="small mdi-editor-mode-edit"></i>
                                    </a>
                                @endcan 
                                    
                            </td>
                            <td>
                                @can('delete', $vendor)  
                                    <form method="post" action="{{ route('vendors.destroy',['vendor'=>$vendor->id]) }}">
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
                            </td>
                            <?php $i++; ?>
                        </tr>
                    @endforeach
                        
                        
                        
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
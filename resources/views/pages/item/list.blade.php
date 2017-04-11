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
              <h4 class="header">List of Items&nbsp;&nbsp;&nbsp;
                    @can('create', App\Models\Item::class)
                      <a class="btn-floating btn-small waves-effect waves-light orange darken-4" href="{{ route('items.create') }}">
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
                            <th>Name</th>
                            <th>Amount</th>
                            @if(\Auth::user()->isSuperAdmin())
                                <th>ORG</th>
                            @endif
                            @if(\Auth::user()->isSuperAdmin() || \Auth::user()->isOrg())
                                <th>Vendor</th>
                            @endif
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                 
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Amount</th>
                            @if(\Auth::user()->isSuperAdmin())
                                <th>ORG</th>
                            @endif
                            @if(\Auth::user()->isSuperAdmin() || \Auth::user()->isOrg())
                                <th>Vendor</th>
                            @endif
                            
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                 
                    <tbody>
                    <?php $i=1; ?>
                    @foreach($items as $item)

                        <tr>
                            <td>{{ $i }}</td>
                            <td><a href="{{ route('items.show',['item'=>$item->id]) }}">{{ $item->name }}</a></td>
                            <td>{{ $item->amount }}</td>
                            @if(\Auth::user()->isSuperAdmin())
                                <td>{{ $item->vendor->org->user->name }}</td>
                            @endif
                            @if(\Auth::user()->isSuperAdmin() || \Auth::user()->isOrg())
                                <td>{{ $item->vendor->user->name }}</td>
                            @endif
                            <td>
                                @can('update', $item)      
                                <a class="btn-floating btn-small red" href="{{ route('items.edit',['item'=>$item->id]) }}">
                                    <i class="small mdi-editor-mode-edit"></i>
                                </a>
                                @endcan    
                            </td>
                            <td>
                                @can('delete', $item)  
                                    <form method="post" action="{{ route('items.destroy',['item'=>$item->id]) }}">
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
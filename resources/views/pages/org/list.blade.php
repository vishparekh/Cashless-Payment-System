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
              <h4 class="header">List of Organization&nbsp;&nbsp;&nbsp;
                   @can('create', App\Models\Org::class)
                      <a class="btn-floating btn-small waves-effect waves-light orange darken-4" href="{{ route('orgs.create') }}">
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
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Plans</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                 
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Plans</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                 
                    <tbody>
                    <?php $i=1; ?>
                    @foreach($orgs as $org)

                        <tr>
                            <td>{{ $i }}</td>
                            <td><a href="{{ route('orgs.show',['org'=>$org->id]) }}">{{ $org->user->name }}</a></td>
                            <td>{{ $org->user->email }}</td>
                            <td>{{ $org->user->mobile }}</td>
                            <td>{{ $org->plan->name }}</td>
                            <td>
                                @can('update', $org)    
                                    <a class="btn-floating btn-small red" href="{{ route('orgs.edit',['org'=>$org->id]) }}">
                                        <i class="small mdi-editor-mode-edit"></i>
                                    </a>
                                @endcan
                                    
                            </td>
                            <td>
                                @can('delete', $org)
                                    <form method="post" action="{{ route('orgs.destroy',['org'=>$org->id]) }}">
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
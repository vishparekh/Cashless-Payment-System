@extends('layouts.userlayout')

@section('left-sidebar')
    @include('sidebars.superadmin')
@endsection

@section('right-sidebar')

<?php
  if(isset($item))
  {
      $name=$item->name;
      $amount=$item->amount; 
      $action=route('items.update',['item'=>$item]);

      $show=$item->show;
      if($show)
        $show="checked";
      else
        $show="";

      $ad=method_field('PUT');
      $id=$item->id;
  }
  else
  {
      $name=old('name');
      $amount=old('amount'); 
      $action=route('items.store');
      $show=old('show');
      if($show=="on")
        $show="checked";
      else
        $show="";
      $ad="";
      $id=0;
  } 
?>

<section id="content">

        <!--breadcrumbs start-->
        
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <div class="section">


            <!-- Form with icon prefixes -->
            <div class="row">
              
              <!-- Form with validation -->
              <div class="col s12 m12 l6">
                <div class="card-panel">
                  <h4 class="header2">Add item</h4>
                  <div class="row">
                    <form class="col s12" method="post" action="{{ $action }}">
                      {{ csrf_field() }}
                      {{ $ad }}
                      <input type="hidden" name="id" value="{{ $id }}">
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
                          <input id="name4" value="{{ $name }}" name="name" type="text" class="validate">
                          <label for="first_name">Name</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <i class="mdi-communication-email prefix"></i>
                          <input id="email4" name="amount" value="{{ $amount }}" type="number" class="validate">
                          <label for="email">Amount</label>
                        </div>
                      </div>


                      <br />
                      <div class="row">
                        <div class="switch">
                           Show to Users : 
                          <label>
                              No
                              <input type="checkbox" id="ifui" name="show" {{ $show }}>
                              <span class="lever">
                              </span>
                              Yes
                          </label>
                      </div>
                      </div>


                        <div class="row">
                          <div class="input-field col s12">
                            <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                              <i class="mdi-content-send right"></i>
                            </button>
                          </div>
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


@extends('layouts.userlayout')

@section('right-sidebar')

<?php
  if(isset($org))
  {
      $name=$org->user->name;
      $mobile=$org->user->mobile;
      $email=$org->user->email;
      $address=$org->address; 
      $action=route('orgs.update',['org'=>$org->id]);
      $maxvendor=$org->max_vendors;
      $maxbuyer=$org->max_buyers;
      $amount=$org->amount;
      $planval=$org->plan_id;
      $ifui=$org->ui_required;
      if($ifui)
        $ifui="checked";
      else
        $ifui="";

      $ad=method_field('PUT');
      $id=$org->id;
  }
  else
  {
      $name=old('name');
      $mobile=old('mobile');
      $email=old('email');
      $address=old('address');  
      $action=route('orgs.store');
      $maxvendor=old('maxvendor');
      $maxbuyer=old('maxbuyer');
      $amount=old('amount');
      $planval=old('planval');
      $ifui=old('ifui');
      if($ifui=="on")
        $ifui="checked";
      else
        $ifui="";
      $ad="";
      $id=0;
  } 
?>

<section id="content">
        <div class="container">
          <div class="section">
            <!-- Form with icon prefixes -->
            <div class="row">
              <!-- Form with validation -->
              <div class="col s12 m12 l6">
                <div class="card-panel">
                  <h4 class="header2">Add organization</h4>
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
                          <input id="email4" name="email" value="{{ $email }}" type="email" class="validate">
                          <label for="email">Email</label>
                        </div>
                      </div>

                      <div class="row">
                        <div class="input-field col s12">
                          <i class="mdi-communication-email prefix"></i>
                          <input id="name4" name="mobile" value="{{ $mobile }}" type="number" class="validate">
                          <label for="email">Mobile</label>
                        </div>
                      </div>


                      <div class="row">
                        <div class="input-field col s12">
                          <i class="mdi-action-question-answer prefix"></i>
                          <textarea id="message4" name="address" class="materialize-textarea validate" length="120">{{ $address }}</textarea>
                          <label for="message">Address</label>
                        </div>
                      </div>


                        <div class="row">
                          <div class="input-field col s12">
                              <div class="select-wrapper">
                                <i class="mdi-navigation-arrow-drop-down active">
                                </i>
                                <div class="select-wrapper initialized">
                                  
                                  <select class="initialized" id="planselect" name="planval" onchange="myFunction()">
                                  <option value="default" disabled="" selected="">Choose Plan Type</option>
                                      @foreach($plans as $plan)
                                        <option value="{{ $plan->id }}">{{ $plan->name }} </option>
                                      @endforeach
                                  </select>
                                </div>
                              </div>
                              <label>Select Plan</label>
                          </div>
                        </div>

                        <div class="row">
                        <div class="input-field col s12">
                          <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>
                          <input id="maxvendor" name="maxvendor" value="{{ $maxvendor }}" type="number" class="validate">
                          <label for="email">Maximum Vendors</label>
                        </div>
                      </div>

                      <div class="row">
                        <div class="input-field col s12">
                          <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>
                          <input id="maxbuyer" name="maxbuyer" value="{{ $maxbuyer }}" type="number" class="validate">
                          <label for="email">Maximum Buyers</label>
                        </div>
                      </div>

                       <div class="row">
                        <div class="input-field col s12">
                          <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>
                          <input id="amount" name="amount" value="{{ $amount }}" type="number" class="validate">
                          <label for="email">Amount</label>
                        </div>
                      </div>

                      <br />
                      <div class="row">
                        <div class="switch">
                           Enabled UI : 
                          <label>
                              No
                              <input type="checkbox" id="ifui" name="ifui" {{ $ifui }}>
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

@section('scripts')

<script type="text/javascript">


$('#planselect option[value="{{ $planval }}"]').attr("selected", "selected");
$(document).ready(function() {
     
       myFunction();
});

function myFunction() 
{
   @foreach($plans as $plan)
      if($('#planselect').val()=="{{ $plan->id }}")
      {
          $('#maxvendor').val({{ $plan->max_vendors }});
          $('#maxbuyer').val({{ $plan->max_buyers }})
          $('#amount').val({{ $plan->amount }})
      }
    @endforeach

    if($('#planselect').val()!=5)
    {
        $("#maxvendor").prop("readonly", true);
        $("#maxbuyer").prop("readonly", true);
        $("#amount").prop("readonly", true);
    }
    else
    {
        $('#maxvendor').val({{ $maxvendor }});
        $('#maxbuyer').val({{ $maxbuyer }})
        $('#amount').val({{ $amount }})
        $("#maxvendor").prop("readonly", false);
        $("#maxbuyer").prop("readonly", false);
        $("#amount").prop("readonly", false);

    }
}


</script>


@endsection
@extends('layouts.userlayout')

@section('right-sidebar')



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
                  <h4 class="header2">Block/UnBlock Card</h4>
                  <div class="row">
                        <div class="row">
                          <div class="input-field col s12">
                            
                            
                            @if(\Auth::user()->buyer->blocked)
                            The Card is Blocked Right Now <br />
                            <a href="{{ route('buyers.block',['buyer'=>\Auth::user()->id]) }}">
                              <button class="btn cyan waves-effect waves-light right" name="action">Unblock
                                <i class="mdi-content-send right"></i>
                              </button>
                            </a>

                            @else
                            The Card is UnBlocked Right Now <br />
                             <a href="{{ route('buyers.block',['buyer'=>\Auth::user()->id]) }}"> 
                              <button class="btn cyan waves-effect waves-light right" name="action">block
                                <i class="mdi-content-send right"></i>
                              </button>
                              </a>
                            @endif
                          
                          </div>
                        </div>


                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
@endsection


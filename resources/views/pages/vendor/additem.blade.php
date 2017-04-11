@section('right-content')
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
                  <h4 class="header2">Form with validation</h4>
                  <div class="row">
                    <form class="col s12">
                      <div class="row">
                        <div class="input-field col s12">
                          <i class="mdi-action-account-circle prefix"></i>
                          <input id="name4" type="text" class="validate">
                          <label for="first_name">Name</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <i class="mdi-communication-email prefix"></i>
                          <input id="email4" type="email" class="validate">
                          <label for="email">Email</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <i class="mdi-action-lock-outline prefix"></i>
                          <input id="password5" type="password" class="validate">
                          <label for="password">Password</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <i class="mdi-action-question-answer prefix"></i>
                          <textarea id="message4" class="materialize-textarea validate" length="120"></textarea>
                          <label for="message">Message</label>
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
    <ul id="slide-out" class="side-nav fixed leftside-navigation">
        <li class="user-details cyan darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="{{ URL::to('images/avatar.jpg') }}" alt="" class="circle responsive-img valign profile-image">
                </div>
                <div class="col col s8 m8 l8">
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">John Doe<i class="mdi-navigation-arrow-drop-down right"></i></a>
                    <p class="user-roal">Super Admin</p>
                </div>
            </div>
        </li>
        @foreach($sidebars as $sidebar)
            <li class="bold"><a href="{{ route($sidebar->route) }}" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i>{{ $sidebar->name }}</a>
            </li>
        @endforeach
        


        </ul>
    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i class="mdi-navigation-menu" ></i></a>

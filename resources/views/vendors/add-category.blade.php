@extends('layouts.master')

@section('content')
    <aside id="left-sidebar-nav">
        @include('vendors.left-sidebar')
    </aside>
    <section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper" class=" grey lighten-3">
            <div class="container">
                <div class="row">
                    <div class="col s12 m12 l12">
                        <h5 class="breadcrumbs-title">Forms</h5>
                        <ol class="breadcrumb">
                            <li><a href="index.html">Dashboard</a>
                            </li>
                            <li><a href="#">Forms</a>
                            </li>
                            <li class="active">Forms Layouts</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
            <div class="section">

                <p class="caption">Add Category</p>

                <div class="divider"></div>
                <!--Basic Form-->
                <div id="basic-form" class="section">
                    <div class="row">
                        <div class="col s12 m12 l6">
                            <div class="card-panel">
                                <h4 class="header2">Basic Form</h4>
                                <div class="row">
                                    <form class="col s12">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input id="name" type="text">
                                                <label for="first_name">Name</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input id="email" type="email">
                                                <label for="email">Email</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input id="password" type="password">
                                                <label for="password">Password</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <textarea id="message" class="materialize-textarea"></textarea>
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
        </div>
    </section>
    <aside id="right-sidebar-nav">
        <ul id="chat-out" class="side-nav rightside-navigation">
            <li class="li-hover">
                <a href="#" data-activates="chat-out" class="chat-close-collapse right"><i class="mdi-navigation-close"></i></a>
                <div id="right-search" class="row">
                    <form class="col s12">
                        <div class="input-field">
                            <i class="mdi-action-search prefix"></i>
                            <input id="icon_prefix3" type="text" class="validate">
                            <label for="icon_prefix">Search</label>
                        </div>
                    </form>
                </div>
            </li>
            <li class="li-hover">
                <ul class="chat-collapsible" data-collapsible="expandable">
                    <li>
                        <div class="collapsible-header teal white-text active"><i class="mdi-social-whatshot"></i>Recent Activity</div>
                        <div class="collapsible-body recent-activity">
                            <div class="recent-activity-list chat-out-list row">
                                <div class="col s3 recent-activity-list-icon"><i class="mdi-action-add-shopping-cart"></i>
                                </div>
                                <div class="col s9 recent-activity-list-text">
                                    <a href="#">just now</a>
                                    <p>Jim Doe Purchased new equipments for zonal office.</p>
                                </div>
                            </div>
                            <div class="recent-activity-list chat-out-list row">
                                <div class="col s3 recent-activity-list-icon"><i class="mdi-device-airplanemode-on"></i>
                                </div>
                                <div class="col s9 recent-activity-list-text">
                                    <a href="#">Yesterday</a>
                                    <p>Your Next flight for USA will be on 15th August 2015.</p>
                                </div>
                            </div>
                            <div class="recent-activity-list chat-out-list row">
                                <div class="col s3 recent-activity-list-icon"><i class="mdi-action-settings-voice"></i>
                                </div>
                                <div class="col s9 recent-activity-list-text">
                                    <a href="#">5 Days Ago</a>
                                    <p>Natalya Parker Send you a voice mail for next conference.</p>
                                </div>
                            </div>
                            <div class="recent-activity-list chat-out-list row">
                                <div class="col s3 recent-activity-list-icon"><i class="mdi-action-store"></i>
                                </div>
                                <div class="col s9 recent-activity-list-text">
                                    <a href="#">Last Week</a>
                                    <p>Jessy Jay open a new store at S.G Road.</p>
                                </div>
                            </div>
                            <div class="recent-activity-list chat-out-list row">
                                <div class="col s3 recent-activity-list-icon"><i class="mdi-action-settings-voice"></i>
                                </div>
                                <div class="col s9 recent-activity-list-text">
                                    <a href="#">5 Days Ago</a>
                                    <p>Natalya Parker Send you a voice mail for next conference.</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header light-blue white-text active"><i class="mdi-editor-attach-money"></i>Sales Repoart</div>
                        <div class="collapsible-body sales-repoart">
                            <div class="sales-repoart-list  chat-out-list row">
                                <div class="col s8">Target Salse</div>
                                <div class="col s4"><span id="sales-line-1"></span>
                                </div>
                            </div>
                            <div class="sales-repoart-list chat-out-list row">
                                <div class="col s8">Payment Due</div>
                                <div class="col s4"><span id="sales-bar-1"></span>
                                </div>
                            </div>
                            <div class="sales-repoart-list chat-out-list row">
                                <div class="col s8">Total Delivery</div>
                                <div class="col s4"><span id="sales-line-2"></span>
                                </div>
                            </div>
                            <div class="sales-repoart-list chat-out-list row">
                                <div class="col s8">Total Progress</div>
                                <div class="col s4"><span id="sales-bar-2"></span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header red white-text"><i class="mdi-action-stars"></i>Favorite Associates</div>
                        <div class="collapsible-body favorite-associates">
                            <div class="favorite-associate-list chat-out-list row">
                                <div class="col s4"><img src="images/avatar.jpg" alt="" class="circle responsive-img online-user valign profile-image">
                                </div>
                                <div class="col s8">
                                    <p>Eileen Sideways</p>
                                    <p class="place">Los Angeles, CA</p>
                                </div>
                            </div>
                            <div class="favorite-associate-list chat-out-list row">
                                <div class="col s4"><img src="images/avatar.jpg" alt="" class="circle responsive-img online-user valign profile-image">
                                </div>
                                <div class="col s8">
                                    <p>Zaham Sindil</p>
                                    <p class="place">San Francisco, CA</p>
                                </div>
                            </div>
                            <div class="favorite-associate-list chat-out-list row">
                                <div class="col s4"><img src="images/avatar.jpg" alt="" class="circle responsive-img offline-user valign profile-image">
                                </div>
                                <div class="col s8">
                                    <p>Renov Leongal</p>
                                    <p class="place">Cebu City, Philippines</p>
                                </div>
                            </div>
                            <div class="favorite-associate-list chat-out-list row">
                                <div class="col s4"><img src="images/avatar.jpg" alt="" class="circle responsive-img online-user valign profile-image">
                                </div>
                                <div class="col s8">
                                    <p>Weno Carasbong</p>
                                    <p>Tokyo, Japan</p>
                                </div>
                            </div>
                            <div class="favorite-associate-list chat-out-list row">
                                <div class="col s4"><img src="images/avatar.jpg" alt="" class="circle responsive-img offline-user valign profile-image">
                                </div>
                                <div class="col s8">
                                    <p>Nusja Nawancali</p>
                                    <p class="place">Bangkok, Thailand</p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
@endsection
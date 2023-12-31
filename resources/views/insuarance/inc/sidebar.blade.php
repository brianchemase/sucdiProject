<div class="sidebar" data-color="green">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <img src="{{ asset('logo/logo.png') }}" alt="tag" width="80">
      
        <a href="" class="simple-text logo-mini">
      
        </a>
        <a href="{{route('dashboard')}}" class="simple-text logo-normal ">
                    SUCDI Insurance Agency LTD
        </a>
      </div>
      <div class="sidebar-wrapper btn-icon btn-round" id="sidebar-wrapper">
        <ul class="nav">
          <li class="{{ Route::currentRouteName() === 'dashboard' ? 'active' : '' }}" >
            <a href="{{route('dashboard')}}">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <!-- <li class="{{ Route::currentRouteName() === 'RegClients' ? 'active' : '' }}" >
            <a href="{{route('RegClients')}}">
              <i class="now-ui-icons business_badge"></i>
              <p>Clients Register</p>
            </a>
          </li> -->
          <li>
            <a data-toggle="collapse" href="#clientregister" class="" aria-expanded="true">
              <i class="now-ui-icons business_badge"></i>
              <p>
              Clients <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="clientregister" style="">
            <ul class="nav">
            <li class="{{ Route::currentRouteName() === 'RegClients' ? 'active' : '' }}" >
                <a href="{{route('RegClients')}}">
                  <span class="sidebar-mini-icon">R</span>
                  <span class="sidebar-normal"> Clients Register</span>
                </a>
              </li>
              <li>
                <a href="{{route('ListClients')}}">
                  <span class="sidebar-mini-icon">CL</span>
                  <span class="sidebar-normal"> Clients List </span>
                </a>
              </li>
              
              
            </ul>
            </div>
          </li>

          <!-- <li class="{{ Route::currentRouteName() === 'ListClients' ? 'active' : '' }}" >
            <a href="{{route('ListClients')}}">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Clients List</p>
            </a>
          </li> -->

          <li class="{{ Route::currentRouteName() === 'SearchClient' ? 'active' : '' }}" >
            <a href="{{route('SearchClient')}}">
              <i class="now-ui-icons ui-1_zoom-bold"></i>
              <p>Search Client</p>
            </a>
          </li>

          
          <li class="{{ Route::currentRouteName() === 'issuedcoverspages' ? 'active' : '' }}" >
            <a href="{{route('issuedcoverspages')}}">
              <i class="now-ui-icons business_briefcase-24"></i>
              <p>Issued Covers</p>
            </a>
          </li>


          <li class="{{ Route::currentRouteName() === 'policiespages' ? 'active' : '' }}" >
            <a href="{{route('policiespages')}}">
              <i class="now-ui-icons business_briefcase-24"></i>
              <p>Policies</p>
            </a>
          </li>

          <li>
            <a data-toggle="collapse" href="#pagesExamples" class="" aria-expanded="true">
              <i class="now-ui-icons design_image"></i>
              <p>
              Pages <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="pagesExamples" style="">
            <ul class="nav">
              <li>
                <a href="../examples/pages/pricing.html">
                  <span class="sidebar-mini-icon">P</span>
                  <span class="sidebar-normal"> Pricing </span>
                </a>
              </li>
              <li>
                <a href="../examples/pages/rtl.html">
                  <span class="sidebar-mini-icon">RS</span>
                  <span class="sidebar-normal"> RTL Support </span>
                </a>
              </li>
              
              
            </ul>
            </div>
          </li>

          

         

          <li>
            <a data-toggle="collapse" href="#ReportsTab" class="" aria-expanded="true">
              <i class="now-ui-icons files_single-copy-04"></i>
              <p>
              Reports <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="ReportsTab" style="">
            <ul class="nav">
              <li>
                <a href="{{route('clientsRegisterPDF')}}" target="_blank">
                  <span class="sidebar-mini-icon">LS</span>
                  <span class="sidebar-normal"> Clients List </span>
                </a>
              </li>
              <li>
                <a href="{{route('issuedCoversPDF')}}" target="_blank">
                  <span class="sidebar-mini-icon">IC</span>
                  <span class="sidebar-normal"> Issued Covers </span>
                </a>
              </li>

              <li>
                <a href="">
                  <i class="now-ui-icons business_chart-bar-32"></i>
                  <p>Transactions</p>
                </a>
              </li>

              <li>
                <a href="">
                  <i class="now-ui-icons location_map-big"></i>
                  <p>Underwriting</p>
                </a>
              </li>

              <li>
                <a href="">
                  <i class="now-ui-icons location_map-big"></i>
                  <p>Commissions</p>
                </a>
              </li>

              <li>
                <a href="">
                  <i class="now-ui-icons location_map-big"></i>
                  <p>Contributions</p>
                </a>
              </li>

              <li>
                <a href="">
                  <i class="now-ui-icons location_map-big"></i>
                  <p>Contributions</p>
                </a>
              </li>

              <li>
                <a href="">
                  <i class="now-ui-icons location_map-big"></i>
                  <p>Quotations</p>
                </a>
              </li>

              
              <li>
                <a href="">
                  <i class="now-ui-icons location_map-big"></i>
                  <p>Payments</p>
                </a>
              </li>
                  
              
            </ul>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#SettingsPages" class="" aria-expanded="true">
              <i class="now-ui-icons loader_gear"></i>
              <p>
                Settings <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="SettingsPages" style="">
            <ul class="nav">
              <li>
                <a href="#">
                  <span class="sidebar-mini-icon">P</span>
                  <span class="sidebar-normal"> Pricing </span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="sidebar-mini-icon">RS</span>
                  <span class="sidebar-normal"> RTL Support </span>
                </a>
              </li>

              <li>
                <a href="">
                  <i class="now-ui-icons ui-1_bell-53"></i>
                  <p>Notifications</p>
                </a>
              </li>
              <li>
                <a href="">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>User Profile</p>
                </a>
              </li>
            </ul>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#ClaimPages" class="" aria-expanded="true">
              <i class="now-ui-icons location_map-big"></i>
              <p>
              Claims <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="ClaimPages" style="">
            <ul class="nav">
              <li>
                <a href="{{route('ClaimRegpage')}}">
                  <span class="sidebar-mini-icon">RC</span>
                  <span class="sidebar-normal"> Register Claim </span>
                </a>
              </li>
              <li class="{{ Route::currentRouteName() === 'ClaimListpage' ? 'active' : '' }}" >
                <a href="{{route('ClaimListpage')}}">
                  <span class="sidebar-mini-icon">CL</span>
                  <span class="sidebar-normal"> Claim List </span>
                </a>
              </li>
            </ul>
            </div>
          </li>

          

        
          <li class="{{ Route::currentRouteName() === 'table' ? 'active' : '' }}" >
            <a href="{{route('table')}}">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Table View</p>
            </a>
          </li>

          <li class="{{ Route::currentRouteName() === 'blank' ? 'active' : '' }}" >
            <a href="{{route('blank')}}">
              <i class="now-ui-icons text_caps-small"></i>
              <p>Blank Page</p>
            </a>
          </li>

          <li class="{{ Route::currentRouteName() === 'form' ? 'active' : '' }}" >
            <a href="{{route('form')}}">
              <i class="now-ui-icons text_caps-small"></i>
              <p>Form Page</p>
            </a>
          </li>

          <li class="active-pro">
            <a href="">
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Sign Out</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
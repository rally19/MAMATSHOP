<div uk-sticky="start: 170; animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent uk-light; end: ! *">
<div class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left uk-margin-left">
      <a class="uk-navbar-item uk-logo uk-text-bold" href="#">MAMATSHOP</a>
    </div>
    <div class="uk-navbar-right uk-margin-right">
      <ul class="uk-navbar-nav uk-visible@m">
        <li><a href="#">HOME</a></li>
        <li><a href="#">TENTANG KAMI</a></li>
        <li><a href="#">KATALOG</a></li>
        <li><a href="#">BUSSINESS</a></li>
      </ul>
      <div class="uk-visible@m">
        <input class="uk-input uk-form-width-small uk-width-1-1" type="text" placeholder="Input" aria-label="Input">
      </div>
      <div class="uk-visible@m">
        <a class="uk-navbar-toggle" href="#" uk-search-icon></a>
      </div>
      <div class="uk-navbar-item uk-visible@m">
        <div>
          <a class="uk-navbar-toggle" href="#" uk-icon="user"></a>
          <div uk-dropdown="mode: click; pos: bottom-right">
            <ul class="uk-nav uk-dropdown-nav">
              <li><a href="#"><span uk-icon="user"></span> Account</a></li>
              <li><a href="#"><span uk-icon="cog"></span> Settings</a></li>
              <li class="uk-nav-divider"></li>
              <li><a href="#"><span uk-icon="sign-out"></span> Log Out</a></li>
            </ul>
          </div>
        </div>
      </div>
      <a class="uk-navbar-toggle uk-navbar-toggle-animate uk-hidden@m" uk-navbar-toggle-icon href="#" uk-toggle="target: #offcanvas-nav-primary"></a>
      
    </div>
  </div>
</div>

<div id="offcanvas-nav-primary" uk-offcanvas="overlay: true">
        <div class="uk-offcanvas-bar uk-flex uk-flex-column">
          <ul class="uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical">
              <li class="uk-active"><a href="#">Active</a></li>
              <li class="uk-parent">
                  <a href="#">Parent</a>
                  <ul class="uk-nav-sub">
                      <li><a href="#">Sub item</a></li>
                      <li><a href="#">Sub item</a></li>
                  </ul>
              </li>
              <li class="uk-nav-header">Header</li>
              <li><a href="#"><span class="uk-margin-xsmall-right" uk-icon="icon: table"></span> Item</a></li>
              <li><a href="#"><span class="uk-margin-xsmall-right" uk-icon="icon: thumbnails"></span> Item</a></li>
              <li class="uk-nav-divider"></li>
              <li><a href="#"><span class="uk-margin-xsmall-right" uk-icon="icon: trash"></span> Item</a></li>
          </ul>
        </div>
      </div>

















      <div uk-sticky="start: 170; animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent; end: ! *;">
  <nav class="uk-navbar-container" uk-inverse="sel-active: .uk-navbar-transparent">
    <div class="uk-container">
      <div uk-navbar="dropbar: true; dropbar-transparent-mode: remove; dropbar-anchor: !.uk-navbar-container; target-y: !.uk-navbar-container">
      <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo uk-text-bold" href="#">MAMATSHOP</a>
      </div>
        <div class="uk-navbar-right">
          <ul class="uk-navbar-nav uk-visible@m">
            <li><a href="#">HOME</a></li>
            <li><a href="#">TENTANG KAMI</a></li>
            <li><a href="#">KATALOG</a></li>
            <li><a href="#">BUSSINESS</a></li>
          </ul>
          <div class="uk-visible@m">
            <input class="uk-input uk-form-width-small uk-width-1-1" type="text" placeholder="Input" aria-label="Input">
          </div>
          <div class="uk-visible@m">
            <a class="uk-navbar-toggle" href="#" uk-search-icon></a>
          </div>
          <div class="uk-navbar-item uk-visible@m">
            <div>
              <a class="uk-navbar-toggle" href="#" uk-icon="user"></a>
              <div uk-dropdown="mode: click; pos: bottom-right">
                <ul class="uk-nav uk-dropdown-nav">
                  <li><a href="#"><span uk-icon="user"></span> Account</a></li>
                  <li><a href="#"><span uk-icon="cog"></span> Settings</a></li>
                  <li class="uk-nav-divider"></li>
                  <li><a href="#"><span uk-icon="sign-out"></span> Log Out</a></li>
                </ul>
              </div>
            </div>
          </div>
          <a class="uk-navbar-toggle uk-navbar-toggle-animate" uk-navbar-toggle-icon href="#"></a>
            <div class="uk-navbar-dropdown">
              <ul class="uk-nav uk-navbar-dropdown-nav">
                <li><a href="#">Item</a></li>
                <li><a href="#">Item</a></li>
              </ul>
            </div>
        </div>
      </div>
    </div>
  </nav>
</div>




























      <div uk-sticky="start: 170; animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent; end: ! *; offset: 80">

<nav class="uk-navbar-container" uk-inverse="sel-active: .uk-navbar-transparent">
    <div class="uk-container">
        <div uk-navbar="dropbar: true; dropbar-transparent-mode: remove; dropbar-anchor: !.uk-navbar-container; target-y: !.uk-navbar-container">

            <div class="uk-navbar-left">

                <ul class="uk-navbar-nav">
                    <li class="uk-active"><a href="#">Active</a></li>
                    <li>
                        <a href="#">Parent</a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li class="uk-active"><a href="#">Active</a></li>
                                <li><a href="#">Item</a></li>
                                <li class="uk-nav-header">Header</li>
                                <li><a href="#">Item</a></li>
                                <li><a href="#">Item</a></li>
                                <li class="uk-nav-divider"></li>
                                <li><a href="#">Item</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#">Parent</a>
                        <div class="uk-navbar-dropdown uk-navbar-dropdown-width-2">
                            <div class="uk-drop-grid uk-child-width-1-2" uk-grid>
                                <div>
                                    <ul class="uk-nav uk-navbar-dropdown-nav">
                                        <li class="uk-active"><a href="#">Active</a></li>
                                        <li><a href="#">Item</a></li>
                                        <li class="uk-nav-header">Header</li>
                                        <li><a href="#">Item</a></li>
                                        <li><a href="#">Item</a></li>
                                        <li class="uk-nav-divider"></li>
                                        <li><a href="#">Item</a></li>
                                    </ul>
                                </div>
                                <div>
                                    <ul class="uk-nav uk-navbar-dropdown-nav">
                                        <li class="uk-active"><a href="#">Active</a></li>
                                        <li><a href="#">Item</a></li>
                                        <li class="uk-nav-header">Header</li>
                                        <li><a href="#">Item</a></li>
                                        <li><a href="#">Item</a></li>
                                        <li class="uk-nav-divider"></li>
                                        <li><a href="#">Item</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

            </div>

        </div>
    </div>
</nav>

</div>
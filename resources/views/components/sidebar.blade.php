<div class="l-navbar show" id="nav-bar">
    <nav class="nav">
        <div id="main-menu">
            <a href="{{ route('loan-details') }}" class="nav_logo">
                <i class='bx bx-layer nav_logo-icon'></i>
                <span class="nav_logo-name">EMI Processing</span>
            </a>
            <div class="nav_list">
                <a href="{{ route('loan-details') }}" class="nav_link  @if(Route::is('loan-details')) active @endif">
                    <i class='bx bx-grid-alt nav_icon'></i>
                    <span class="nav_name">Loan Details</span>
                </a>
            </div>
            <div class="nav_list">
                <a href="{{ route('emi-details.index') }}" class="nav_link @if(Route::is('emi-details.index')) active @endif">
                    <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                    <span class="nav_name">Emi Details</span>
                </a>
            </div>
        </div>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav_link">
            <i class='bx bx-log-out nav_icon'></i>
            <span class="nav_name">SignOut</span>
        </a>
    </nav>
</div>

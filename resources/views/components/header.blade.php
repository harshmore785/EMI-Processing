<header class="header body-pd" id="header">
    <div class="header_toggle">
        <i class='bx bx-menu bx-x' id="header-toggle"></i>
    </div>
    <div class="header_img dropdown">
        <img class="dropdown-toggle" src="https://www.kindpng.com/picc/m/269-2697881_computer-icons-user-clip-art-transparent-png-icon.png" style="cursor:pointer" alt="" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >Signout</a></li>
        </ul>
    </div>
</header>

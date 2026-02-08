<div class="sidebar-account-wrap sidebar-content-wrap sticky-top d-lg-block d-none">
    <ul class="my-account-nav">
        <li>
            <a href="{{ route('account-details') }}"
                class="text-sm link fw-medium my-account-nav-item active">Account Details</a>
        </li>
        <li>
            <a href="{{ route('account-order') }}" class="text-sm link fw-medium my-account-nav-item">My
                Orders</a>
        </li>
        
        <li>
            <a href="#"
                class="text-sm link fw-medium my-account-nav-item">Addresses</a>
        </li>
        <!-- <li>
            <a href="{{ route('logout') }}" id="logout-button" class="text-sm link fw-medium my-account-nav-item">Log
                Out</a>
        </li> -->
        <li>
            <form method="post" action="{{ route('logout') }}">
                @csrf
                <input type="submit" name="Logout" value="Logout" style="border:none;width:100%" class="btn-white fw-medium my-account-nav-item">
            </form>
        </li>
    </ul>
</div>
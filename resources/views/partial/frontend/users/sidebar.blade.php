<div class="wn__sidebar">
    <aside class="widget recent_widget">
        <ul>

             @if (auth()->user()->user_image != '')
             <li class="list-group-item">
                <img src="{{ asset('assets/users/' . auth()->user()->user_image) }}" width="200" height="200">
             </li>
            @else
            <li class="list-group-item">
                <img src="{{ asset('assets/users/default.png') }}" alt="{{ auth()->user()->name }}">
            </li>
            @endif
            <li class="list-group-item"><a href="{{ route('users.update_password') }}">Update Password</a></li>
            <li class="list-group-item"><a href="{{ route('users.edit_info') }}">Personal Information</a></li>
            <li class="list-group-item"><a href="{{ route('users.edit_information_company') }}">Company's Information</a></li>
            <li class="list-group-item"><a href="{{ route('users.financial_report') }}">Financial Report</a></li>


            <li class="list-group-item"><a href="{{ route('users.dashboard') }}">My Posts</a></li>
            <li class="list-group-item"><a href="{{ route('users.post.create') }}">Create Post</a></li>
            <li class="list-group-item"><a href="{{ route('users.comments') }}">Manage Comments</a></li>
            <li class="list-group-item"><a href="{{ route('users.edit_info') }}">Update Information</a></li>
            <li class="list-group-item"><a href="{{ route('frontend.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        </ul>
    </aside>
</div>

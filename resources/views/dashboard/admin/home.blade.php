<h3>admin</h3>


<li>
        <a href="{{route('admin.logout')}}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
        Logout</a>
          <form method="POST" action="{{ route('admin.logout')}}" id="logout-form" >
                        @csrf
        </form>
        </li>
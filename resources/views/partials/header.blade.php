<nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
    <a class="navbar-brand" href="#">Charlotte Fleury</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample09">
        <ul class="navbar-nav ml-auto">
            @if (Auth::check())
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">Dashboard <span class="sr-only">(current)</span></a>
            </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"  id="dropdown09" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Compte utilisateur</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown09">
                        <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();$('#logout-form').submit();">Se déconnecter</a>
                        <form action="{{route('logout')}}" id="logout-form" method="post" style="display: none;">
                            {{csrf_field()}}
                        </form>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</nav>
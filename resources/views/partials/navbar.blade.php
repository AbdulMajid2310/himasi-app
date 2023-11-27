<nav class="navbar navbar-expand-lg bg-primary navbar-dark fixed-top shadow">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="/img/page/himasi-org.png" alt="" height="50">

        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link {{($active === 'home')? 'active': '';}}" href="/">Home</a>
                <a class="nav-link {{($active === 'about')? 'active': '';}}" href="/about">About</a>
                <a class="nav-link {{($active === 'events')? 'active': '';}}" href="/events">Events</a>
                <a class="nav-link {{($active === 'blog')? 'active': '';}}" href="/blog">Blogs</a>
                <a class="nav-link {{($active === 'categories')? 'active': '';}}" href="/categories">Categories</a>
            </div>
            <div class="navbar-nav ms-auto">
                @auth
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome back, {{ auth()->user()->username }}
                        </a>
                        <ul class="dropdown-menu">
                            @can('admin')
                            <li><a class="dropdown-item" href="/dashboard"><i class="fa-solid fa-table-columns"></i> MyDashboard</a></li>
                            @endcan
                            <li><a class="dropdown-item" href="/user/profile"><i class="fa-solid fa-user"></i> Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fa-solid fa-right-from-bracket"></i> Logut
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                @else
                <a href="/login" class="nav-link {{($active === 'login')? 'active': '';}}"> <i class="bi bi-box-arrow-in-right"></i> Login</a>

                @endauth
            </div>

        </div>
    </div>
</nav>
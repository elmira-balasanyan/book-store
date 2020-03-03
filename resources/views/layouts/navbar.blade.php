<div>
    <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
        <a class='navbar-brand' href='/'>Book Store</a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent'
                aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>

        <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='navbar-nav mr-auto'>
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link {{ Request::is('/') ? 'table-active' : '' }}" href='/'>Home <span class='sr-only'>(current)</span></a>
                </li>
                <li class="nav-item {{ Request::is('books') ? 'active' : '' }}">
                    <a class="nav-link {{ Request::is('books') ? 'table-active' : '' }}" href="{{ asset('books') }}">Books</a>
                </li>
                <li class="nav-item {{ Request::is('authors') ? 'active' : '' }}">
                    <a class="nav-link {{ Request::is('authors') ? 'table-active' : '' }}" href="{{ asset('authors') }}">Authors</a>
                </li>
            </ul>
        </div>
    </nav>
</div>

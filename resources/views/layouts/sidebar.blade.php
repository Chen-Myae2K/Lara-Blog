<div class="container">
    <div class="row g-3">
        <div class="col-lg-3">
            <div class="list-group mb-3 ">
                <a class="list-group-item list-group-item-action" href="{{ route('page.index') }}">
                    Home
                </a>

                <a class="list-group-item list-group-item-action" href="{{ route('test') }}">
                    Test
                </a>
                <a class="list-group-item list-group-item-action" href="{{ route('photo.index') }}">
                    Gallary
                </a>
            </div>

            <p class="text-black text-small">Manage Posts</p>
            <div class="list-group mb-3">
                <a class="list-group-item list-group-item-action" href="{{ route('post.index') }}">
                    Post List
                </a>

                <a class="list-group-item list-group-item-action" href="{{ route('post.create') }}">
                    Create Post
                </a>
            </div>

            <p class="text-black text-small">Manage Categories</p>
            <div class="list-group mb-3">
                <a class="list-group-item list-group-item-action" href="{{ route('category.index') }}">
                    Category List
                </a>

                <a class="list-group-item list-group-item-action" href="{{ route('category.create') }}">
                    Create Category
                </a>
            </div>

            @admin
                <p class="text-black text-small">Manage Users</p>
                <div class="list-group mb-3">
                    <a class="list-group-item list-group-item-action" href="{{ route('user.index') }}">
                        User List
                    </a>

                    <a class="list-group-item list-group-item-action" href="{{ route('user.create') }}">
                        Create User
                    </a>
                </div>
            @endadmin

        </div>
        <div class="col-lg-9">
            @yield('content')
        </div>
    </div>
</div>

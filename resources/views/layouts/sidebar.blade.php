<div class="list-group mb-3">
    <a class="list-group-item list-group-item-action" href="{{ route('home') }}">
        Home
    </a>

    <a class="list-group-item list-group-item-action" href="{{ route('test') }}">
        Test
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

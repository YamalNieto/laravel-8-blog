<aside class="w-48 flex-shrink-0">
    <h4 class="font-semibold mb-4">
        Links
    </h4>
    <ul>
        <li>
            <a href="/admin/posts"
               class="{{ request()->RouteIs('admin.dashboard') ? 'text-blue-500' : '' }}"
            >All posts</a>
        </li>
        <li>
            <a href="/admin/posts/create"
               class="{{ request()->RouteIs('admin.posts.create') ? 'text-blue-500' : '' }}"
            >Create new post</a>
        </li>
    </ul>
</aside>
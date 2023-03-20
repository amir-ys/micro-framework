<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        <a class="p-2 link-secondary <?= isUrl('/') ? 'active' : '' ?>"  href="/">blog</a>
        <a class="p-2 link-secondary <?= isUrl('/about') ? 'active' : '' ?> " href="/about">about</a>
        <a class="p-2 link-secondary <?= isUrl('/contact') ? 'active' : '' ?>"  href="/contact">contact</a>
    </nav>
</div>
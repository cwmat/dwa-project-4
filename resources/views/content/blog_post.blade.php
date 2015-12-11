<div class="post-preview">
  {{-- Blog post title --}}
  {{-- Check if link url exists then add link to title --}}
  @if(isset($blog->link) && strlen($blog->link) > 0)
    <a href="{{ $blog->link }}" target="_blank">
  @endif

  <h2 class="post-title">
    {{ $blog->title }}
  </h2>

  {{-- Check if image url exists then post it --}}
  @if(isset($blog->image) && strlen($blog->image) > 0)
    <img
      class="img-responsive is-center"
      src="{{ $blog->image }}"
      alt="{{ $blog->title }}" >
  @endif

  {{-- Close anchor tag so image (if it exists) is in the link --}}
  @if(isset($blog->link) && strlen($blog->link) > 0)
    </a>
  @endif

  {{-- Blog post content --}}
  <p class="blog-content">
    {{ $blog->content }}
  </p>

  {{-- Blog post created/posted by --}}
  <p class="post-meta">
    Posted by <a href="#"> {{ $blog->user->name }} </a> on {{ $blog->created_at }}

    {{-- If a user is logged in and has the right permissions, add the edit button --}}
    @if(
    // If the user is logged in and is the OP of the blog post
    // or
    // If the user is logged in and is an editor (2) or an admin (1)
    (Auth::check() && $blog->user->id == $user->id) ||              (Auth::check() && $user->role <= 2)
    )
      <span class="edit-button">
        <a href="/blog/edit/{{ $blog->id }}">
          <button
            type="button"
            class="btn btn-default btn-sm">
            Edit
          </button>
        </a>
      </span>
    @endif

    {{-- If the user is an admin, add the delete button --}}
    @if(Auth::check() && $user->role == 1)
      <span class="delete-button">
        <a href="/blog/confirm-delete/{{ $blog->id }}">
          <button
            type="button"
            class="btn btn-default btn-sm">
            Delete
          </button>
        </a>
      </span>
    @endif

  </p>
</div>
<hr>

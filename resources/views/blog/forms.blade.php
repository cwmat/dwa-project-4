<div class="container">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

      {{-- Yield errors from form validation TODO: Add Jquery validation here too --}}
      @include('errors.errors')

      <form action="@yield('action')" method="post">
        {!! csrf_field() !!}

        <fieldset class="form-group">
          <label for="title">Title</label>
          <input
            type="text"
            class="form-control"
            name="title"
            id="title"
            maxlength="255"
            placeholder="Enter post title here"
            value="@yield('title-value')">
        </fieldset>
        <fieldset class="form-group">
          {{-- TODO: Add image preview also fix image issue when checkbox is hit --}}
          <label for="image-link">Image Link</label>
          <input
            type="text"
            class="form-control"
            name="image-link"
            id="image-link"
            maxlength="255"
            placeholder="Paste a direct image link"
            value="@yield('image-value')">
        </fieldset>
        <fieldset class="form-group">
          <label for="content">Content</label>
          <textarea
            class="form-control"
            name="content"
            id="content"
            placeholder="Write something about your post"
            rows="5"
            >@yield('content-value')</textarea>
        </fieldset>

        {{-- Tags foreach --}}
        <fieldset class="form-group">
          <label>Tags</label>
          <br>
          @yield('tag-boxes')
        </fieldset>

        <button type="submit" class="btn btn-default">Submit</button>
      </form>

    </div>
  </div>
</div>

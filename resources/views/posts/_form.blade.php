    <div class="form-group">
        <label for="title">
            <span>
                @if (!empty($post->title)) Edit @endif Title:
            </span> 
        </label>
        {{-- old(name_of_the_field, default_value) --}}
        <input name="title" type="text" id="title" 
            class="form-control"
            value="{{ old('title', $post->title ?? null) }}">
    </div>
    <div class="form-group">
        <label for="content">
            <span>
                @if (!empty($post->content)) Edit @endif Content:
            </span> 
        </label>
        <textarea 
            class="form-control" 
            name="content" 
            id="content"
        >{{ old('content', $post->content ?? null) }}</textarea>
    </div>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
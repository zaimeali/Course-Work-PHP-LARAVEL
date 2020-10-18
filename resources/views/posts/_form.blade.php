<p>
    <label for="title">
        <span>
            @if (!empty($post->title)) Edit @endif Title:
        </span> 
        {{-- old(name_of_the_field, default_value) --}}
        <input name="title" type="text" id="title" 
            value="{{ old('title', $post->title ?? null) }}">
    </label>
</p>
<p>
    <label for="content">
        <span>
            @if (!empty($post->content)) Edit @endif Content:
        </span> 
        <textarea name="content" id="content">{{ old('content', $post->content ?? null) }}</textarea>
    </label>
</p>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
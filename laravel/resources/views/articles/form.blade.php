@csrf
<div class="md-form">
    <label>タイトル</label>
    <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
</div>
<div class="form-group">
    <label></label>
    <textarea name="body" rows="16" class="form-control" placeholder="本文" required>{{ old('body') }}</textarea>
</div>
<div class="input-group mb-4">
    <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">{{ $field }}</span>
    </div>
    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"
        name={{ $name }} value="{{ old($name) }}">
</div>

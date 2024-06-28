@extends('frontend.master')

@section('content')

<style>
    .custom-file {
    position: relative;
    overflow: hidden;
    margin-top: 10px;
    border-radius: 5px;
}

.custom-file-input {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
}

.custom-file-label {
    position: relative;
    width: 100%;
    padding: 10px;
    background-color: #f8f9fa;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
}

#imagePreview img {
    max-width: 100%;
    max-height: 200px;
    margin-top: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}
</style>

<div class="form-group">
    <label for="logoInput">Gmail</label>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="logoInput" name="gmail" onchange="loadImage(event)">
        <label class="custom-file-label" for="logoInput">Choose file</label>
    </div>

    <div id="imagePreview"></div>
</div>



<script>

function loadImage(event) {
    var imagePreview = document.getElementById('imagePreview');
    imagePreview.innerHTML = ''; // Clear previous image

    var file = event.target.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function() {
            var img = document.createElement('img');
            img.src = reader.result;
            imagePreview.appendChild(img);
        }
        reader.readAsDataURL(file);
    }
}
</script>
@endsection


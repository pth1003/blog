@extends('backend.layout')
@section('addPost')
    <div class="d-flex justify-content-center align-items-center flex-column">
        <p><span class="fs-2"><i class="bi bi-plus-circle fs-2 text-success"></i> Edit Post</span></p>
        <form class="w-75" method="POST" enctype="multipart/form-data" id="form-write">
            <fieldset>
                <div class="w-100 mb-4">
                    <label class="fs-4 fw-bold">Title</label>
                    <input class="w-100 input-post-blog" type="text" placeholder="Blog title" name="title" required/>
                </div>
                <div class="w-100 mb-4">
                    <label class="fs-4 fw-bold">Content</label>l
                    <textarea rows="10" class="w-100 text-area-blog" name="contentt" required> </textarea>
                </div>
                <div class="w-100 mb-4">
                    <label class="fs-4 fw-bold">Select image</label>
                    <input type="file" name="image" required>
                </div>
                <div class="w-100">
                    <label class="fs-4 fw-bold">Select category</label>
                    <select name="category">
                        @foreach($categoty as $cat)
                            <option value="{{ $cat->id }}"> {{ $cat->name }} </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success w-100 mt-4">Post</button>
            </fieldset>
            @csrf
        </form>
    </div>

    <style>
        .error {
            color: red;
        }
    </style>
    <script>
        $('#form-write').validate({
            rules: {
                title: "required",
                contentt: "required",
                image: {
                    required: true,
                    extension: "jpg, jpeg, png"
                },
            },

            messages: {
                title: "Please enter title",
                contentt: "Please enter content",
                image: {
                    required: "Please select image",
                    extension: "Please select image have type JPG, JPEG, PNG",
                }
            }
        });
    </script>
@endsection


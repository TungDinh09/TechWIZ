@extends('Admin.Layout')
@section('content')
    <div class="card recent-sales overflow-auto p-3">
        <form action="/admin/update/product/{{ $product->Product_ID }}" method="POST" class="email-signup" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <input class="form-control my-3" type="text" placeholder="Product name" aria-label="default input example"
                id="name" name="name" placeholder="input name" value="{{ $product->Name }}">

            <input class="form-control my-3" type="text" placeholder="Species" aria-label="default input example"
                name="species" value="{{ $product->Species }}">

            <input class="form-control my-3" type="text" placeholder="Price" aria-label="default input example"
                name="price" id="" placeholder="input price" value="{{ $product->Price }}">

            <input class="form-control my-3" type="text" placeholder="Quatity" aria-label="default input example"
                name="quantity" id="" placeholder="input price" value="{{ $product->quantity }}">

            <input class="form-control my-3" type="text" placeholder="Discount" aria-label="default input example"
                name="discount" placeholder="discount" value="{{ $product->Discount }}">

            <input class="form-control my-3" type="text" placeholder="Description" aria-label="default input example"
                name="description" class="form-control " id="" placeholder="Description" value="{{ $product->Description }}">
            <div class="u-form-group">


                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label"></label>
                    <input class="form-control" type="file" id="formFileMultiple" name="images[]" multiple>
                </div>

                <button>UPDATE</button>
            </div>
        </form>


    </div>
@endsection

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var addImageButton = document.querySelector('.btn-add-image');
        addImageButton.addEventListener('click', function() {
            document.getElementById('file_upload').click();
        });

        var hiddenInputContainer = document.querySelector('.list-input-hidden-upload');
        hiddenInputContainer.addEventListener('change', function(event) {
            var today = new Date();
            var time = today.getTime();
            var image = event.target.files[0];
            var fileName = image.name;

            var boxImage = document.createElement('div');
            boxImage.className = 'box-image';

            var imgElement = document.createElement('img');
            imgElement.src = URL.createObjectURL(image);
            imgElement.className = 'picture-box';

            var deleteButton = document.createElement('span');
            deleteButton.className = 'btn-delete-image';
            deleteButton.setAttribute('data-id', time);
            deleteButton.textContent = 'x';

            var wrapDeleteButton = document.createElement('div');
            wrapDeleteButton.className = 'wrap-btn-delete';
            wrapDeleteButton.appendChild(deleteButton);

            boxImage.appendChild(imgElement);
            boxImage.appendChild(wrapDeleteButton);

            var imageList = document.querySelector('.list-images');
            imageList.appendChild(boxImage);

            event.target.removeAttribute('id');
            event.target.setAttribute('id', time);

            var inputTypeFile = document.createElement('input');
            inputTypeFile.type = 'file';
            inputTypeFile.name = 'filenames[]';
            inputTypeFile.id = 'file_upload';
            inputTypeFile.className = 'myfrm form-control';

            hiddenInputContainer.appendChild(inputTypeFile);
        });

        var imageList = document.querySelector('.list-images');
        imageList.addEventListener('click', function(event) {
            if (event.target.classList.contains('btn-delete-image')) {
                var id = event.target.getAttribute('data-id');
                var hiddenInput = document.getElementById(id);
                hiddenInput.remove();
                event.target.closest('.box-image').remove();
            }
        });
    });
</script>

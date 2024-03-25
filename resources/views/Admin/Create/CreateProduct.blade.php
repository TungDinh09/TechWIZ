@extends('Admin.Layout')
@section('content')
    <div class="card recent-sales overflow-auto p-3">
        <form action="/admin/insert/product" method="POST" class="email-signup" enctype="multipart/form-data">
            @csrf
            <input class="form-control my-3" type="text" placeholder="Product name" aria-label="default input example"
                id="name" name="name" placeholder="input name" value="">

            <input class="form-control my-3" type="text" placeholder="Species" aria-label="default input example"
                name="species" value="">

            <input class="form-control my-3" type="text" placeholder="Price" aria-label="default input example"
                name="price" id="" placeholder="input price" value="">

            <input class="form-control my-3" type="text" placeholder="Quatity" aria-label="default input example"
                name="quantity" id="" placeholder="input price" value="">

            <input class="form-control my-3" type="text" placeholder="Discount" aria-label="default input example"
                name="discount" placeholder="discount" value="">

            <input class="form-control my-3" type="text" placeholder="Description" aria-label="default input example"
                name="description" class="form-control " id="" placeholder="Description" value="">
            <div class=" my-3 d-flex flex-wrap ">

                @foreach ($categories as $category)
                    <div class="my-2 w-25 ">
                        <input class="form-check-input " type="checkbox" name="product_type[]"
                            value="{{ $category->CategoryID }}" id="toolCheck">
                        <label class="form-check-label mx-2" for="toolCheck">{{ $category->CategoryName }}</label>
                    </div>
                @endforeach

            </div>
            <div class="u-form-group">
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label"></label>
                    <input class="form-control" type="file" id="formFileMultiple" name="images[]" multiple>
                </div>
                <div id="imageContainer" class="d-flex ">

                </div>
                <button>ADD</button>
            </div>
        </form>


    </div>
    <script>
        const inputElement = document.getElementById('formFileMultiple');
        const imageContainer = document.getElementById('imageContainer');

        inputElement.addEventListener('change', (event) => {
            imageContainer.innerHTML = ''; // Xóa nội dung cũ trong container

            const files = event.target.files;

            for (const file of files) {
                const imageElement = document.createElement('img');
                imageElement.src = URL.createObjectURL(file);
                imageElement.classList.add('box-image-tungdinh');
                imageElement.classList.add('mb-3');
                imageContainer.appendChild(imageElement);
            }
        });
    </script>
@endsection

@extends('admin.layouts.layout')
@section('admin_page_title')
    Create Service
@endsection
@section('admin_layout')
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Service infomation</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="#">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <a href="#">
                        <div class="text-tiny">Services</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">New Service</div>
                </li>
            </ul>
        </div>
        <!-- new-Service -->
        <div class="wg-box">
            <form class="form-new-product form-style-1" action="{{ route('admin.services.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <fieldset class="name">
                <div class="body-title">Service Title <span class="tf-color-1">*</span>
                </div>
                <input value="{{ old('title') }}" class="flex-grow" type="text" placeholder="Service Title" name="title"
                tabindex="0" value="" aria-required="true" required="">
            </fieldset>
            <fieldset class="category">
                <div class="body-title mb-10">Category <span class="tf-color-1">*</span>
                </div>
                <div class="select flex-grow">
                    <select class="" name="category_id">
                        <option>Choose category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </fieldset>
            <fieldset class="description">
                <div class="body-title mb-10">Description <span class="tf-color-1">*</span>
                </div>
                <textarea class="mb-10" name="description" placeholder="Description"
                    tabindex="0" aria-required="true" required="">{{ old('description') }}</textarea>
            </fieldset>
            <fieldset class="name">
                <div class="body-title">Service Location <span class="tf-color-1">*</span>
                </div>
                <input value="{{ old('location') }}" class="flex-grow" type="text" placeholder="Service Location" name="location"
                tabindex="0" value="" aria-required="true" required="">
            </fieldset>
            
            <fieldset>
                <div class="body-title">Upload your banner image <span class="tf-color-1">*</span>
                </div>
                <div class="upload-image flex-grow">
                    <div class="item" id="imgpreview" style="display:none">
                        <img src="upload-1.html" class="effect8" alt="">
                    </div>
                    <div id="upload-file" class="item up-load">
                        <label class="uploadfile" for="bannerImage">
                            <span class="icon">
                                <i class="icon-upload-cloud"></i>
                            </span>
                            <span class="body-text">Drop your service image here or select <span
                                class="tf-color">click
                                to browse</span></span>
                                <input value="{{ old('service_image') }}" type="file" id="bannerImage" name="service_image">
                            </label>
                        </div>
                    </div>
                </fieldset>
                
                
                
                <!-- Container for image fields -->
                <fieldset id="additional-image-fields">
                    <div class="body-title">Upload images <span class="tf-color-1">*</span>
                    </div>
                    <fieldset id="image-upload-container">
                        <div class="body-title">Upload image 1 <span class="tf-color-1">*</span></div>
                        <div class="upload-image flex-grow">
                            <div class="item" id="imgpreview" style="display:none">
                                <img src="upload-1.html" class="effect8" alt="">
                            </div>
                            <div id="upload-file" class="item up-load">
                                <label class="uploadfile" for="imageUpload0">
                                    <span class="icon">
                                        <i class="icon-upload-cloud"></i>
                                    </span>
                                    <span class="body-text">Drop your images here or select <span class="tf-color">click to browse</span></span>
                                    <input type="file" id="imageUpload0" name="images[]" accept="image/*">
                                </label>
                            </div>
                        </div>
                    </fieldset>
                </fieldset>

                <div class="bot">
                    <div></div>
                    <button class="tf-button w208" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let imageCounter = 2;
            
            // Function to add a new image upload field
            function addNewImageField() {
                if (imageCounter > 4) {
                    alert('You can only upload up to 4 images.');
                    return;
                }
                
                const container = document.getElementById('additional-image-fields');
                const newFieldset = document.createElement('fieldset');
                newFieldset.className = 'image-upload-fieldset';
                newFieldset.innerHTML = `
                    <div class="body-title">Additional Image ${imageCounter} </div>
                    <div class="upload-image flex-grow">
                        <div class="item" style="display:none">
                            <img src="upload-1.html" class="effect8" alt="">
                        </div>
                        <div class="item up-load">
                            <label class="uploadfile" for="imageUpload${imageCounter}">
                                <span class="icon">
                                    <i class="icon-upload-cloud"></i>
                                </span>
                                <span class="body-text">Drop your images here or select <span class="tf-color">click to browse</span></span>
                                <input type="file" id="imageUpload${imageCounter}" name="images[]" accept="image/*">
                            </label>
                        </div>
                    </div>
                `;
                container.appendChild(newFieldset);
                imageCounter++;
                
                // Add event listener to the new input
                const newInput = newFieldset.querySelector('input[type="file"]');
                newInput.addEventListener('change', function() {
                    if (this.files.length > 0) {
                        addNewImageField();
                    }
                });
            }
            
            // Add event listener to the initial image upload field
            const initialInput = document.getElementById('imageUpload0');
            initialInput.addEventListener('change', function() {
                if (this.files.length > 0) {
                    addNewImageField();
                }
            });
        });
    </script>
    @endpush
@endsection
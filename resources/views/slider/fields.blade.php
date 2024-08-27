<div class="row gx-10 mb-5">
    <div class="col-lg-6">
        {{ Form::label('name', __('messages.slider.title').':', ['class' => 'form-label required mb-3']) }}
        <div class="input-group mb-5">
            {{ Form::text('title',null,['class' => 'form-control ', 'placeholder' => __('messages.slider.title'), 'required']) }}
        </div>
    </div>
    <div class="col-lg-6">
        {{ Form::label('name', __('messages.slider.sub_title').':', ['class' => 'form-label required mb-3']) }}
        <div class="input-group mb-5">
            {{ Form::text('subtitle',null,['class' => 'form-control ', 'placeholder' => __('messages.slider.sub_title'), 'required']) }}
        </div>
    </div>
    <div class="col-lg-3 mb-7">
        <div class="mb-3" io-image-input="true">
            <label for="exampleInputImage" class="form-label">{{ __('messages.slider.image').':' }}</label>
            <div class="d-block">
                <div class="image-picker">
                    <div class="image previewImage " id="previewImage"
                    {{ $styleCss }}="background-image: url('{{ !empty($gallery->image) ?
                        $gallery->image : asset('images/default-product.jpg') }}')">
                </div>
                <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                      title="Change image">
                    <label>
                        <i class="fa-solid fa-pen" id="productImage"></i>
                            <input type="file" id="productImage" name="image" class="image-upload d-none"
                                   accept="image/*"/>
                                        <input type="hidden" name="image_remove">
                    </label>
                </span>
            </div>
        </div>
        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
    </div>
</div>
</div>
<div class="float-end">
    {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-3']) }}
</div>

<div class="row gx-10 mb-5">
    <div class="col-lg-6">

        {{ Form::label('name', __('messages.product.name').':', ['class' => 'form-label required mb-3']) }}

        <div class="input-group mb-5">
            {{ Form::text('name',isset($product) ? $product->name : null,['class' => 'form-control ', 'placeholder' => __('messages.product.name'), 'required','onkeypress'=>"return blockSpecialChar(event)"]) }}
        </div>

    </div>

    <div class="col-lg-6">

        {{ Form::label('code', __('messages.product.code').':', ['class' => 'form-label required mb-3']) }}
        <span data-bs-toggle="tooltip"
              data-placement="top"
              data-bs-original-title="Click refresh icon to generate product code">
        <i class="fas fa-question-circle ml-1"></i>
</span>
        <div class="input-group mb-5">
            {{ Form::text('code', $product->code ?? null,['class' => 'form-control ', 'placeholder' => __('messages.product.code'), 'required','id' => 'code', 'maxlength' => 6,'onkeypress'=>"return blockSpecialChar(event)"]) }}
            <a class="input-group-text border-0" id="autoCode" href="javascript:void(0)" data-toggle="tooltip"
               data-placement="right" title="Generate Code" data-bs-toggle="tooltip">
                <i class="fas fa-sync-alt fs-4"></i>
            </a>
        </div>

    </div>


    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('category', __('messages.product.category').':', ['class' => 'form-label required mb-3']) }}
            {{ Form::select('category_id', $categories,isset($product) ? $product->category_id : null,['class' => 'form-select io-select2 ', 'placeholder' =>  __('messages.product.category'), 'required', 'id'=>'adminCategoryId', 'data-control' => 'select2']) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('unit_price', __('messages.product.unit_price').':', ['class' => 'form-label required mb-3']) }}
            {{ Form::number('unit_price',isset($product) ? $product->unit_price : null,['class' => 'form-control ', 'placeholder' =>  __('messages.product.unit_price'), 'min'=>'0', 'step'=>".01", 'oninput'=>"validity.valid||(value=value.replace(/\D+/g, '.'))",'required']) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('description', __('messages.product.description').':', ['class' => 'form-label mb-3']) }}
            {{ Form::textarea('description',isset($product) ? $product->description : null,['class' => 'form-control ', 'placeholder' =>  __('messages.product.description')]) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('shippingPolicy', __('messages.product.shippingPolicy').':', ['class' => 'form-label mb-3']) }}
            {{ Form::textarea('shippingPolicy',isset($product) ? $product->shippingPolicy: null,['class' => 'form-control ', 'placeholder' => __('messages.product.shippingPolicy')]) }}
        </div>
    </div>
    <div class="col-lg-3 mb-7">
        <div class="mb-3" io-image-input="true">
            <label for="exampleInputImage" class="form-label">{{ __('messages.product.image').':' }}</label>
            <div class="d-block">
                <div class="image-picker">
                    <div class="image previewImage" id="productImage"
                    {{ $styleCss }}="background-image: url('{{ !empty($image[0]->file_name) ? asset("uploads/".$image[0]->id."/".$image[0]->file_name) : asset('images/default-product
.jpg') }}')">
                </div>
                <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                      title="Change image">
                    <label>
                        <i class="fa-solid fa-pen" id="productImage"></i>
                            <input type="file" id="productImage" name="image" class="image-upload d-none"
                                   accept="image/*"/>
                                        <input type="hidden" name="image_remove">
                                        <input type="hidden" name="imageID0" value="{{ $image[0]->id  }}">
                                        <input type="hidden" name="productId" value="{{ $product->id  }}">

                    </label>
                </span>
            </div>
        </div>
        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
    </div>
</div>
<div class="col-lg-3 mb-7">
    {{-- {{ dd($image) }} --}}
    <div class="mb-3" io-image-input="true">
        <label for="exampleInputImage" class="form-label">{{ __('messages.product.image1').':' }}</label>
        <div class="d-block">
            <div class="image-picker">
                <div class="image previewImage" id="productImage"
                {{ $styleCss }}="background-image: url('{{ !empty($image[1]->file_name) ? asset("uploads/".$image[1]->id."/".$image[1]->file_name) : asset('images/default-product
.jpg') }}')">
            </div>
            <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                  title="Change image">
                <label>
                    <i class="fa-solid fa-pen" id="productImage1"></i>
                        <input type="file" id="productImage1" name="image1" class="image-upload d-none"
                               accept="image/*"/>
                                    <input type="hidden" name="image_remove1">
                                    <input type="hidden" name="imageID1" value="{{ $image[1]->id  }}">
                </label>
            </span>
        </div>
    </div>
</div>
</div>
<div class="col-lg-3 mb-7">
    <div class="mb-3" io-image-input="true">
        <label for="exampleInputImage" class="form-label">{{ __('messages.product.image2').':' }}</label>
        <div class="d-block">
            <div class="image-picker">
                <div class="image previewImage" id="productImage"
                {{ $styleCss }}="background-image: url('{{ !empty($image[2]->file_name) ? asset("uploads/".$image[2]->id."/".$image[2]->file_name) : asset('images/default-product
.jpg') }}')">
            </div>
            <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                  title="Change image">
                <label>
                    <i class="fa-solid fa-pen" id="productImage2"></i>
                        <input type="file" id="productImage2" name="image2" class="image-upload d-none"
                               accept="image/*"/>
                                    <input type="hidden" name="image_remove2">
                                    <input type="hidden" name="imageID2" value="{{ $image[2]->id  }}">
                </label>
            </span>
        </div>
    </div>
</div>
</div>
<div class="col-lg-3 mb-7">
    <div class="mb-3" io-image-input="true">
        <label for="exampleInputImage" class="form-label">{{ __('messages.product.image3').':' }}</label>
        <div class="d-block">
            <div class="image-picker">
                <div class="image previewImage" id="productImage"
                {{ $styleCss }}="background-image: url('{{ !empty($image[3]->file_name) ? asset("uploads/".$image[3]->id."/".$image[3]->file_name) : asset('images/default-product
.jpg') }}')">
            </div>
            <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                  title="Change image">
                <label>
                    <i class="fa-solid fa-pen" id="productImage3"></i>
                        <input type="file" id="productImage3" name="image3" class="image-upload d-none"
                               accept="image/*"/>
                                    <input type="hidden" name="image_remove3">
                                    <input type="hidden" name="imageID3" value="{{ $image[3]->id  }}">
                </label>
            </span>
        </div>
    </div>
</div>
</div>
<div>
    <div class="float-end">
        {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-3']) }}
        <a href="{{ route('products.index') }}" type="reset"
           class="btn btn-secondary btn-active-light-primary">{{__('messages.common.discard')}}</a>
    </div>
</div>

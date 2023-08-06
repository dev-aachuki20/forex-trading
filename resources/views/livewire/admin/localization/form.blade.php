<div>

    <div class="listjs-table" id="customerList">
        <div class="row g-4 mb-3">
            <div class="col-sm-auto">
                <h4 class="card-title mb-0">
                    Edit
                </h4>

            </div>
            <div class="col-sm">
                <div class="d-flex justify-content-sm-end">
                    <button wire:click.prevent="cancel" type="button" class="btn btn-success add-btn"><i
                            class="ri-arrow-left-line"></i> back</button>
                </div>
            </div>
        </div>
        <hr>


        <!-- form start -->
        <form wire:submit.prevent="update" class="tablelist-form mt-5"
            autocomplete="off">

            <div class="mb-3">
                <label for="customername-field" class="form-label">{{ getLocalization('name') }}</label>
                <input type="text" wire:model="keyname" id="customername-field" class="form-control"
                    placeholder="{{ getLocalization('name') }}" />
                @error('keyname')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>



            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="submit" wire:loading.attr="disabled" class="btn btn-success" id="add-btn">

                        {{ $updateMode ? getLocalization('update_language') : getLocalization('add_language') }}

                    </button>
                    <button wire:click.prevent="cancel" type="submit" wire:loading.attr="disabled"
                        class="btn btn-danger" id="add-btn">

                        Cancel

                    </button>
                </div>
            </div>

        </form>
        <!-- form end -->

    </div>
</div>

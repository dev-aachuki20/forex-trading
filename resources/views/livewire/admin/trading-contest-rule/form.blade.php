<form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}" class="tablelist-form" autocomplete="off">
    <!-- instruction  -->
    <div class="mb-3">
        <label for="customername-field" class="form-label">{{ $allKeysProvider['instruction'] }}</label>
        <input type="text" wire:model="instruction" class="form-control"
            placeholder="{{ $allKeysProvider['instruction'] }}" />
        @error('instruction')
            <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="row mb-3">
        <label for="customername-field" class="form-label">{{ $allKeysProvider['rules'] }}</label>
        @foreach ($ruleContent as $index => $rule)
            <div class="row mb-2">
                <div class="col-10">
                    <input class="form-control" wire:model="ruleContent.{{ $index }}.title" type="text"
                        placeholder="{{ $allKeysProvider['title'] }}">
                    @error('ruleContent.' . $index . '.title')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-2">
                    @if ($index != 0)
                        <button class="btn btn-danger" wire:click.prevent="removeRow({{ $index }})"><i
                                class="ri-subtract-line"></i></button>
                    @endif
                    @if ($index == count($ruleContent) - 1)
                        <button class="btn btn-primary" wire:click.prevent="addRow({{ $index + 1 }})"><i
                                class="ri-add-line"></i></button>
                    @endif
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-10" wire:ignore>
                    <textarea id="summernote" class="form-control" wire:model="ruleContent.{{ $index }}.description" rows="3"
                        placeholder="{{ $allKeysProvider['description'] }}"></textarea>
                </div>
                @error('ruleContent.' . $index . '.description')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>
        @endforeach
    </div>

    <div class="modal-footer">
        <div class="hstack gap-2 justify-content-end">
            <button type="submit" wire:loading.attr="disabled" class="btn btn-success" id="add-btn">
                {{ $updateMode ? $allKeysProvider['update'] : $allKeysProvider['submit'] }}
            </button>
            <button wire:click.prevent="cancel" type="submit" wire:loading.attr="disabled" class="btn btn-danger"
                id="add-btn">
                {{ $allKeysProvider['cancel'] }}
            </button>
        </div>
    </div>

</form>

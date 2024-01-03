<div>
    <form wire:submit="submit">
        <div>
            <label for="test-field">Test</label>
            <input type="text" id="test-field" name="test-field" wire:model="testField">
        </div>
        <button type="submit">Submit</button>
    </form>
</div>

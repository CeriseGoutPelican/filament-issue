<div class="grid min-h-screen grid-cols-5 gap-4 p-10 bg-gray-200 lg:grid-cols-10">
    @for($i = 0; $i < 50; $i++)
        <div class="flex justify-center">
            <div x-data="{
                open: false,
                toggle() {
                    if (this.open) { return this.close() }
                    this.$refs.button.focus()
                    this.open = true
                },
                close(focusAfter) {
                    if (! this.open) return
                    this.open = false
                    focusAfter && focusAfter.focus()
                }
            }" x-on:keydown.escape.prevent.stop="close($refs.button)"
                x-on:focusin.window="! $refs.panel.contains($event.target) && close()" x-id="['dropdown-button']"
                class="relative">
                <!-- Button -->
                <button x-ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')"
                    type="button" class="flex items-center gap-2 bg-white px-5 py-2.5 rounded-md shadow">
                    Options <x-heroicon-o-chevron-down class="w-5 h-5 text-gray-400" />
                </button>

                <!-- Panel -->
                <div x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)"
                    :id="$id('dropdown-button')" style="display: none;"
                    class="absolute left-0 z-10 w-40 mt-2 bg-white rounded-md shadow-md">
                    <livewire:test2-submenu key="{{ $i }}" lazy />
                </div>
            </div>
        </div>
    @endfor
</div>

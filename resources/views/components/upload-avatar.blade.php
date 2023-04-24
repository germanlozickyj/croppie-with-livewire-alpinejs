<div class="flex flex-col justify-center text-white my-12" x-data="crop()">
 
    <div x-data="{ 
            showMessage: false,
            message: {
                error : null,
                text : null
            },
            init() {
                window.addEventListener('message_custom', event => {
                    this.messageFunction(event.detail.has_error, event.detail.message)
                })
            },
            messageFunction(hasError, message) {
                this.message.error = hasError;
                this.message.text = message;
                this.showMessage = true

                setTimeout(() => { 
                    this.message.error = null;
                    this.message.text = null;
                    this.showMessage = false; 
                }, 2000);
            }
        }"
        x-show="showMessage"
        class="flex justify-center"
        x-cloak>
            <p class="my-6 py-2 px-4 rounded" :class="message.error ? 'bg-red-800' : 'bg-green-800'" x-text="message.text"></p>
    </div>

    <div class="container-button-croppie grid justify-center" x-show="! showCroppie">
        <button @click="$refs.input.click()" 
                class="mx-7 bg-white text-black py-2 px-7 font-bold text-normal rounded">
            Crear avatar
        </button>
    </div>

    <input x-show="! showCroppie" 
        type="file"
        x-ref="input" 
        name="fileinput" 
        accept="image/*" 
        x-on:change="setImage()"
        hidden />

    <div x-show="showCroppie" x-ref="croppie" class="container-croppie">
        @csrf
        <img src alt x-ref="image" class="display-block w-full" />
        <div>
            <button class="button-login" 
                    x-on:click="saveCroppie()" 
                    type="button"> Add avatar </button>
        </div>
    </div>
</div>

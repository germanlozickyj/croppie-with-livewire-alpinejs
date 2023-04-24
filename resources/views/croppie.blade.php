<div class="py-12">
    <h1 class="text-white text-center py-12 font-bold text-3xl">Croppie</h1>
    <x-upload-avatar/>
    <div class="flex justify-center flex-col text-white">
        @foreach($avatars as $avatar)
            <div class="flex flex-row m-auto mt-5 rounded border-solid border-2 border-white w-1/3 p-6">
                <img class="h-1/3 w-1/3" src="{{ base64_decode($avatar->image)}}" />
                <p class="mt-8 mx-6 font-bold"> Created at: {{ $avatar->created_at }}</p>
            </div> 
        @endforeach
    </div>
</div>
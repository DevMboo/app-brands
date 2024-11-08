<div class="col-span-1 w-full h-32 border border-gray-200 rounded-2xl mb-2 my-2 py-2">
    <div class="flex justify-between h-full items-center gap-6">
        <div class="w-1/4">
            <img src="{{ asset($ico)}}" class="w-[4.5rem] h-[4.5rem] ms-7" alt="Groups icon">
        </div>
        <div class="w-3/4">
            <div class="flex flex-col ">
                <h3 class="text-gray-700 text-sm">{{$title}}</h3>
                <p class="text-6xl">{{$total}}</p>
            </div>
        </div>
    </div>
</div>
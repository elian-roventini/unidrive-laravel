<div class="flex-shrink-0">
    <div x-data="" class="w-full lg:flex lg:justify-evenly">
        <div class="flex items-center sm:h-80">
            <div class="w-full sm:w-108 flex justify-center">
                <img x-ref="mainImage" class="w-full sm:w-auto sm:h-80" src="https://motorshow.com.br/wp-content/uploads/sites/2/2019/07/1_ms430_renault-sandero2-747x420.jpg" loading="lazy" />
            </div>
        </div>

        <div class="flex lg:flex-col justify-center mt-1 space-x-4 lg:space-y-4 lg:ml-4">
            <img src="https://motorshow.com.br/wp-content/uploads/sites/2/2019/07/1_ms430_renault-sandero2-747x420.jpg" :class="{'ring-2 opacity-50': currentPhoto == 0}" class="h-16 w-16" x-on:click="pickPhoto(0)">
            <img src="https://motorshow.com.br/wp-content/uploads/sites/2/2019/07/1_ms430_renault-sandero2-747x420.jpg" :class="{'ring-2 opacity-50': currentPhoto == 1}" class="h-16 w-16" x-on:click="pickPhoto(1)">
            <img src="https://motorshow.com.br/wp-content/uploads/sites/2/2019/07/1_ms430_renault-sandero2-747x420.jpg" :class="{'ring-2 opacity-50': currentPhoto == 2}" class="h-16 w-16" x-on:click="pickPhoto(2)">
            <img src="https://motorshow.com.br/wp-content/uploads/sites/2/2019/07/1_ms430_renault-sandero2-747x420.jpg" :class="{'ring-2 opacity-50': currentPhoto == 3}" class="h-16 w-16" x-on:click="pickPhoto(3)">
        </div>
    </div>
</div>


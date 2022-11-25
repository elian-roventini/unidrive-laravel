<div class="flex-shrink-0">
    <div x-data="imageGallery" class="w-full lg:flex lg:justify-evenly">
        <div class="flex items-center sm:h-80">
            <div class="w-full sm:w-108 flex justify-center">
                <img :id="image.id" x-ref="mainImage" class="h-40 lg:h-[320px] w-full lg:w-[600px] sm:w-auto" :src="image.src"  alt="Imagem Principal da Galeria"/>
            </div>
        </div>

        <div class="inline-flex overflow-x-auto lg:flex-col justify-center mt-1 space-x-4 lg:space-x-0 lg:space-y-4 lg:ml-4">
            <img
                x-ref="image1"
                id="1"
                src="https://secure-developments.com/commonwealth/brasil/colorizer_onix/images/colorizer/onix-3-4-frente-branco-summit.png"
                :class="{ 'border-l-4 border-orange': image.current == 1 }"
                class="h-14 lg:h-18 w-full pl-2"
                x-on:click="changeImage()"
                alt="Imagem 1 da Galeria"
            >
            <img
                x-ref="image2"
                id="2"
                src="https://www.chevrolet.com.br/content/dam/chevrolet/mercosur/brazil/portuguese/index/cars/2023-onix/mov/02-images/box-de-garantia-gris.jpg?imwidth=600"
                :class="{ 'border-l-4 border-orange': image.current == 2 }"
                class="h-14 lg:h-18 w-full pl-2"
                x-on:click="changeImage()"
                alt="Imagem 2 da Galeria"
            >
            <img
                x-ref="image3"
                id="3"
                src="https://www.chevrolet.com.br/content/dam/chevrolet/mercosur/brazil/portuguese/index/cars/2023-onix/gallery/01-images/05-galeria-onix-my23.jpg"
                :class="{ 'border-l-4 border-orange': image.current == 3 }"
                class="h-14 lg:h-18 w-full pl-2"
                x-on:click="changeImage()"
                alt="Imagem 3 da Galeria"
            >
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('imageGallery', () => ({
                image: {
                    current: 1,
                    src: ''
                },
                init() {
                    this.image.src = this.$refs.image1.src;
                },
                changeImage() {
                    const target = this.$event.target;

                    this.image.current = target.id;
                    this.image.src = target.src;
                }
            }))
        });
    </script>
@endpush

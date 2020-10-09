<section class="" x-data="{ 'showModal': false }" @keydown.escape="showModal = false" x-cloak >

    <button type="button" class="bg-green-500 hover:bg-blue-400 text-white py-2 px-2 rounded-full inline-flex items-center" @click="showModal = true" >
        <svg class="fill-current w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" >
            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z" />
        </svg >
    </button >

    <!--Overlay-->
    <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="showModal" :class="{ 'absolute inset-0 z-10 flex items-center justify-center': showModal }" >
        <!--Dialog-->
        <div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6" x-show="showModal" @click.away="showModal = false"
             x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" >

            <!--Title-->
            <div class="flex justify-between items-center pb-3" >
                <p class="text-2xl font-bold" >Deleting an item...</p >
                <div class="cursor-pointer z-50" @click="showModal = false" >
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" >
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" ></path >
                    </svg >
                </div >
            </div >

            <!-- content -->
            <p >Are you sure you want to delete the item?</p >

            <!--Footer-->
            <div class="flex justify-end pt-2" >

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 text-left" >
                    <button class="shadow bg-green-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded "
                            @click="showModal = false" >No
                    </button >
                </div >

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 text-right" >
                    <form method="post" action="<?php echo htmlspecialchars('index.php?page=teacher'); ?>" class="" >
                        <button type="submit" id="delete" name="delete" value="<?php echo $teacher['ID']; ?>"
                                class="shadow bg-green-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded " >
                            Yes
                        </button >
                    </form >
                </div >

            </div >


        </div >
        <!--/Dialog -->
    </div ><!-- /Overlay -->

</section >
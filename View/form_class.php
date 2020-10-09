<form method="post" action="<?php echo htmlspecialchars('index.php?page=class'); ?>" class="py-3" >

    <div class="flex flex-wrap -mx-3 mb-1" >

        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0" >
            <label for="name-first" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >Name</label >
            <input type="text" id="name" name="name" value="<?php echo $name; ?>"
                   class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white <?php echo (empty($nameError)) ? 'border-gray-200 focus:border-gray-500' : 'border-red-500'; ?>" >
            <?php echo $nameError; ?>
        </div >

        <div class="w-full md:w-1/2 px-3" >
            <label for="name-last" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >Location</label >
            <input type="text" id="location" name="location" value="<?php echo $location; ?>"
                   class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white <?php echo (empty($locationError)) ? 'border-gray-200 focus:border-gray-500' : 'border-red-500'; ?>" >
            <?php echo $locationError; ?>
        </div >

    </div >

    <div class="flex flex-wrap -mx-3 mb-1" >

        <div class="w-full px-3 text-center" >
            <input type="hidden" name="ID" value="<?php echo $ID; ?>" >
            <?php $buttonText = (isset($_POST['update'])) ? "Update" : "Post"; ?>
            <button type="submit" id="submit" name="submit" value="<?php echo strtolower($buttonText); ?>"
                    class="shadow bg-green-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" >
                <?php echo $buttonText; ?>
            </button >
        </div >

    </div >

</form >
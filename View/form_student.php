<form method="post" action="<?php echo htmlspecialchars('index.php?page=student'); ?>" class="py-3" >

    <div class="flex flex-wrap -mx-3 mb-1" >

        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0" >
            <label for="name-first" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >First Name</label >
            <input type="text" id="name-first" name="name-first" value="<?php echo $nameFirst; ?>"
                   class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white <?php echo (empty($nameFirstError)) ? 'border-gray-200 focus:border-gray-500' : 'border-red-500'; ?>" >
            <?php echo $nameFirstError; ?>
        </div >

        <div class="w-full md:w-1/2 px-3" >
            <label for="name-last" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >Last Name</label >
            <input type="text" id="name-last" name="name-last" value="<?php echo $nameLast; ?>"
                   class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white <?php echo (empty($nameLastError)) ? 'border-gray-200 focus:border-gray-500' : 'border-red-500'; ?>" >
            <?php echo $nameLastError; ?>
        </div >

    </div >

    <div class="flex flex-wrap -mx-3 mb-1" >

        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0" >
            <label for="email" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" > Email </label >
            <input type="text" id="email" name="email" value="<?php echo $email; ?>"
                   class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white <?php echo (empty($emailError)) ? 'border-gray-200 focus:border-gray-500' : 'border-red-500'; ?>" >
            <?php echo $emailError; ?>
        </div >

        <div class="w-full md:w-1/2 px-3" >
            <label for="class" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" > Class </label >
            <div class="relative" >
                <select id="class" name="class"
                        class="block appearance-none w-full bg-gray-200 border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white <?php echo (empty($classError)) ? 'border-gray-200 focus:border-gray-500' : 'border-red-500'; ?>" >
                    <option value="" disabled selected >Choose a class</option >
                    <?php foreach (Classgroup::list() as $classItem) { ?>
                        <?php
                        $selected = '';
                        if (isset($class)) {
                            if ($classItem['ID'] === $class) {
                                $selected = 'selected';
                            }
                        }
                        ?>
                        <option value="<?php echo $classItem['ID']; ?>" <?php echo $selected; ?> ><?php echo $classItem['name']; ?></option >
                    <?php } ?>
                </select >
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700" >
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" >
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                    </svg >
                </div >
            </div >
            <?php echo $classError; ?>
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
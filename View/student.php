<?php require 'includes/header.php' ?>

    <section >

        <h4 >Student</h4 >

        <p >Hello <?php echo $student->getName(); ?></p >

        <?php require 'form_student.php'; ?>

        <div class="flex flex-col h-screen" >

            <div class="flex-grow overflow-auto" >

                <table class="relative w-full border" >

                    <thead >
                    <tr >
                        <th class="sticky top-0 px-6 py-3 text-blue-900 bg-blue-300" ></th >
                        <th class="sticky top-0 px-6 py-3 text-blue-900 bg-blue-300" >ID</th >
                        <th class="sticky top-0 px-6 py-3 text-blue-900 bg-blue-300" >Name First</th >
                        <th class="sticky top-0 px-6 py-3 text-blue-900 bg-blue-300" >Name Last</th >
                        <th class="sticky top-0 px-6 py-3 text-blue-900 bg-blue-300" ></th >
                    </tr >
                    </thead >

                    <tbody class="divide-y bg-red-100" >

                    <?php foreach ($studentList as $student) { ?>
                        <tr >
                            <td class="px-6 py-4 text-center" >
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="" >
                                    <button type="submit" id="edit" name="update" value="<?php echo $student['ID']; ?>"
                                            class="bg-green-500 hover:bg-blue-400 text-white  py-2 px-2 rounded-full inline-flex items-center" >
                                        <svg class="fill-current w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" >
                                            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" />
                                        </svg >
                                    </button >
                                </form >
                            </td >
                            <td class="px-6 py-4 text-center" ><?php echo $student['ID']; ?></td >
                            <td class="px-6 py-4 text-center" ><?php echo $student['name_first']; ?></td >
                            <td class="px-6 py-4 text-center" ><?php echo $student['name_last']; ?></td >
                            <td class="px-6 py-4 text-center" >
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="" >
                                    <button type="submit" id="delete" name="update" value="<?php echo $student['ID']; ?>"
                                            class="bg-green-500 hover:bg-blue-400 text-white  py-2 px-2 rounded-full inline-flex items-center" >
                                        <svg class="fill-current w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" >
                                            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z" />
                                        </svg >
                                    </button >
                                </form >
                            </td >
                        </tr >
                    <?php } ?>

                    </tbody >

                </table >
            </div >
        </div >


    </section >

<?php require 'includes/footer.php' ?>
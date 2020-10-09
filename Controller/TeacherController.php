<?php
declare(strict_types=1);

class TeacherController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $teacher = new Teacher('John', 'Doe', 'john.doe@test.com');

        $ID    = $nameFirst = $nameLast = $email = "";
        $class = [];

        $nameFirstError = $nameLastError = $emailError = $classError = "";

        $errorPrefix       = '<p class="text-red-500 text-xs italic" >';
        $errorSuffix       = '</p >';
        $errorRequiredText = 'Please fill out this field.';
        $errorNotSelected  = 'Please select an option.';
        $isFormValid       = true;


        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            if (isset($_POST['update'])) {
                $id      = (int)$_POST['update'];
                $teacher = $teacher->read($id);

                $ID        = $teacher[0]['ID'];
                $nameFirst = $teacher[0]['name_first'];
                $nameLast  = $teacher[0]['name_last'];
                $email     = $teacher[0]['email'];
                $class     = Teacher::getTeacherClassgroup($id);

            } elseif (isset($_POST['delete'])) {
                $teacher->delete($_POST['delete']);
            } else {
                if (!empty($_POST['name-first'])) {
                    $nameFirst = Helper::sanitizeData($_POST['name-first']);
                } else {
                    $isFormValid    = false;
                    $nameFirstError = $errorPrefix . $errorRequiredText . $errorSuffix;
                }

                if (!empty($_POST['name-last'])) {
                    $nameLast = Helper::sanitizeData($_POST['name-last']);
                } else {
                    $isFormValid   = false;
                    $nameLastError = $errorPrefix . $errorRequiredText . $errorSuffix;
                }

                if (!empty($_POST['email'])) {
                    $email = Helper::sanitizeData($_POST['email']);
                } else {
                    $isFormValid = false;
                    $emailError  = $errorPrefix . $errorRequiredText . $errorSuffix;
                }

                if (!empty($_POST['class'])) {
                    $class = $_POST['class'];
                } else {
                    $isFormValid = false;
                    $classError  = $errorPrefix . $errorNotSelected . $errorSuffix;
                }

                if ($isFormValid) {
                    if ($_POST['submit'] === 'post') {
                        $teacher1     = new Teacher($nameFirst, $nameLast, $email);
                        $lastInsertId = $teacher1->create($teacher1);
                        foreach ($_POST['class'] as $classID) {
                            $teacher1->createTeacherClassgroup($classID, $lastInsertId);
                        }
                    } else {
                        $teacher1 = new Teacher($nameFirst, $nameLast, $email, $_POST['ID']);
                        $teacher1->update($teacher1);
                        //REMOVE CLASSGROUPS FIRST
                        $teacher1->deleteClassgroup($_POST['ID']);
                        //ADD NEW CLASSGROUPS
                        foreach ($_POST['class'] as $classID) {
                            $teacher1->createTeacherClassgroup($classID, $_POST['ID']);
                        }
                    }

                    // RESET FORM FIELDS
                    $nameFirst = $nameLast = $email = "";
                    $class     = [];
                }

            }

        }

        $teacherList = Teacher::list();

        //load the view
        require 'View/teacher.php';
    }
}
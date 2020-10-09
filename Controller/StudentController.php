<?php
declare(strict_types=1);

class StudentController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $student = new Student('John', 'Doe', 'john.doe@test.com', 1);

        $ID    = $nameFirst = $nameLast = $email = "";
        $class = 0;

        $nameFirstError = $nameLastError = $emailError = $classError = "";

        $errorPrefix       = '<p class="text-red-500 text-xs italic" >';
        $errorSuffix       = '</p >';
        $errorRequiredText = 'Please fill out this field.';
        $errorNotSelected  = 'Please select an option.';
        $isFormValid       = true;


        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            if (isset($_POST['update'])) {
                $id      = (int)$_POST['update'];
                $student = $student->read($id);

                $ID        = $student[0]['ID'];
                $nameFirst = $student[0]['name_first'];
                $nameLast  = $student[0]['name_last'];
                $email     = $student[0]['email'];
                $class     = $student[0]['classID'];

            } elseif (isset($_POST['delete'])) {
                $student->delete($_POST['delete']);
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
                        $student1 = new Student($nameFirst, $nameLast, $email, $class);
                        $student1->create($student1);
                    } else {
                        $student1 = new Student($nameFirst, $nameLast, $email, $class, $_POST['ID']);
                        $student1->update($student1);
                    }

                    // RESET FORM FIELDS
                    $nameFirst = $nameLast = $email = "";
                    $class = 0;
                }

            }

        }

        $studentList = Student::list();

        //load the view
        require 'View/student.php';
    }

}
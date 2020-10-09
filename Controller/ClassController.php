<?php
declare(strict_types=1);

class ClassController
{

    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $class = new Classgroup('name', 'location');
        $ID    = $name = $location = "";

        $nameError = $locationError = "";

        $errorPrefix       = '<p class="text-red-500 text-xs italic" >';
        $errorSuffix       = '</p >';
        $errorRequiredText = 'Please fill out this field.';
        $isFormValid       = true;

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            if (isset($_POST['update'])) {
                $id    = (int)$_POST['update'];
                $class = $class->read($id);

                $ID       = $class[0]['ID'];
                $name     = $class[0]['name'];
                $location = $class[0]['location'];

            } elseif (isset($_POST['delete'])) {
                $class->delete($_POST['delete']);
            } else {
                if (!empty($_POST['name'])) {
                    $name = Helper::sanitizeData($_POST['name']);
                } else {
                    $isFormValid = false;
                    $nameError   = $errorPrefix . $errorRequiredText . $errorSuffix;
                }

                if (!empty($_POST['location'])) {
                    $location = Helper::sanitizeData($_POST['location']);
                } else {
                    $isFormValid   = false;
                    $locationError = $errorPrefix . $errorRequiredText . $errorSuffix;
                }

                if ($isFormValid) {
                    if ($_POST['submit'] === 'post') {
                        $class1 = new Classgroup($name, $location);
                        $class1->create($class1);
                    } else {
                        $class1 = new Classgroup($name, $location, $_POST['ID']);
                        $class1->update($class1);
                    }

                    // RESET FORM FIELDS
                    $name = $location = "";
                }

            }

        }

        $classList = Classgroup::list();

        //load the view
        require 'View/class.php';
    }

}
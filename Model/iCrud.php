<?php

interface iCrud
{
    public function Create($id);

    public function Read($id);

    public function Update($id);

    public function Delete($id);
}
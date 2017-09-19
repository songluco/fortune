<?php
/**
 * Created by PhpStorm.
 * User: songlu
 * Date: 2017/9/18
 * Time: 上午11:11
 */

namespace App\Services\SongluReflectionTest;


class PersonTwo
{
    public $name = 'Lily';
    public $gender = 'male';
    public $age = 20;

    public function eat()
    {
        echo 'Lily is eating!';
    }

    public function run()
    {
        echo 'Lily is running!';
    }
}
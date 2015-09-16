<?php

class Email extends Eloquent {
    protected $connection = 'mysql';
    protected $table = 'email';
    public $timestamps = false;
}
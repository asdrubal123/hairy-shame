<?php

class Nerd extends Eloquent
{
	protected $table = 'nerds';

    protected $fillable = ['id', 'name', 'email', 'nerd_level'];
}
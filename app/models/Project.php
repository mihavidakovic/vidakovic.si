<?php

class Project extends Eloquent {
	protected $filable = array('title', 'description', 'color');
	protected $table = 'projects';

}

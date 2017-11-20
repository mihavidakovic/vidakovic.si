<?php

class Desc extends Eloquent {
	protected $filable = array('project_id', 'title', 'breif', 'about', 'role', 'content');
	protected $table = 'project_description';

}

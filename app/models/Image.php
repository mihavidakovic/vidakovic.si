<?php

class Image extends Eloquent {
	protected $filable = array('project_id', 'path');
	protected $table = 'project_image';

}

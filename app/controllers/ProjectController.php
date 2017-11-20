<?php

class ProjectController extends BaseController {

	public function getProject($id)
	{
		$project = Project::find($id);

	    // get previous user id
	    $previous = Project::where('id', '<', $project->id)->max('id');

	    // get next user id
	    $next = Project::where('id', '>', $project->id)->min('id');

		return View::make('project', array('project' => $project))->with('previous', $previous)->with('next', $next);;
	}

	public function addProject() {
		return View::make('addProject');
	}

	public function editProject($id) {
		$project = Project::find($id);
		return View::make('editProject', array('project' => $project));
	}

	public function postProject() {
		$title = Input::get('title');
		$alias = Input::get('alias');
		$color = Input::get('color');
		$project_title = Input::get('project_title');
		$breif = Input::get('breif');
		$about = Input::get('about');
		$role = Input::get('role');
		$content = Input::get('content');
			$logo = Input::file('logo');
			$destinationPath = 'img/projects/' . $alias . '/';
			$filename = $logo->getClientOriginalName();
			$logo->move($destinationPath, $filename);
		$p = new Project;
		$p->title = $title;
		$p->alias = $alias;
		$p->color = $color;
		$p->logo = 'img/projects/' . $alias . '/' . $filename;
		$p->save();
		$d = new Desc;
		$d->project_id = $p->id; 
		$d->title = $project_title; 
		$d->breif = $breif; 
		$d->about = $about; 
		$d->role = $role; 
		$d->content = $content; 
		$d->save();
		foreach (Input::file('slike') as $slika) {
			$file = $slika;
			$destinationPath = 'img/projects/' . $alias . '/';
			$filename = $file->getClientOriginalName();
			$file->move($destinationPath, $filename);
			$i = new Image;
			$i->project_id = $p->id;
			$i->path = 'img/projects/' . $alias . '/' . $filename;
			$i->save();
		}

		return Redirect::route('project', array('id' => $p->id));
	}


	public function postEditProject($id) {
		$title = Input::get('title');
		$alias = Input::get('alias');
		$color = Input::get('color');
		$project_title = Input::get('project_title');
		$breif = Input::get('breif');
		$about = Input::get('about');
		$role = Input::get('role');
		$content = Input::get('content');
		$p = Project::find($id);
		$p->title = $title;
		$p->alias = $alias;
		$p->color = $color;
		$p->save();
		$d = Desc::where('project_id', '=', $id)->first();
		$d->title = $project_title; 
		$d->breif = $breif; 
		$d->about = $about; 
		$d->role = $role; 
		$d->content = $content; 
		$d->save();
		return Redirect::route('project', array('id' => $p->id));
	}

}

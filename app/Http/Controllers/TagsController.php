<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use DB;

class TagsController extends Controller
{
   public function index(Tag $tag)
   {
   		$tasks=$tag->tasks;

   		return view('welcome', compact('tasks'));
   }
}

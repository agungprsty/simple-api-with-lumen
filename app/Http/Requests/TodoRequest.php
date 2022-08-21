<?php

namespace App\Http\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TodoRequest extends Controller
{
   public function __construct(Request $request)
   {
      $this->validate(
         $request, [
            'title' => 'required|unique:todos|max:255',
            'complated' => 'boolean|required',
         ]
      );
   }
}
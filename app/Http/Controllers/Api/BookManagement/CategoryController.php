<?php

namespace Inspirium\Http\Controllers\Api\BookManagement;

use Carbon\Carbon;
use Inspirium\Http\Controllers\Controller;
use Inspirium\Models\BookManagement\BookBiblioteca;
use Inspirium\Models\BookManagement\BookCategory;
use Inspirium\Models\BookManagement\BookTender;
use Inspirium\Models\BookManagement\BookType;
use Inspirium\Models\BookManagement\SchoolSubject;
use Inspirium\Models\BookManagement\SchoolType;

class CategoryController extends Controller {

    public function getCategories() {
        $categories = BookCategory::with('children')->where('parent_id', '=', 0)->get()->keyBy('id');
        return response()->json($categories);
    }

    public function getTypes() {
        $groups = BookType::with('children')->whereNull('parent_id')->get()->keyBy('id');
        return response()->json($groups);
    }

    public function getSchools() {
        $schools = SchoolType::all()->keyBy('id');
        return response()->json($schools);
    }

    public function getSchoolSubjects() {
        $subjects = SchoolSubject::with('children')->whereNull('parent_id')->get()->keyBy('id');
        return response()->json($subjects);
    }

    public function getBibliotecas() {
        $subjects = BookBiblioteca::all()->keyBy('id');
        return response()->json($subjects);
    }
    public function getBookTenders() {
        $subjects = BookTender::whereDate('active_from', '<', Carbon::now())->whereDate('active_to', '>', Carbon::now())->get()->keyBy('id');
        return response()->json($subjects);
    }
}

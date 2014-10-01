<?php namespace Modules\Newsletter\Http\Controllers\Admin;

use Illuminate\Routing\Controller;

class NewsletterController extends Controller {

    public function index()
    {
        return view('newsletter::admin.index');
    }
}

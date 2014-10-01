<?php namespace Modules\Newsletter\Http\Controllers;

use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Laracasts\Flash\Flash;
use Modules\SimpleNewsletter\Entities\SimpleNewsletter;


class NewsletterController extends Controller
{

    public function create()
    {
        return View::make('newsletter::create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, Config::get('newsletter::config.rules'));

        if ($validator->passes()) {

            if (Sentinel::check()) {

                //$user = Sentinel::user();
                //$input['email'] = $user->email;

                $newsletter = SimpleNewsletter::create($input);

                if (!is_null($newsletter)) {

                    Flash::success(trans('newsletter::newsletter.added'));

                    return Redirect::back();

                }
                Flash::error(trans('newsletter::newsletter.added-error'));

                return Redirect::back()->withInput();
            }

            $newsletter = SimpleNewsletter::create($input);

            if (!is_null($newsletter)) {

                Flash::success(trans('newsletter::newsletter.added'));

                return Redirect::back();
            } else {

                Flash::error(trans('newsletter::newsletter.added-error'));

                return Redirect::back()->withInput();
            }
        }

        return Redirect::back();

    }
}
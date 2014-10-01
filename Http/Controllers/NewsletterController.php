<?php namespace Modules\Newsletter\Http\Controllers;

use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector as Redirect;
use Laracasts\Flash\Flash;
use Modules\CreateNewsletterRequest;
use Modules\Newsletter\Entities\Newsletter;
use Modules\Newsletter\Http\Requests\CreateNewsletterRequest as NewsletterRequest;
use Modules\Newsletter\Repositories\Eloquent\EloquentNewsletterControllerRepository;


class NewsletterController extends Controller
{
    /**
     * @var EloquentNewsletterControllerRepository
     */
    private $newsletter;
    /**
     * @var Redirect
     */
    private $redirect;


    /**
     * @param Newsletter $newsletter
     * @param Redirect $redirect
     * @param EloquentNewsletterControllerRepository $newsletterController
     */
    public function __construct(
        Newsletter $newsletter,
        Redirect $redirect,
        EloquentNewsletterControllerRepository $newsletter
    ) {
        $this->redirect = $redirect;
        $this->newsletter = $newsletter;
    }

    public function create()
    {
        return view('newsletter::create');
    }

    /**
     * Store newsletter
     * @param NewsletterRequest $request
     */
    public function store(NewsletterRequest $request)
    {
        if (Sentinel::check()) {

            return $this->storeAuth($request->all());

        }

        return $this->storeGuest($request->all());
    }

    /**
     * Store newsletter for auth user
     * @param $request
     * @return mixed
     */
    private function storeAuth($input)
    {

        $newsletter = $this->newsletter->store($input);

        if (!is_null($newsletter)) {

            Flash::success(trans('newsletter::newsletter.added'));

            return $this->redirect->back();

        }
        Flash::error(trans('newsletter::newsletter.added-error'));

        return $this->redirect->back()->withInput();
    }

    /**
     * Store newsletter for guest user
     * @param $request
     * @return mixed
     */
    private function storeGuest($input)
    {
        $newsletter = $this->newsletter->store($input);

        if (!is_null($newsletter)) {

            Flash::success(trans('newsletter::newsletter.added'));

            return $this->redirect->back();

        }

        Flash::error(trans('newsletter::newsletter.added-error'));

        return $this->redirect->back()->withInput();

    }
}
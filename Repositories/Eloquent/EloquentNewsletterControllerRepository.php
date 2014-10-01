<?php namespace Modules\Newsletter\Repositories\Eloquent;

use Modules\Newsletter\Entities\Newsletter;
use Modules\Newsletter\Repositories\NewsletterControllerRepository;

class EloquentNewsletterControllerRepository implements NewsletterControllerRepository
{

    /**
     * @var Newsletter
     */
    private $newsletter;

    /**
     * @param Newsletter $newsletter
     */
    public function __construct(Newsletter $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * @param $input
     * @return static
     */
    public function store($input)
    {
        return $this->newsletter->create($input);
    }


}

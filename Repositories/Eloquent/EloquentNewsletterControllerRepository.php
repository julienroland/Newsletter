<?php namespace Modules\Newsletter\Repositories\Eloquent;

use Modules\Newsletter\Entities\Newsletter;
use Modules\Newsletter\Repositories\NewsletterControllerRepository;

class EloquentNewsletterControllerRepository implements NewsletterControllerRepository
{

    /**
     * @var Newsletter
     */
    private $newsletter;

    public function __construct(Newsletter $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    public function store($input)
    {
        return $this->newsletter->create($input);
    }


}

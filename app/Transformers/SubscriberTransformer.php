<?php

namespace App\Transformers;


use App\Subscriber;
use League\Fractal;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;


class SubscriberTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [];

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [];

    /**
     * Transform object into a generic array
     *
     * @Subscriber $subscriber
     * @return array
     */
    public function transform(Subscriber $subscriber)
    {
        return [

            'id' => (int) $subscriber->id,
            'email' => $subscriber->email,
            'address' => $subscriber->address,
            'name' => $subscriber->name,
            'state' => $subscriber->state,
            'active' => $subscriber->active,
            'unsubscribed' => $subscriber->unsubscribed,
            'junk' => $subscriber->junk,
            'bounced' => $subscriber->bounced,
            'unconfirmed' => $subscriber->unconfirmed,
//            'created_at' => $subscriber->created_at->format('d M Y'),
//            'updated_at' => $subscriber->updated_at->format('d M Y'),
			
        ];
    }
    
    public function includeManager(Subscriber $subscriber){
        return $this->item($subscriber->user_id, new UserTransformer);
    }
}

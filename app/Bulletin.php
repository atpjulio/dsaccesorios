<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    protected $fillable = [
    	'title',
    	'subject',
    	'content',
    	'amount'
    ];

    /**
     * Methods
     */
    protected function storeRecord($request)
    {
        $bulletin = new Bulletin();

        $bulletin->title = $request->get('title');
        $bulletin->subject = $request->get('subject');
        $bulletin->content = $request->get('content');
        $bulletin->amount = 0;

        if ($request->get('saveOnly') == null) {
            $subscribers = Subscription::getActiveSubscribers();

            if ($subscribers) {            
                foreach ($subscribers as $key => $subscriber) {
                    Utilities::sendBulletin($subscriber, $bulletin->subject, $bulletin->content);
                    $bulletin->amount++;
                }
            }
        }

        $bulletin->save();

        return $bulletin;	
    }

    protected function updateRecord($request, $bulletin)
    {
        $bulletin->title = $request->get('title');
        $bulletin->subject = $request->get('subject');
        $bulletin->content = $request->get('content');

        if ($request->get('saveOnly') == null) {
            $subscribers = Subscription::getActiveSubscribers();
            if ($subscribers) {            
                $bulletin->amount = 0;
                foreach ($subscribers as $key => $subscriber) {
                    Utilities::sendBulletin($subscriber, $bulletin->subject, $bulletin->content);
                    $bulletin->amount++;
                }
            }
        }

        $bulletin->save();

        return $bulletin;   
    }
}

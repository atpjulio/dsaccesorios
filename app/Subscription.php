<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
    	'email',
    	'status'
    ];

    /**
     * Methods
     */
    protected function storeRecord($request)
    {
    	$subscription = new Subscription();
    	
    	$subscription->fill($request->all());
    	$subscription->save();

    	return $subscription;
    }

    protected function updateRecord($request, $id)
    {
    	$subscription = $this->findOfFail($id);
    	
    	if ($subscription) {
	    	$subscription->fill($request->all());
	    	$subscription->save();
    	}

    	return $subscription;
    }
}

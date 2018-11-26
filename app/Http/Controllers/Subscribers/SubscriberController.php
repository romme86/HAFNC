<?php

namespace App\Http\Controllers\Subscribers;

use App\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Cyvelnet\Laravel5Fractal\Facades\Fractal;
use Spatie\Fractal\Fractal;
use App\Transformers\SubscriberTransformer;
use App\Http\Requests\Subscribers\StoreSubscriberRequest;
use App\Http\Requests\Subscribers\UpdateSubscriberRequest;

class SubscriberController extends Controller
{
    public function index(){
        $subscribers = Subscriber::all();
//        return Fractal::item($subscribers, new SubscriberTransformer);
//        return Fractal::includes('manager')->item($subscriber, new SubscriberTransformer);
        
        return Fractal::create()->collection($subscribers)->transformWith(new SubscriberTransformer())->toArray();
    }
    
    public function store(StoreSubscriberRequest $request){
        $subscriber = new Subscriber();
        $subscriber->user_id = 1;
//        $subscriber->user_id = $request->user()->id;
        $subscriber->email = $request->email;
        $subscriber->address = $request->address;
        $subscriber->name = $request->name;
        $subscriber->state = $request->state;
        $subscriber->active = true;
        $subscriber->unsubscribed = $request->unsubscribed;
        $subscriber->junk = $request->junk;
        $subscriber->bounced = $request->bounced;
        $subscriber->unconfirmed = $request->unconfirmed;
        $subscriber->save();
//        return Fractal::item($subscriber, new SubscriberTransformer);
//        return Fractal::includes('manager')->item($subscriber, new SubscriberTransformer);
        return Fractal::create()->item($subscriber, new SubscriberTransformer())->toArray();
        
    }
    
    public function show($id){
        $subscriber = Subscriber::findOrFail($id);
        
        return Fractal::create()->item($subscriber, new SubscriberTransformer())->toArray();
//        return Fractal::item($subscriber, new SubscriberTransformer);
//        return Fractal::includes('manager')->item($subscriber, new SubscriberTransformer);
    }
    
    public function update(UpdateSubscriberRequest $request, $id ){
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->user_id = $request->get('user_id',$subscriber->user_id);
        $subscriber->email = $request->get('email',$subscriber->email);
        $subscriber->address = $request->get('address',$subscriber->address);
        $subscriber->name = $request->get('name',$subscriber->name);
        $subscriber->state = $request->get('state',$subscriber->state);
        $subscriber->active = $request->get('active',$subscriber->active);
        $subscriber->unsubscribed = $request->get('unsubscribed',$subscriber->unsubscribed);
        $subscriber->junk = $request->get('junk',$subscriber->junk);
        $subscriber->bounced = $request->get('active',$subscriber->bounced);
        $subscriber->unconfirmed = $request->get('active',$subscriber->unconfirmed);

        $subscriber->save();
        
        return Fractal::create()->item($subscriber, new SubscriberTransformer())->toArray();
//        return Fractal::includes('manager')->item($subscriber, new SubscriberTransformer);
    }
     
    public function destroy($id){
        Subscriber::destroy($id);
        return response(null , 200);
    }
}
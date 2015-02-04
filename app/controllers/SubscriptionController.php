<?php

class SubscriptionController extends \BaseController {

	/**
	 * 订阅报刊.
	 *
	 * @return Response
	 */
	public function newspaper()
	{
		$newspapers = Cover::whereType('报刊')->limit(6)->orderByRaw("RAND()")->get();
		return View::make('subscription.newspaper', compact('newspapers'));
	}


	/**
	 * 订阅杂志.
	 *
	 * @return Response
	 */
	public function magazine()
	{
		$magazines = Cover::whereType('杂志')->limit(6)->orderByRaw("RAND()")->get();
		return View::make('subscription.magazine', compact('magazines'));
	}

	public function subscribe() {
		$email = Input::get('email');
		$type = Input::get('type');

		$record = Subscription::whereType($type)->whereEmail($email)->get()->first();

		if($record)
			return Redirect::back()->with('error', 'Sorry, You have already subscribed.');
		else {
			$subscription = new Subscription;

			$subscription->email = $email;
			$subscription->type = $type;
			$subscription->subscription_ends_at = Carbon::now()->addMonth();
			$subscription->save();

			if($subscription)
			{
				return Redirect::back()->with('success', 'Congratulations! You have subscribed successfully.You have <em>1 Month</em> permission to read it.');
			}
		}

		return Redirect::back()->with('error', 'Unknown Error, Please try again later.');
	}

}

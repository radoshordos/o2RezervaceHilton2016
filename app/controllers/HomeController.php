<?php
use \Db\Rezervace;

class HomeController extends BaseController
{
    public function index()
    {
        $vstupenky = new Vstupenky();
        $input = Input::all();
        if (isset($input['email'])) {
            $input['email'] = strtolower($input['email']);
            $input['secure_code'] = md5($input['email'] . $input['fullname'] . $input['tikets']);

            if (!(strpos($input['email'], 'cetin.cz') !== false || strpos($input['email'], 'o2.cz') !== false)) {
                Session::flash('error', "email musí obsahovat o2.cz nebo cetin.cz");
            } else {
                $v = Validator::make($input, Rezervace::$rules);
                if ($v->passes()) {
                    try {
                        $r = new Rezervace();
                        $r->create($input);
                    } catch (Exception $e) {
                        Session::flash('error', $e->getMessage());
                    }

                    if ($vstupenky->isVisitor() === true) {
                        \Mail::send('emails.navstevnik', [
                            'unscript_code' => $input['secure_code']
                        ], function ($message) {
                        });
                    } else {
                        \Mail::send('emails.nahradnik', [
                            'unscript_code' => $input['secure_code']
                        ], function ($message) {
                        });
                    }

                    return Redirect::to('/zakoupeno');
                } else {
                    Session::flash('error', implode('<br />', $v->errors()->all(':message')));
                }
            }
        }

        if ($vstupenky->isAfterBuyTimeBegin() === false) {
            return \View::make('rezervace_pred');
        } elseif ($vstupenky->isBeforeBuyTimeEnd() === false) {
            return \View::make('rezervace_po');
        } else {
            return \View::make('rezervace.form', [
                'buy_time'                   => $vstupenky->isBuyTime(),
                'buy_time_after_begin'       => $vstupenky->isAfterBuyTimeBegin(),
                'buy_time_before_end'        => $vstupenky->isBeforeBuyTimeEnd(),
                'buy_unsubscribe_before_end' => $vstupenky->isBeforeUnsubscribeTimeEnd(),
                'volne_vstupenky'            => $vstupenky->getCountTiketsAvailable(),
                'is_visitor'                 => $vstupenky->isVisitor(),
            ]);
        }
    }


    public function uspesneZakoupeno()
    {
        $vstupenky = new Vstupenky();
        return \View::make('rezervace.success', [
            'buy_time'                   => $vstupenky->isBuyTime(),
            'buy_time_after_begin'       => $vstupenky->isAfterBuyTimeBegin(),
            'buy_time_before_end'        => $vstupenky->isBeforeBuyTimeEnd(),
            'buy_unsubscribe_before_end' => $vstupenky->isBeforeUnsubscribeTimeEnd(),
            'volne_vstupenky'            => $vstupenky->getCountTiketsAvailable(),
            'is_visitor'                 => $vstupenky->isVisitor(),
        ]);
    }

    public function odhlaseniRegistrace()
    {
        $vstupenky = new Vstupenky();
        return \View::make('rezervace.odhlaseni', [
            'volne_vstupenky' => $vstupenky->getCountTiketsAvailable(),
            'is_visitor'      => $vstupenky->isVisitor()
        ]);
    }
}
<?php

namespace App\BusinessService;

use Illuminate\Http\Request;
use App\Event;
use DB;

/*
 * EventServieクラス
 * Eventモデルに関わるロジックを記述
 */

class EventService {

    /**
     *
     * イベント登録
     * @param Request
     * @param String 登録ユーザID
     * @return bool
     */
    public static function registerEvent(Request $request, String $registerUserId) {

        $event = new Event();

        $event->register_user_id = $registerUserId;
        $event->event_name = $request->input('eventName');
        $event->event_details = $request->input('eventDetails');
        $event->event_type = $request->input('eventType');

        $eventReferenceUrl = null;
        if (empty($request->input('eventReferenceUrl'))) {
            // イベント参照URLが空であれば「#」を代入
            $eventReferenceUrl = '#';
        } else {
            $eventReferenceUrl = $request->input('eventReferenceUrl');
        }
        $event->event_reference_url = $eventReferenceUrl;

        // イベント締切、表示日時はyyyy/mm/dd + hh:mmで登録する
        $eventClosingDay = $request->input('eventClosingDate') . ' ' . $request->input('eventClosingTime');
        $eventDisplayingDay = $request->input('eventDisplayingDate') . ' ' . $request->input('eventDisplayingTime');

        $event->event_closing_day = $eventClosingDay;
        $event->event_displaying_day = $eventDisplayingDay;

        return $event->save();
    }

    /**
     *
     * イベント全件検索
     * @return Event
     */
    public static function searchAllEvents() {

        $events = Event::select('id', 'event_name', 'event_details', 'event_reference_url', 'event_type', DB::raw("to_char(event_closing_day, 'YYYY/MM/DD (TMDy) HH24:MI') as event_closing_day, "
                                . "to_char(event_displaying_day, 'YYYY/MM/DD (TMDy) HH24:MI') as event_displaying_day "))
                ->get();

        return $events;
    }

    /**
     *
     * イベントカンレダー用検索
     * @return Event
     */
    public static function searchEventCalendarData() {
        $events = Event::select('event_name', 'event_reference_url', 'event_closing_day')->get();
        return $events;
    }

    /**
     *
     * ユーザイベント検索
     * 特定ユーザが登録したイベントを検索する
     * @param String $registerUserId 登録ユーザID
     * @return Event
     */
    public static function searchUserEvents(String $registerUserId) {

        $events = Event::select('id', 'event_name', 'event_details', DB::raw("to_char(event_closing_day, 'YYYY/MM/DD (TMDy) HH24:MI') as event_closing_day, "
                                . "to_char(event_displaying_day, 'YYYY/MM/DD (TMDy) HH24:MI') as event_displaying_day "))
                ->where('register_user_id', '=', $registerUserId)
                ->get();

        return $events;
    }

    /**
     *
     * 過去表示の日付イベント削除
     * @return int 削除件数
     */
    public static function deletePastDisplayingEvents() {

        // 表示日時が現在日付以前のイベントを削除
        $now = date('Y/m/d H:i:s');
        $count = Event::where('event_displaying_day', '<', $now)->delete();

        return $count;
    }

    /**
     *
     * 特定ユーザのイベント削除
     *
     * @param String $eventId イベントID
     * @param String $registerUserId 登録ユーザID
     * @return int $deleteCount 削除件数
     */
    public static function deleteUserEvent(String $eventId, String $registerUserId) {

        $deleteCount = Event::where('id', '=', $eventId)
                ->where('register_user_id', '=', $registerUserId)
                ->delete();

        return $deleteCount;
    }

}

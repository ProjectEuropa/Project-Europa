<?php

namespace App\CommonUtils;

/* 
    定数クラス
 */
class Constants
{
    // データタイプチーム:'1'
    const DB_STR_DATA_TYPE_TEAM = '1';
    // データタイプマッチ:'2'
    const DB_STR_DATA_TYPE_MATCH = '2';
    
    //通常アップロード：'1'
    const DB_UPLOAD_TYPE_NORMAL = '1';
    //簡易アップロード:'2'
    const DB_UPLOAD_TYPE_SIMPLE = '2';
    
    // 検索タイプチーム:team
    const URL_SEARCH_TYPE_TEAM = 'team';
    // 検索タイプマッチ:match
    const URL_SEARCH_TYPE_MATCH = 'match';
   
    // ページネーション:10
    const NUM_PAGENATION_TEN = 10;
    // ページネーション:50
    const NUM_PAGENATION_FIFTY = 50;
    
    // ソート順 
    const STR_ORDER_TYPE_NEW = 'new';
    const STR_ORDER_TYPE_OLD = 'old';
    
    // チームフラグtrue(チームデータ)
    const IS_TEAM_FLG_TRUE = true;
    // チームフラグfalse(マッチデータ)
    const IS_TEAM_FLG_FALSE = false;
    
    // 通常アップロードフラグtrue(通常アップロード)
    const IS_NORMAL_UPLOAD_FLG_TRUE = true;
    // 通常アップロードアップフラグfalse(簡易アップロード)
    const IS_NORMAL_UPLOAD_FLG_FALSE = false;
    
}


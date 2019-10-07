<?php
function getParams($str){
    # Account regexp
    $ACCOUNT_RE = "/\b(\d{15})\b/"; // 15 digits as a single word
    # Amount regexp
    $AMOUNT_RE = "/\b(\d{1,12}[\.,]?\d{0,2}) ?[р|r]/ui"; // amount followed by r (rub) or р (руб)
    # Pass code regexp
    $PWD_RE = "/" // ."пароль ?[:-]? ?" // uncomment this line for strict validation having a known keyword 'пароль' fisrt
                ."\b(\d{4,6})\b(?!( ?р| ?r|,\d|.\d))/ui"; // 4 to 6 digts not followed by float part, r (rub), or р (руб)

    preg_match_all($PWD_RE, $str, $pwd); // Fetch the Password
    preg_match_all($AMOUNT_RE, $str, $amount); // Fetch Amount value
    preg_match_all($ACCOUNT_RE, $str, $account); // Fetch Account No
    
    return ["pwd" => count($pwd[1]) ? $pwd[1][0] : "Not found"
            , "amount" => count($amount[1]) ? $amount[1][0] : "Not found"
            , "account" => count($account[1]) ? $account[1][0] : "Not found"];
}
?>

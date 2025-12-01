<?php
// openai.php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Baca input dari frontend
data = json_decode(file_get_contents("php://input"), true);input = data["message"] ?? "";ch = curl_init("https://api.openai.com/v1/chat/completions");

curl_setopt(ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt(ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer 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"
]);

postData = json_encode([
    "model" => "gpt-3.5-turbo",
    "messages" => [
        ["role" => "user", "content" =>input]
    ]
]);

curl_setopt(ch, CURLOPT_POST, true);
curl_setopt(ch, CURLOPT_POSTFIELDS, postData);response = curl_exec(ch);
curl_close(ch);

echo $response;
?>
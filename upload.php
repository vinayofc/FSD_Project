<?php 
include 'vendor/autoload.php';

$parser = new \Smalot\PdfParser\Parser(); 
 
$file = $_FILES["pdf_file"]["tmp_name"]; 
 
$pdf = $parser->parseFile($file); 
 
$textContent = $pdf->getText();

// echo $textContent;


$url = "https://api.openai.com/v1/chat/completions";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $headers = array(
      "Authorization: Bearer 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",
      "Content-Type: application/json",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $request_body = [
        "messages" => [
          [
            "role" => "system",
            "content" => 'You are a Resume Analyzer who analye and summerize the resume in a proper format and give resume_score, resume_mistakes ,how_to_improve. Reply in json format : {
              "data":{
                  "name":"",
                  "email":"",
                  "phone":"",
                  "short_summary":"",
                  "resume_score":"",
                  "resume_mistake":"",
                  "how_to_improve":""
              }
          }
          '
          ],
          [
            "role" => "user",
            "content" => "summerize this resume -- '.$textContent.'"
          ]
        ],
        "temperature" => 0.8,
        "max_tokens" => 1600,
        "top_p" => 1,
        "frequency_penalty" => 0,
        "presence_penalty" => 0,
        "model" => "gpt-3.5-turbo"
      ];
    $data = json_encode($request_body);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    $res = json_decode($resp, true);
    curl_close($curl);
    $data = $res['choices'][0]['message']['content'];
    $newjson =  json_decode($data,true);
    echo '<h6><span class="badge text-bg-primary">Name :</span> '.$newjson['data']['name'].'</h6>
    <h6><span class="badge text-bg-primary">Email :</span>  '.$newjson['data']['email'].'</h6>
    <h6><span class="badge text-bg-primary">Phone :</span>  '.$newjson['data']['phone'].'</h6>
    <h6><span class="badge text-bg-primary">Short Summary :</span>  '.$newjson['data']['short_summary'].'</h6>
    <h6><span class="badge text-bg-primary">Resume Score :</span>  '.$newjson['data']['resume_score'].'</h6>
    <h6><span class="badge text-bg-primary">Resume Mistakes :</span>  '.$newjson['data']['resume_mistake'].'</h6>
    <h6><span class="badge text-bg-primary">Resume Improvement Suggestions :</span>  '.$newjson['data']['how_to_improve'].'</h6>';
    
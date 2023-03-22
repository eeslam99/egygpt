<?php

require __DIR__ . '/vendor/autoload.php'; 
use Orhanerday\OpenAi\OpenAi;

$open_ai_key = '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';
$open_ai = new OpenAi($open_ai_key);

if(isset($_POST['send'])){

    //To Get Text Result
    $complete = $open_ai->completion([
         'model' => 'text-davinci-003',
         'prompt' => $_POST['prompt'],
         'temperature' => 0.9,
         'max_tokens' => 1500,
        'frequency_penalty' => 0,
        'presence_penalty' => 0.6,
    ]);

   
    $complete = json_decode($complete,true);

    //echo '<pre>';
    //print_r($complete);
    //echo '</pre>';

    $text = $complete['choices'][0]['text'];
   
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EgyptGPT</title>
    <script src="https://kit.fontawesome.com/5e7ba30b8a.js" crossorigin="anonymous"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
        }

        .chat-window {
            width: 400px;
            max-width: 100%;
            margin: 10px auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }


        .chat-header {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
        }

        .{
            
            width: 310px;
            white-space: pre-wrap;
            display: none;
            font-size: 16px;
            font-weight: bold;
        }

        .chat-messages {
            list-style: none;
            margin: 0;
            padding: 10px;
            height: 400px;
            overflow-y: scroll;
        }
        .echo{
            white-space: pre-wrap;
            font-size: 16px;
            font-weight: bold;
        }

        .chat-message {
            margin-bottom: 10px;
        }

        .chat-message:last-child {
            margin-bottom: 0;
        }

        .chat-message.sent {
            text-align: right;
        }

        .chat-message.received {
            text-align: left;
        }

        .chat-message .message {
            padding: 10px;
            background-color: #f6f6f6;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .chat-message.sent .message {
            background-color: #007bff;
            color: #fff;
        }

        .chat-message.received .message {
            background-color: #fff;
            color: #333;
        }

        .chat-input {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            background-color: #f6f6f6;
        }

        .chat-input input[type="text"] {
            flex-grow: 1;
            margin-right: 10px;
            padding: 5px;
            border-radius: 5px;
            border: none;
            outline: none;
        }

        .chat-input button {
            padding: 5px 10px;
            border-radius: 50%;
            border: none;
            outline: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .chat-input button i{
            font-size:20px;
            padding:3px;
        }

        .chat-input button:hover {
            background-color: #0069d9;
        }

        ::-webkit-scrollbar {
            width: 7px;
            height: 10px;
            }

            
            ::-webkit-scrollbar-thumb {
            background-color: #888; 
            border-radius: 5px; 
            }

            
            ::-webkit-scrollbar-track {
            background-color: #f2f2f2; 
            }

        @media (max-width: 600px) {
            .chat-window {
                width: 100%;
                margin:10px auto;
                border-radius: 0;
            }
        }
        .copy {
            display: flex;
            align-items: center;
            justify-content: right;
            padding-top:10px;
            color: #666;
            padding:15px;
            border:none;
           
            
        }
        
        .copy i {
            margin-left: 8px;
            color: #666;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>
<body>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
        <div class="chat-window">
            <div class="chat-header">
            <h2>EgyptGPT</h2><br>
            <p>Made by Eng.Eslam Elsayed</p>
            </div>
            <div class="copy"><button onclick="copyText()"><i class="fa-solid fa-copy"></i></button></div>
            
            <ul class="chat-messages"><pre class="echo"><?php echo htmlentities($text) ?></pre></ul>
            <div class="chat-input">
            <input type="text" name='prompt' id="message-input" placeholder="Type your message here">
            <button  type=submit name='send' id="send-button"><i class="fa-regular fa-paper-plane"></i></button>
            </div>
        </div>
        </form>

        <script>
        function copyText() {
        var text = document.querySelector('pre.echo').textContent;
        var tempInput = document.createElement('input');
        tempInput.value = text;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);
        }
        </script>

</body>
</html>






